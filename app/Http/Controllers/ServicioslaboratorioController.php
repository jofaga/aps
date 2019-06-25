<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\servicios_laboratorio;

class ServicioslaboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicioslab = servicios_laboratorio::orderBy('id', 'desc')->paginate(10);
        return view ('admin.servicios_laboratorio.index', compact('servicioslab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.servicios_laboratorio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new servicios_laboratorio($request->all());
        $item->save();
        return redirect('adminservicioslaboratorio');
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
        $serviciolab = servicios_laboratorio::find($id);
        return view('admin.servicios_laboratorio.edit', compact('serviciolab'));
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
        $serviciolab =servicios_laboratorio::find($id);
        $serviciolab->fill($request->all());
        $serviciolab->save();
        session()->flash('message','El servicio ha sido actualizado correctamente');
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
        $item = servicios_laboratorio::find($id);
        $item->delete();
        return redirect('adminservicioslaboratorio');
    }
}
