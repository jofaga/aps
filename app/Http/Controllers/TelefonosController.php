<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\edificios;
use App\telefonos;
use App\usuarios;


use Illuminate\Validation\Rule;

class TelefonosController extends Controller
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
            'telefono'  => ['required',
            Rule::unique('telefonos')->ignore($request->id)]
            ]);

        telefonos::create([
            'telefono'  =>  $request->telefono,
            'id_entus'  =>  $request->id_entus,
        ]);
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
        $item = telefonos::find($id);
        $item->delete();
        session()->flash('message','El telefono '.$item->telefono.' se ha eliminado correctamente');
        return redirect()->back();
    }

    public function mostrar($id)
    {
        $item = usuarios::find($id);
        $telefonos = $item->telefonos;
        return view('admin.telefonos.index')->with(compact('telefonos', 'item'));
    }
}
