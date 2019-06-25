<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tipo_productos;
use Illuminate\Validation\Rule;

class Tipo_productosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos_productos = tipo_productos::orderBy('id', 'desc')->paginate(5);
        return view('admin.tipos_productos.index', compact('tipos_productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tipos_productos.create');
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
            'tipo_producto'   => ['required',
            Rule::unique('tipo_productos')->ignore($request->id)],
            'path_foto'      =>  'image|required'
        ]);
        
        $file = $request->file('path_foto');
        $name = 'tipoproducto_'.time().'.'.$file->getClientOriginalExtension();
        $path = public_path().'/images/tipo_producto/';
        $dbname = $path.$name;
        $file->move($path, $name);

        tipo_productos::create([
            'tipo_producto'    => $request->tipo_producto,
            'path_foto'        => $name
        ]);

        return redirect('admintipoproductos');
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
        $item = tipo_productos::find($id);
        unlink(public_path().'/images/tipo_producto/'.$item->path_foto);
        $item->delete();
         session()->flash('message','El tipo de producto '.$item->path_foto.' se ha eliminado correctamente');
        return redirect('admintipoproductos');
    }
}
