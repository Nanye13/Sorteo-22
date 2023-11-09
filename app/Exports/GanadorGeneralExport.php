<?php

namespace App\Exports;

use App\Models\Ganador;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class GanadorGeneralExport implements FromView
{
    public function view(): View
    {
        // Consulta a la base de datos para traer los ganadores por direccion
        $direcciones = Ganador::orderBy('direccion')->select('direccion')->distinct()->get();
        $ganadoresD = [];
        foreach ($direcciones as $direccion) {
            $dir = Ganador::orderBy('nombre_empleado')->where('direccion', $direccion->direccion)->get();
            array_push($ganadoresD, $dir);
        }
        return view('excel.ganadores', [
            'ganadores' => $ganadoresD
        ]);
    }
}
