<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fotos_productos extends Model
{
	protected $tabe = 'fotos_productos';

	protected $fillable = [
		'id_producto',
		'path_foto',
		'thumb'
	];

	public function producto()
	{
		return $this->belongsTo(productos::class, 'id' );		
	}
}
