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
    @include('frontend/inc_navbar_hotel_regis')
    <div class="bg-grey">
        <form action="{{ url(Session::get('lang').'/signin/Forgotpassword/update/'.$member->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $member->id }}">
            <div class="container">
                <div class="box-sign">
                    <div class="text-head-sign text-orange">@lang('lang.Reset_your_password')</div>
                    <div class="space-footer mb-3">
                        <label for="password_1" class="form-label text-orange">@lang('lang.password')</label>
                        <input type="password" class="form-control" id="password_1" placeholder="@lang('lang.password')"
                            name="password_1" value="" required>
                    </div>
                    <div class="space-footer mb-3">
                        <label for="password_2" class="form-label text-orange">@lang('lang.confirm_password')</label>
                        <input type="password" class="form-control" id="password_2" placeholder="@lang('lang.confirm_password')"
                            name="password_2" value="" required>
                    </div>
                    <a class="btn-sign" data-bs-toggle="modal" data-bs-target="#exampleModal">@lang('lang.send_request')</a>
                    <div class="space-footer"></div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-icon-re text-orange"><i class="fas fa-envelope-open-text"></i></div>
                            <div class="text-filter mt-3 text-center text-bold">@lang('lang.Please_Cheackonemail_and_resetapassword')
                            </div>
                            <div class="row mt-3">
                                <div class="col-6"><button type="button" class="btn-grey w-100"
                                        data-bs-dismiss="modal">@lang('lang.close')</button></div>
                                <div class="col-6"><button type="submit" class="btn-orange w-100">@lang('lang.submit')</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="space-footer"></div>
    </div>
    @include('frontend/inc_footer_hotel')
</body>

</html>
