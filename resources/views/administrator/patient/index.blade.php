@extends('administrator.layouts.template')

@section('content')


            <div class="card card-secondary">
                <div class="card-header">
                <h3 class="card-title">Pacientes</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">

                    <div class="container">      
                        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Pacientes</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nombres</th>
                                                <th>Apellidos</th>
                                                <th>Correo</th>
                                                <th>Telefono</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nombres</th>
                                                <th>Apellidos</th>
                                                <th>Correo</th>
                                                <th>Telefono</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($patients as $patient)
                                            <tr>
                                                <td>{{ $patient->name }}</td>
                                                <td>{{ $patient->last_name }}</td>
                                                <td>{{ $patient->email }}</td>
                                                <td>{{ $patient->phone }}</td>
                                                <td>
                                                    <form action="{{route('administrator.patient.destroy',$patient->id)}}" method="post">
                                                        {{ csrf_field() }}
                                                        <a class="btn btn-primary" href="{{route('administrator.patient.edit',$patient->id)}}">Editar</a>
                                                        <button type="submit" class="btn btn-danger" >Eliminar</button>
                                                    </form>
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
                <!-- /.card-body -->
                <div class="card-footer">
                    <a class="btn btn-warning" href="{{ route('administrator.patient.create') }}">Agregar</a>
                </div>
            </div>


@endsection