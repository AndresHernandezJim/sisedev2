<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
   	protected $table='chat';
    protected $primarykey='id';
    protected $fillable=['id_origen','id_receptor','id_exp','mensaje','fecha_creacion','fecha_actualizacion','estado','serie','id_proyecto'];
    public $timestamps=false;
}
