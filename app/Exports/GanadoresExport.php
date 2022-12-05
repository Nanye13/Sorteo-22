<?php

namespace App\Exports;

use App\Models\Ganador;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class GanadoresExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ganador::orderBy('direccion')->orderBy('nombre_empleado')->select('numero_empleado','nombre_empleado','nombre_regalo','direccion')->get();
    }
    public function headings(): array
    {
        return [
            'Numero de empleado',
            'Nombre de empleado ',
            'Regalo',
            'Dirección'
        ];
    }
}
