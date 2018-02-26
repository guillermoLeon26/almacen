<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
	protected $table = 'unidades';
  public $timestamps = false;
	protected $fillable = ['unidad','simbolo'];

  public function scopeBuscar($query, $buscar){
  	return $query->where('unidad', 'like', '%'.$buscar.'%')
  				 		   ->orWhere('simbolo', 'like', '%'.$buscar.'%');
  }
}
