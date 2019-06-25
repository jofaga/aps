<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fotos_usuarios;
use App\usuarios;

class FotosCrewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotos = fotos_usuarios::orderBy('id', 'desc')->paginate(10);
        return view('admin.fotoscrew.index', compact('fotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin,fotoscrew.create');
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
            'id_usuario'    => 'required',
            'path_foto'     =>  'image|required'
        ]);

            
        $file   = $request->file('path_foto');
        $name   = 'imagen_'.time().'.'.$file->getClientOriginalExtension();
        $path   = public_path().'/images/crew/';
        $dbname = $path.$name;
        $moved  = $file->move($path, $name);


        if ($moved){
            fotos_usuarios::create([
            'id_usuario'      =>  $request->id_usuario,
            'path_foto'       =>  $name
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
        $foto = fotos_usuarios::find($id);
        return view('admin.fotosusuarios.edit', compact('foto'));
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
        if($request->path_foto != null){
            $this->validate($request,[
                'id_usuario'  =>  'required',
                'path_foto'    =>  'image']);
            $file = $request->file('path_foto');
            $name   = 'imagen_'.time().'.'.$file->getClientOriginalExtension();
        
            $path   = public_path().'/images/crew/';
            $dbname = $path.$name;
            $file->move($path, $name);
            $nuevo = Fotos::find($id);
            unlink(public_path().'/images/crew/'.$nuevo->nombre);
            $nuevo->update([
                'id_usuario'        => $request->id_usuario,
                'path_foto'         => $name
            ]);
        }
        else{
            $this->validate($request, [
            'id_usuario'   => 'required',
        ]);   
            $nuevo = Fotos::find($id);
            $nuevo->update([
                'id_usuario'    =>  $request->id_usuario,
            ]);
        }
        session()->flash('message','El registro ha sido actualizado correctamente');
       return redirect()->back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $item=fotos_usuarios::find($id);
        $deleted = unlink(public_path().'/images/crew/'.$item->path_foto);
        if($deleted){

            $item->delete();
            session()->flash('message','La fotografía se ha eliminado correctamente');        
        }
        return redirect()->back();
    }

    public function mostrar($id)
    {
        $usuario = usuarios::find($id);
        $fotos= $usuario->fotos_usuario;
        return view('admin.fotoscrew.index', compact('usuario', 'fotos'));
    }

    public function thumb($id, $id_foto)
    {
        fotos_usuarios::where('id_usuario', $id)->update(
            [
                'thumb' =>false
            ]);
        $thumbusuario = fotos_usuarios::find($id_foto);
        $thumbusuario->thumb = true;
        $thumbusuario->save();
        return redirect()->back();
    }
}
