<!doctype html>
<html lang="th">
<head>      
    <title>หน้าแรก</title>
   @include('frontend/inc_header')
    <link rel="stylesheet" href="{{asset('assets_frontend/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('assets_frontend/css/owl.theme.default.min.css')}}">
<script src="{{asset('assets_frontend/js/owl.carousel.min.js')}}"></script>
</head>
<body >
   @include('frontend/inc_navbar_hotel_regis')
    <div class="bg-grey">
        <div class="container">
            <div class="box-sign">
                <div class="text-icon-re text-orange"><i class="fas fa-envelope-open-text"></i></div>
                <div class="text-head-sign text-orange">Verify your email</div>
                <div class="text-filter mt-3 text-center text-bold">We've sent an email to {{$email}} to verify your email address and activate your account.</div>
                <div class="space-footer mb-3"></div>
            </div>
        </div>
        <div class="space-footer"></div>
    </div>
@include('frontend/inc_footer_hotel_regis')
</body>
</html>


