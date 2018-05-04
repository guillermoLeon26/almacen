<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config_Cont extends Model
{
  protected $table = 'config_cont';
  public $timestamps = false;
  protected $fillable = ['IVA'];
}
