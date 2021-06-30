@extends('patient.layouts.header')

@section('title', 'Servicios')



@section('content')

    <body>
        <br>
        <br>
        <br>
        <br>
        <div class="container-fluid">
            <h1 class="mt-4">Historico</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Historico de paciente</li>
            </ol>

            @foreach ($invoices as $invoice)
                @if ($invoice->nurse->exists())

                    @if (!is_null($invoice->nurse->check_out))
                        <div class="row">
                            <div class="col-xl-12 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body align-items-center">
                                        <h3> {{ $invoice->name }} </h3>
                                        <h5> Fecha: {{ $invoice->date }}</h5>
                                        <h5> Hora: {{ $invoice->time }}</h5>
                                        <h5> Ubicacion: {{ $invoice->ubication }}</h5>
                                        <a class="small text-white">
                                            Hora de entrada: {{ $invoice->check_in }}
                                        </a>
                                        <br>
                                        <a class="small text-white">
                                            Hora de salida: {{ $invoice->check_out }}
                                        </a>
                                        <h5> Enfermera: {{ $invoice->nurse->name . ' ' . $invoice->nurse->last_name }}</h5>
                                        <h5> Credencial: {{ $invoice->nurse->credential }}</h5>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white">
                                            Precio: {{ $invoice->price }}
                                        </a>
                                        <br>
                                        <a class="small text-white">
                                            Duracion: {{ $invoice->duration }}
                                        </a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-xl-12 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body align-items-center">
                                        <h3> {{ $invoice->name }} </h3>
                                        <h5> Fecha: {{ $invoice->date }}</h5>
                                        <h5> Hora: {{ $invoice->time }}</h5>
                                        <h5> Ubicacion: {{ $invoice->ubication }}</h5>
                                        <a class="small text-white">
                                            Aun no termina su turno
                                        </a>
                                        <h5> Enfermera: {{ $invoice->nurse->name . ' ' . $invoice->nurse->last_name }}</h5>
                                        <h5> Credencial: {{ $invoice->nurse->credential }}</h5>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white">
                                            Precio: {{ $invoice->price }}
                                        </a>
                                        <br>
                                        <a class="small text-white">
                                            Duracion: {{ $invoice->duration }}
                                        </a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif


                @else
                    <div class="row">
                        <div class="col-xl-12 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body align-items-center">
                                    <h3> {{ $invoice->name }} </h3>
                                    <h5> Fecha: {{ $invoice->date }}</h5>
                                    <h5> Hora: {{ $invoice->time }}</h5>
                                    <h5> Ubicacion: {{ $invoice->ubication }}</h5>
                                    <a class="small text-white">
                                        Hora de entrada: {{ $invoice->check_in }}
                                    </a>
                                    <br>
                                    <a class="small text-white">
                                        Hora de salida: {{ $invoice->check_out }}
                                    </a>
                                    <h5> Enfermera: Sin designar</h5>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white">
                                        Precio: {{ $invoice->price }}
                                    </a>
                                    <br>
                                    <a class="small text-white">
                                        Duracion: {{ $invoice->duration }}
                                    </a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            @endforeach


            
        </div>


    </body>
@endsection
