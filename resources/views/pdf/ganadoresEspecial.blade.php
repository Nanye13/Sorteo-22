<!DOCTYPE html>
<html lang="en">
<!-- // DESARROLLO 
// Desarrolladora: Nancy Yesenia Ojeda Perez
// Desarrollo Direccion de Tecnologias -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Ganadores 2022</title>
    <style>
        #tabla {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 80%;
            border-collapse: collapse;
            width: 100%;
        }


        #th1 {
            border: 1px solid black;
            /* background: #828282; */
            background: #34495E;
            color: white;
        }

        #td1 {
            border: 1px solid black;
        }

        td {
            border: 1px solid black;
            height: 10px;
        }
    </style>
</head>

<body>

    <table>
        <tr>
            <th><img
                    src='data:image/png;base64,/9j/4AAQSkZJRgABAQEAYABgAAD/4QAiRXhpZgAATU0AKgAAAAgAAQESAAMAAAABAAEAAAAAAAD/7AARRHVja3kAAQAEAAAAMgAA/+EDnmh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8APD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4NCjx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTExIDc5LjE1ODMyNSwgMjAxNS8wOS8xMC0wMToxMDoyMCAgICAgICAgIj4NCgk8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPg0KCQk8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjY0MGU2OTk1LTBiNDAtMDE0Zi1iNmE1LTU0YmY1NmUzMmM5YSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDoxRUVBMzkxQjFDNUYxMUU2QjlGQzgzNzM3RUY0MDBDOCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDoxRUVBMzkxQTFDNUYxMUU2QjlGQzgzNzM3RUY0MDBDOCIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxNSAoV2luZG93cykiPg0KCQkJPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NDM1YjZmYjgtZmYyOC0xYTQxLTlhZmQtYTZlNWY3ZTAxNjE3IiBzdFJlZjpkb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6YjE0MWNl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' />
            </th>
            <th>

           
     
             <h2>&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
                FISCALÍA GENERAL DEL ESTADO DE QUERÉTARO</h2>
             <h3> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;LISTA DE GANADORES DE REGALOS ESPECIALES 2022</h3>
    
      
    </th>

            {{-- <th>
                <h3 style="text-align: center">FISCALÍA GENERAL DEL ESTADO DE QUERÉTARO </h3>
                <h5>LISTA DE GANADORES DE LA RIFA 2022</h5>
            </th> --}}
        </tr>
    </table>

    <table class="tabla" id="tabla">
        <tr id="tr1">
            <th id="th1">Número de emplead@</th>
            <th id="th1">Nombre del(la) Ganador(a)</th>
            <th id="th1" >Regalo</th>
            <th id="th1">Fecha recibe</th>
            <th id="th1">Firma</th>
        </tr>
        @foreach ($especiales as $especial)
            <tr>
                <th colspan="5" style="background: #DADADA;border: 1px solid black">{{ $especial[0]->direccion }}
                </th>
            </tr>
            @foreach ($especial as $ganadorEs)
                <tr>
                    <td>{{ $ganadorEs->numero_empleado }}</td>
                    <td>{{ $ganadorEs->nombre_empleado }}</td>
                    <td>{{ $ganadorEs->nombre_regalo }}</td> 
                    <td > &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;</td>
                    <td> &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  </td>
                </tr>
            @endforeach
        @endforeach

    </table>

</body>

</html>
