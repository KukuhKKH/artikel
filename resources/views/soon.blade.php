<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <title>Comming Soon</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <!-- App favicon -->
   <link rel="shortcut icon" href="assets/images/favicon.ico">

   <!-- App css -->
   <link href="{{ asset('css/soon.css') }}" rel="stylesheet" type="text/css" />
   <style>
      body {
         margin: 0;
         font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif;
         font-size: .9rem;
         font-weight: 400;
         line-height: 1.5;
         color: #a8b5c3;
         text-align: left;
         background-color: #323b44;
      }
   </style>

</head>

<body>

   <div class="mt-5 mb-5">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-12">
               <div class="text-center">
                  <img src="{{ asset('images/animat-rocket-color.gif') }}" alt="" height="160">
                  <h3 class="mt-4">Stay tunned, we're launching very soon</h3>
                  <p class="text-muted">We're making the system more awesome.</p>
                  <div class="row mt-5 justify-content-center">
                     <div class="col-md-8">
                        <div data-countdown="2020/08/21" class="counter-number"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>


   <footer class="footer footer-alt">
      2020 &copy; Opo hayooo by <a href="#" class="text-muted">UIN MALANG YOII</a>
   </footer>

   <script src="{{ asset('js/soon.js') }}"></script>
</body>

</html>