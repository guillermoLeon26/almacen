<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductosProveedor extends Model
{
  protected $table = 'productos_proveedor';
  public $timestamps = false;
  protected $fillable = ['marca', 'descripcion'];
}
