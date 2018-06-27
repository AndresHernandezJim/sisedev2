<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class expediente extends Model
{
    protected $table='expediente';
    protected $primarykey='id';
    protected $fillable=['id_usuario','id_demandante','id_demandado','expediente','descripcion','status','serie','fecha','idtipo'];
    public $timestamps=false;
}
