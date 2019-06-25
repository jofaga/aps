<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\edificios;
use App\telefonos_edificios;
use Illuminate\Validation\Rule;

class TelefonosEdificiosController extends Controller
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
            Rule::unique('telefonos_edificios')->ignore($request->id)]
            ]);

        telefonos_edificios::create([
            'telefono'  =>  $request->telefono,
            'id_edificio'  =>  $request->id_edificio,
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
        $item = edificios::find($id);
        // dd($item);
        $telefonos = $item->telefonos_edificios;
        return view('admin.telefonos_edificios.index')->with(compact('telefonos', 'item'));
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
        $item = telefonos_edificios::find($id);
        $item->delete();
        session()->flash('message','El telefono '.$item->telefono.' se ha eliminado correctamente');
        return redirect()->back();
    }
}
