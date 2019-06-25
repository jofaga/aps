<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\servicios;
use Illuminate\Support\Facades\Storage;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = servicios::orderBy('id', 'desc')->paginate(5);
        return view('admin.servicios.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.servicios.create');
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
            'nombre_servicio'       => 'required',
            'descripcion_servicio'  => 'required',
            'foto'                  =>  'image|required'
        ]);

        $file   = $request->file('foto');
        $name   = 'imagen_'.time().'.'.$file->getClientOriginalExtension();
        $path   = public_path().'/images/servicios/';
        $dbname = $path.$name;
        $moved  = $file->move($path, $name);


        if ($moved){
            servicios::create([
            'nombre_servicio'       =>  $request->nombre_servicio,
            'descripcion_servicio'  =>  $request->descripcion_servicio,
            'foto'                  =>  $name
        ]);

        }

       return redirect('adminservicios');
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
        $servicio = servicios::find($id);
        return view('admin.servicios.edit', compact('servicio'));

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
      if($request->foto!=null){
        $this->validate($request,[
                'descripcion_servicio'  =>  'required',
                'foto'    =>  'image']);
            $file = $request->file('foto');
            $name   = 'imagen_'.time().'.'.$file->getClientOriginalExtension();
        
            $path   = public_path().'/images/servicios/';
            $dbname = $path.$name;
            $file->move($path, $name);
            $nuevo = servicios::find($id);
            unlink(public_path().'/images/servicios/'.$nuevo->foto);
            $nuevo->update([
                'descripcion_servicio'  =>  $request->descripcion_servicio,
                'foto'                  => $name
            ]);
      }
      else{

        $this->validate($request, [
            'descripcion_servicio'   => 'required',
        ]);   
            $nuevo = servicios::find($id);
            $nuevo->update([
                'descripcion_servicio'    =>  $request->descripcion_servicio
            ]);
      }
        session()->flash('message', 'El servicio ha sido actualizado');
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
        $item = servicios::find($id);
        $deleted = unlink(public_path().'/images/servicios/'.$item->foto);
        if($deleted){

            $item->delete();
            session()->flash('message','El registro se ha eliminado correctamente');        
        }

        return redirect('adminservicios');
    }
}
