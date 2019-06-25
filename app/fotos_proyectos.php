<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fotos_proyectos extends Model
{
    protected $table = 'fotos_proyectos';

    protected $fillable = [
    	'id_proyecto',
    	'path_foto',
    	'thumb'
    ];


    public function proyecto()
    {
    	return $this->belongsTo(proyectos::class, 'id');
    }

}
