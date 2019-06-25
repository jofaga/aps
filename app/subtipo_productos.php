<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subtipo_productos extends Model
{
    protected $tabe = 'sub_tipo_productos';

	protected $fillable = [
		'subtipo'
	];

public function producto()
	{
		return $this->belongsTo(productos::class, 'id_subtipo_producto', 'id');
	}

}
