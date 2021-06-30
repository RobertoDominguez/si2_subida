@extends('administrator.layouts.template')

@section('content')

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Agenda de Citas</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <div class="card-body">

            <div class="container">

                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>Citas</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nombre del Cliente</th>
                                        <th>Enfermera Asignada</th>
                                        <th>Servido agendado</th>
                                        <th>Metodo de Pago</th>
                                        <th>Hora de Entrada</th>
                                        <th>Hora de Salida</th>
                                        <th>Fecha agendada</th>
                                        <th>Hora agendada</th>
                                        <th>Direccion</th>
                                        <th>Ver en Mapa</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nombre del Cliente</th>
                                        <th>Enfermera Asignada</th>
                                        <th>Servido agendado</th>
                                        <th>Metodo de Pago</th>
                                        <th>Hora de Entrada</th>
                                        <th>Hora de Salida</th>
                                        <th>Fecha agendada</th>
                                        <th>Hora agendada</th>
                                        <th>Direccion</th>
                                        <th>Ver en Mapa</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($invoices as $invoice)
                                        <tr>
                                            <td>{{ $invoice->name . ' ' . $invoice->last_name }}</td>
                                            @if ($invoice->nurse->exists())
                                                <td>{{ $invoice->nurse->name . ' ' . $invoice->nurse->last_name }}</td>
                                            @else
                                                <td> No asignado</td>
                                            @endif

                                            <td>{{ $invoice->name_service }}</td>
                                            <td>{{ $invoice->name_payment_method }}</td>
                                            <td>{{ $invoice->check_in }}</td>
                                            <td>{{ $invoice->check_out }}</td>
                                            <td>{{ $invoice->date }}</td>
                                            <td>{{ $invoice->time }}</td>
                                            <td>{{ $invoice->ubication }}</td>
                                            <td>


                                                @php
                                                    $grados_lat = abs((int) $invoice->lat);
                                                    $min_lat = abs((int) (($invoice->lat - ((int) $invoice->lat)) * 60));
                                                    $seg_lat = abs((($invoice->lat - ((int) $invoice->lat)) * 60 - ((int) (($invoice->lat - ((int) $invoice->lat)) * 60))) * 60);
                                                    
                                                    $grados_long = abs((int) $invoice->long);
                                                    $min_long = abs((int) (($invoice->long - ((int) $invoice->long)) * 60));
                                                    $seg_long = abs((($invoice->long - ((int) $invoice->long)) * 60 - ((int) (($invoice->long - ((int) $invoice->long)) * 60))) * 60);
                                                @endphp
                                                <a href="{{ 'https://www.google.com/maps/place/' . $grados_lat . '°' . $min_lat . '\'' . $seg_lat . '"S+' . $grados_long . '°' . $min_long . '\'' . $seg_long . '"W' }}"
                                                    target="_blank">
                                                    {{ 'https://www.google.com/maps/place/' . $grados_lat . '°' . $min_lat . '\'' . $seg_lat . '"S+' . $grados_long . '°' . $min_long . '\'' . $seg_long . '"W' }}
                                                </a>


                                            </td>
                                            <td>
                                                @if (!$invoice->nurse->exists())
                                                    <a class="btn btn-primary"
                                                        href="{{ route('administrator.invoice.edit', $invoice->id) }}">
                                                        Asignar Enfermera
                                                    </a>
                                                @else

                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
