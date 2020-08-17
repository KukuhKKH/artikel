<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>@yield('title', config('APP_NAME'))</title>
   <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
   <link rel="stylesheet" href="{{ asset('vendor/iCheck/custom.css') }}">
</head>

<body class="gray-bg">
   @yield('content')
   <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
   <script src="{{ asset('vendor/iCheck/icheck.min.js') }}"></script>
   @yield('js')
   <script>
      $(document).ready(function(){
         $('.i-checks').iCheck({
               checkboxClass: 'icheckbox_square-green',
               radioClass: 'iradio_square-green',
         });
      })
   </script>
</body>

</html>