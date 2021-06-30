@extends('administrator.layouts.template')

@section('content')

    <body>
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Asignar Enfermera</h3>
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

                        <form action="{{ route('administrator.invoice.update', $invoice->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Enfermera:</strong>
                                        <div>
                                            <select id="editType" name="id_offer" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                            @foreach ($offers as $offer)
                                                <option  value="{{$offer->id}}">{{$offer->name.''.$offer->last_name}}</option>
                                            @endforeach                                       
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                        <a class="btn btn-primary"
                                            href="{{ route('administrator.invoice.index') }}">Atras</a>
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
