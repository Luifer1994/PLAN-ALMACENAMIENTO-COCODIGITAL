<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>COCO-DIGITAL</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <img src="{{ asset('assets/images/logoosc.png') }}" width="100px">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
          </ul>
          @if ((Auth::check()))
            <span class="navbar-text">
                <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
            </span>
          @else
            <span class="navbar-text">
                <a class="nav-link" href="{{ route('login') }}">Iniciar sesion <span class="sr-only">(current)</span></a>
            </span>
          @endif
        </div>
      </nav>


        @if (session('mensaje'))
            <div id="alert" class="alert alert-danger container justify-content-center text-center mt-2" role="alert">
                {{ session('mensaje') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="container justify-content-center bg-dark text-white mt-3">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <img src="{{ asset('assets/images/logoosc.png') }}" class="img-fluid" alt="Responsive image">
                    <h5 class="mt-2 text-info">SOLUCIONES INTELIGENTES PARA ESTÁNDARES EXIGENTES</h5>
                    <h6>Brindamos planes de almacenamiento de archivos en la web</h6>
                    <p>Animate y obten el plan de almacenamiento que se acople a tus necesidades¡¡¡</p>
                    @if ((Auth::check()))
                        <span class="navbar-text">
                            <a type="button" class="btn btn-success" href="{{ route('home') }}">Mi Espacio <span class="sr-only">(current)</span></a>
                        </span>
                    @else
                        <a type="button" class="btn btn-danger" href="{{ route('register') }}">
                            Registrate
                        </a>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <img src="{{ asset('assets/images/mano.png') }}" class="img-fluid" alt="Responsive image">
                </div>
            </div>
        </div>


        <div class="container justify-content-center bg-dark mt-3 mb-5 p-4">
            <div class="text-center text-white">
                <h1>Nuestros planes</h1>
            </div>
            <div class="row">
                @foreach ($planes as $plan)
                    <div class="col-sm-4 mb-2">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <h4 class="card-title">{{ $plan->nombre }}</h4>
                            </div>
                          </div>
                        <div class="card-body">
                            <h5>Descripcion</h5>
                            <p>{{ $plan->descripcion }}</p>
                            @if ((Auth::check()))
                            <a type="button" href="{{ route('plan.register',$plan->id) }}"  class="btn btn-success btn-block" onclick="alert('Adquirir plan {{ $plan->nombre }}')">
                                Adquirir plan
                            </a>
                            @else
                                <a type="button" class="btn btn-success" href="{{ route('register') }}" onclick="alert('Para poder Aquirir este plan es necesario que te registres')">
                                    Adquirir plan
                                </a>
                            @endif
                        </div>
                    </div>
                    </div>
                @endforeach
              </div>
        </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>
