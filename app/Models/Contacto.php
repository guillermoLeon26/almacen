<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
  protected $table = 'contactos';
  public $timestamps = false;
  protected $fillable = ['nombre', 'telefono', 'celular', 'correo', 'cargo'];
}
