<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\textos_paginas;
use App\Http\Requests\CrearTextospaginasRequest;


class PaginaController extends Controller
{
    


    public function edit(){
    	$info_pagina = textos_paginas::first();
    	return view('admin.pagina.edit', compact('info_pagina', 'caracteristicas'));
    }


    public function update(CrearTextospaginasRequest $request)
    {
    	$info = textos_paginas::first();
    	$info->fill($request->all());
    	$info->save();
    	session()->flash('message','El contenido de la página ha sido actualizado correctamente, los cambios serán reflejados de inmediato');
        return redirect()->back();
    }
}
