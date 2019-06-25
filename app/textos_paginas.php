<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class textos_paginas extends Model
{
    protected $tabe = 'textos_paginas';

	protected $fillable = [
		'slogan',
		'textolaboratorio'
	];
}
