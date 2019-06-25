<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class caracteristicas extends Model
{
    protected $table = "caracteristicas";


    protected $fillable = [
    	'nombre',
    	'contenido'
    ];
}
