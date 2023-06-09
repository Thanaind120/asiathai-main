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
            <img src="{{ ($attractionDetail->attraction_image != '')? asset('assets_frontend/images/'.$attractionDetail->attraction_image) : asset('assets_frontend/images/place-banner.jpg') }}"
                class="banner-index">
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
                            'en'){{ $attractionDetail->district_en }}@else{{ $attractionDetail->district_th }}@endif*
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="text-title text-bold text-grey">@if(Session::get('lang') ==
                    'en') {{ $attractionDetail->attraction_en }} @else {{ $attractionDetail->attraction_th }} @endif
                </div>
                <div class="text-tiny text-grey my-3">@if(Session::get('lang') ==
                    'en') {!! $attractionDetail->detail_en !!} @else {!! $attractionDetail->detail_th !!} @endif</div>
                {!! $attractionDetail->api_map !!}
                @if(Session::get('lang') ==
                'en') {!! $attractionDetail->title_en !!} @else {!! $attractionDetail->title_th !!} @endif
                {{-- <div class="name-text text-bold text-grey">title</div>
                <div class="text-tiny text-grey my-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                    vitae dapibus mi. Vivamus congue sodales luctus. Maecenas aliquet maximus dolor quis rutrum.</div>
                <div class="name-text text-bold text-grey">title</div>
                <div class="text-tiny text-grey my-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                    vitae dapibus mi. Vivamus congue sodales luctus. Maecenas aliquet maximus dolor quis rutrum.</div> --}}
            </div>  
            <div class="col-sm-4">
                <div class="name-text text-bold text-grey">@lang('lang.gallery')</div>
                <div class="row">
                    @foreach ($attractionDetails as $key => $val)
                    <div class="col-6">
                        <img src="{{ ($val->image != '')? asset('assets_frontend/images/'.$val->image) : asset('assets_frontend/images/1-place.jpg') }}" style="width:100%"
                            data-bs-toggle="modal" data-bs-target="#popup-img-head_{{ $val->id }}">
                    </div>
                    @endforeach
                </div>
                <!-- Modal -->
                <div class="modal fade" id="popup-img-head_{{ $val->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content popup-img">
                            <div class="modal-body">
                                <div class="clearfix mb-2">
                                    <div class="float-end">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                                <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false"
                                    data-bs-interval="false">
                                    <div class="carousel-inner">
                                        @foreach ($attractionDetails as $key => $val)
                                        @if ($key+1 >= 0 && $key+1 <= 1)
                                        <div class="carousel-item active">
                                            <img src="{{ ($val->image != '')? asset('assets_frontend/images/'.$val->image) : asset('assets_frontend/images/1-place.jpg') }}"
                                                class="d-block w-100" alt="...">
                                        </div>
                                        @endif
                                        @if ($key+1 >= 2)
                                        <div class="carousel-item">
                                            <img src="{{ ($val->image != '')? asset('assets_frontend/images/'.$val->image) : asset('assets_frontend/images/1-place.jpg') }}"
                                                class="d-block w-100" alt="...">
                                        </div> 
                                        @endif
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">@lang('lang.previous')</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">@lang('lang.next')</span>
                                    </button>
                                </div>
                                <div class="text-tiny text-grey text-end mt-1">@lang('lang.all_pictures') (2)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=""></div>
    </div>
    <div class="space-footer"></div>
    @include('frontend/inc_footer')
</body>

</html>