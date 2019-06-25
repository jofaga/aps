<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_proyectos extends Model
{
    protected $table = 'tipo_proyectos';

	protected $fillable = [
		'tipo_proyecto',
        'tag'
	];

	public function proyectos()
    {
        return $this->belongsToMany(proyectos::class,'proyecto_tipo_proyecto','tipo_id', 'proyecto_id')->withTimestamps();
    }


    public function scopeSearchType($query, $tipo)
    {   

    	return $query->where('tipo','=', $tipo);

    }

}
