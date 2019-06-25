<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_productos extends Model
{
    protected $tabe = 'tipo_productos';

	protected $fillable = [
		'tipo_producto',
		'path_foto'
	];

public function producto()
	{
		return $this->belongsTo(productos::class, 'id_tipo', 'id');
	}

}
