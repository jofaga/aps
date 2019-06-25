<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productos;
use App\tipo_productos;
use App\subtipo_productos;
use Illuminate\Validation\Rule;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = productos::orderBy('id', 'desc')->paginate(10);
        return view('admin.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $tipos = tipo_productos::orderBy('id','desd')->pluck('tipo_producto','id');
        return view('admin.productos.create', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new productos($request->all());
        $item->save();
        return redirect('adminproductos');
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
        $producto = productos::find($id);
        $producto->tipo_productos;
        $producto->subtipo_productos;
        $tipos = tipo_productos::orderBy('id','desd')->pluck('tipo_producto','id');
        $tiposcargados = $producto->tipo_productos;

        return view('admin.productos.edit', compact('producto','tipos', 'tiposcargados'));
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
        $producto = productos::find($id);
        $producto->fill($request->all());
        $producto->save();
        session()->flash('message','El producto ha sido actualizado correctamente');
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
        $item = productos::find($id);
        $item->destroy();
        return redirect('adminproductos');
    }

   
}
