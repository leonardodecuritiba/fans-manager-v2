<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusCoupon extends Model
{
    public $timestamps = true;     protected $fillable = [         'idcontato',         'idcliente_centro_custo',         'idpjuridica'];
}
