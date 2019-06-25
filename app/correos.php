<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class correos extends Model
{
    protected $table = 'correos';

    protected $fillable =
    [
    	'correo',
    	'id_entus',
    ];

     public function usuario()
	{
		return $this->belongsTo(usuarios::class, 'id' );		
	}
}
