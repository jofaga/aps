<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class telefonos_edificios extends Model
{
    protected $table = 'telefonos_edificios';
    protected $fillable = [
    	'telefono',
    	'id_edificio'

    ];

	public function edificio()
	{
		return $this->belongsTo(edificios::class, 'id');
	}
}
