<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notificaciones extends Model
{
    protected $table='notificaciones';
   	protected $primarykey='id';
   	protected $fillable=['id_actuario','id_usuario','rol','id_exp','id_anexo','fecha_creacion','fecha_solicitud','fecha_limite','autorizacion'];
   	public $timestamps=false;
}
