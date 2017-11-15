<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //apuntar una tabla
    protected $table = 'categoria';
    //especificar la llave primaria
    protected $primaryKey = "idcategoria";

    //deshabilitar marcado de registro
    public $timestamps = false;
    //defino los campos que contendran algun valor
    protected $fillable=[
    	'nombre',
    	'descripcion',
    	'condicion'
    ];
}
