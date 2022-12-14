<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Ganador;
use App\Models\Regalo;
use Illuminate\Http\Request;
use PDF;
use App\Exports\GanadoresExport;
use App\Exports\GanadorGeneralExport;
use Maatwebsite\Excel\Facades\Excel;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regalos = Regalo::where('ganador', 'N')->where('especial', 'N')->get();
        // var_dump(count($regalos));
        $cant = count($regalos);
        // $contador = 0;
        if (count($regalos) > 0) {
            // $empleados = Empleado::get();
            $empleados = Empleado::where('ganador', 'N')->get();
            $cantidadJugadores = count(Empleado::where('ganador', 'N')->get());
            $cantidadRegalos = count(Regalo::where('ganador', 'N')->where('especial', 'N')->get());
            srand(time());
            $arregloRegalo = [];
            $numero_jugador = rand(0, $cantidadJugadores - 1);
            $numero_regalo = rand(0, $cantidadRegalos - 1);
            // EMPLEADO
            $numero_empleado = $empleados[$numero_jugador]->numero_empleado;
            $empleado = Empleado::find($numero_empleado);
            $empleado->ganador = "S";
            $empleado->especial = 'N';
            $empleado->save();
            // Regalo
            $numero_regalos = $regalos[$numero_regalo]->id;
            $regalo = Regalo::find($numero_regalos);
            $regalo->ganador = "S";
            $regalo->save();
            date_default_timezone_set('America/Mexico_City');
            // GANADOR
            $ganador = Ganador::create([
                "numero_empleado" => $empleado->numero_empleado,
                "nombre_empleado" => $empleado->nombre_empleado,
                "nombre_regalo" => $regalo->nombre_regalo,
                "direccion" => $empleado->direccion,
                "puesto" => $empleado->puesto,
                "fecha_hora" => date('y-m-d H:i:s'),
                "ronda" => 1,
                "especial" => $regalo->especial == 'S' ? 'S' : 'N'
            ]);
            $arregloGanadores = Ganador::where('especial', 'N')->orderBy('fecha_hora', 'DESC')->get();
            $cantGanadores = count($arregloGanadores);
            // $contador = $contador + 1;
            return view('rifa.rifa-general', compact('empleado', 'regalo', 'arregloGanadores', 'cant', 'numero_regalos', 'numero_regalo', 'cantidadRegalos','cantGanadores'));
        } else {
            $ganadoresGeneral = Ganador::where('especial', 'N')->get();
            return view('rifa.ganador-general', compact('ganadoresGeneral'));
            // EmpleadoController::ganadoresGeneral();
        }
    }
    public function inicio()
    {
        $arregloGanadores = Ganador::where('especial', 'N')->get();
        return view('rifa.inicio-general', compact('arregloGanadores'));
    }
    public static function ganadoresGeneral()
    {
        $ganadoresGeneral = Ganador::where('especial', 'N')->get();
        // return "SE ACABO LA RIFA";
        return view('rifa.ganador-general', compact('ganadoresGeneral'));
    }
    public function vaciaGeneral()
    {

        $regalo = Regalo::where('ganador', 'S')->where('especial', 'N')->get();
        foreach ($regalo as $re) {
            // $id = $regalo->find($re->id);
            $reg = Regalo::find($re->id);
            $reg->ganador = 'N';
            $reg->save();
        }
        $empleado = Empleado::where('ganador', 'S')->where('especial', 'N')->get();

        foreach ($empleado as $emp) {
            $emple = Empleado::find($emp->numero_empleado);
            $emple->ganador = 'N';
            $emple->especial = '';
            $emple->save();
        }


        $ganador = Ganador::where('especial', 'N')->get();
        $eliminar = Ganador::destroy(($ganador));
        return view('rifa.index');
    }
    public function especiales()
    {
        $regalos_especiales = Regalo::where('ganador', 'N')->where('especial', 'S')->get();
        $cantidad_regalos = count($regalos_especiales);
        if (count($regalos_especiales) > 0) {
            $empleados = Empleado::where('ganador', 'N')->get();
            $cantidadJugadores = count(Empleado::where('ganador', 'N')->get());
            $cantidadRegalos = count(Regalo::where('ganador', 'N')->where('especial', 'S')->get());
            srand(time());
            $arregloRegalo = [];
            $numero_jugador = rand(0, $cantidadJugadores - 1);
            $numero_regalo = rand(0, $cantidadRegalos - 1);
            $numero_empleado = $empleados[$numero_jugador]->numero_empleado;
            $empleado = Empleado::find($numero_empleado);
            $empleado->ganador = "S";
            $empleado->especial = "S";
            $empleado->save();
            // Regalo
            $numero_regalos = $regalos_especiales[$numero_regalo]->id;
            $regalo = Regalo::find($numero_regalos);
            $regalo->ganador = "S";
            $regalo->save();
            $ganador = Ganador::create([
                "numero_empleado" => $empleado->numero_empleado,
                "nombre_empleado" => $empleado->nombre_empleado,
                "nombre_regalo" => $regalo->nombre_regalo,
                "direccion" => $empleado->direccion,
                "puesto" => $empleado->puesto,
                "ronda" => 1,
                "especial" => $regalo->especial == 'S' ? 'S' : 'N'
            ]);

            $arregloGanadores = Ganador::where('especial', 'S')->get();
            return view('rifa.rifa-especial', compact('cantidad_regalos', 'empleado', 'regalo', 'arregloGanadores', 'numero_jugador'));
        } else {
            // return "SE ACABO LA RIFA ESPECIAL";
            EmpleadoController::ganadoresEspecial();
        }
    }
    public static function ganadoresEspecial()
    {
        $ganadoresGeneral = Ganador::where('especial', 'S')->get();
        // return "SE ACABO LA RIFA";
        return view('rifa.ganador-especial', compact('ganadoresGeneral'));
    }
    public function vaciaEspecial()
    {

        $regalo = Regalo::where('ganador', 'S')->where('especial', 'S')->get();
        foreach ($regalo as $re) {
            // $id = $regalo->find($re->id);
            $reg = Regalo::find($re->id);
            $reg->ganador = 'N';
            $reg->save();
        }
        $empleado = Empleado::where('ganador', 'S')->where('especial', 'S')->get();

        foreach ($empleado as $emp) {
            $emple = Empleado::find($emp->numero_empleado);
            $emple->ganador = 'N';
            $emple->especial = '';
            $emple->save();
        }


        $ganador = Ganador::where('especial', 'S')->get();
        $eliminar = Ganador::destroy(($ganador));
        return view('rifa.especial-vacia');
    }
    public function generarTodos()
    {
        $contador = 0;
        $regalos = Regalo::where('ganador', 'N')->where('especial', 'N')->get();
        // var_dump(count($regalos));
        $cant = count($regalos);
        // $contador = 0;
        // if (count($regalos) > 0) {
        while ($contador < count($regalos)) {
            // $empleados = Empleado::get();
            $empleados = Empleado::where('ganador', 'N')->get();
            $cantidadJugadores = count(Empleado::where('ganador', 'N')->get());
            $cantidadRegalos = count(Regalo::where('ganador', 'N')->where('especial', 'N')->get());
            srand(time());
            $arregloRegalo = [];
           
            $numero_jugador = rand(0, $cantidadJugadores - 1);
            $numero_regalo = rand(0, $cantidadRegalos - 1);
            

            $numero_empleado = $empleados[$numero_jugador]->numero_empleado;
            $empleado = Empleado::find($numero_empleado);
            $empleado->ganador = "S";
            $empleado->especial = 'N';
            $empleado->save();
            // Regalo
            $numero_regalos = $regalos[$numero_regalo]->id;
            $regalo = Regalo::find($numero_regalos);
            $regalo->ganador = "S";
            $regalo->save();

            $ganador = Ganador::create([
                "numero_empleado" => $empleado->numero_empleado,
                "nombre_empleado" => $empleado->nombre_empleado,
                "nombre_regalo" => $regalo->nombre_regalo,
                "direccion" => $empleado->direccion,
                "puesto" => $empleado->puesto,
                "ronda" => 1,
                "especial" => $regalo->especial == 'S' ? 'S' : 'N'
            ]);

            $contador = $contador + 1;
            //return view('rifa.rifa-general', compact('empleado', 'regalo', 'arregloGanadores', 'cant', 'numero_regalos', 'numero_regalo', 'cantidadRegalos'));

        }
        $arregloGanadores = Ganador::get();
        // $this->ganadoresGeneral();
        // EmpleadoController::ganadoresGeneral();
        $ganadoresGeneral = Ganador::where('especial', 'N')->get();
        // return "SE ACABO LA RIFA";
        return view('rifa.ganador-general', compact('ganadoresGeneral'));
    }
    // PDF GENERALES 
    public function createPDFGenerales()
    {
        //Recuperar todos los productos de la db

        $direcciones = Ganador::orderBy('direccion')->select('direccion')->where('especial', 'N')->distinct()->get();
        $direccionesEspeciales = Ganador::orderBy('direccion')->select('direccion')->where('especial', 'S')->distinct()->get();

        $ganadoresD = [];
        foreach ($direcciones as $direccion) {
            $dir = Ganador::orderBy('nombre_empleado')->where('direccion', $direccion->direccion)->where('especial','N')->get();
            array_push($ganadoresD, $dir);
        }
        $cantidadGanador = Ganador::where('especial', 'N')->get();
        $cantidad_regalos = count($cantidadGanador);
        
        $ganadoresEspeciales = [];
        foreach ($direccionesEspeciales as $direc) {
            $dire = Ganador::orderBy('nombre_empleado')->where('direccion', $direc->direccion)->where('especial','S')->get();
            array_push($ganadoresEspeciales, $dire);
        }

        $pdf = PDF::loadView('pdf/todosganadores', ['direcciones' => $ganadoresD,'especiales'=>$ganadoresEspeciales,'regalos'=>$cantidad_regalos])->setPaper('carta', 'landscape');
        return $pdf->stream();
        

    }
    public function pdfEspecial(){
        $direccionesEspeciales = Ganador::orderBy('direccion')->select('direccion')->where('especial', 'S')->distinct()->get();
        $ganadoresEspeciales = [];
        foreach ($direccionesEspeciales as $direc) {
            $dire = Ganador::orderBy('nombre_empleado')->where('direccion', $direc->direccion)->where('especial','S')->get();
            array_push($ganadoresEspeciales, $dire);
        }
        $pdf = PDF::loadView('pdf/ganadoresEspecial', ['especiales'=>$ganadoresEspeciales])->setPaper('carta', 'landscape');
        return $pdf->stream();
        
    }
    // excel
    public function exportExcel(){
        // return Excel::download(new GanadoresExport, 'ganadores.xlsx');
        return Excel::download(new GanadorGeneralExport, 'ganadores.xlsx');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
