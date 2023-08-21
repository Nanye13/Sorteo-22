<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// DESARROLLO 
// Desarrolladora: Nancy Yesenia Ojeda Perez
// Desarrollo Direccion de Tecnologias
class Empleado extends Model
{
    use HasFactory;
    protected $table = "empleados";
    // protected $primaryKey = 'numero_empleado';
    protected $primaryKey = 'id';
    protected $fillable = ["numero_empleado","nombre_empleado", "direccion", "puesto", "ganador","especial"];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    // public $timestamps = false;
}
