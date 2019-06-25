<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estados extends Model
{
    protected $table = 'estados';

    protected $fillable=[
    	'nombre',
    	'abrev'
    ];

     public function edificio()
    {
        return $this->belongsTo(edificios::class, 'estado', 'id');
    }
}
