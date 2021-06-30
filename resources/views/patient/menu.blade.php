@extends('patient.layouts.header')

@section('title','Servicios')



@section('content')

<body>
      <br>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top: 50px;">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active ">
            <img class="d-block w-100 img-responsive" src="{{asset('/images/1.jpg')}}" srcset="{{asset('/images/1.jpg').' 1x, '.asset('/images/1.jpg').' 2x'}}" alt="">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 img-responsive" src="{{asset('/images/2.jpg')}}" srcset="{{asset('/images/2.jpg').' 1x, '.asset('/images/2.jpg').' 2x'}}" alt="">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 img-responsive" src="{{asset('/images/3.jpg')}}" srcset="{{asset('/images/3.jpg').' 1x, '.asset('/images/3.jpg').' 2x'}}" alt="">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      

        <center>
        <div class="container">
                @php
                 $before_category="";
                 $i=0;   
                @endphp
            @foreach ($services as $service)
            @if ($before_category!=$service->name_category)
              <div class="row">
                <div class="col-12">
                    <h1 class="pb-2 mt-4 mb-2 border-bottom">{{$service->name_category}}</h1>
                </div>
            @endif
                <div class="col-md-4 col-6">
        
                    <a href="{{route('patient.solicitar_servicio',$service->id)}}"><img style="border-radius: 5px;" class="img-fluid img-portfolio img-hover mb-3 img"
                        src="{{asset('/images/logo_service.png')}}" srcset="{{asset('/images/logo_service.png')}} 1x, {{asset('/images/logo_service.png')}} 2x" alt=""></a>
      
                    <div class="caption">
                          <a href="{{route('patient.solicitar_servicio',$service->id)}}" class="font-weight-bold" style="color: #ffa500;" >{{$service->name}}</a>
                        <div class="font-weight-bold">{{'Bs. '.$service->price}}</div>
                        <div class="font-weight-light">{{$service->duration.' minutos'}}</div>
                        <p class="product-block-description d-none d-md-block"> </p>
                    </div>

                </div>
                @if ($i+1 < count($services))
                    @if ($services[$i+1]->name_category!=$service->name_category) 
                        </div>
                    @endif
                @endif  
              @php
              $before_category=$service->name_category;   
              $i++;
              @endphp
              @endforeach
        </div>
    </center>
    <br>
    
    @include('patient.layouts.footer')

    

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
@endsection