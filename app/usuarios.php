<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [
    	'nombre',
    	'cargo',
    	'descripcion'
    ];

 public function telefonos()
    {
        return $this->hasMany(telefonos::class,'id_entus', 'id');
    }

public function correo()
    {
        return $this->hasMany(correos::class,'id_entus', 'id');
    }

 public function fotos_usuario()
    {
        return $this->hasMany(fotos_usuarios::class,'id_usuario', 'id');
    }



}
