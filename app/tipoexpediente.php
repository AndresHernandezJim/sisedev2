<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipoexpediente extends Model
{
   protected $table='tipoexpediente';
    protected $primarykey='id';
    protected $fillable=['tipo'];
    public $timestamps=false;
}
