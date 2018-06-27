<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modulo extends Model
{
    protected $table='modulo';
   	protected $primarykey='idmodulo';
   	protected $fillable=['mdoulo','descripcion','fecha'];
   	public $timestamps=false;
}
