<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\correos;
use App\usuarios;
use Illuminate\Validation\Rule;

class CorreosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $correos = correos::orderBy('id', 'desc')->paginate(10);
        
        return view('admin.correos.index', compact('correos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.correos.create');
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
            'id_entus' => 'required',
            'correo'  => ['required',
            Rule::unique('correos')->ignore($request->id)]
            ]);

        correos::create([
            'id_entus'=> $request->id_entus,
            'correo'  => $request->correo]);
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
         $correo = correos::find($id);
        return view('admin.correos.edit', compact('correo'));
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
         $nuevo = correos::find($id);
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
        $item = correos::find($id);
        $item->delete();
               session()->flash('message','El correo'.$item->correo.' se ha eliminado correctamente');
        return redirect()->back();
    }

    public function mostrar($id)
    {
        $usuario = usuarios::find($id);
        $correos = $usuario->correo;
        return view('admin.correos.index', compact('usuario', 'correos'));
    }
}
