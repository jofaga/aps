<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\edificios;
use App\estados;
use App\paises;

class EdificiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edificios = edificios::orderBy('id', 'desc')->paginate(10);
        
        return view('admin.edificios.index', compact('edificios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $estado = estados::orderBy('id', 'desc')->pluck('nombre', 'id');
        $pais = paises::orderBy('id', 'desc')->pluck('nombre', 'id');
         // dd($estado);

         return view('admin.edificios.create', compact('estado', 'pais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new edificios($request->all());   
        $item->save();
        return redirect ('adminedificios');
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
        $edificio = edificios::find($id);
        $estado = estados::orderBy('id', 'desc')->pluck('nombre', 'id');
        $pais = paises::orderBy('id', 'desc')->pluck('nombre', 'id');
        $estadocargado = $edificio->estado;
        $paiscargado = $edificio->pais;
        return view('admin.edificios.edit', compact('edificio', 'estado', 'pais', 'estadocargado', 'paiscargado'));   
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
        $edificio = edificios::find($id);
        $edificio->fill($request->all());
        $edificio->save();
        session()->flash('message','El edificio se ha sido actualizado correctamente');
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
        $item = edificios::find($id);
        $item->delete();
        return redirect('adminedificios');
    }

    public function contacto($id)
    {
        edificios::where('contacto', true)->update([
            'contacto'=>false]);

        $contacto = edificios::find($id);
        $contacto->contacto = true;
        $contacto->save();
        return redirect()->back();
    }
}
