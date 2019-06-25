<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servicios_laboratorio extends Model
{
    protected $tabe = 'servicios_laboratorios';

	protected $fillable = [
		'nombre_servicio_lab',
		'descripcion_servicio_lab'
	];
}
