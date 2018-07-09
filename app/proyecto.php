<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proyecto extends Model
{
   protected $table="proyectos";
   protected $primaryKey="id";
   protected $fillable=['id_exp','id_proy','fecha_creacion','fecha_envio','fecha_update','texto','estatus','enable','numero'];
   public $timestamps=false;
}
