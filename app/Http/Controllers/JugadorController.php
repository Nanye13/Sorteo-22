<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Ganador;
use App\Models\Regalo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class JugadorController extends Controller
{
    public function inicio()
    {
        return view('newViews.index');
    }
    public function inicioEspecial()
    {


        $regalos_especiales = Regalo::where('ganador', 'N')->where('especial', 'S')->orderBy('id', 'ASC')->get();

        $cantidad_regalos = count($regalos_especiales);
        if ($cantidad_regalos > 0) {
            // Añadir el regalo en la vista
            $regalo = Regalo::where('ganador', 'N')->where('especial', 'S')->orderBy('id', 'ASC')->first();

            return view('newViews.inicioEspecial', compact('regalo'));
        } else {
            $ganadoresGeneral = Ganador::where('especial', 'S')->get();
            // return "SE ACABO LA RIFA";
            return view('newViews.ganadoresEspeciales', compact('ganadoresGeneral'));
        }
    }
    public function mitadEspecial()
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
            $emple = Empleado::find($emp->id);
            $emple->ganador = 'N';
            $emple->especial = 'N';
            $emple->save();
        }
        $ganador = Ganador::where('especial', 'S')->get();
        $eliminar = Ganador::destroy(($ganador));



        // -------Motrar inicio a  la mitad 
        $regalos_especiales = Regalo::where('ganador', 'N')->where('especial', 'S')->orderBy('id', 'ASC')->get();

        $cantidad_regalos = count($regalos_especiales);
        if ($cantidad_regalos > 0) {
            // Añadir el regalo en la vista
            $regalo = Regalo::where('ganador', 'N')->where('especial', 'S')->orderBy('id', 'ASC')->first();

            return view('newViews.iniciodobleEspecial', compact('regalo'));
        } else {
            $ganadoresGeneral = Ganador::where('especial', 'S')->get();
            // return "SE ACABO LA RIFA";
            return view('rifa.ganador-especial', compact('ganadoresGeneral'));
        }
    }
    // Funcion para obtener la rifa especial
    public function rifaespeciales()
    {
        //$regalos_especiales = Regalo::where('ganador', 'N')->where('especial', 'S')->get();
        // Consulta para obtner los regalos especiales
        // Primero debe ir el regalo 3 y al ultimo el regalo numero uno en ese orden para que salga 3,2,1
        $regalos_especiales = Regalo::where('ganador', 'N')->where('especial', 'S')->orderBy('id', 'ASC')->get();
        // return $regalos_especiales;
        $cantidad_regalos = count($regalos_especiales);
        if ($cantidad_regalos > 0) {
            $empleados = Empleado::where('ganador', 'N')->get();
            $cantidadJugadores = count(Empleado::where('ganador', 'N')->get());
            $cantidadRegalos = count(Regalo::where('ganador', 'N')->where('especial', 'S')->get());

            srand(time());
            $arregloRegalo = [];
            $numero_jugador = rand(0, $cantidadJugadores - 1);

            $numero_regalo = rand(0, $cantidadRegalos - 1);
            $numero_empleado = $empleados[$numero_jugador]->id;

            $empleado = Empleado::find($numero_empleado);
            $empleado->ganador = 'S';
            $empleado->especial = 'S';
            $empleado->save();
            // Regalo
            $numero_regalos =  $regalos_especiales[0]->id; //$regalos_especiales[$numero_regalo]->id;

            $regalo = Regalo::find($numero_regalos);
            $regalo->ganador = "S";
            $regalo->save();
            $ganador = Ganador::create([
                "numero_empleado" => $empleado->numero_empleado,
                "nombre_empleado" => $empleado->nombre_empleado,
                "nombre_regalo" => $regalo->nombre_regalo,
                "direccion" => $empleado->direccion,
                // "puesto" => $empleado->puesto,
                // "ronda" => 1,
                "especial" => $regalo->especial == 'S' ? 'S' : 'N'
            ]);

            $arregloGanadores = Ganador::where('especial', 'S')->get();
            return view('newViews.ganadorEspecial', compact('cantidad_regalos', 'empleado', 'regalo', 'arregloGanadores', 'numero_jugador'));
        } else {
            // return "SE ACABO LA RIFA ESPECIAL";
            // EmpleadoController::ganadoresEspecial();
            $ganadoresGeneral = Ganador::where('especial', 'S')->get();
            // return "SE ACABO LA RIFA";
            return view('newViews.ganadoresEspeciales', compact('ganadoresGeneral'));
        }
    }

    public function resetEspecial()
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
            $emple = Empleado::find($emp->id);
            $emple->ganador = 'N';
            $emple->especial = 'N';
            $emple->save();
        }
        $ganador = Ganador::where('especial', 'S')->get();
        $eliminar = Ganador::destroy(($ganador));

        $regalo = Regalo::where('ganador', 'N')->where('especial', 'S')->orderBy('id', 'ASC')->first();

        return view('newViews.inicioEspecial', compact('regalo'));
    }
    public function resetGeneral()
    {
        // Metodo para borrar los ganadores especiales y generales cuando regresan al inicio de la rifa
        $regalo = Regalo::where('ganador', 'S')->where('especial', 'N')->get();
        foreach ($regalo as $re) {
            // $id = $regalo->find($re->id);
            $reg = Regalo::find($re->id);
            $reg->ganador = 'N';
            $reg->save();
        }
        $empleado = Empleado::where('ganador', 'S')->where('especial', 'N')->get();

        foreach ($empleado as $emp) {
            $emple = Empleado::find($emp->id);
            $emple->ganador = 'N';
            $emple->especial = 'N';
            $emple->save();
        }


        $ganador = Ganador::where('especial', 'N')->get();
        $eliminar = Ganador::destroy(($ganador));

        $arregloGanadores = Ganador::where('especial', 'N')->get();
        return view('newViews.inicioGeneral', compact('arregloGanadores'));
    }

    // RIFA GENERAL 
    // funcion para mostrar la vista de empezar la rifa general
    public function iniciogeneral()
    {
        // Metodo para borrar los ganadores especiales y generales cuando regresan al inicio de la rifa
        // $regalo = Regalo::where('ganador', 'S')->where('especial', 'N')->get();
        // foreach ($regalo as $re) {
        //     // $id = $regalo->find($re->id);
        //     $reg = Regalo::find($re->id);
        //     $reg->ganador = 'N';
        //     $reg->save();
        // }
        // $empleado = Empleado::where('ganador', 'S')->where('especial', 'N')->get();

        // foreach ($empleado as $emp) {
        //     $emple = Empleado::find($emp->id);
        //     $emple->ganador = 'N';
        //     $emple->especial = '';
        //     $emple->save();
        // }


        // $ganador = Ganador::where('especial', 'N')->get();
        // $eliminar = Ganador::destroy(($ganador));

        $arregloGanadores = Ganador::where('especial', 'N')->get();
        return view('newViews.inicioGeneral', compact('arregloGanadores'));
    }
    public function rifageneral()
    {

        // Generacion de arreglo de numeros aleatorios para empleados
        $rand = range(1, 1491);
        shuffle($rand);
        $arreglo = array();
        foreach ($rand as $val) {
            array_push($arreglo, $val);
        }
        //    Generacion de atteglo de numeros aletarios para regalos
        $num = range(1, 443);
        shuffle($num);
        $arregloregalo = array();
        foreach ($num as $valor) {
            array_push($arregloregalo, $valor);
        }

        $ganadores = array();

        for ($i = 0; $i <= 442; $i++) {

            // Empleado
            $empleado = Empleado::find($arreglo[$i]);
            // Regalo
            $regalo = Regalo::find($arregloregalo[$i]);
           
            array_push($ganadores, ["empleado" => $empleado, "regalo" => $regalo]);
        }

        // return $ganadores;
        file_put_contents('archivo/listaGanadores.json', json_encode($ganadores));
  
        return view('rifa.ganadores', compact('ganadores'));
    }

    public static function guardarbase()
    {
        $data = file_get_contents("archivo/listaGanadores.json");
        $ganadores = json_decode($data, true);


        foreach ($ganadores as $ganador) {
            // return $ganador['empleado']['numero_empleado'];

            Ganador::create([
                "numero_empleado" => $ganador['empleado']['numero_empleado'],
                "nombre_empleado" => $ganador['empleado']['nombre_empleado'],
                "nombre_regalo" => $ganador['regalo']['nombre_regalo'],
                "direccion" =>$ganador['empleado']['direccion'],
                "especial" =>  'N'
            ]);
        }

        // instrucccion para el pdf
         //Recuperar todos los productos de la db

       $direcciones = Ganador::orderBy('direccion')->select('direccion')->where('especial', 'N')->distinct()->get();
       $direccionesEspeciales = Ganador::orderBy('direccion')->select('direccion')->where('especial', 'S')->distinct()->get();

       $ganadoresD = [];
       foreach ($direcciones as $direccion) {
           $dir = Ganador::orderBy('nombre_empleado')->where('direccion', $direccion->direccion)->where('especial', 'N')->get();
           array_push($ganadoresD, $dir);
       }
       $cantidadGanador = Ganador::where('especial', 'N')->get();
       $cantidad_regalos = count($cantidadGanador);

       $ganadoresEspeciales = [];
       foreach ($direccionesEspeciales as $direc) {
           $dire = Ganador::orderBy('nombre_empleado')->where('direccion', $direc->direccion)->where('especial', 'S')->get();
           array_push($ganadoresEspeciales, $dire);
       }

       $pdf = PDF::loadView('pdf/todosganadores', ['direcciones' => $ganadoresD, 'especiales' => $ganadoresEspeciales, 'regalos' => $cantidad_regalos])->setPaper('carta', 'landscape');
       // return $pdf->stream();
       return $pdf->download('Ganadores2023.pdf');

    }

   // PDF GENERALES 
   public static function createPDFGenerales()
   {
       //Recuperar todos los productos de la db

       $direcciones = Ganador::orderBy('direccion')->select('direccion')->where('especial', 'N')->distinct()->get();
       $direccionesEspeciales = Ganador::orderBy('direccion')->select('direccion')->where('especial', 'S')->distinct()->get();

       $ganadoresD = [];
       foreach ($direcciones as $direccion) {
           $dir = Ganador::orderBy('nombre_empleado')->where('direccion', $direccion->direccion)->where('especial', 'N')->get();
           array_push($ganadoresD, $dir);
       }
       $cantidadGanador = Ganador::where('especial', 'N')->get();
       $cantidad_regalos = count($cantidadGanador);

       $ganadoresEspeciales = [];
       foreach ($direccionesEspeciales as $direc) {
           $dire = Ganador::orderBy('nombre_empleado')->where('direccion', $direc->direccion)->where('especial', 'S')->get();
           array_push($ganadoresEspeciales, $dire);
       }

       $pdf = PDF::loadView('pdf/todosganadores', ['direcciones' => $ganadoresD, 'especiales' => $ganadoresEspeciales, 'regalos' => $cantidad_regalos])->setPaper('carta', 'landscape');
       // return $pdf->stream();
       return $pdf->download('Ganadores2023.pdf');
   }









    // Funcion para mostrar los ganadores especiales en la vista
    public static function ganadoresEspecial()
    {
        $ganadoresGeneral = Ganador::where('especial', 'S')->orderBy('id', 'DESC')->get();
        // return "SE ACABO LA RIFA";
        return view('newViews.ganadoresEspeciales', compact('ganadoresGeneral'));
    }



    // Funcion para la vista doble 
    // Funcion para obtener la rifa especial
    public function rifaespecialesmitad()
    {
        //$regalos_especiales = Regalo::where('ganador', 'N')->where('especial', 'S')->get();
        // Consulta para obtner los regalos especiales
        // Primero debe ir el regalo 3 y al ultimo el regalo numero uno en ese orden para que salga 3,2,1
        $regalos_especiales = Regalo::where('ganador', 'N')->where('especial', 'S')->orderBy('id', 'ASC')->get();
        // return $regalos_especiales;
        $cantidad_regalos = count($regalos_especiales);
        if ($cantidad_regalos > 0) {
            $empleados = Empleado::where('ganador', 'N')->get();
            $cantidadJugadores = count(Empleado::where('ganador', 'N')->get());
            $cantidadRegalos = count(Regalo::where('ganador', 'N')->where('especial', 'S')->get());

            srand(time());
            $arregloRegalo = [];
            $numero_jugador = rand(0, $cantidadJugadores - 1);

            $numero_regalo = rand(0, $cantidadRegalos - 1);
            $numero_empleado = $empleados[$numero_jugador]->id;

            $empleado = Empleado::find($numero_empleado);
            $empleado->ganador = 'S';
            $empleado->especial = 'S';
            $empleado->save();
            // Regalo
            $numero_regalos =  $regalos_especiales[0]->id; //$regalos_especiales[$numero_regalo]->id;

            $regalo = Regalo::find($numero_regalos);
            $regalo->ganador = "S";
            $regalo->save();
            $ganador = Ganador::create([
                "numero_empleado" => $empleado->numero_empleado,
                "nombre_empleado" => $empleado->nombre_empleado,
                "nombre_regalo" => $regalo->nombre_regalo,
                "direccion" => $empleado->direccion,
                // "puesto" => $empleado->puesto,
                // "ronda" => 1,
                "especial" => $regalo->especial == 'S' ? 'S' : 'N'
            ]);

            $arregloGanadores = Ganador::where('especial', 'S')->get();
            return view('newViews.mitaEspecial', compact('cantidad_regalos', 'empleado', 'regalo', 'arregloGanadores', 'numero_jugador'));
        } else {
            // return "SE ACABO LA RIFA ESPECIAL";
            // EmpleadoController::ganadoresEspecial();
            $ganadoresGeneral = Ganador::where('especial', 'S')->get();
            // return "SE ACABO LA RIFA";
            return view('rifa.ganador-especial', compact('ganadoresGeneral'));
        }
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
            $regalosid = Regalo::where('ganador', 'N')->where('especial', 'N')->get();
            srand(time());
            $arregloRegalo = [];

            $numero_jugador = rand(0, $cantidadJugadores - 1);
            $numero_regalo = rand(0, $cantidadRegalos - 1);


            $numero_empleado = $empleados[$numero_jugador]->id;
            $empleado = Empleado::find($numero_empleado);
            $empleado->ganador = 'S';
            $empleado->especial = 'N';
            $empleado->save();
            // Regalo
            $numero_regalos = $regalosid[$numero_regalo]->id;
            $regalo = Regalo::find($numero_regalos);
            $regalo->ganador = "S";
            $regalo->save();

            $ganador = Ganador::create([
                "numero_empleado" => $empleado->numero_empleado,
                "nombre_empleado" => $empleado->nombre_empleado,
                "nombre_regalo" => $regalo->nombre_regalo,
                "direccion" => $empleado->direccion,
                // "puesto" => $empleado->puesto,
                // "ronda" => 1,
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

    // FUNCION ORIGINAL
    // public function rifageneral()
    // {
    //     // Consulta de regalos disponibles
    //     $regalos = Regalo::where('ganador', 'N')->where('especial', 'N')->get();
    //     // Cantidad de regalos
    //     $cant = count($regalos);
    //     // $contador = 0;
    //     for ($i = 0; $i < $cant; $i++) {

    //         // $empleados = Empleado::get();
    //         $empleados = Empleado::where('ganador', 'N')->get();
    //         $cantidadJugadores = count(Empleado::where('ganador', 'N')->get());
    //         $cantidadRegalos = count(Regalo::where('ganador', 'N')->where('especial', 'N')->get());
    //         $regalosid = Regalo::where('ganador', 'N')->where('especial', 'N')->get();
    //         // Gneneracion de numeros random
    //         srand(time());
    //         // $arregloRegalo = [];
    //         $numero_jugador = rand(0, $cantidadJugadores - 1);
    //         $numero_regalo = rand(0, $cantidadRegalos - 1);

    //         // EMPLEADO
    //         $numero_empleado = $empleados[$numero_jugador]->id;
    //         $empleado = Empleado::find($numero_empleado);
    //         $empleado->ganador = "S";
    //         $empleado->especial = 'N';
    //         $empleado->save();
    //         // Regalo
    //         $numero_regalos = $regalosid[$numero_regalo]->id;
    //         $regalo = Regalo::find($numero_regalos);
    //         $regalo->ganador = "S";
    //         $regalo->save();
    //         date_default_timezone_set('America/Mexico_City');
    //         // GANADOR
    //         $ganador = Ganador::create([
    //             "numero_empleado" => $empleado->numero_empleado,
    //             "nombre_empleado" => $empleado->nombre_empleado,
    //             "nombre_regalo" => $regalo->nombre_regalo,
    //             "direccion" => $empleado->direccion,
    //             // "puesto" => $empleado->puesto,
    //             // "fecha_hora" => date('y-m-d H:i:s'),
    //             "especial" => $regalo->especial == 'S' ? 'S' : 'N'
    //         ]);
    //         $arregloGanadores = Ganador::where('especial', 'N')->orderBy('created_at', 'DESC')->get();
    //         $cantGanadores = count($arregloGanadores);
    //     }
    //     $ganadoresGeneral = Ganador::where('especial', 'N')->get();
    //     return view('rifa.ganador-general', compact('ganadoresGeneral'));
    // }
}
