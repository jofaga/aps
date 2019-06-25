<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tipo_proyectos;

class Tipo_proyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = tipo_proyectos::orderBy('id', 'desc')->paginate(10);
        
        return view('admin.tipos_proyectos.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tipos_proyectos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         tipo_proyectos::create([
            'tipo_proyecto'  => $request->tipo_proyecto,
            'tag'   => $request->tag]);
        return redirect ('/admintipoproyectos');
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
        $tipo = tipo_proyectos::find($id);       
        return view('admin.tipos_proyectos.edit', compact('tipo'));
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
            $this->validate($request, [
             'tag'  => ['max:12']
             ]);
        $nuevo = tipo_proyectos::find($id);
        $nuevo->update($request->all());
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
         $item = tipo_proyectos::find($id);
        $item->delete();
               session()->flash('message','El tipo de proyecto '.$item->tipo_proyecto.' se ha eliminado correctamente');
        return redirect()->back();
    }
}
