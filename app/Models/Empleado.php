<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = "EMPLEADO";
    protected $primaryKey = 'numero_empleado';
    protected $fillable = ["nombre_empleado", "direccion", "puesto", "random", "ganador", "ronda"];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
