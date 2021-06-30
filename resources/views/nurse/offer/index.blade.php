@extends('nurse.layouts.template')

@section('content')
    <div class="container">
        <h1 class="mt-4">Mis servicios</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Servicios realizados</li>
        </ol>

        <a class="btn btn-warning" href="{{route('nurse.offer.create')}}">
        Añadir servicio
        </a>

        @php
            $before_category = '';
            $i = 0;
        @endphp
        @foreach ($services as $service)
            @if ($before_category != $service->name_category)
                <div class="row">
                    <div class="col-12">
                        <h1 class="pb-2 mt-4 mb-2 border-bottom">{{ $service->name_category }}</h1>
                    </div>
            @endif
            <div class="col-md-4 col-6">

                <a><img style="border-radius: 5px;" class="img-fluid img-portfolio img-hover mb-3 img"
                        src="{{ asset('/images/logo_service.png') }}"
                        srcset="{{ asset('/images/logo_service.png') }} 1x, {{ asset('/images/logo_service.png') }} 2x"
                        alt=""></a>

                <div class="caption">
                    <a class="font-weight-bold" style="color: #ffa500;">{{ $service->name }}</a>
                    <div class="font-weight-bold">{{ 'Bs. ' . $service->price }}</div>
                    <div class="font-weight-light">{{ $service->duration . ' minutos' }}</div>
                    <p class="product-block-description d-none d-md-block"> </p>
                </div>

            </div>
            @if ($i + 1 < count($services))
                @if ($services[$i + 1]->name_category != $service->name_category) </div> @endif
            @endif
            @php
                $before_category = $service->name_category;
                $i++;
            @endphp
        @endforeach
    </div>
@endsection
