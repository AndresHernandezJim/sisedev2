<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class institucion extends Model
{
    protected $table="institucion";
    protected $primaryKey="user_id";
    protected $fillable=['user_id','razon_social','telefono','celular','usuario'];
}
