<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proyectos extends Model
{
    protected $tabe = 'proyectos';

	protected $fillable = [
		'nombre_proyecto',
		'descripcion',
		'capacidad',
		'id_cliente',
		'ubicacion',
		'fecha_terminacion'
	];

  
    public function tipoproyectos()
    {
        return $this->belongsToMany(tipo_proyectos::class, 'tipo_proyecto_proyecto', 'proyecto_id', 'tipo_id')->withTimestamps();
    }   

  	public function clientes()
    {
        return $this->hasOne(clientes::class, 'id');
    }

	public function fotos_proyectos()
    {
    	return $this->hasMany(fotos_proyectos::class,'id_proyecto', 'id');
    }

    public function getThumbImageAttribute()
    {

        $thumbImage = $this->fotos()->where('thumb', true)->first();

        if(!$thumbImage)
        {
            $thumbImage = $this->fotos()->first();
        }

        if($thumbImage)
        {
            return $thumbImage->url;
        }

        return '/images/proyectos/deafult.jpg';
    }


}

