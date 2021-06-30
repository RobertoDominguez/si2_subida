@extends('administrator.layouts.template')

@section('content')


            <div class="card card-secondary">
                <div class="card-header">
                <h3 class="card-title">Servicios</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">

                    <div class="container">      
                        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Servicios</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Precio</th>
                                                <th>Duracion</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Precio</th>
                                                <th>Duracion</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($services as $service)
                                            <tr>
                                                <td>{{ $service->name }}</td>
                                                <td>{{ $service->price }}</td>
                                                <td>{{ $service->duration }}</td>
                                                <td>
                                                    <form action="{{route('administrator.service.destroy',$service->id)}}" method="post">
                                                        {{ csrf_field() }}
                                                        <a class="btn btn-primary" href="{{route('administrator.service.edit',$service->id)}}">Editar</a>
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
                    <a class="btn btn-warning" href="{{ route('administrator.service.create') }}">Agregar</a>
                </div>
            </div>


@endsection