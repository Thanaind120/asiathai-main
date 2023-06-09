<!doctype html>
<html lang="th">
<head>
    <title>@lang('lang.poolvilla')</title>
    @include('frontend/inc_header')
    <link rel="stylesheet" href="{{ asset('assets_frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_frontend/css/owl.theme.default.min.css') }}">
    <script src="{{ asset('assets_frontend/js/owl.carousel.min.js') }}"></script>
</head>
<body>
    @include('frontend/inc_navbar_nonlogin')
    <div class="bg-grey">
        <div class="container">
            <div class="box-sign">
                <div class="text-head-sign text-orange">@lang('lang.register')</div>
                {{-- <form action="{{ route('register.insert') }}" method="POST" enctype="multipart/form-data"> --}}
                <form action="{{ url(Session::get('lang').'/register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-footer mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-orange">@lang('lang.first_name')</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="firstname" required>
                    </div>
                    <div class="space-footer mb-3">
                        <label for="exampleFormControlInput2" class="form-label text-orange">@lang('lang.last_name')</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" name="lastname" required>
                    </div>
                    <div class="space-footer mb-3">
                        <label for="exampleFormControlInput3" class="form-label text-orange">@lang('lang.email')</label>
                        <input type="email" class="form-control" id="exampleFormControlInput3" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label text-orange">@lang('lang.password')</label>
                        <input type="password" class="form-control" id="exampleFormControlInput4" name="password_1"
                        required>
                        <small class="text-light-grey">@lang('lang.Use_a_minimum_of_10characters')</small>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label text-orange">@lang('lang.confirm_password')</label>
                        <input type="password" class="form-control" id="exampleFormControlInput4" name="password_2"
                        required>
                    </div>
                    <button type="submit" id="submit" class="btn-sign">@lang('lang.register')</button>
                    {{-- <a class="btn-sign" href="index.php">Register</a> --}}
                </form>
                <div class="box-text-white">
                    <div class="text-grey text-tiny">@lang('lang.or_countinue_with')</div>
                </div>
                <div class="text-line"></div>
                <div class="row justify-content-center">
                    <div class="col-sm-4">
                        <button class="btn-facebook">
                            <img src="{{ asset('assets_frontend/images/fb.png') }}" class="fb"><span class="">facebook</span>
                        </button>
                    </div>
                    <div class="col-sm-4">
                        <button class="btn-gmail">
                            <img src="{{ asset('assets_frontend/images/gmail.png') }}" class="gm"><span class="">gmail</span>
                        </button>
                    </div>
                </div>
                <div class="text-grey text-tiny text-start mt-5">@lang('lang.Already_have_an_account')<a href="{{ url(Session::get('lang').'/signin') }}"
                        class="text-orange ms-2">@lang('lang.sign_in')</a></div>
                <div class="space-footer"></div>
                <div class="row justify-content-center">
                    <div class="col-sm-5 col-8">
                        <img src="{{ asset('assets_frontend/images/register.svg') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="space-footer"></div>
    </div>
    @include('frontend/inc_footer')
</body>

</html>
