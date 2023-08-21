<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// DESARROLLO 
// Desarrolladora: Nancy Yesenia Ojeda Perez
// Desarrollo Direccion de Tecnologias
class Regalo extends Model
{
    use HasFactory;
    protected $table = "regalos";
    protected $primaryKey = 'id';
    protected $fillable = ["nombre_regalo","ganador","especial"];
      /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    // public $timestamps = false;

}
