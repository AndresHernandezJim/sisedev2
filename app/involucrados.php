<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class involucrados extends Model
{
   protected $table="involucrados";
   protected $primaryKey="id";
   protected $fillable=['user_id','id_exp','rol','status','fecha'];
   public $timestamps=false;
}
