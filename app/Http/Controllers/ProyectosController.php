<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tipo_proyectos;
use App\clientes;
use App\proyectos;
use Illuminate\Validation\Rule;

class ProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = proyectos::orderBy('id', 'desc')->paginate(8);
        return view('admin.proyecto.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo = tipo_proyectos::orderBy('id', 'desc')->pluck('tipo_proyecto', 'id');
        $cliente = clientes::orderBy('id', 'desc')->pluck('nombre_cliente','id' );
        return view('admin.proyecto.create', compact('tipo','cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new proyectos($request->all());
        $item->save();
        $item ->tipoproyectos()->sync($request->tipo);
        return redirect('adminproyectos');
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
        $proyecto = proyectos::find($id);
        $proyecto->tipoproyectos;
        $tipo = tipo_proyectos::orderBy('id', 'desc')->pluck('tipo_proyecto', 'id');
        $cliente = clientes::orderBy('id', 'desc')->pluck('nombre_cliente', 'id');      
        $tiposcargados = $proyecto->tipoproyectos->pluck('id')->ToArray();

        return view('admin.proyecto.edit', compact('tipo', 'cliente', 'proyecto', 'tiposcargados'));
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
        $proyecto = proyectos::find($id);
        $proyecto->fill($request->all());
        $proyecto->save();
        $proyecto ->tipoproyectos()->sync($request->tipo);
        session()->flash('message','El proyecto ha sido actualizado correctamente');
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
        $item = proyectos::find($id);
        $item->delete();
        return redirect('adminproyectos');    }
}
