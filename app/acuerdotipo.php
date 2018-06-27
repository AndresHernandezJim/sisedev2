<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class acuerdotipo extends Model
{
   protected $table='acuerdotipo';
   protected $primarykey='id';
   protected $fillable=['Tipo','Descripcion','nivel','estatus'];
   public $timestamps=false;
}
