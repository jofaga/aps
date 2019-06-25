<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fotos_usuarios extends Model
{
    protected $tabe = 'fotos_usuarios';

	protected $fillable = [
		'id_usuario',
		'path_foto',
		'thumb'
	];

	 public function usuario()
	{
		return $this->belongsTo(usuarios::class, 'id' );		
	}
}
