<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rolinv extends Model
{
    protected $table="rolinvolucrado";
    protected $primarykey="id";
    protected $fillable=['tipo'];
}
