<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\clientes;
use Illuminate\Validation\Rule;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = clientes::orderBy('id', 'desc')->paginate(5);
        return view('admin.clientes.index', compact('clientes'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clientes.create');
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
            'nombre_cliente'   => ['required',
            Rule::unique('clientes')->ignore($request->id)],
            'logo'      =>  'image|required'
        ]);
        $file = $request->file('logo');
        $name = 'logo_'.time().'.'.$file->getClientOriginalExtension();
        $path = public_path().'/images/logos_clientes/';
        $dbname = $path.$name;
        $file->move($path, $name);

        clientes::create([
            'nombre_cliente'   => $request->nombre_cliente,
            'logo'      => $name
        ]);


        return redirect ('adminclientes');
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
        $cliente = Clientes::find($id);
        return view('admin.clientes.edit', compact('cliente'));
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
            'logo'      =>'image'
        ]);
        
        $file = $request->file('logo');
        $name = 'logo_'.time().'.'.$file->getClientOriginalExtension();
        $path = public_path().'/images/logos_clientes/';
        $dbname = $path.$name;
        $file->move($path, $name);
        $nuevo = Clientes::find($id);
        unlink(public_path().'/images/logos_clientes/'.$nuevo->logo);
        $nuevo->update([
            'logo'      => $name
        ]);
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
         $cliente = Clientes::find($id);
        unlink(public_path().'/images/logos_clientes/'.$cliente->logo);
        $cliente->delete();
        session()->flash('message','El cliente '.$cliente->nombre.' se ha eliminado correctamente');
        return redirect('admin/clientes');
    }
}
