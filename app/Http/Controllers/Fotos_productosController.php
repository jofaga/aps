<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fotos_productos;
use App\productos;
use Illuminate\Support\Facades\Storage;

class Fotos_productosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = productos::orderBy('id', 'desc')->pluck('nombre', 'id');
        return view('adminfotos.crear', compact('producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'id_producto'   => 'required',
            'path_foto'     => 'image|required'
        ]);

            
        $file   = $request->file('path_foto');
        $name   = 'imagen_'.time().'.'.$file->getClientOriginalExtension();
        $path   = public_path().'/images/productos/';
        $dbname = $path.$name;
        $moved  = $file->move($path, $name);


        if ($moved){
            fotos_productos::create([
            'id_producto'       =>  $request->id_producto,
            'path_foto'         =>  $name
        ]);

        }
        
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=fotos_productos::find($id);
        $deleted = unlink(public_path().'/images/productos/'.$item->path_foto);
        if($deleted){

            $item->delete();
            session()->flash('message','La fotografía se ha eliminado correctamente');        
        }
        return redirect()->back();
    }

     public function mostrar($id)
    {
        $producto = productos::find($id);
        // dd($producto);
        $fotos = $producto->fotos_prod;
        return view('admin.fotos.index',compact('producto','fotos'));
    }

    public function thumb($id, $foto_id)
    {
        fotos_productos::where('id_producto', $id)->update([
            'thumb'=>false
        ]);
        $thumb = fotos_productos::find($foto_id);
        $thumb->thumb = true;
        $thumb->save();
        return redirect()->back();
    }

    public function guardar(Request $request)
    {

    }
}
