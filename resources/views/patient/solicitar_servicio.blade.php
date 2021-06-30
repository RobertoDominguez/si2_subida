@extends('patient.layouts.header')

@section('title', 'Enfermeras')



@section('content')

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin="" />



    <body>
        <br>
        <br>
        <br>
        <br>

        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Solicitar servicio</h3>
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

                        <form action="{{ route('patient.invoice.store') }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">

                                

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Fecha de visita:</strong>
                                        <input type="date" class="form control" id="date" name="date">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Hora de visita:</strong>
                                        <input type="time" class="form control" id="time" name="time">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Ubicacion:</strong>
                                        <input type="text" name="ubication" value="" maxlength="50" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Metodo de pago:</strong>
                                        <div>
                                            <select id="editType" name="id_payment_method" class="custom-select mr-sm-2"
                                                id="inlineFormCustomSelect">
                                                @foreach ($payment_methods as $payment_method)
                                                    <option value="{{ $payment_method->id }}">
                                                        {{ $payment_method->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <input type="text" name="id_service" value="{{ $id_service }}" hidden>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <div id="myMap" style="height: 500px;"></div>
                                        <input type="text" name="lat" id="lat" hidden>
                                        <input type="text" name="lng" id="lng" hidden>
                                    </div>
                                </div>
                                <br>
                                <input type="submit" class="btn-warning" value="Aceptar">

                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>

    </body>

    <script type="text/javascript">
        //mapa
        $(document).ready(function() {
            if (document.getElementById('myMap')) {
                var tilesProvider = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';

                let myMap = L.map('myMap').setView([-17.78368558052463, -63.18273568156657], 13);
                L.tileLayer(tilesProvider, {
                    maxZoom: 18,
                }).addTo(myMap);

                let marker = L.marker([-17.78368558052463, -63.18273568156657]).addTo(myMap);
                document.getElementById('lat').value = -17.78368558052463;
                document.getElementById('lng').value = -63.18273568156657;


                function onMapClick(e) {
                    marker.removeFrom(myMap);
                    marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(myMap);
                    document.getElementById('lat').value = e.latlng.lat;
                    document.getElementById('lng').value = e.latlng.lng;
                }
                //myMap.on('click', onMapClick);

                navigator.geolocation.getCurrentPosition(
                    (pos) => {
                        const {
                            coords
                        } = pos

                        marker.removeFrom(myMap);
                        marker = L.marker([coords.latitude, coords.longitude]).addTo(myMap);
                        document.getElementById('lat').value = coords.latitude;
                        document.getElementById('lng').value = coords.longitude;


                        myMap.on('click', onMapClick);
                    },
                    (err) => {

                    }, {
                        enableHighAccuracy: true,
                        timeout: 5000,
                        maximumAge: 0
                    }
                );

            }
        });
    </script>

@endsection
