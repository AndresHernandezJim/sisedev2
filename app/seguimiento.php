<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class seguimiento extends Model
{
    protected $table="seguimiento";
    protected $primaryKey="id";
    protected $fillable=['fecha','id_modulo','id_persona','movimiento','id_exp','id_anexo','id_Tseguimiento','comentarios'];
    public $timestamps=false;
}
