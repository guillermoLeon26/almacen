<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
  protected $table = 'colores';
  public $timestamps = false;
  protected $fillable = ['color'];

  public function scopeBuscar($query, $buscar){
    return $query->where('color', 'like', '%'.$buscar.'%');
  }
}
