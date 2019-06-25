<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    protected $tabe = 'productos';

	protected $fillable = [
		'id_tipo',
		'nombre_producto',
		'descripcion_producto'
	];

	public function tipo_producto()
    {
        return $this->hasOne(tipo_productos::class, 'id');
    }

    	public function subtipo_producto()
    {
        return $this->hasOne(subtipotipo_productos::class, 'id');
    }

    public function fotos_prod()
    {
    	return $this->hasMany(fotos_productos::class,'id_producto', 'id');
    }
}
