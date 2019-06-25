<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class edificios extends Model
{
    protected $table = 'edificios';

    protected $fillable =[
    	'nombre',
    	'calle',
    	'colonia',
    	'cp',
    	'ciudad',
    	'estado',
    	'pais',
    	'horario',
        'contacto'
    ];


    public function telefonos_edificios()
    {
        return $this->hasMany(telefonos_edificios::class,'id_edificio', 'id');
    }

    public function pais()
    {
        return $this->hasOne(paises::class, 'id', 'pais');
    }

     public function estado()
    {
        return $this->hasOne(estados::class, 'id', 'estado');
    }

}
