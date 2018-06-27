<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
   protected $table="persona";
	protected $fillable=[
		'user_id','curp','telefono','celular','TipodePersona','razonsocial'
	];
}
