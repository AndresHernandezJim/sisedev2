<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class anexo extends Model
{
    protected $table='anexopdf';
    protected $primarykey='id';
    protected $fillable=['Folio','id_tipo','id_Expediente','FechaUp','PathAnexo','NomFile','Status'];
    public $timestamps=false;
}
