<!doctype html>
<html lang="th">
<head>      
    <title>หน้าแรก</title>
    @include('frontend/inc_header')
    <link rel="stylesheet" href="{{asset('assets_frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_frontend/css/owl.theme.default.min.css')}}">
    <script src="{{asset('assets_frontend/js/owl.carousel.min.js')}}"></script>
 <meta http-equiv="refresh" content="3;url=hotel">
</head>
    
<body >
   @include('frontend/inc_navbar_hotel') 
    <div class="bg-grey">
        <div class="container">
            <div class="box-hotel">
                <div class=" text-center ">
                    <i class="fas fa-couch text-icon-150 text-orange"></i>
                    <div class="text-filter text-grey text-bold">your registration almost finished.</div>
                    <div class="row justify-content-center" >
                        <div class="col-sm-6">
                            <div class="progress mt-3">
                              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-footer"></div>
    </div>
   @include('frontend/inc_footer_hotel')
</body>
</html>

