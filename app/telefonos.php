<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class telefonos extends Model
{
    protected $tabe = 'telefonos';

	protected $fillable = [
		'telefono',
		'id_entus',
		'ext'
	];


	 public function usuario()
	{
		return $this->belongsTo(usuarios::class, 'id' );		
	}

	public function edificio()
	{
		return $this->belongsTo(edificios::class, 'id' );		
	}
}
