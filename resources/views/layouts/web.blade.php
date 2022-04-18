<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Comunidad Campesina de Catac</title>

  <!-- Mobile Specific Metas
================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <!-- Favicon
================================================== -->
<link rel="icon" type="image/png" href="{{ asset('constra/images/logo.png') }} ">
<!-- CSS
================================================== -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href=" {{ asset('constra/plugins/bootstrap/bootstrap.min.css') }} ">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="{{ asset('constra/plugins/fontawesome/css/all.min.css') }} ">
  <!-- Animation -->
  <link rel="stylesheet" href="{{ asset('constra/plugins/animate-css/animate.css') }} ">
  <!-- slick Carousel -->
  <link rel="stylesheet" href="{{ asset('constra/plugins/slick/slick.css') }} ">
  <link rel="stylesheet" href="{{ asset('constra/plugins/slick/slick-theme.css') }} ">
  <!-- Colorbox -->
  <link rel="stylesheet" href="{{ asset('constra/plugins/colorbox/colorbox.css') }}">
  <!-- Template styles-->
  <link rel="stylesheet" href="{{ asset('constra/css/style.css') }} ">

</head>
<body>
  <div class="body-inner">


<!--/ Topbar start-->
@include('layouts.partes.topbar')
<!--/ Topbar end -->
    
<!-- Header start -->
@include('layouts.partes.header')
<!--/ Header end -->

@yield('contenido')

<!--/ subscribe end -->

@include('layouts.partes.footer')


  <!-- Javascript Files
  ================================================== -->

  <!-- initialize jQuery Library -->
  <script src="{{ asset('constra/plugins/jQuery/jquery.min.js') }}"></script>
  <!-- Bootstrap jQuery -->
  <script src="{{ asset('constra/plugins/bootstrap/bootstrap.min.js') }}" defer></script>
  <!-- Slick Carousel -->
  <script src="{{ asset('constra/plugins/slick/slick.min.js') }}"></script>
  <script src="{{ asset('constra/plugins/slick/slick-animation.min.js') }}"></script>
  <!-- Color box -->
  <script src="{{ asset('constra/plugins/colorbox/jquery.colorbox.js') }}"></script>
  <!-- shuffle -->
  <script src="{{ asset('constra/plugins/shuffle/shuffle.min.js') }}" defer></script>


  <!-- Google Map API Key-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
  <!-- Google Map Plugin-->
  <script src="{{ asset('constra/plugins/google-map/map.js') }} " defer></script>

  <!-- Template custom -->
  <script src="{{ asset('constra/js/script.js') }}"></script>

  </div><!-- Body inner end -->
  </body>

  </html>