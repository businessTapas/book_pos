 <!doctype html>
 <html lang="en">

 <head>
     <meta name="csrf-token" content="vyGAbIzEXT1cVTWwqe5GOMf7ZBpNhzT2hSVs94z5">
     <meta charset="utf-8" />
     {{-- <title>I&CA Book Store | pos</title> --}}
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
     <meta content="Themesdesign" name="author" />
     <!-- App favicon -->
     {{-- <link rel="shortcut icon" href="http://127.0.0.1:8000/assets/images/favicon.png">
    <!-- plugin css -->
    <link href="http://127.0.0.1:8000/assets/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />
    <!-- swiper css -->
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/css/swiper-bundle.min.css">
    <!-- Bootstrap Css -->
    <link  id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="assets/css/bootstrap.min.css"  rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <!-- App Css-->
    <link href="assets/css/pos.css"  rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css"  rel="stylesheet" type="text/css" />
    <link  id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

 </head>

 <style>
     .coupon-code {
         border: 1px dashed #e4e4e4;
         font-weight: 600;
         border-radius: 4px;
         width: fit-content;
     }

     .btn-primary-subtle {
         color: #776acf;
         background-color: rgba(119, 106, 207, .1);
         border-color: transparent;
     }
 </style>

 <body data-topbar="dark">

     <!-- Begin page -->
     <div id="layout-wrapper">


         <div class="container">

             <!--Copy this part for coupon Html-->
             <div class="row justify-content-center">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-body">
                             @if ($data)
                                 <div class="row">
                                     {{-- @foreach ($data as $dat) --}}
                                     <div class="col-lg-8">
                                         <div class="coupon-code p-2 px-3 mb-3 text-muted">{{ $data->coupon_code }}
                                         </div>
                                         <h4 class="coupon-amnt">Save {{ $data->discount }} %</h4>
                                         <p class="text-muted">On minimum purchase of Rs. {{ $data->min }}.00 <br>
                                         </p>
                                     </div>
                                     <div class="col-lg-4">
                                         <div class="text-lg-end">
                                             <button type="button" class="btn btn-primary-subtle" id="discount_apply"
                                                 value="{{ $data->id }}">Apply Now <i
                                                     class="fas fa-chevron-right ms-1"></i></button>
                                         </div>
                                     </div>
                                     {{-- @endforeach --}}
                                 </div>
                             @else
                                 <p> No Coupon Available</p>
                             @endif
                         </div>
                     </div>
                 </div>

             </div>
             <!--Copy this part for coupon Html-->

         </div>
         <!-- end main content-->

     </div>
     <!-- END layout-wrapper -->

     <!-- Right bar overlay-->
     <div class="rightbar-overlay"></div>

     <!-- JAVASCRIPT -->
     {{-- <script src="http://127.0.0.1:8000/assets/js/bootstrap.bundle.min.js"></script>
        <script src="http://127.0.0.1:8000/assets/js/metismenujs.min.js"></script>
        <script src="http://127.0.0.1:8000/assets/js/simplebar.min.js"></script>
        <script src="http://127.0.0.1:8000/assets/js/feather.min.js"></script>
        <script src="http://127.0.0.1:8000/assets/js/alertify.min.js"></script>
        <script src="http://127.0.0.1:8000/assets/js/feather.min.js"></script>
        <script src="http://127.0.0.1:8000/assets/js/fullcalendar.min.js"></script>
        <script src="http://127.0.0.1:8000/assets/js/glightbox.min.js"></script>
        <script src="http://127.0.0.1:8000/assets/js/nouislider.min.js"></script>
        <script src="http://127.0.0.1:8000/assets/js/rater.js"></script>
        <script src="http://127.0.0.1:8000/assets/js/simplebar.min.js"></script>
        <script src="http://127.0.0.1:8000/assets/js/wNumb.min.js"></script>
        <!-- apexcharts -->
        <script src="http://127.0.0.1:8000/assets/js/apexcharts.min.js"></script>
        <!-- for basic area chart -->
        <script src="http://127.0.0.1:8000/assets/js/stock-prices.js"></script>
        <!-- for github style chart -->
        <script src="http://127.0.0.1:8000/assets/js/github-data.js"></script>
        <!-- for irregular timeseries chart -->
        <script src="http://127.0.0.1:8000/assets/js/irregular-data-series.js"></script>
        <script src="http://127.0.0.1:8000/assets/js/moment.min.js"></script>
        <!-- Vector map-->
        <script src="http://127.0.0.1:8000/assets/js/jsvectormap.min.js"></script>
        <script src="http://127.0.0.1:8000/assets/js/world-merc.js"></script>
        <!-- swiper js -->
        <script src="http://127.0.0.1:8000/assets/js/swiper-bundle.min.js"></script>
        <script src="http://127.0.0.1:8000/assets/js/pages/all.init.js"></script>
        <script src="http://127.0.0.1:8000/assets/js/pages/apexcharts-boxplot.init.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="http://127.0.0.1:8000/assets/js/app.js"></script>
        <script src="http://127.0.0.1:8000/assets/js/method.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script> --}}


 </body>

 </html>
 {{-- <script>
    // for the paginatin purpose 
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
            selectDrop('form_data_pos', 'http://127.0.0.1:8000/pos/item/search?page=' + page, 'book_list')
        };
    });
</script> --}}
