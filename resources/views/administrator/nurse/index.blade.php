@extends('administrator.layouts.template')

@section('content')


            <div class="card card-secondary">
                <div class="card-header">
                <h3 class="card-title">Enfermeras</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">

                    <div class="container">      
                        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Enfermeras</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Credencial</th>
                                                <th>Nombres</th>
                                                <th>Apellidos</th>
                                                <th>Correo</th>
                                                <th>Telefono</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Credencial</th>
                                                <th>Nombres</th>
                                                <th>Apellidos</th>
                                                <th>Correo</th>
                                                <th>Telefono</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($nurses as $nurse)
                                            <tr>
                                                <td>{{ $nurse->credential }}</td>
                                                <td>{{ $nurse->name }}</td>
                                                <td>{{ $nurse->last_name }}</td>
                                                <td>{{ $nurse->email }}</td>
                                                <td>{{ $nurse->phone }}</td>
                                                <td>
                                                    <form action="{{route('administrator.nurse.destroy',$nurse->id)}}" method="post">
                                                        {{ csrf_field() }}
                                                        <a class="btn btn-primary" href="{{route('administrator.nurse.edit',$nurse->id)}}">Editar</a>
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
                    <a class="btn btn-warning" href="{{ route('administrator.nurse.create') }}">Agregar</a>
                </div>
            </div>


@endsection