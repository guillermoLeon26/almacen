<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DescripcionProducto extends Model
{
  protected $table = 'productos_descripcion';
  public $timestamps = false;
  protected $fillable = ['n_orden', 'dimension'];
}
