<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class envios extends Model
{
    protected $table='envios';
    protected $primarykey='id';
    protected $fillable=['id_exp','id_envio','id_receptor','fecha'];
    public $timestamps=false;
}
