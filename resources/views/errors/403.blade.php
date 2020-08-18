<!DOCTYPE html>
<html>

<head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>{{ config('app.name', 'Laravel') }} | 404 Error</title>

   <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
   <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

   <div class="middle-box text-center animated fadeInDown">
      <h1>403</h1>
      <h3 class="font-bold">You does not have the right roles</h3>

      <div class="error-desc">
         sorry, you are not entitled to access this page. Please find another page
      </div>
   </div>

   <!-- Mainly scripts -->
   <script src="{{ asset('js/dashboard.js') }}"></script>

</body>

</html>