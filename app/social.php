<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class social extends Model
{
    protected $table = 'socials';

    protected $fillable =[
    	'nombre',
    	'link',
    	'icon_path'
    ];
}
