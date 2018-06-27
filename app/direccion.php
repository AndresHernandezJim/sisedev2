<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class direccion extends Model
{
    protected $table="domicilio";
    protected $primaryKey="id";
    protected $fillable=['user_id','calle','ninter','next','colonia','localidad','municipio','estado','cp','referencia','oir'];
}
