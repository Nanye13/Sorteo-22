<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ganador extends Model
{
    use HasFactory;
    protected $table = "GANADOR";
    protected $primaryKey = 'id';
    protected $fillable = ["numero_empleado","nombre_empleado","nombre_regalo","direccion","puesto","ronda","fecha_hora","especial"];
      /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
