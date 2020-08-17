<!DOCTYPE html>
<html>

<head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>INSPINIA | Empty Page</title>

   <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
   <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

</head>

<body class="">

   <div id="wrapper">

      @include('layouts.partials.sidebar')

      <div id="page-wrapper" class="gray-bg">
         @include('layouts.partials.navbar')
         <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
               <h2>This is main title</h2>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                     <a href="index.html">This is</a>
                  </li>
                  <li class="breadcrumb-item active">
                     <strong>Breadcrumb</strong>
                  </li>
               </ol>
            </div>
            <div class="col-sm-8">
               <div class="title-action">
                  <a href="" class="btn btn-primary">This is action area</a>
               </div>
            </div>
         </div>

         <div class="wrapper wrapper-content">
            <div class="middle-box text-center animated fadeInRightBig">
               <h3 class="font-bold">This is page content</h3>
               <div class="error-desc">
                  You can create here any grid layout you want. And any variation layout you imagine:) Check out
                  main dashboard and other site. It use many different layout.
                  <br /><a href="index.html" class="btn btn-primary m-t">Dashboard</a>
               </div>
            </div>
         </div>
         <div class="footer">
            <div class="float-right">
               10GB of <strong>250GB</strong> Free.
            </div>
            <div>
               <strong>Copyright</strong> Example Company &copy; 2014-2018
            </div>
         </div>

      </div>
   </div>

   <!-- Mainly scripts -->
   <script src="{{ asset('js/dashboard.js') }}"></script>

</body>

</html>