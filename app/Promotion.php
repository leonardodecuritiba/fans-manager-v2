<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    public $timestamps = true;     protected $fillable = [         'idcontato',         'idcliente_centro_custo',         'idpjuridica'];
}
