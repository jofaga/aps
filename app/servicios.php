<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servicios extends Model
{
    protected $tabe = 'servicios';

	protected $fillable = [
		'nombre_servicio',
		'descripcion_servicio',
		'foto'
	];

	public function fotos_servicio()
	{
		return $this->hasOne(fotos_servicio::class);
	}
}
