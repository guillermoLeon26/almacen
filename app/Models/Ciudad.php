<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
  protected $table = 'ciudades';
  public $timestamps = false;
  protected $fillable = ['ciudad'];

  public function scopeBuscar($query, $buscar){
    return $query->where('ciudad', 'like', '%'.$buscar.'%');
  }
}
