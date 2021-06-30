@extends('administrator.layouts.template')

@section('content')


            <div class="card card-secondary">
                <div class="card-header">
                <h3 class="card-title">Categorias</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">

                    <div class="container">      
                        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Categorias</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nombre</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->name }}</td>

                                                <td>
                                                    <form action="{{route('administrator.category.destroy',$category->id)}}" method="post">
                                                        {{ csrf_field() }}
                                                        <a class="btn btn-primary" href="{{route('administrator.category.edit',$category->id)}}">Editar</a>
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
                    <a class="btn btn-warning" href="{{ route('administrator.category.create') }}">Agregar</a>
                </div>
            </div>


@endsection