<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fotos;
use App\proyectos;
use Illuminate\Support\Facades\Storage;

class FotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $fotos = fotos::orderBy('id', 'desc')->paginate(2);
        $fotos->each(function($fotos){
            $fotos->proyecto;
        });


        return view('admin.fotos.index', compact('fotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proyecto = proyectos::orderBy('id', 'desc')->pluck('nombre', 'id');
        return view('admin.fotos.crear', compact('proyecto'));
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
            'id_proyecto'       => 'required',
            'path_foto'        =>  'image|required'
        ]);



        $file   = $request->file('path_foto');
        $name   = 'imagen_'.time().'.'.$file->getClientOriginalExtension();
        $path   = public_path().'/images/fotos/';
        $dbname = $path.$name;
        $file->move($path, $name);

        Fotos::create([
            'id_proyecto'   =>  $request->id_proyecto,
            'path'          =>  $name
        ]);

        return redirect ('admin/fotos');
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
         $proyecto = proyectos::orderBy('id', 'desc')->pluck('nombre', 'id');
        $foto = fotos::find($id);
        return view('adminfotos.edit', compact('proyecto', 'foto'));
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
        if($request->nombre != null){
            $this->validate($request,[
                'id_proyecto'  =>  'required',
                'path_foto'    =>  'image']);
            $file = $request->file('path_foto');
            $name   = 'imagen_'.time().'.'.$file->getClientOriginalExtension();
        
            $path   = public_path().'/images/proyectos/';
            $dbname = $path.$name;
            $file->move($path, $name);
            $nuevo = fotos::find($id);
            unlink(public_path().'/images/proyectos/'.$nuevo->nombre);
            $nuevo->update([
                'id_proyecto'   => $request->id_proyecto,
                'path_foto'     => $dbname
            ]);
        }
        else{
            $this->validate($request, [
            'id_proyecto'   => 'required',
        ]);   
            $nuevo = fotos::find($id);
            $nuevo->update([
                'id_proyecto'    =>  $request->id_proyecto,
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
         $item=fotos::find($id);
        $deleted = unlink(public_path().'/images/proyectos/'.$item->path_foto);
        if($deleted){

            $item->delete();
            session()->flash('message','La fotografía se ha eliminado correctamente');        
        }
        return redirect()->back();
    }

    public function mostrar($id)
    {
        $proyecto = proyectos::find($id);
        $fotos = $proyecto->fotos;
         // dd($proyecto);
        return view('adminfotos.index')->with(compact('fotos', 'proyecto'));
    }

    public function thumb($id, $foto_id)
    {
        fotos::where('id_proyecto', $id)->update([
        'thumb' =>false
        ]); 

        $thumbproyecto = fotos::find($foto_id);
        $thumbproyecto->thumb = true;
        $thumbproyecto->save();
        return redirect()->back();  
    }
}
