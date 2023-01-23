<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_venta extends Model
{
    use HasFactory;
    protected $table = 'detalle_ventas';
    protected $fillable = [
        'idventa',
        'idproducto',
        'cantidad',
        'precio',
        'descuento'
    ];

    public $timestamps = false;
}
