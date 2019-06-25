<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fotos extends Model
{
    protected $table = 'fotos';

    protected $filable = [
    	'id_proyecto',
    	'path_foto',
    	'thumb'
    ];

    public function proyecto()
	{
		return $this->belongsTo(proyectos::class, 'id' );		
	}

	public function getUrlAttribute()
	{
		return '/images/proyectos'.$this->foto;
	}
}