@extends('administrator.layouts.template')

@section('content')
<body>
    <div class="row">
        <div class="col-12">
            <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Editar Paciente</h3>
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
                    
                    <form action="{{ route('administrator.patient.update',$patient->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nombres:</strong>
                                    <input type="text" name="name" value="{{$patient->name}}" maxlength="50" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Apellidos:</strong>
                                    <input type="text" name="last_name" value="{{$patient->last_name}}" maxlength="50" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Correo:</strong>
                                    <input type="email" name="email" value="{{$patient->email}}" maxlength="50" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Telefono:</strong>
                                    <input type="text" name="phone" value="{{$patient->phone}}" maxlength="50" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Contrase??a:</strong>
                                    <input type="password" name="password" value="" maxlength="50" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Confirmar contrase??a:</strong>
                                    <input type="password" name="password_confirm" value="" maxlength="50" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                    <a class="btn btn-primary" href="{{ route('administrator.patient.index') }}">Atras</a>
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