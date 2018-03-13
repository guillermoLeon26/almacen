<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColorProducto extends Model
{
  protected $table = 'colores_productos';
  public $timestamps = false;
  protected $fillable = ['color'];
}
