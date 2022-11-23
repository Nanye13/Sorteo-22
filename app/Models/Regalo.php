<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regalo extends Model
{
    use HasFactory;
    protected $table = "REGALO";
    protected $primaryKey = 'id';
    protected $fillable = ["nombre_regalo","ganador","random","especial"];
      /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

}
