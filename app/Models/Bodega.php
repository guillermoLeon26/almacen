<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
  protected $table = 'bodegas';
  public $timestamps = false;
  protected $fillable = ['nombre', 'direccion'];
}
