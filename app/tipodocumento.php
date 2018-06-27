<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipodocumento extends Model
{
    protected $table="tipo_documento";
    protected $primaryKey="id";
    protected $fillable=['tipo','rol_usuario'];
}
