<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fotos_lab;

class Fotos_laboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotos = fotos_lab::orderBy('id', 'desc')->paginate(6);
        return view('admin.fotos_lab.index', compact('fotos'));
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
            'path_foto'        =>  'image|required'
        ]);

            
        $file   = $request->file('path_foto');
        $name   = 'imagen_'.time().'.'.$file->getClientOriginalExtension();
        $path   = public_path().'/images/laboratorio/';
        $dbname = $path.$name;
        $moved  = $file->move($path, $name);


        if ($moved){
            fotos_lab::create([
            'path_foto'        =>  $name
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
        $item=fotos_lab::find($id);
        $deleted = unlink(public_path().'/images/laboratorio/'.$item->path_foto);
        if($deleted){

            $item->delete();
            session()->flash('message','La fotografía se ha eliminado correctamente');        
        }
        return redirect()->back();
    }
}
