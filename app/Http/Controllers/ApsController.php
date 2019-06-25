<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\textos_paginas;
use App\social;
use App\caracteristicas;
use App\clientes;
use App\usuarios;
use App\fotos_usuarios;
use App\correos;
use App\telefonos;
use App\servicios;
use App\proyectos;
use App\fotos_proyectos;
use App\fotos_lab;
use App\servicios_laboratorio;
use App\edificios;
use App\tipo_productos;
use App\productos;
use App\paises;
use App\estados;
use App\telefonos_edificios;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;



class ApsController extends Controller
{
    public function index()
    {
    	$info = textos_paginas::first();
        $socials = social::orderBy('id', 'desc')->get();
        return view('site.home', compact('info', 'socials'));
    }

    public function admin()
    {   
        $socials = social::orderBy('id', 'desc')->get();
    	return view('admin.index', compact('socials'));
    }

    public function usuarios()
    {
    	return view('admin.usuarios.index');
    }

    public function about()
    {   $socials = social::orderBy('id', 'desc')->get();
        $caracteristicas = caracteristicas::orderBy('id', 'desc')->paginate(9);
        return view ('site.about', compact('socials', 'caracteristicas'));

    }

    public function crew()
    {
     $socials = social::orderBy('id', 'desc')->get();
     $members = usuarios::orderBy('id', 'desc')->paginate(9);
     $members->each(function($members){
        $members->fotos_usuario;
     });
     $correos = correos::orderBy('id','desc')->get();
     $telefonos = telefonos::orderBy('id', 'desc')->get();

     // dd($members);
     $fotos = fotos_usuarios::orderBy('id','desc')->get();

     return view('site.crew', compact('correos','telefonos','socials','fotos', 'members', $members));   
    }

	public function projects()
    {
        $socials = social::orderBy('id', 'desc')->get();
        $projects = proyectos::orderBy('id', 'desc')->get();
        return view('site.projects', compact('projects','socials'));

    }  

    public function test($id)
    {
         $socials    = social::orderBy('id', 'desc')->get();
        return view('site.test', compact('socials'));
    }

    public function project($id)
    {   
        $socials    = social::orderBy('id', 'desc')->get();
        $proyecto   = proyectos::find($id);
        $fotos      = $proyecto->fotos_proyectos;
        $cliente    = $proyecto->clientes;
        $projects = proyectos::orderBy('id', 'desc')->paginate(3);
        $fotosproy =fotos_proyectos::orderBy('id', 'desc')->get();
        return view('site.project', compact('fotosproy','socials','proyecto', 'fotos', 'cliente', 'projects'));

    }  

    public function products()
    {
        $socials = social::orderBy('id', 'desc')->get();
        $productos = productos::orderBy('id', 'desc')->paginate(9);
        $productos->each(function($productos){
            $productos->fotos_prod;
        });
        $tipos = tipo_productos::orderBy('id','desc')->get();
        $current = "Todos";
        return view('site.products', compact('socials', 'productos', 'tipos', 'current'));
    }

    public function product($id)
    {
          $socials  = social::orderBy('id', 'desc')->get();
          $producto = productos::find($id);
          $fotos    = $producto->fotos_prod;

          return view ('site.product', compact('socials','producto','fotos'));
    }

    public function producttype($id)
    {
        $socials  = social::orderBy('id', 'desc')->get();
        $tipo = tipo_productos::find($id);
        $productos = productos::where('id_tipo', $tipo->id)->paginate(9);
        $productos->each(function($productos){
            $productos->fotos_prod;
        });
         $tipos = tipo_productos::orderBy('id','desc')->get();
         $current = $tipo->tipo_producto;
          return view ('site.products', compact('socials','productos','fotos','tipos', 'current'));
    }


    public function laboratory()
    {
        $socials = social::orderBy('id', 'desc')->get();
        $info = textos_paginas::first();
        $fotos = fotos_lab::orderBy('id', 'asc')->get();
        $servicioslab = servicios_laboratorio::orderBy('id', 'asc')->get();
        return view('site.laboratory', compact('socials','info', 'fotos', 'servicioslab'));

    }

    public function services()
    {
        $socials = social::orderBy('id', 'desc')->get();
        $services = servicios::orderBy('id', 'desc')->paginate(4);
        return view('site.services', compact('socials', 'services'));
    }

    public function contact()
    {          
        $socials = social::orderBy('id', 'desc')->get();
        $edificios = edificios::orderBy('id', 'desc')->get();
        $paises = paises::orderBy('id','desc')->get();
        $estados = estados::orderBy('id','desc')->get();
        $telefonos = telefonos_edificios::orderBy('id', 'desc')->get();
        return view('site.contact')->with(compact('socials', 'edificios', 'paises', 'estados', 'telefonos'));
    }

    public function customers()
    {
        $socials = social::orderBy('id', 'desc')->get();
        $customers = clientes::orderBy('id','desc')->paginate(6);
        return view('site.customers', compact('socials', 'customers'));
    }

    public function mail(Request $request)
    {
        Mail::to('pruebas@kriegsoft.com')->send(new Contact($request));
        return redirect()->back();
    }

}
