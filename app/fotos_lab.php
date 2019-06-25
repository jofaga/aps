<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fotos_lab extends Model
{
    protected $table = 'fotos_labs';

    protected $fillable = [
    	'path_foto'
    ];
}
