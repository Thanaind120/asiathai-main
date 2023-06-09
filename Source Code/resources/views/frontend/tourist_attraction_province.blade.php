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
    @include('frontend/inc_navbar')
    <div class="container">
        <div class="banner">
            <img src="{{ ($_district->district_image != '')? asset('assets_frontend/images/'.$_district->district_image) : asset('assets_frontend/images/place-banner2.jpg') }}"
                class="banner-index">
            <div class="centered_box">
                <div class="text-banner-country text-center">*@if(Session::get('lang') ==
                    'en'){{ $_district->name_en }}@else{{ $_district->name_th }}@endif*</div>
            </div>
        </div>
        <div class="clearfix">
            <div class="float-start">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="bread"
                                href="{{ url('/'.Session::get('lang')) }}">@lang('lang.home')</a></li>
                        <li class="breadcrumb-item"><a class="bread"
                                href="{{ url(Session::get('lang').'/tourist_attraction') }}">@lang('lang.tourist_attraction')</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">*@if(Session::get('lang') ==
                            'en'){{ $_district->name_en }}@else{{ $_district->name_th }}@endif*</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 none-mobile">
                <div class="filter-badge"><i class="fas fa-filter me-2"></i>@lang('lang.filters')</div>
                <div class="mt-4">
                    <div class="text-orange text-filter">@lang('lang.category')</div>
                    <div class="ms-4 mt-2">
                        <form id="formCategory"
                            action="{{ url(Session::get('lang').'/tourist_attraction_province/search') }}" method="get">
                            <input type="hidden" name="id" value="{{ $district_id }}">
                            <input type="hidden" name="province" value="{{ $province }}">
                            <input type="hidden" name="district" value="{{ $district }}">
                            @if (isset($landmarks_from))
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $landmarks_from }}"
                                    id="landmarks" name="landmarks" checked>
                                <label class="form-check-label" for="flexCheckChecked1">
                                    @lang('lang.landmarks')
                                </label>
                            </div>
                            @else
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="landmarks"
                                    name="landmarks">
                                <label class="form-check-label" for="flexCheckChecked1">
                                    @lang('lang.landmarks')
                                </label>
                            </div>
                            @endif
                            @if (isset($attractions_from))
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $attractions_from }}"
                                    id="attractions" name="attractions" checked>
                                <label class="form-check-label" for="flexCheckChecked2">
                                    @lang('lang.attractions')
                                </label>
                            </div>
                            @else
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="2" id="attractions"
                                    name="attractions">
                                <label class="form-check-label" for="flexCheckChecked2">
                                    @lang('lang.attractions')
                                </label>
                            </div>
                            @endif
                            @if (isset($restaurant_from))
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $restaurant_from }}"
                                    id="restaurant" name="restaurant" checked>
                                <label class="form-check-label" for="flexCheckChecked3">
                                    @lang('lang.restaurant')
                                </label>
                            </div>
                            @else
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="3" id="restaurant"
                                    name="restaurant">
                                <label class="form-check-label" for="flexCheckChecked3">
                                    @lang('lang.restaurant')
                                </label>
                            </div>
                            @endif
                            @if (isset($activities_from))
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $activities_from }}"
                                    id="activities" name="activities" checked>
                                <label class="form-check-label" for="flexCheckChecked4">
                                    @lang('lang.activities')
                                </label>
                            </div>
                            @else
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="4" id="activities"
                                    name="activities">
                                <label class="form-check-label" for="flexCheckChecked4">
                                    @lang('lang.activities')
                                </label>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="clearfix mb-3">
                    <div class="for-mobile">
                        <div class="float-start">
                            <button type="button" class="filter-badge" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"><i
                                    class="fas fa-filter me-2"></i>@lang('lang.filters')</button>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">@lang('lang.filter')</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div>
                                            <div class="vl-filter">
                                                <div class="text-orange text-filter"><i
                                                        class="fas fa-star me-2"></i>@lang('lang.category')</div>
                                                <div class="ms-4 mt-2">
                                                    <form id="formCategory"
                                                        action="{{ url(Session::get('lang').'/tourist_attraction_province/search') }}"
                                                        method="get">
                                                        @if (isset($landmarks_from))
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="{{ $landmarks_from }}" id="landmarks"
                                                                name="landmarks" checked>
                                                            <label class="form-check-label" for="flexCheckChecked1">
                                                                @lang('lang.landmarks')
                                                            </label>
                                                        </div>
                                                        @else
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="landmarks" name="landmarks">
                                                            <label class="form-check-label" for="flexCheckChecked1">
                                                                @lang('lang.landmarks')
                                                            </label>
                                                        </div>
                                                        @endif
                                                        @if (isset($attractions_from))
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="{{ $attractions_from }}" id="attractions"
                                                                name="attractions" checked>
                                                            <label class="form-check-label" for="flexCheckChecked2">
                                                                @lang('lang.attractions')
                                                            </label>
                                                        </div>
                                                        @else
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="2"
                                                                id="attractions" name="attractions">
                                                            <label class="form-check-label" for="flexCheckChecked2">
                                                                @lang('lang.attractions')
                                                            </label>
                                                        </div>
                                                        @endif
                                                        @if (isset($restaurant_from))
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="{{ $restaurant_from }}" id="restaurant"
                                                                name="restaurant" checked>
                                                            <label class="form-check-label" for="flexCheckChecked3">
                                                                @lang('lang.restaurant')
                                                            </label>
                                                        </div>
                                                        @else
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="3"
                                                                id="restaurant" name="restaurant">
                                                            <label class="form-check-label" for="flexCheckChecked3">
                                                                @lang('lang.restaurant')
                                                            </label>
                                                        </div>
                                                        @endif
                                                        @if (isset($activities_from))
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="{{ $activities_from }}" id="activities"
                                                                name="activities" checked>
                                                            <label class="form-check-label" for="flexCheckChecked4">
                                                                @lang('lang.activities')
                                                            </label>
                                                        </div>
                                                        @else
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="4"
                                                                id="activities" name="activities">
                                                            <label class="form-check-label" for="flexCheckChecked4">
                                                                @lang('lang.activities')
                                                            </label>
                                                        </div>
                                                        @endif
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn-grey"
                                                data-bs-dismiss="modal">@lang('lang.cancel')</button>
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="submit"
                                                class="btn-search-booking">@lang('lang.submit')</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="float-end "> --}}
                    {{-- <div class="row g-1"> --}}
                    {{-- <div class="col-6">
                                <div class="text-sort-by">@lang('lang.sort_by') :</div>
                            </div> --}}
                    {{-- <div class="col-6">
                                <div class="dropdown">
                                    <button class="btn-sortby dropdown-toggle" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        @lang('lang.best_match')
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="#">@lang('lang.best_match')</a></li>
                                        <li><a class="dropdown-item" href="#">@lang('lang.popular_properties')</a></li>
                                        <li><a class="dropdown-item" href="#">...</a></li>
                                    </ul>
                                </div>
                            </div> --}}
                    {{-- </div> --}}
                    {{-- </div> --}}
                </div>
                <div class="row">
                    @foreach ($attraction as $key => $val)
                    <div class="col-6 mb-2">
                        <div class="frame-item box-destination">
                            <a href="{{ url(Session::get('lang').'/tourist_attraction_detail/id='.$val->id) }}"
                                class="">
                                <img src="{{ ($val->attraction_image != '')? asset('assets_frontend/images/'.$val->attraction_image) : asset('assets_frontend/images/1-place.jpg') }}"
                                    class="img-des">
                                <div class="bottom-left">
                                    <p class="name-text text-white">@if(Session::get('lang') == 'en')
                                        {{ $val->attraction_en }} @else {{ $val->attraction_th }} @endif</p>
                                    <p class="detail-text text-white">@if(Session::get('lang') == 'en')
                                        {{ $val->name_en }} @else {{ $val->name_th }} @endif , @if(Session::get('lang')
                                        == 'en') {{ $val->district_en }} @else {{ $val->district_th }} @endif</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="space-footer"></div>
    @include('frontend/inc_footer')
    <script>
        $('#formCategory').change(function () {

            document.getElementById('formCategory').submit(); // SUB

        });
    </script>
</body>

</html>