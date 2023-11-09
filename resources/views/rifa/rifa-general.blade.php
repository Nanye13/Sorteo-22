<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- // DESARROLLO
// Desarrolladora: Nancy Yesenia Ojeda Perez
// Desarrollo Direccion de Tecnologias -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap"
        rel="stylesheet">
    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            /* background-image: url(img/fondo1.jpg);
            background-repeat: no-repeat;
            background-size: cover; */
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                /* background-image: url(img/fondo1.jpg); */
                /* background-color: #2d3748; */
                /* background-color: rgba(45, 55, 72, var(--bg-opacity)) */
            }

            .dark\:bg-gray-900 {
                /* background-image: url(img/fondo1.jpg); */
                /* --bg-opacity: 1;
                background-color: #1a202c; */
                /* background-color: rgba(26, 32, 44, var(--bg-opacity)) */
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                /* background-image: url(img/fondo1.jpg); */
                /* border-color: #4a5568; */
                /* border-color: rgba(74, 85, 104, var(--border-opacity)) */
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: #6b7280;
                color: rgba(107, 114, 128, var(--tw-text-opacity))
            }
        }
    </style>

    <style>
        body {
            /* font-family: 'Nunito', sans-serif; */
            font-family: Poppins;
        }

        .my-custom-scrollbar {
            position: relative;
            height: 200px;
            overflow: auto;
        }

        .table-wrapper-scroll-y {
            display: block;
        }
    </style>
</head>

{{-- <body class="antialiased" style="background-image: url(img/Banner.jpg);background-repeat: repeat;background-position: top;"> --}}

<body class="antialiased">

    <header style="height: 50px">

    </header>
    <div class="container-fluid" style="background-color: transparent">
        <div style="margin-bottom: 15px; text-align: center">
            <input type="text" id="seguir" value="1" hidden>

            <div class="d-grid gap-2 d-md-block">
                <button id="detener" class="btn btn-danger btn-lg" >Detener</button>
                <button id="continuar" class="btn btn-success btn-lg" hidden>Seguir</button>
                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Launch demo modal
                </button> --}}


                {{-- <form action="{{ route('empleados') }}" method=get name="formulario1"> --}}

                <!-- <a type="button" class="btn btn-info btn-lg" style="color: white;" onclick="location.href = '/especial'">Iniciar Rifa Especial</a> -->
            </div>
        </div>

        <div class="row">
            <audio src="img/gane.mp3" autoplay></audio>

            <div class="col-6">

            </div>
            <div class="col-6">
                <div class="card" style="display: none" id="tabla">
                    {{-- Lista de Ganadores --}}

                    <div class="card-header" style="background-color: #212529">
                        <h5 class="card-title" style="font-family:Poppins; text-align: center; color: white;">LISTA
                            DE GANADORES</h5>
                    </div>
                    <div class="card-body">
                        <div>
                            <table class=" table table-dark table-wrapper-scroll-y  my-custom-scrollbar">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Número de empleado</th>
                                        <th>Nombre</th>
                                        <th>Regalo</th>
                                        <th>Dirección</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $cont = 1;
                                    @endphp
                                    @foreach ($arregloGanadores as $ganador)
                                        <tr>
                                            <td>{{ $cantGanadores }}</td>
                                            <td>{{ $ganador['numero_empleado'] }}</td>
                                            <td>{{ $ganador['nombre_empleado'] }}</td>
                                            <td> {{ $ganador['nombre_regalo'] }}</td>
                                            <td>{{ $ganador['direccion'] }}</td>
                                        </tr>
                                        @php
                                            $cantGanadores--;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">GANADOR</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <?php if(isset($empleado)): ?>
                                <label for="">No. Empleado: {{ $empleado->numero_empleado }}</label>
                                <br>
                                <label for="">Nombre empleado: <strong>{{ $empleado->nombre_empleado }}</strong></label>
                                <br>
                                <label for="">Dirección: {{ $empleado->direccion }}</label>
                                <?php endif ?>
                            </li>

                            <li class="list-group-item">
                                <?php if(isset($regalo)): ?>
                                <label for=""><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-gift" viewBox="0 0 16 16"
                                    style="display: inline">
                                    <path
                                        d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 14.5V7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A2.968 2.968 0 0 1 3 2.506V2.5zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43a.522.522 0 0 0 .023.07zM9 3h2.932a.56.56 0 0 0 .023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0V3zM1 4v2h6V4H1zm8 0v2h6V4H9zm5 3H9v8h4.5a.5.5 0 0 0 .5-.5V7zm-7 8V7H2v7.5a.5.5 0 0 0 .5.5H7z" />
                                </svg> Regalo: {{ $regalo->nombre_regalo }}</label>
                                <?php endif ?>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>



    {{-- <div class="card" style="background-color: transparent"> --}}
    {{-- <div class="card-body"> --}}
    {{-- <div class="row">
                    <div class="col-sm-5">
                        <div class="card mb-3" style="background-color: transparent; color: white; border-color: white">
                            <div class="row g-0">
                                <div class="col-md-2">

                                    <img src="img/ganador1.webp" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-family:Poppins ">GANADOR</h5>
                                        <div class="table-responsive">
                                            <table class="table" style="color: white;font-weight: bold;">
                                                <thead>
                                                    <tr>
                                                        <th style="font-family:Poppins">No. Empleado</th>
                                                        <th style="font-family:Poppins">Nombre</th>
                                                        <th style="font-family:Poppins">Dirección</th>
                                                    </tr>
                                                </thead>
                                                <tbody <?php if(isset($empleado)): ?>>
                                                    <tr>
                                                        <td style="font-family:Poppins">{{ $empleado->numero_empleado }}
                                                        </td>
                                                        <td style="font-family:Poppins">{{ $empleado->nombre_empleado }}
                                                        </td>
                                                        <td style="font-family:Poppins">{{ $empleado->direccion }}</td>
                                                    </tr>
                                                    <?php endif ?>
                                                </tbody>
                                            </table>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-2">
                    </div>

                    <div class="col-sm-5">
                        <div class="card mb-3" style="background-color: transparent; color: white;border-color: white">
                            <div class="row g-0">
                                <div class="col-md-2">
                                    <img src="img/reglo.webp" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-family:Poppins">REGALO</h5>
                                        <div class="table-responsive">
                                            <table class="table " style="color: white; font-weight: bold">
                                                <tr>
                                                    <th style="font-family:Poppins">Descripción</th>
                                                </tr>
                                                <tbody>
                                                    <?php if(isset($regalo)): ?>
                                                    <tr>
                                                        <td style="font-family:Poppins">{{ $regalo->nombre_regalo }}
                                                        </td>
                                                    </tr>
                                                    <?php endif ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
    {{-- Lista de Ganadores --}}
    {{-- <div class="card-transparent">
                    <div class="card-header" style="background-color: #212529">
                        <h5 class="card-title" style="font-family:Poppins; text-align: center; color: white;">LISTA
                            DE GANADORES</h5>
                    </div>
                    <div class="card-body">
                        <div>
                            <table class=" table table-dark table-wrapper-scroll-y  my-custom-scrollbar">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Número de empleado</th>
                                        <th>Nombre</th>
                                        <th>Regalo</th>
                                        <th>Dirección</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $cont = 1;
                                    @endphp
                                    @foreach ($arregloGanadores as $ganador)
                                        <tr>
                                            <td>{{ $cantGanadores }}</td>
                                            <td>{{ $ganador['numero_empleado'] }}</td>
                                            <td>{{ $ganador['nombre_empleado'] }}</td>
                                            <td> {{ $ganador['nombre_regalo'] }}</td>
                                            <td>{{ $ganador['direccion'] }}</td>
                                        </tr>
                                        @php
                                            $cantGanadores--;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> --}}
    {{-- </div>
        </div> --}}
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

        <a type="button" class="btn btn-warning btn-lg" onclick="location.href = '/inicio'">Limpiar</a>
    </div>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script>
        // document.getElementById("detener").addEventListener("click", detener);
        // document.getElementById("continuar").addEventListener("click", seguir);

        // function detener() {
        //     $("#continuar").removeAttr('hidden');
        //     $('#seguir').val('0');
        //     $("#detener").prop("hidden", true);
        // }

        // function seguir() {
        //     $("#detener").removeAttr('hidden');
        //     $('#seguir').val('1');
        //     $("#continuar").prop("hidden", true);
        // }

        // function autoFocus() {
        //     let audioEtiqueta = document.querySelector("audio");

        //     if ($('#seguir').val() == 1) {
        //         $('#exampleModal').modal('show');

        //         // window.setTimeout(function() {
        //         //     $('#exampleModal').modal('hide');
        //         // }, 3000);
        //         // audioEtiqueta.setAttribute("src", "img/gane.mp3");
        //         // audioEtiqueta.play();
        //         //hacer play
        //         //abrir modal
        //         //     setTimeout(() => {
        //         // //pause
        //         //     }, 3000);
        //         window.location.href = "{{ route('empleados') }}";

        //     }
        // }
        // setInterval('autoFocus()', 8000);

        // Nuevo metodo 

        let variable;
        let repeat;


        function tiempoEspera() {
            variable = setTimeout(abrirGanador, 1000);
            console.log("ejecutandose");
        }

        // function repetir() {
        //     repeat = setInterval(tiempoEspera, 4000);
        //     console.log("repetir");
        // }

        function abrirGanador() {
            $('#exampleModal').modal('show');
            // alert("fulanito gano");
            console.log("hola");
            setTimeout(refrescar, 3000);
        }

        function refrescar() {
            location.reload();
                    //   window.location.href = "{{ route('empleados') }}";
                    // document.location.reload()
           
        }
        function tablaganadores(){
            $('#tabla').show();
        }
        // repetir();
        tiempoEspera();



        //     var udateTime = function() {
        //     console.log("hola");
        //     // Variables de la fecha y hora
        //     let currentDate = new Date(),
        //         hours = currentDate.getHours(),
        //         minutes = currentDate.getMinutes(),
        //         seconds = currentDate.getSeconds(),
        //         weekDay = currentDate.getDay(),
        //         day = currentDate.getDay(),
        //         month = currentDate.getMonth(),
        //         year = currentDate.getFullYear();

        //     // Condiciones de cuando agregar un 0 en minutos
        //     if (minutes < 10) {
        //         minutes = "0" + minutes
        //     }
        //     // Condicion con los segundos
        //     if (seconds < 10) {
        //         seconds = "0" + seconds
        //     }
        //     // Formato de 12 horas 
        //     var newformat = hours >= 12 ? 'PM' : 'AM';
        //     // Dividimos las horas
        //     hours = hours % 12;
        //     // To display "0" as "12"
        //     hours = hours ? hours : 12;
        //     // Elemntos de la vista
        //     document.getElementById('hours').textContent = hours;
        //     document.getElementById('minutes').textContent = minutes;
        //     document.getElementById('seconds').textContent = seconds;
        //     document.getElementById('zona').textContent = newformat;
        // };

        // udateTime();

        // setInterval(udateTime, 1000);
    </script>
    {{-- </div> --}}
</body>


</html>
