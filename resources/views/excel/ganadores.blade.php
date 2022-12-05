<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
{{-- <h1>Lista de ganadores RIFA 2022</h1> --}}
<body>
    <table class="table">
    <thead >
    <tr>
        <th colspan="2"  style="background-color: gray; font-weight: bold">Numero de empleado</th>
        <th colspan="4"  style="background-color: gray; font-weight: bold">Nombre</th>
        <th colspan="5"  style="background-color: gray; font-weight: bold">Dirección</th>
        <th colspan="7"  style="background-color: gray; font-weight: bold">Descripción del regalo</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($ganadores as $direccion)
       
        @foreach ($direccion as $ganador)
            <tr>
                <td colspan="2">{{ $ganador->numero_empleado }}</td>
                <td colspan="4">{{ $ganador->nombre_empleado }}</td>
                <td colspan="5">{{ $ganador->direccion }}</td>
                <td colspan="7">{{ $ganador->nombre_regalo }}</td> 
            </tr>
        @endforeach
        <tr>
            <td colspan="18" style="text-align: center">Total {{ $direccion[0]->direccion }} : <strong>{{ count($direccion) }}</strong></td>

        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>