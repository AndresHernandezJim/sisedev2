<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tiposeguimiento extends Model
{
   protected $table="tiposeguimiento";
   protected $primarykey="id";
   protected $fillable=[ 'Tipo'];
   
}
