<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponValue extends Model
{
    public $timestamps = true;     protected $fillable = [         'idcontato',         'idcliente_centro_custo',         'idpjuridica'];
}
