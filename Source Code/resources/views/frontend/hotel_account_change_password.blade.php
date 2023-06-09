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
   @include('frontend/inc_navbar_hotel')
   @include('sweetalert')
    <div class="bg-orange">
       @include('frontend/inc_menu_bar_hotel')
    </div>
    <div class="bg-grey">
        <div class="container">
            <div class="text-head-d text-grey mt-3 mb-2 text-bold">Change password</div>
            <div class="box-hotel-p">
                <div class="">
                <form method="POST" action="{{url('partner/change_password')}}">
                    @csrf
                    <div class="col-sm-8">
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label text-grey">Old Password</label>
                          <input type="password" class="form-control" name="old_password" >
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlInput3" class="form-label  text-grey">New Password</label>
                          <input type="password" class="form-control" name="new_password" >
                        </div>
                        <div class=" mb-3">
                          <label for="exampleFormControlInput3" class="form-label  text-grey">Confirm New Password</label>
                          <input type="password" class="form-control" name="confirm_password">
                        </div>
                    </div>
                    <div class="row justify-content-center mt-5">
                        <div class="col-sm-4">
                             <a href="{{url('hotel')}}"><div class="btn-grey mt-3">Cancel</div></a>
                        </div>
                        <div class="col-sm-4">
                             <button class="btn-orange mt-3" >Save</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    <div class="space-footer"></div>
    </div>
   @include('frontend/inc_footer_hotel')
</body>
</html>

