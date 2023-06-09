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
    @include('sweetalert')
    @include('frontend/inc_navbar')
    <div class="container">
        <div class="banner"> 
            <img src="{{ asset('frontend_assets/banner/'.$banner->banner_image) }}" class="banner-index">
        </div>
        <div class="clearfix">
            <div class="float-start">
                <div class="for-destop">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="bread" href="{{ url('/'.Session::get('lang')) }}">@lang('lang.home')</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $banner["head_".Session::get('lang')] }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="text-title text-bold text-grey">{{ $banner["head_".Session::get('lang')] }}</div>
            <div class="text-tiny text-grey my-3">
                {{ $banner["detail_".Session::get('lang')] }}
            </div>
            <div class="name-text my-3 text-bold text-grey">@lang('lang.accommodation_offer')</div>
            <div class="row">
                @foreach ($discountRoom as $key => $val)
                @php
                $image=DB::table('db_image_poolvilla')->where('poolvilla_id',$val->ref_poolvilla_id)->get();
                $checkin = date('d-m-Y');
                $checkout = date('d-m-Y', strtotime($checkin . ' +1 day'));
                $explode = explode("-",$checkin);
                $explode2 = explode("-",$checkout);
                $check_in = $explode[0].'-'.$explode[1].'-'.$explode[2];
                $check_out = $explode2[0].'-'.$explode2[1].'-'.$explode2[2];
                $a_from = 1;
                $k_from = 0;
                $ro = 1;
                @endphp
                <div class="col-sm-3 col-6">
                    <div class="mb-2">
                        <a href="{{ url(Session::get('lang').'/select-rooms/'.$val->ref_poolvilla_id.'/'.$check_in.'/'.$check_out.'/adult='.$a_from.'/kid='.$k_from.'/room='.$ro) }}">
                            <div class="box-save-red-image">
                                <div class="text-head-sale">{{ $val->discount }}%</div>
                                <p>@lang('lang.sale')</p>
                            </div>
                            <div class="img-cat-place">
                                @if (isset($image->image))
                                <img src="{{ asset(@$image->image) }}" class="img-des  pool" alt="...">
                                @else
                                <img src="{{asset('assets_frontend/images/recomment%20(3).jpg')}}" class="img-des  pool" alt="...">
                                @endif
                            </div>
                        </a>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-9">
                                    <a href="{{ url(Session::get('lang').'/select-rooms/'.$val->ref_poolvilla_id.'/'.$check_in.'/'.$check_out.'/adult='.$a_from.'/kid='.$k_from.'/room='.$ro) }}">
                                        <p class="name-text">{{ $val["poolvilla_".Session::get('lang')] }}</p>
                                    </a>
                                </div>
                                <div class="col-3 px-0">
                                    <div class="row no-gutter">
                                        <div class="col-4 px-2 ">
                                            <div class="star-rating">
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="small star-rating">{{ $val->star_rating }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-blue text-tiny"><i class="fas fa-map-marker-alt me-1"></i>{{ $val["province_".Session::get('lang')] }}  , {{ $val["district_".Session::get('lang')] }}</div>
                            <div class="text-green text-tiny">
                                <span class="text-bold me-1">FREE</span>Cancellation
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-auto">
                                    <?php
                                        $price = $val->price;
                                        $discount = $val->discount;
                                        $total = $price - ($price * ($discount / 100));
                                    ?>
                                    <p class="small text-orange">{{ number_format($total) }}฿ / @lang('lang.night')</p>
                                </div>
                            </div>
                            <div class="small text-light-grey" style="text-decoration: line-through;">@lang('lang.from_normal') {{ number_format($val->price) }}฿ </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="space-footer"></div>
    @include('frontend/inc_footer')
</body>

</html>