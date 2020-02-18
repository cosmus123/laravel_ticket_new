<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
     <link rel="stylesheet" href="{{asset('css/app.css')}}"> {{-- <- bootstrap css --}}
</head>
<body>
    @include('inc.navbar')
      <div class="container">
      
         @yield('content')

      </div>
      <br>
    @include('inc.footer')      
      

    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>     
      <script src="{{asset('js/app.js')}}"></script> {{-- <- bootstrap and jquery --}}
      <script>
        
        $(function () {
              $('[data-toggle="popover"]').popover() 
            });

            $( "#Modal" ).click(function() {
              $('#ModalCenter').modal('show');
            });
            
      </script>      
</body>
</html>