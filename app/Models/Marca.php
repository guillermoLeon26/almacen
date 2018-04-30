<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
  protected $table = 'marcas';
  public $timestamps = false;
  protected $fillable = ['marca'];

  public function scopeBuscar($query, $buscar){
    return $query->where('marca', 'like', '%'.$buscar.'%');
  }
}
