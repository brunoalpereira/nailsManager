<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    @yield('styles')

    @include('layouts.sideBar')
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    /> 
    <!-- Styles -->
    <link href="{{url('assets/css/lib/calendar2/pignose.calendar.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/lib/chartist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/lib/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/lib/themify-icons.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/lib/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{url('assets/css/lib/owl.theme.default.min.css')}}" rel="stylesheet" />
    <link href="{{url('assets/css/lib/weather-icons.css')}}"rel="stylesheet" />
    <link href="{{url('assets/css/lib/menubar/sidebar.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/lib/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/lib/helper.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/style.css')}}" rel="stylesheet">
       <!-- FontAwsome Link-->
       <script src="https://kit.fontawesome.com/ef4e75bc43.js" crossorigin="anonymous"></script>
   </head>
  
  <body>
 

  @yield('content')
  @yield('scripts')
   
    
   <!-- jquery vendor -->
   <script src="{{url('assets/js/lib/jquery.min.js')}}"></script>
    <script src="{{url('assets/js/lib/jquery.nanoscroller.min.js')}}"></script>
    <!-- nano scroller -->
    <script src="{{url('assets/js/lib/menubar/sidebar.js')}}"></script>
    <script src="{{url('assets/js/lib/preloader/pace.min.js')}}"></script>
    <!-- sidebar -->

    <script src="{{url('assets/js/lib/bootstrap.min.js')}}"></script>
    <script src="{{url('assets/js/scripts.js')}}"></script>
    <!-- bootstrap -->

    <script src="{{url('assets/js/lib/calendar-2/moment.latest.min.js')}}"></script>
    <script src="{{url('assets/js/lib/calendar-2/pignose.calendar.min.js')}}"></script>
    <script src="{{url('assets/js/lib/calendar-2/pignose.init.js')}}"></script>


    <script src="{{url('assets/js/lib/weather/jquery.simpleWeather.min.js')}}"></script>
    <script src="{{url('assets/js/lib/weather/weather-init.js')}}"></script>
    <script src="{{url('assets/js/lib/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{url('assets/js/lib/circle-progress/circle-progress-init.js')}}"></script>
    <script src="{{url('assets/js/lib/chartist/chartist.min.js')}}"></script>
    <script src="{{url('assets/js/lib/sparklinechart/jquery.sparkline.min.js')}}"></script>
    <script src="{{url('assets/js/lib/sparklinechart/sparkline.init.js')}}"></script>
    <script src="{{url('assets/js/lib/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{url('assets/js/lib/owl-carousel/owl.carousel-init.js')}}"></script>
    <!-- scripit init-->
    <script src="{{url('assets/js/dashboard2.js')}}"></script>
 
  </body>

</html>
