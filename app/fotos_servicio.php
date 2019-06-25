<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fotos_servicio extends Model
{
    protected $table = 'fotos_servicio';

    protected $fillable = [
    	'path_foto',
    	'id_servicio'
    ];

    public function servicios()
    {
    	return $this->belongsTo(servicios::class); 
    }
}
