<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mensajes extends Model
{
   protected $table="mensajes";
   protected $primaryKey="id";
   protected $fillable=['usuario_origen','usuario_destino','mensaje','estatus','created_at','updated_at'];
   public $timestamps=false;
}
