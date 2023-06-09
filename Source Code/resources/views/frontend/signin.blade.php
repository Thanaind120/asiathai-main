<!doctype html>
<html lang="th">

<head>
    <title>@lang('lang.poolvilla')</title>
    @include('frontend/inc_header')
    <link rel="stylesheet" href="{{ asset('assets_frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_frontend/css/owl.theme.default.min.css') }}">
    <script src="{{ asset('assets_frontend/js/owl.carousel.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    @include('sweetalert')
    @include('frontend/inc_navbar_nonlogin')
    <div class="bg-grey">
        <form action="{{ url(Session::get('lang').'/loging') }}" method="post">
            @csrf
            <div class="container">
                <div class="box-sign">
                    <div class="text-head-sign text-orange">@lang('lang.sign_in')</div>
                    <div class="space-footer mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-orange">@lang('lang.email')</label>
                        <input type="email" class="form-control" name="email" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2"
                            class="form-label text-orange">@lang('lang.password')</label>
                        <input type="password" class="form-control" name="password" id="exampleFormControlInput2">
                    </div>
                    <div class="clearfix">
                        <div class="float-end">
                            <a href="#" class="link-primary text-orange" data-bs-toggle="modal"
                                data-bs-target="#forgotModal"><small
                                    class="text-orange">@lang('lang.forgot_password')</small></a>
                        </div>
                    </div>
                    <button class="btn-sign" type="submit">@lang('lang.sign_in')</button>
                    <div class="box-text-white">
                        <div class="text-grey text-tiny">@lang('lang.or_countinue_with')</div>
                    </div>
                    <div class="text-line"></div>
                    <div class="row justify-content-center">
                        <div class="col-sm-4">
                            <button class="btn-facebook">
                                <img src="{{ asset('assets_frontend/images/fb.png') }}" class="fb"><span
                                    class="">facebook</span>
                            </button>
                        </div>
                        <div class="col-sm-4">
                            <button class="btn-gmail">
                                <img src="{{ asset('assets_frontend/images/gmail.png') }}" class="gm"><span
                                    class="">gmail</span>
                            </button>
                        </div>
                    </div>
                    <div class="text-grey text-tiny text-start mt-5">@lang('lang.donot_have_an_account')<a
                            href="{{ url(Session::get('lang').'/register') }}" class="text-orange ms-2">@lang('lang.register')</a>
                    </div>
                    <div class="space-footer"></div>
                    <div class="row justify-content-center">
                        <div class="col-sm-5 col-8">
                            <img src="{{ asset('assets_frontend/images/singin.svg') }}">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Modal -->
        <div class="modal fade" id="forgotModal" tabindex="-1" aria-labelledby="forgotModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content borderR-25 p-4">
                    <div class="modal-body">
                        <h5 class="text-head-sign text-orange" id="forgotModalLabel">Forgot your password?</h5>
                        <p class="text-filter mt-3 text-left text-bold">No worries! Enter your email and we will send
                            you a
                            reset.</p>
                        <form action="{{ url(Session::get('lang').'/signin/Forgotpassword') }}" method="POST">
                            @csrf
                            <label for="" class="form-label text-orange">Your email</label>
                            <input type="email" class="form-control borderR-6" id="email" name="email"
                                placeholder="Email">
                            <div class="text-center pt-12">
                                <button type="submit" class="btn-sign">Password
                                    reset</button><br>
                                <button type="button" class="btn btn-link text-navy" data-bs-dismiss="modal">Back to
                                    login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-footer"></div>
    </div>
    @include('frontend/inc_footer')
</body>

</html>
