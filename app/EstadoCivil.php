<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    protected $table = 'estado_civils';

    protected $fillable = [
    	'id',
    	'edo_civil'
    ];
}

