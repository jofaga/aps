<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fotos_proyectos;
use App\proyectos;

class FotosProyectosController extends Controller
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
        //
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
            'id_proyecto'    => 'required',
            'path_foto'     =>  'image|required'
        ]);

            
        $file   = $request->file('path_foto');
        $name   = 'imagen_'.time().'.'.$file->getClientOriginalExtension();
        $path   = public_path().'/images/proyectos/';
        $dbname = $path.$name;
        $moved  = $file->move($path, $name);


        if ($moved){
            fotos_proyectos::create([
            'id_proyecto'      =>  $request->id_proyecto,
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
        $item = proyectos::find($id);
          // dd($item);
        $fotos = $item->fotos_proyectos;
         // dd($fotos);
        return view('admin.fotos_proyecto.index')->with(compact('fotos', 'item'));
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
         $item=fotos_proyectos::find($id);
        $deleted = unlink(public_path().'/images/proyectos/'.$item->path_foto);
        if($deleted){

            $item->delete();
            session()->flash('message','La fotografía se ha eliminado correctamente');        
        }
        return redirect()->back();
    }

    public function thumb($id, $id_foto)
    {
        fotos_proyectos::where('id_proyecto', $id)->update(
            [
                'thumb' =>false
            ]);
        $thumbproyecto = fotos_proyectos::find($id_foto);
        $thumbproyecto->thumb = true;
        $thumbproyecto->save();
        return redirect()->back();
    }
}
