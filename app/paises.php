<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paises extends Model
{
    protected $table = 'paises';

    protected $fillable = [
    	'iso',
    	'nombre'
    ];

      public function edificio()
    {
        return $this->belongsTo(edificios::class, 'pais', 'id');
    }
}
