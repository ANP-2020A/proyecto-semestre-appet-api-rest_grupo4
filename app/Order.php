<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['fecha_pedido','fecha_atencion','descripcion','novedades'];
}
