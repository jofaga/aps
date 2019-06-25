<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    protected $table = "clientes";

    protected $fillable =
    [
    	'nombre_cliente',
    	'logo'

    ];


    public function proyecto()
	{
		return $this->belongsTo(proyectos::class, 'id_cliente', 'id');
	}
}
