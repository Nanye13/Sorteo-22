<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// DESARROLLO 
// Desarrolladora: Nancy Yesenia Ojeda Perez
// Desarrollo Direccion de Tecnologias
class Ganador extends Model
{
    use HasFactory;
    protected $table = "ganadores";
    protected $primaryKey = 'id';
    protected $fillable = ["numero_empleado","nombre_empleado","nombre_regalo","direccion","puesto","especial"];
      /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    // public $timestamps = false;
}
