<!DOCTYPE html>
<html>

<head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>{{ config('app.name', 'Laravel') }}</title>

   <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
   <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
   @yield('css')

</head>

<body class="">
   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
   <div id="wrapper">

      @include('layouts.partials.sidebar')

      <div id="page-wrapper" class="gray-bg">
         @include('layouts.partials.navbar')
         @include('layouts.partials.breadcrumb')
         @yield('content')
         @include('layouts.partials.footer')

      </div>
   </div>

   <!-- Mainly scripts -->
   <script src="{{ asset('js/dashboard.js') }}"></script>
   @yield('script')
   <script>
      $(() => {
         setTimeout(() => {
            toastr.options = {
               closeButton: true,
               progressBar: true,
               showMethod: 'slideDown',
               timeOut: 4000
            };
            @if (Session::has('sukses'))
               toastr.success(`{!! Session::get('sukses') !!}`, 'Suksess')
            @endif

            @if (Session::has('gagal'))
               toastr.error(`{!! Session::get('gagal') !!}`, 'Error')
            @endif
         }, 500)
      })
   </script>

</body>

</html>