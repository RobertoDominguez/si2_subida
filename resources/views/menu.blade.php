<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- carrusel -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>

    <!-- jquery ajax,cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- JQUERY-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>


    <!-- boostrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>


</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light nav-bk3" style="background-color: #ffc300;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('/images/hospital.png') }}" alt="pata" width="35" height="35">
                    Enfermeria Buena Vida</a>
                
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link" href="/">
                        <a class="nav-link" href="{{ route('nurse.get_login') }}">Iniciar Sesion como Enfermera</a>
                    </a>            
                    <a class="nav-item nav-link" href="/informacion">
                        <a class="nav-link" href="{{ route('administrator.get_login') }}">Iniciar Sesion como
                            Administrador</a>
                    </a>
                </div>
              </div>
        </div>
    </nav>

    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <br><br><br>
                <img style="background-size: cover; height: 80%;
                width: 80%; margin-right: 10%;" src="{{ asset('/images/enfermera.jpg') }}" class="img-fluid">
                <br><br>
            </div>
            <br><br>
            <div class="col-md-6">
                <br>
                <h1 style="color: #ffc300;"><b>Nuestra Misión</b></h1>
                <h5>
                    Brindar atención médica de excelencia, con calidez, a través de un equipo de salud comprometido
                    con la capacitación y la innovación tecnológica, cumpliendo con los mas altos estándares de calidad
                    y seguridad y logrando la máxima satisfacción de los pacientes.
                </h5>
                <h1 style="color: #ffc300;"><b>Nuestra Visión</b></h1>
                <h5>
                    Liderar la Transformación del Sistema Sanitario actual para asegurar su sostenibilidad,
                    promoviendo la innovación e incorporando las nuevas tecnologías disponibles.
                </h5>
                <h1 style="color: #ffc300;"><b>Nuestros Valores</b></h1>
                <h5>
                    Nuestros valores son los pilares que sustentan nuestra forma de actuar, trabajar y hacer las cosas.
                    Dicen cómo somos hoy y cómo vamos a ser en el futuro. Hablan sobre nuestra manera de entender la
                    salud y
                    nuestra relación con las personas. Nos hacen diferentes y únicos. Son nuestra identidad:
                </h5>

                <div class="mt-5">
                    <a href="{{ route('patient.get_login') }}" class="btn btn-warning">Iniciar Sesion como Paciente</a>

                </div>

            </div>
        </div>
        <br>
        <br>
    </div>




</body>

</html>
