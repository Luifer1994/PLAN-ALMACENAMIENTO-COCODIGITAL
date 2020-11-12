<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('titulo')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.css') }}">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="{{ asset('assets/css/shared/style.css') }}">
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css') }}">
    <!-- Layout style -->
    <link rel="shortcut icon" href="{{ asset('asssets/images/favicon.ico') }}">
    @livewireStyles
  </head>
  <body class="header-fixed">
    <!-- HEADER -->
    <nav class="t-header text-white">
      <div class="t-header-brand-wrapper bg-dark">
        <a href="index.html">
          <img class="logo" src="{{ asset('assets/images/logoosc.png') }}" alt="">
          <img class="logo-mini" src="{{ asset('assets/images/logoosc.png') }}" alt="">
        </a>
      </div>
        <button class="t-header-toggler t-header-mobile-toggler d-block d-lg-none">
            <i class="mdi mdi-menu"></i>
        </button>

    </nav>
    <!-- partial -->
    <div class="page-body">


      @include('plantilla.sidebar')

      <!-- partial -->
      <div class="page-content-wrapper">
        <div class="page-content-wrapper-inner">
          <div class="content-viewport">
            <div class="row">
              <div class="col-lg-12 col-md-6 equel-grid">
                <div class="grid">
                    @yield('contenido')
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('plantilla.script')
    @livewireScripts

    <script type="text/javascript">
        window.livewire.on('store',()=>{
            $('.modal').modal('hide');
        });
    </script>
  </body>
</html>
