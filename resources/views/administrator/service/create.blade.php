@extends('administrator.layouts.template')

@section('content')
<body>
    <div class="row">
        <div class="col-12">
            <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Agregar Servicio</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                  <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Verifica los datos.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('administrator.service.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nombre:</strong>
                                    <input type="text" name="name" value="" maxlength="50" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Precio:</strong>
                                    <input type="number" name="price" value="" maxlength="50" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Duracion:</strong>
                                    <input type="number" name="duration" value="" maxlength="50" class="form-control">
                                </div>
                            </div>
 
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Categoria:</strong>
                                    <div>
                                        <select id="editType" name="id_category" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        @foreach ($categories as $category)
                                            <option  value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach                                       
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                    <a class="btn btn-primary" href="{{ route('administrator.service.index') }}">Atras</a>
                                </div>
                            </div>
                        </div>
                    </form>
                  </div>
                  <!-- /.card-body -->
              </div>
        </div>
    </div>

</body>
@endsection