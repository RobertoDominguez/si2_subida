@extends('nurse.layouts.template')

@section('content')

    <br>
    <div class="container-fluid">
        <h1 class="mt-4">Visitas pasadas</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Visitas finalizadas</li>
        </ol>

        @foreach ($invoices as $invoice)
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
                            <h5>
                                Ubicacion en mapa:
                            </h5>
                            @php
                                $grados_lat = abs((int) $invoice->lat);
                                $min_lat = abs((int) (($invoice->lat - ((int) $invoice->lat)) * 60));
                                $seg_lat = abs((($invoice->lat - ((int) $invoice->lat)) * 60 - ((int) (($invoice->lat - ((int) $invoice->lat)) * 60))) * 60);
                                
                                $grados_long = abs((int) $invoice->long);
                                $min_long = abs((int) (($invoice->long - ((int) $invoice->long)) * 60));
                                $seg_long = abs((($invoice->long - ((int) $invoice->long)) * 60 - ((int) (($invoice->long - ((int) $invoice->long)) * 60))) * 60);
                            @endphp
                            <a class="btn btn-light" href="{{ 'https://www.google.com/maps/place/' . $grados_lat . '°' . $min_lat . '\'' . $seg_lat . '"S+' . $grados_long . '°' . $min_long . '\'' . $seg_long . '"W' }}"
                                target="_blank">
                                {{ 'https://www.google.com/maps/place/' . $grados_lat . '°' . $min_lat . '\'' . $seg_lat . '"S+' . $grados_long . '°' . $min_long . '\'' . $seg_long . '"W' }}
                            </a>
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

        @endforeach

    </div>


    </body>

@endsection
