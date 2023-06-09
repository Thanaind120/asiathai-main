<!doctype html>
<html lang="th">

<head>
    <title>@lang('lang.poolvilla')</title>
    @include('frontend/inc_header')
    <link rel="stylesheet" href="{{ asset('assets_frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_frontend/css/owl.theme.default.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="{{ asset('assets_frontend/js/owl.carousel.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>
        .heighttext {
            height: 53px
        }
    </style>
</head>

<body>
    @include('frontend/inc_navbar')
    <?php
        if (isset($cin_from) || isset($cout_from)){
            $date1=strtr($cin_from, '/', '-');
            $date2=strtr($cout_from, '/', '-');
            $check_in=date("d-m-Y", strtotime($date1));
            $check_out=date("d-m-Y", strtotime($date2));
        }else{
            $checkin = date('d-m-Y');
            $checkout = date('d-m-Y', strtotime($checkin . ' +1 day'));
            $explode = explode("-",$checkin);
            $explode2 = explode("-",$checkout);
            $check_in = $explode[0].'-'.$explode[1].'-'.$explode[2];
            $check_out = $explode2[0].'-'.$explode2[1].'-'.$explode2[2];
            $a_from = 1;
            $k_from = 0;
            $ro = 1;
        }
    ?>
    <div class="bg-orange-light2">
        <form action="{{ url(Session::get('lang').'/select-hotel/search') }}" method="get" autocomplete="off">
            <div class="row g-1">
                <div class="col-lg-2 col-12">
                    <div class="autocomplete heighttext">
                        <input class="form-control emptytwo orange" type="text" id="iconified" name="province"
                            placeholder="&#xF002; @lang('lang.where_are_you_going')" aria-label="" value="">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="bg-white-form">
                        <div class="row g-0">
                            <div class="col-6">
                                <div class="line-check-in">
                                    <label class="top-text-form" for="check-in">@lang('lang.check_in')</label>
                                    <div class="row g-0">
                                        <div class="col-2 text-center text-orange">
                                            <i class="far fa-calendar check-calender"></i>
                                        </div>
                                        <div class="col-10">
                                            <input class="form-control orange-check check-in-out" id="datepicker"
                                                type="text" placeholder="@lang('lang.date')" name="ci"
                                                value="{{ $today }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="top-text-form" for="check-in">@lang('lang.check_out')</label>
                                <div class="row g-0">
                                    <div class="col-2 text-center text-orange">
                                        <i class="far fa-calendar check-calender"></i>
                                    </div>
                                    <div class="col-10">
                                        <input class="form-control orange-check check-in-out" id="datepicker2"
                                            type="text" placeholder="@lang('lang.date')" name="co"
                                            value="{{ $tomorrow }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="bg-white-form">
                        <label class="top-text-form" for="check-in">@lang('lang.guest')</label>
                        <div class="row g-0">
                            <div class="col-1 text-center text-orange">
                                <i class="fas fa-user check-calender"></i>
                            </div>
                            <div class="col-11">
                                <div class="row g-2">

                                    <div class="col-4">
                                        <div class="row g-2">
                                            <label for="inputPassword"
                                                class="col-4 text-tiny text-orange">@lang('lang.adult')</label>
                                            <div class="col-8 mt-0">
                                                <div class="input-group input-number">
                                                    <button class="btn sub" type="button" id="sub">-</button>
                                                    <input class="input-number border-0 text-center field"
                                                        placeholder="1" type="text" id="demoInput" name="adult"
                                                        value="1">
                                                    <button class="btn add" type="button" id="add">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row g-2">
                                            <label for="inputPassword"
                                                class="col-4 text-tiny text-orange">@lang('lang.kid')</label>
                                            <div class="col-8 mt-0">
                                                <div class="input-group input-number">
                                                    <button class="btn sub2" type="button" id="sub2">-</button>
                                                    <input class="input-number border-0 text-center field2"
                                                        placeholder="0" type="text" id="demoInput2" name="kid"
                                                        value="0">
                                                    <button class="btn add2" type="button" id="add2">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row g-2">
                                            <label for="inputPassword"
                                                class="col-4 text-tiny text-orange">@lang('lang.room')</label>
                                            <div class="col-8 mt-0">
                                                <div class="input-group input-number">
                                                    <button class="btn sub3" type="button" id="sub3">-</button>
                                                    <input class="input-number border-0 text-center field3"
                                                        placeholder="1" type="text" id="demoInput3" name="ro" value="1">
                                                    <button class="btn add3" type="button" id="add3">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-12">
                    <button type="submit" class="btn-search two">@lang('lang.search')</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container">
        <div class="clearfix mt-2">
            <div class="float-start">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="bread"
                                href="{{ url('/'.Session::get('lang')) }}">@lang('lang.home')</a></li>
                        <li class="breadcrumb-item"><a class="bread"
                                href="{{ url(Session::get('lang').'/category') }}">@lang('lang.category')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $_enjoywith->enjoy_name }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-3  none-mobile">
                <div class="filter-badge"><i class="fas fa-filter me-2"></i>@lang('lang.filter')</div>
                <div class="mt-4">
                    <div class="vl-filter">
                        <div class="dropdown ">
                            <button class="dropdown-toggle btn-category text-filter" type="button"
                                data-toggle="dropdown"><i class="fas fa-globe-asia me-2"></i>@lang('lang.province')
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <form id="formProvince">
                                    @if(isset($enjoy_id))
                                    <input type="hidden" name="id" value="{{ $enjoy_id }}">
                                    @else
                                    <input type="hidden" name="id" value="">
                                    @endif
                                    <select class="js-example-basic-single" style="width: 100%" id="province"
                                        name="province">
                                        <option value="">@lang('lang.please_select')</option>
                                        @foreach ($provinces as $key => $val)
                                        @if(isset($c_from))
                                        <option value="{{ $val["name_".Session::get('lang')] }}"
                                            {{ ($c_from == $val["name_".Session::get('lang')]) ? 'selected' : '' }}>
                                            {{ $val["name_".Session::get('lang')] }}</option>
                                        @else
                                        <option value="{{ $val["name_".Session::get('lang')] }}">
                                            {{ $val["name_".Session::get('lang')] }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @if(isset($lower_from))
                                    <input type="hidden" name="lower" value="{{ $lower_from }}">
                                    @else
                                    <input type="hidden" name="lower" value="">
                                    @endif
                                    @if(isset($upper_from))
                                    <input type="hidden" name="upper" value="{{ $upper_from }}">
                                    @else
                                    <input type="hidden" name="upper" value="">
                                    @endif
                                    @if(isset($sfive_from))
                                    <input type="hidden" name="sfive" value="{{ $sfive_from }}">
                                    @else
                                    <input type="hidden" name="sfive" value="">
                                    @endif
                                    @if(isset($sfour_from))
                                    <input type="hidden" name="sfour" value="{{ $sfour_from }}">
                                    @else
                                    <input type="hidden" name="sfour" value="">
                                    @endif
                                    @if(isset($sthree_from))
                                    <input type="hidden" name="sthree" value="{{ $sthree_from }}">
                                    @else
                                    <input type="hidden" name="sthree" value="">
                                    @endif
                                    @if(isset($stwo_from))
                                    <input type="hidden" name="stwo" value="{{ $stwo_from }}">
                                    @else
                                    <input type="hidden" name="stwo" value="">
                                    @endif
                                    @if(isset($sone_from))
                                    <input type="hidden" name="sone" value="{{ $sone_from }}">
                                    @else
                                    <input type="hidden" name="sone" value="">
                                    @endif
                                    @if(isset($szero_from))
                                    <input type="hidden" name="szero" value="{{ $szero_from }}">
                                    @else
                                    <input type="hidden" name="szero" value="">
                                    @endif
                                    @if(isset($paymentone_from) == '1')
                                    <input type="hidden" name="paymentone" value="{{ $paymentone_from }}">
                                    @else
                                    <input type="hidden" name="paymentone" value="">
                                    @endif
                                    @if(isset($paymenttwo_from) == '1')
                                    <input type="hidden" name="paymenttwo" value="{{ $paymenttwo_from }}">
                                    @else
                                    <input type="hidden" name="paymenttwo" value="">
                                    @endif
                                    @if(isset($paymentthree_from) == '1')
                                    <input type="hidden" name="paymentthree" value="{{ $paymentthree_from }}">
                                    @else
                                    <input type="hidden" name="paymentthree" value="">
                                    @endif
                                    @if(isset($paymentfour_from) == '1')
                                    <input type="hidden" name="paymentfour" value="{{ $paymentfour_from }}">
                                    @else
                                    <input type="hidden" name="paymentfour" value="">
                                    @endif
                                    @if(isset($paymentfive_from) == '1')
                                    <input type="hidden" name="paymentfive" value="{{ $paymentfive_from }}">
                                    @else
                                    <input type="hidden" name="paymentfive" value="">
                                    @endif
                                    @if(isset($disone_from))
                                    <input type="hidden" name="disone" value="{{ $disone_from }}">
                                    @else
                                    <input type="hidden" name="disone" value="">
                                    @endif
                                    @if(isset($distwo_from))
                                    <input type="hidden" name="distwo" value="{{ $distwo_from }}">
                                    @else
                                    <input type="hidden" name="distwo" value="">
                                    @endif
                                    @if(isset($disthree_from))
                                    <input type="hidden" name="disthree" value="{{ $disthree_from }}">
                                    @else
                                    <input type="hidden" name="disthree" value="">
                                    @endif
                                    @if(isset($disfour_from))
                                    <input type="hidden" name="disfour" value="{{ $disfour_from }}">
                                    @else
                                    <input type="hidden" name="disfour" value="">
                                    @endif
                                    @if(isset($disfive_from))
                                    <input type="hidden" name="disfive" value="{{ $disfive_from }}">
                                    @else
                                    <input type="hidden" name="disfive" value="">
                                    @endif
                                </form>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div class="vl-filter">
                            <div class="text-orange text-filter"><i class="fas fa-tag me-2"></i>@lang('lang.budget')
                            </div>
                            <div class="ms-4">
                                <div class="text-bold text-title-filter text-grey">@lang('lang.price_per_night')</div>
                                <div class="">
                                    <fieldset class="filter-price">
                                        <div class="price-field">
                                            <form id="formRange">
                                                @if(isset($enjoy_id))
                                                <input type="hidden" name="id" value="{{ $enjoy_id }}">
                                                @else
                                                <input type="hidden" name="id" value="">
                                                @endif
                                                @if(isset($c_from))
                                                <input type="hidden" name="province" value="{{ $c_from }}">
                                                @else
                                                <input type="hidden" name="province" value="">
                                                @endif
                                                @if(isset($lower_from))
                                                <input type="range" min="0" max="10000" value="{{ $lower_from }}"
                                                    id="lower" name="lower" onchange="changeRange(this.value)">
                                                @else
                                                <input type="range" min="0" max="10000" value="0" id="lower"
                                                    name="lower" onchange="changeRange(this.value)">
                                                @endif
                                                @if(isset($upper_from))
                                                <input type="range" min="100" max="10000" value="{{ $upper_from }}"
                                                    id="upper" name="upper" onchange="changeRange(this.value)">
                                                @else
                                                <input type="range" min="100" max="10000" value="10000" id="upper"
                                                    name="upper" onchange="changeRange(this.value)">
                                                @endif
                                                @if(isset($sfive_from))
                                                <input type="hidden" name="sfive" value="{{ $sfive_from }}">
                                                @else
                                                <input type="hidden" name="sfive" value="">
                                                @endif
                                                @if(isset($sfour_from))
                                                <input type="hidden" name="sfour" value="{{ $sfour_from }}">
                                                @else
                                                <input type="hidden" name="sfour" value="">
                                                @endif
                                                @if(isset($sthree_from))
                                                <input type="hidden" name="sthree" value="{{ $sthree_from }}">
                                                @else
                                                <input type="hidden" name="sthree" value="">
                                                @endif
                                                @if(isset($stwo_from))
                                                <input type="hidden" name="stwo" value="{{ $stwo_from }}">
                                                @else
                                                <input type="hidden" name="stwo" value="">
                                                @endif
                                                @if(isset($sone_from))
                                                <input type="hidden" name="sone" value="{{ $sone_from }}">
                                                @else
                                                <input type="hidden" name="sone" value="">
                                                @endif
                                                @if(isset($szero_from))
                                                <input type="hidden" name="szero" value="{{ $szero_from }}">
                                                @else
                                                <input type="hidden" name="szero" value="">
                                                @endif
                                                @if(isset($paymentone_from) == '1')
                                                <input type="hidden" name="paymentone" value="{{ $paymentone_from }}">
                                                @else
                                                <input type="hidden" name="paymentone" value="">
                                                @endif
                                                @if(isset($paymenttwo_from) == '1')
                                                <input type="hidden" name="paymenttwo" value="{{ $paymenttwo_from }}">
                                                @else
                                                <input type="hidden" name="paymenttwo" value="">
                                                @endif
                                                @if(isset($paymentthree_from) == '1')
                                                <input type="hidden" name="paymentthree" value="{{ $paymentthree_from }}">
                                                @else
                                                <input type="hidden" name="paymentthree" value="">
                                                @endif
                                                @if(isset($paymentfour_from) == '1')
                                                <input type="hidden" name="paymentfour" value="{{ $paymentfour_from }}">
                                                @else
                                                <input type="hidden" name="paymentfour" value="">
                                                @endif
                                                @if(isset($paymentfive_from) == '1')
                                                <input type="hidden" name="paymentfive" value="{{ $paymentfive_from }}">
                                                @else
                                                <input type="hidden" name="paymentfive" value="">
                                                @endif
                                                @if(isset($disone_from))
                                                <input type="hidden" name="disone" value="{{ $disone_from }}">
                                                @else
                                                <input type="hidden" name="disone" value="">
                                                @endif
                                                @if(isset($distwo_from))
                                                <input type="hidden" name="distwo" value="{{ $distwo_from }}">
                                                @else
                                                <input type="hidden" name="distwo" value="">
                                                @endif
                                                @if(isset($disthree_from))
                                                <input type="hidden" name="disthree" value="{{ $disthree_from }}">
                                                @else
                                                <input type="hidden" name="disthree" value="">
                                                @endif
                                                @if(isset($disfour_from))
                                                <input type="hidden" name="disfour" value="{{ $disfour_from }}">
                                                @else
                                                <input type="hidden" name="disfour" value="">
                                                @endif
                                                @if(isset($disfive_from))
                                                <input type="hidden" name="disfive" value="{{ $disfive_from }}">
                                                @else
                                                <input type="hidden" name="disfive" value="">
                                                @endif
                                            </form>
                                        </div>
                                        <div class="price-wrap">
                                            <div class="price-container">
                                                <div class="price-wrap-1">
                                                    <input id="one">
                                                </div>
                                            </div>
                                            <div class="price-container">
                                                <div class="price-wrap-2">
                                                    <input id="two">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="vl-filter">
                            <div class="text-orange text-filter"><i
                                    class="fas fa-star me-2"></i>@lang('lang.stars_rating')</div>
                            <div class="ms-4 mt-2">
                                <form id="formStars">
                                    @if(isset($enjoy_id))
                                    <input type="hidden" name="id" value="{{ $enjoy_id }}">
                                    @else
                                    <input type="hidden" name="id" value="">
                                    @endif
                                    @if(isset($c_from))
                                    <input type="hidden" name="province" value="{{ $c_from }}">
                                    @else
                                    <input type="hidden" name="province" value="">
                                    @endif
                                    @if(isset($lower_from))
                                    <input type="hidden" name="lower" value="{{ $lower_from }}">
                                    @else
                                    <input type="hidden" name="lower" value="">
                                    @endif
                                    @if(isset($upper_from))
                                    <input type="hidden" name="upper" value="{{ $upper_from }}">
                                    @else
                                    <input type="hidden" name="upper" value="">
                                    @endif
                                    @if(isset($sfive_from))
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sfive" name="sfive"
                                            onclick="clickStars(this.value)" value="{{ $sfive_from }}"
                                            checked="checked">
                                        <label class="form-check-label" for="flexCheckChecked1">
                                            <i class="fas fa-star text-orange text-medium"></i>
                                            <i class="fas fa-star text-orange text-medium"></i>
                                            <i class="fas fa-star text-orange text-medium"></i>
                                            <i class="fas fa-star text-orange text-medium"></i>
                                            <i class="fas fa-star text-orange text-medium"></i>
                                        </label>
                                    </div>
                                    @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sfive" name="sfive"
                                            onclick="clickStars(this.value)" value="5">
                                        <label class="form-check-label" for="flexCheckChecked1">
                                            <i class="fas fa-star text-orange text-medium"></i>
                                            <i class="fas fa-star text-orange text-medium"></i>
                                            <i class="fas fa-star text-orange text-medium"></i>
                                            <i class="fas fa-star text-orange text-medium"></i>
                                            <i class="fas fa-star text-orange text-medium"></i>
                                        </label>
                                    </div>
                                    @endif
                                    @if (isset($sfour_from))
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sfour" name="sfour"
                                            onclick="clickStars(this.value)" value="{{ $sfour_from }}"
                                            checked="checked">
                                        <label class="form-check-label" for="flexCheckChecked2">
                                            <i class="fas fa-star text-orange text-medium"></i>
                                            <i class="fas fa-star text-orange text-medium"></i>
                                            <i class="fas fa-star text-orange text-medium"></i>
                                            <i class="fas fa-star text-orange text-medium"></i>
                                        </label>
                                    </div>
                                    @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sfour" name="sfour"
                                            onclick="clickStars(this.value)" value="4">
                                        <label class="form-check-label" for="flexCheckChecked2">
                                            <i class="fas fa-star text-orange text-medium"></i>
                                            <i class="fas fa-star text-orange text-medium"></i>
                                            <i class="fas fa-star text-orange text-medium"></i>
                                            <i class="fas fa-star text-orange text-medium"></i>
                                        </label>
                                    </div>
                                    @endif
                                    @if (isset($sthree_from))
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sthree" name="sthree"
                                            onclick="clickStars(this.value)" value="{{ $sthree_from }}"
                                            checked="checked">
                                        <label class="form-check-label" for="flexCheckChecked3">
                                            <i class="fas fa-star text-orange text-medium"></i>
                                            <i class="fas fa-star text-orange text-medium"></i>
                                            <i class="fas fa-star text-orange text-medium"></i>
                                        </label>
                                    </div>
                                    @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sthree" name="sthree"
                                            onclick="clickStars(this.value)" value="3">
                                        <label class="form-check-label" for="flexCheckChecked3">
                                            <i class="fas fa-star text-orange text-medium"></i>
                                            <i class="fas fa-star text-orange text-medium"></i>
                                            <i class="fas fa-star text-orange text-medium"></i>
                                        </label>
                                    </div>
                                    @endif
                                    @if (isset($stwo_from))
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="stwo" name="stwo"
                                            onclick="clickStars(this.value)" value="{{ $stwo_from }}" checked="checked">
                                        <label class="form-check-label" for="flexCheckChecked4">
                                            <i class="fas fa-star text-orange text-medium"></i>
                                            <i class="fas fa-star text-orange text-medium"></i>
                                        </label>
                                    </div>
                                    @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="stwo" name="stwo"
                                            onclick="clickStars(this.value)" value="2">
                                        <label class="form-check-label" for="flexCheckChecked4">
                                            <i class="fas fa-star text-orange text-medium"></i>
                                            <i class="fas fa-star text-orange text-medium"></i>
                                        </label>
                                    </div>
                                    @endif
                                    @if (isset($sone_from))
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sone" name="sone"
                                            onclick="clickStars(this.value)" value="{{ $sone_from }}" checked="checked">
                                        <label class="form-check-label" for="flexCheckChecked5">
                                            <i class="fas fa-star text-orange text-medium"></i>
                                        </label>
                                    </div>
                                    @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sone" name="sone"
                                            onclick="clickStars(this.value)" value="1">
                                        <label class="form-check-label" for="flexCheckChecked5">
                                            <i class="fas fa-star text-orange text-medium"></i>
                                        </label>
                                    </div>
                                    @endif
                                    @if (isset($szero_from))
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="szero" name="szero"
                                            onclick="clickStars(this.value)" value="{{ $szero_from }}"
                                            checked="checked">
                                        <label class="form-check-label text-grey text-medium" for="flexCheckChecked5">
                                            @lang('lang.no_rating')
                                        </label>
                                    </div>
                                    @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="szero" name="szero"
                                            onclick="clickStars(this.value)" value="0">
                                        <label class="form-check-label text-grey text-medium" for="flexCheckChecked5">
                                            @lang('lang.no_rating')
                                        </label>
                                    </div>
                                    @endif
                                    @if(isset($paymentone_from) == '1')
                                    <input type="hidden" name="paymentone" value="{{ $paymentone_from }}">
                                    @else
                                    <input type="hidden" name="paymentone" value="">
                                    @endif
                                    @if(isset($paymenttwo_from) == '1')
                                    <input type="hidden" name="paymenttwo" value="{{ $paymenttwo_from }}">
                                    @else
                                    <input type="hidden" name="paymenttwo" value="">
                                    @endif
                                    @if(isset($paymentthree_from) == '1')
                                    <input type="hidden" name="paymentthree" value="{{ $paymentthree_from }}">
                                    @else
                                    <input type="hidden" name="paymentthree" value="">
                                    @endif
                                    @if(isset($paymentfour_from) == '1')
                                    <input type="hidden" name="paymentfour" value="{{ $paymentfour_from }}">
                                    @else
                                    <input type="hidden" name="paymentfour" value="">
                                    @endif
                                    @if(isset($paymentfive_from) == '1')
                                    <input type="hidden" name="paymentfive" value="{{ $paymentfive_from }}">
                                    @else
                                    <input type="hidden" name="paymentfive" value="">
                                    @endif
                                    @if(isset($disone_from))
                                    <input type="hidden" name="disone" value="{{ $disone_from }}">
                                    @else
                                    <input type="hidden" name="disone" value="">
                                    @endif
                                    @if(isset($distwo_from))
                                    <input type="hidden" name="distwo" value="{{ $distwo_from }}">
                                    @else
                                    <input type="hidden" name="distwo" value="">
                                    @endif
                                    @if(isset($disthree_from))
                                    <input type="hidden" name="disthree" value="{{ $disthree_from }}">
                                    @else
                                    <input type="hidden" name="disthree" value="">
                                    @endif
                                    @if(isset($disfour_from))
                                    <input type="hidden" name="disfour" value="{{ $disfour_from }}">
                                    @else
                                    <input type="hidden" name="disfour" value="">
                                    @endif
                                    @if(isset($disfive_from))
                                    <input type="hidden" name="disfive" value="{{ $disfive_from }}">
                                    @else
                                    <input type="hidden" name="disfive" value="">
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="vl-filter">
                            <div class="text-orange text-filter"><i
                                    class="fas fa-gem me-2"></i>@lang('lang.payment_options')</div>
                            <div class="ms-4 mt-2">
                                <form id="formPayment">
                                    @if(isset($enjoy_id))
                                    <input type="hidden" name="id" value="{{ $enjoy_id }}">
                                    @else
                                    <input type="hidden" name="id" value="">
                                    @endif
                                    @if(isset($c_from))
                                    <input type="hidden" name="province" value="{{ $c_from }}">
                                    @else
                                    <input type="hidden" name="province" value="">
                                    @endif
                                    @if(isset($lower_from))
                                    <input type="hidden" name="lower" value="{{ $lower_from }}">
                                    @else
                                    <input type="hidden" name="lower" value="">
                                    @endif
                                    @if(isset($upper_from))
                                    <input type="hidden" name="upper" value="{{ $upper_from }}">
                                    @else
                                    <input type="hidden" name="upper" value="">
                                    @endif
                                    @if(isset($sfive_from))
                                    <input type="hidden" name="sfive" value="{{ $sfive_from }}">
                                    @else
                                    <input type="hidden" name="sfive" value="">
                                    @endif
                                    @if(isset($sfour_from))
                                    <input type="hidden" name="sfour" value="{{ $sfour_from }}">
                                    @else
                                    <input type="hidden" name="sfour" value="">
                                    @endif
                                    @if(isset($sthree_from))
                                    <input type="hidden" name="sthree" value="{{ $sthree_from }}">
                                    @else
                                    <input type="hidden" name="sthree" value="">
                                    @endif
                                    @if(isset($stwo_from))
                                    <input type="hidden" name="stwo" value="{{ $stwo_from }}">
                                    @else
                                    <input type="hidden" name="stwo" value="">
                                    @endif
                                    @if(isset($sone_from))
                                    <input type="hidden" name="sone" value="{{ $sone_from }}">
                                    @else
                                    <input type="hidden" name="sone" value="">
                                    @endif
                                    @if(isset($szero_from))
                                    <input type="hidden" name="szero" value="{{ $szero_from }}">
                                    @else
                                    <input type="hidden" name="szero" value="">
                                    @endif
                                    @if (isset($paymentone_from) == '1')
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="paymentone"
                                            name="paymentone" onclick="clickPayment(this.value)"
                                            value="{{ $paymentone_from }}" checked="checked">
                                        <label class="form-check-label text-grey text-medium"
                                            for="flexCheckChecked1">@lang('lang.free_cancellation')
                                        </label>
                                    </div>
                                    @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="paymentone"
                                            name="paymentone" onclick="clickPayment(this.value)" value="1">
                                        <label class="form-check-label text-grey text-medium"
                                            for="flexCheckChecked1">@lang('lang.free_cancellation')
                                        </label>
                                    </div>
                                    @endif
                                    @if (isset($paymenttwo_from) == '1')
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            onclick="clickPayment(this.value)" name="paymenttwo"
                                            value="{{ $paymenttwo_from }}" id="paymenttwo" checked="checked">
                                        <label class="form-check-label text-grey text-medium"
                                            for="flexCheckChecked2">@lang('lang.book_nowandpay_later')
                                        </label>
                                    </div>
                                    @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            onclick="clickPayment(this.value)" name="paymenttwo" value="1"
                                            id="paymenttwo">
                                        <label class="form-check-label text-grey text-medium"
                                            for="flexCheckChecked2">@lang('lang.book_nowandpay_later')
                                        </label>
                                    </div>
                                    @endif
                                    @if (isset($paymentthree_from) == '1')
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            onclick="clickPayment(this.value)" name="paymentthree"
                                            value="{{ $paymentthree_from }}" id="paymentthree" checked="checked">
                                        <label class="form-check-label text-grey text-medium"
                                            for="flexCheckChecked3">@lang('lang.pay_at_hotel')
                                        </label>
                                    </div>
                                    @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            onclick="clickPayment(this.value)" name="paymentthree" value="1"
                                            id="paymentthree">
                                        <label class="form-check-label text-grey text-medium"
                                            for="flexCheckChecked3">@lang('lang.pay_at_hotel')
                                        </label>
                                    </div>
                                    @endif
                                    @if (isset($paymentfour_from) == '1')
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            onclick="clickPayment(this.value)" name="paymentfour"
                                            value="{{ $paymentfour_from }}" id="paymentfour" checked="checked">
                                        <label class="form-check-label  text-grey text-medium"
                                            for="flexCheckChecked4">@lang('lang.pay_Now')
                                        </label>
                                    </div>
                                    @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            onclick="clickPayment(this.value)" name="paymentfour" value="1"
                                            id="paymentfour">
                                        <label class="form-check-label  text-grey text-medium"
                                            for="flexCheckChecked4">@lang('lang.pay_Now')
                                        </label>
                                    </div>
                                    @endif
                                    @if (isset($paymentfive_from) == '1')
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            onclick="clickPayment(this.value)" name="paymentfive"
                                            value="{{ $paymentfive_from }}" id="paymentfive" checked="checked">
                                        <label class="form-check-label  text-grey text-medium"
                                            for="flexCheckChecked5">@lang('lang.book_without_credit_card')
                                        </label>
                                    </div>
                                    @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            onclick="clickPayment(this.value)" name="paymentfive" value="1"
                                            id="paymentfive">
                                        <label class="form-check-label  text-grey text-medium"
                                            for="flexCheckChecked5">@lang('lang.book_without_credit_card')
                                        </label>
                                    </div>
                                    @endif
                                    @if(isset($disone_from))
                                    <input type="hidden" name="disone" value="{{ $disone_from }}">
                                    @else
                                    <input type="hidden" name="disone" value="">
                                    @endif
                                    @if(isset($distwo_from))
                                    <input type="hidden" name="distwo" value="{{ $distwo_from }}">
                                    @else
                                    <input type="hidden" name="distwo" value="">
                                    @endif
                                    @if(isset($disthree_from))
                                    <input type="hidden" name="disthree" value="{{ $disthree_from }}">
                                    @else
                                    <input type="hidden" name="disthree" value="">
                                    @endif
                                    @if(isset($disfour_from))
                                    <input type="hidden" name="disfour" value="{{ $disfour_from }}">
                                    @else
                                    <input type="hidden" name="disfour" value="">
                                    @endif
                                    @if(isset($disfive_from))
                                    <input type="hidden" name="disfive" value="{{ $disfive_from }}">
                                    @else
                                    <input type="hidden" name="disfive" value="">
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="vl-filter">
                            <div class="text-orange text-filter"><i
                                    class="fas fa-map-pin me-2"></i>@lang('lang.distance_to_center')
                            </div>
                            <div class="ms-4 mt-2">
                                <form id="formDistance">
                                    @if(isset($enjoy_id))
                                    <input type="hidden" name="id" value="{{ $enjoy_id }}">
                                    @else
                                    <input type="hidden" name="id" value="">
                                    @endif
                                    @if(isset($c_from))
                                    <input type="hidden" name="province" value="{{ $c_from }}">
                                    @else
                                    <input type="hidden" name="province" value="">
                                    @endif
                                    @if(isset($lower_from))
                                    <input type="hidden" name="lower" value="{{ $lower_from }}">
                                    @else
                                    <input type="hidden" name="lower" value="">
                                    @endif
                                    @if(isset($upper_from))
                                    <input type="hidden" name="upper" value="{{ $upper_from }}">
                                    @else
                                    <input type="hidden" name="upper" value="">
                                    @endif
                                    @if(isset($sfive_from))
                                    <input type="hidden" name="sfive" value="{{ $sfive_from }}">
                                    @else
                                    <input type="hidden" name="sfive" value="">
                                    @endif
                                    @if(isset($sfour_from))
                                    <input type="hidden" name="sfour" value="{{ $sfour_from }}">
                                    @else
                                    <input type="hidden" name="sfour" value="">
                                    @endif
                                    @if(isset($sthree_from))
                                    <input type="hidden" name="sthree" value="{{ $sthree_from }}">
                                    @else
                                    <input type="hidden" name="sthree" value="">
                                    @endif
                                    @if(isset($stwo_from))
                                    <input type="hidden" name="stwo" value="{{ $stwo_from }}">
                                    @else
                                    <input type="hidden" name="stwo" value="">
                                    @endif
                                    @if(isset($sone_from))
                                    <input type="hidden" name="sone" value="{{ $sone_from }}">
                                    @else
                                    <input type="hidden" name="sone" value="">
                                    @endif
                                    @if(isset($szero_from))
                                    <input type="hidden" name="szero" value="{{ $szero_from }}">
                                    @else
                                    <input type="hidden" name="szero" value="">
                                    @endif
                                    @if(isset($paymentone_from) == '1')
                                    <input type="hidden" name="paymentone" value="{{ $paymentone_from }}">
                                    @else
                                    <input type="hidden" name="paymentone" value="">
                                    @endif
                                    @if(isset($paymenttwo_from) == '1')
                                    <input type="hidden" name="paymenttwo" value="{{ $paymenttwo_from }}">
                                    @else
                                    <input type="hidden" name="paymenttwo" value="">
                                    @endif
                                    @if(isset($paymentthree_from) == '1')
                                    <input type="hidden" name="paymentthree" value="{{ $paymentthree_from }}">
                                    @else
                                    <input type="hidden" name="paymentthree" value="">
                                    @endif
                                    @if(isset($paymentfour_from) == '1')
                                    <input type="hidden" name="paymentfour" value="{{ $paymentfour_from }}">
                                    @else
                                    <input type="hidden" name="paymentfour" value="">
                                    @endif
                                    @if(isset($paymentfive_from) == '1')
                                    <input type="hidden" name="paymentfive" value="{{ $paymentfive_from }}">
                                    @else
                                    <input type="hidden" name="paymentfive" value="">
                                    @endif
                                    @if(isset($disone_from))
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" onclick="clickDistance(this.value)" value="{{ $disone_from }}" id="disone" name="disone" checked="checked">
                                        <label class="form-check-label text-grey text-medium"
                                            for="flexCheckChecked1">@lang('lang.inside_city_center')
                                        </label>
                                    </div>
                                    @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" onclick="clickDistance(this.value)" value="1" id="disone" name="disone">
                                        <label class="form-check-label text-grey text-medium"
                                            for="flexCheckChecked1">@lang('lang.inside_city_center')
                                        </label>
                                    </div>
                                    @endif
                                    @if(isset($distwo_from))
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" onclick="clickDistance(this.value)" value="{{ $distwo_from }}" id="distwo" name="distwo" checked="checked">
                                        <label class="form-check-label text-grey text-medium" for="flexCheckChecked2"><i
                                                class="fas fa-chevron-left me-1"></i>@lang('lang.2km_to_center')
                                        </label>
                                    </div>
                                    @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" onclick="clickDistance(this.value)" value="2" id="distwo" name="distwo">
                                        <label class="form-check-label text-grey text-medium" for="flexCheckChecked2"><i
                                                class="fas fa-chevron-left me-1"></i>@lang('lang.2km_to_center')
                                        </label>
                                    </div>
                                    @endif
                                    @if(isset($disthree_from))
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" onclick="clickDistance(this.value)" value="{{ $disthree_from }}" id="disthree" name="disthree" checked="checked">
                                        <label class="form-check-label text-grey text-medium"
                                            for="flexCheckChecked3">@lang('lang.2to5km_to_center')
                                        </label>
                                    </div>
                                    @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" onclick="clickDistance(this.value)" value="3" id="disthree" name="disthree">
                                        <label class="form-check-label text-grey text-medium"
                                            for="flexCheckChecked3">@lang('lang.2to5km_to_center')
                                        </label>
                                    </div>
                                    @endif
                                    @if(isset($disfour_from))
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" onclick="clickDistance(this.value)" value="{{ $disfour_from }}" id="disfour" name="disfour" checked="checked">
                                        <label class="form-check-label  text-grey text-medium"
                                            for="flexCheckChecked4">@lang('lang.5to10km_to_center')
                                        </label>
                                    </div>
                                    @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" onclick="clickDistance(this.value)" value="4" id="disfour" name="disfour">
                                        <label class="form-check-label  text-grey text-medium"
                                            for="flexCheckChecked4">@lang('lang.5to10km_to_center')
                                        </label>
                                    </div>
                                    @endif
                                    @if(isset($disfive_from))
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" onclick="clickDistance(this.value)" value="{{ $disfive_from }}" id="disfive" name="disfive" checked="checked">
                                        <label class="form-check-label  text-grey text-medium" for="flexCheckChecked5"><i
                                                class="fas fa-chevron-right me-1"></i>@lang('lang.5km_to_center')
                                        </label>
                                    </div>
                                    @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" onclick="clickDistance(this.value)" value="5" id="disfive" name="disfive">
                                        <label class="form-check-label  text-grey text-medium" for="flexCheckChecked5"><i
                                                class="fas fa-chevron-right me-1"></i>@lang('lang.5km_to_center')
                                        </label>
                                    </div>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="head-text-index">@lang('lang.enjoy_with') *{{ $_enjoywith->enjoy_name }}*</div>
                <div class="line-bottom-head-text"></div>
                <div class="clearfix mb-3">
                    <div class="for-mobile">
                        <div class="float-start">
                            <button type="button" class="filter-badge" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"><i
                                    class="fas fa-filter me-2"></i>@lang('lang.filter')</button>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">@lang('lang.filters')</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="vl-filter">
                                            <div class="dropdown ">
                                                <button class="dropdown-toggle btn-category text-filter" type="button"
                                                    data-toggle="dropdown"><i
                                                        class="fas fa-globe-asia me-2"></i>@lang('lang.province')
                                                    <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <form id="formProvince">
                                                        @if(isset($enjoy_id))
                                                        <input type="hidden" name="id" value="{{ $enjoy_id }}">
                                                        @else
                                                        <input type="hidden" name="id" value="">
                                                        @endif
                                                        <select class="js-example-basic-single" style="width: 100%"
                                                            id="province" name="province">
                                                            <option value="">@lang('lang.please_select')</option>
                                                            @foreach ($provinces as $key => $val)
                                                            @if(isset($c_from))
                                                            <option value="{{ $val["name_".Session::get('lang')] }}"
                                                                {{ ($c_from == $val["name_".Session::get('lang')]) ? 'selected' : '' }}>
                                                                {{ $val["name_".Session::get('lang')] }}</option>
                                                            @else
                                                            <option value="{{ $val["name_".Session::get('lang')] }}">
                                                                {{ $val["name_".Session::get('lang')] }}</option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                        @if(isset($lower_from))
                                                        <input type="hidden" name="lower" value="{{ $lower_from }}">
                                                        @else
                                                        <input type="hidden" name="lower" value="">
                                                        @endif
                                                        @if(isset($upper_from))
                                                        <input type="hidden" name="upper" value="{{ $upper_from }}">
                                                        @else
                                                        <input type="hidden" name="upper" value="">
                                                        @endif
                                                        @if(isset($sfive_from))
                                                        <input type="hidden" name="sfive" value="{{ $sfive_from }}">
                                                        @else
                                                        <input type="hidden" name="sfive" value="">
                                                        @endif
                                                        @if(isset($sfour_from))
                                                        <input type="hidden" name="sfour" value="{{ $sfour_from }}">
                                                        @else
                                                        <input type="hidden" name="sfour" value="">
                                                        @endif
                                                        @if(isset($sthree_from))
                                                        <input type="hidden" name="sthree" value="{{ $sthree_from }}">
                                                        @else
                                                        <input type="hidden" name="sthree" value="">
                                                        @endif
                                                        @if(isset($stwo_from))
                                                        <input type="hidden" name="stwo" value="{{ $stwo_from }}">
                                                        @else
                                                        <input type="hidden" name="stwo" value="">
                                                        @endif
                                                        @if(isset($sone_from))
                                                        <input type="hidden" name="sone" value="{{ $sone_from }}">
                                                        @else
                                                        <input type="hidden" name="sone" value="">
                                                        @endif
                                                        @if(isset($szero_from))
                                                        <input type="hidden" name="szero" value="{{ $szero_from }}">
                                                        @else
                                                        <input type="hidden" name="szero" value="">
                                                        @endif
                                                        @if(isset($paymentone_from) == '1')
                                                        <input type="hidden" name="paymentone" value="{{ $paymentone_from }}">
                                                        @else
                                                        <input type="hidden" name="paymentone" value="">
                                                        @endif
                                                        @if(isset($paymenttwo_from) == '1')
                                                        <input type="hidden" name="paymenttwo" value="{{ $paymenttwo_from }}">
                                                        @else
                                                        <input type="hidden" name="paymenttwo" value="">
                                                        @endif
                                                        @if(isset($paymentthree_from) == '1')
                                                        <input type="hidden" name="paymentthree" value="{{ $paymentthree_from }}">
                                                        @else
                                                        <input type="hidden" name="paymentthree" value="">
                                                        @endif
                                                        @if(isset($paymentfour_from) == '1')
                                                        <input type="hidden" name="paymentfour" value="{{ $paymentfour_from }}">
                                                        @else
                                                        <input type="hidden" name="paymentfour" value="">
                                                        @endif
                                                        @if(isset($paymentfive_from) == '1')
                                                        <input type="hidden" name="paymentfive" value="{{ $paymentfive_from }}">
                                                        @else
                                                        <input type="hidden" name="paymentfive" value="">
                                                        @endif
                                                        @if(isset($disone_from))
                                                        <input type="hidden" name="disone" value="{{ $disone_from }}">
                                                        @else
                                                        <input type="hidden" name="disone" value="">
                                                        @endif
                                                        @if(isset($distwo_from))
                                                        <input type="hidden" name="distwo" value="{{ $distwo_from }}">
                                                        @else
                                                        <input type="hidden" name="distwo" value="">
                                                        @endif
                                                        @if(isset($disthree_from))
                                                        <input type="hidden" name="disthree" value="{{ $disthree_from }}">
                                                        @else
                                                        <input type="hidden" name="disthree" value="">
                                                        @endif
                                                        @if(isset($disfour_from))
                                                        <input type="hidden" name="disfour" value="{{ $disfour_from }}">
                                                        @else
                                                        <input type="hidden" name="disfour" value="">
                                                        @endif
                                                        @if(isset($disfive_from))
                                                        <input type="hidden" name="disfive" value="{{ $disfive_from }}">
                                                        @else
                                                        <input type="hidden" name="disfive" value="">
                                                        @endif
                                                    </form>
                                                </ul>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="vl-filter">
                                                <div class="text-orange text-filter"><i
                                                        class="fas fa-tag me-2"></i>@lang('lang.budget')</div>
                                                <div class="ms-4">
                                                    <div class="text-bold text-title-filter text-grey">
                                                        @lang('lang.price_per_night')
                                                    </div>
                                                    <div class="">
                                                        <fieldset class="filter-price">
                                                            <div class="price-field">
                                                                <form id="formRange">
                                                                    @if(isset($enjoy_id))
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $enjoy_id }}">
                                                                    @else
                                                                    <input type="hidden" name="id" value="">
                                                                    @endif
                                                                    @if(isset($c_from))
                                                                    <input type="hidden" name="province"
                                                                        value="{{ $c_from }}">
                                                                    @else
                                                                    <input type="hidden" name="province" value="">
                                                                    @endif
                                                                    @if(isset($lower_from))
                                                                    <input type="range" min="0" max="10000"
                                                                        value="{{ $lower_from }}" id="lower"
                                                                        name="lower" onchange="changeRange(this.value)">
                                                                    @else
                                                                    <input type="range" min="0" max="10000" value="0"
                                                                        id="lower" name="lower"
                                                                        onchange="changeRange(this.value)">
                                                                    @endif
                                                                    @if(isset($upper_from))
                                                                    <input type="range" min="100" max="10000"
                                                                        value="{{ $upper_from }}" id="upper"
                                                                        name="upper" onchange="changeRange(this.value)">
                                                                    @else
                                                                    <input type="range" min="100" max="10000"
                                                                        value="10000" id="upper" name="upper"
                                                                        onchange="changeRange(this.value)">
                                                                    @endif
                                                                    @if(isset($sfive_from))
                                                                    <input type="hidden" name="sfive"
                                                                        value="{{ $sfive_from }}">
                                                                    @else
                                                                    <input type="hidden" name="sfive" value="">
                                                                    @endif
                                                                    @if(isset($sfour_from))
                                                                    <input type="hidden" name="sfour"
                                                                        value="{{ $sfour_from }}">
                                                                    @else
                                                                    <input type="hidden" name="sfour" value="">
                                                                    @endif
                                                                    @if(isset($sthree_from))
                                                                    <input type="hidden" name="sthree"
                                                                        value="{{ $sthree_from }}">
                                                                    @else
                                                                    <input type="hidden" name="sthree" value="">
                                                                    @endif
                                                                    @if(isset($stwo_from))
                                                                    <input type="hidden" name="stwo"
                                                                        value="{{ $stwo_from }}">
                                                                    @else
                                                                    <input type="hidden" name="stwo" value="">
                                                                    @endif
                                                                    @if(isset($sone_from))
                                                                    <input type="hidden" name="sone"
                                                                        value="{{ $sone_from }}">
                                                                    @else
                                                                    <input type="hidden" name="sone" value="">
                                                                    @endif
                                                                    @if(isset($szero_from))
                                                                    <input type="hidden" name="szero"
                                                                        value="{{ $szero_from }}">
                                                                    @else
                                                                    <input type="hidden" name="szero" value="">
                                                                    @endif
                                                                    @if(isset($paymentone_from) == '1')
                                                                    <input type="hidden" name="paymentone" value="{{ $paymentone_from }}">
                                                                    @else
                                                                    <input type="hidden" name="paymentone" value="">
                                                                    @endif
                                                                    @if(isset($paymenttwo_from) == '1')
                                                                    <input type="hidden" name="paymenttwo" value="{{ $paymenttwo_from }}">
                                                                    @else
                                                                    <input type="hidden" name="paymenttwo" value="">
                                                                    @endif
                                                                    @if(isset($paymentthree_from) == '1')
                                                                    <input type="hidden" name="paymentthree" value="{{ $paymentthree_from }}">
                                                                    @else
                                                                    <input type="hidden" name="paymentthree" value="">
                                                                    @endif
                                                                    @if(isset($paymentfour_from) == '1')
                                                                    <input type="hidden" name="paymentfour" value="{{ $paymentfour_from }}">
                                                                    @else
                                                                    <input type="hidden" name="paymentfour" value="">
                                                                    @endif
                                                                    @if(isset($paymentfive_from) == '1')
                                                                    <input type="hidden" name="paymentfive" value="{{ $paymentfive_from }}">
                                                                    @else
                                                                    <input type="hidden" name="paymentfive" value="">
                                                                    @endif
                                                                    @if(isset($disone_from))
                                                                    <input type="hidden" name="disone" value="{{ $disone_from }}">
                                                                    @else
                                                                    <input type="hidden" name="disone" value="">
                                                                    @endif
                                                                    @if(isset($distwo_from))
                                                                    <input type="hidden" name="distwo" value="{{ $distwo_from }}">
                                                                    @else
                                                                    <input type="hidden" name="distwo" value="">
                                                                    @endif
                                                                    @if(isset($disthree_from))
                                                                    <input type="hidden" name="disthree" value="{{ $disthree_from }}">
                                                                    @else
                                                                    <input type="hidden" name="disthree" value="">
                                                                    @endif
                                                                    @if(isset($disfour_from))
                                                                    <input type="hidden" name="disfour" value="{{ $disfour_from }}">
                                                                    @else
                                                                    <input type="hidden" name="disfour" value="">
                                                                    @endif
                                                                    @if(isset($disfive_from))
                                                                    <input type="hidden" name="disfive" value="{{ $disfive_from }}">
                                                                    @else
                                                                    <input type="hidden" name="disfive" value="">
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            <div class="price-wrap">
                                                                <div class="price-container">
                                                                    <div class="price-wrap-1">
                                                                        <input id="one">
                                                                    </div>
                                                                </div>
                                                                <div class="price-container">
                                                                    <div class="price-wrap-2">
                                                                        <input id="two">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="vl-filter">
                                                <div class="text-orange text-filter"><i
                                                        class="fas fa-star me-2"></i>@lang('lang.stars_rating')</div>
                                                <div class="ms-4 mt-2">
                                                    <form id="formStars">
                                                        @if(isset($enjoy_id))
                                                        <input type="hidden" name="id" value="{{ $enjoy_id }}">
                                                        @else
                                                        <input type="hidden" name="id" value="">
                                                        @endif
                                                        @if(isset($c_from))
                                                        <input type="hidden" name="province" value="{{ $c_from }}">
                                                        @else
                                                        <input type="hidden" name="province" value="">
                                                        @endif
                                                        @if(isset($lower_from))
                                                        <input type="hidden" name="lower" value="{{ $lower_from }}">
                                                        @else
                                                        <input type="hidden" name="lower" value="">
                                                        @endif
                                                        @if(isset($upper_from))
                                                        <input type="hidden" name="upper" value="{{ $upper_from }}">
                                                        @else
                                                        <input type="hidden" name="upper" value="">
                                                        @endif
                                                        @if(isset($sfive_from))
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="sfive"
                                                                name="sfive" onclick="clickStars(this.value)"
                                                                value="{{ $sfive_from }}" checked="checked">
                                                            <label class="form-check-label" for="flexCheckChecked1">
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                            </label>
                                                        </div>
                                                        @else
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="sfive"
                                                                name="sfive" onclick="clickStars(this.value)" value="5">
                                                            <label class="form-check-label" for="flexCheckChecked1">
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                            </label>
                                                        </div>
                                                        @endif
                                                        @if (isset($sfour_from))
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="sfour"
                                                                name="sfour" onclick="clickStars(this.value)"
                                                                value="{{ $sfour_from }}" checked="checked">
                                                            <label class="form-check-label" for="flexCheckChecked2">
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                            </label>
                                                        </div>
                                                        @else
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="sfour"
                                                                name="sfour" onclick="clickStars(this.value)" value="4">
                                                            <label class="form-check-label" for="flexCheckChecked2">
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                            </label>
                                                        </div>
                                                        @endif
                                                        @if (isset($sthree_from))
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="sthree"
                                                                name="sthree" onclick="clickStars(this.value)"
                                                                value="{{ $sthree_from }}" checked="checked">
                                                            <label class="form-check-label" for="flexCheckChecked3">
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                            </label>
                                                        </div>
                                                        @else
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="sthree"
                                                                name="sthree" onclick="clickStars(this.value)"
                                                                value="3">
                                                            <label class="form-check-label" for="flexCheckChecked3">
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                            </label>
                                                        </div>
                                                        @endif
                                                        @if (isset($stwo_from))
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="stwo"
                                                                name="stwo" onclick="clickStars(this.value)"
                                                                value="{{ $stwo_from }}" checked="checked">
                                                            <label class="form-check-label" for="flexCheckChecked4">
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                            </label>
                                                        </div>
                                                        @else
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="stwo"
                                                                name="stwo" onclick="clickStars(this.value)" value="2">
                                                            <label class="form-check-label" for="flexCheckChecked4">
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                            </label>
                                                        </div>
                                                        @endif
                                                        @if (isset($sone_from))
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="sone"
                                                                name="sone" onclick="clickStars(this.value)"
                                                                value="{{ $sone_from }}" checked="checked">
                                                            <label class="form-check-label" for="flexCheckChecked5">
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                            </label>
                                                        </div>
                                                        @else
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="sone"
                                                                name="sone" onclick="clickStars(this.value)" value="1">
                                                            <label class="form-check-label" for="flexCheckChecked5">
                                                                <i class="fas fa-star text-orange text-medium"></i>
                                                            </label>
                                                        </div>
                                                        @endif
                                                        @if (isset($szero_from))
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="szero"
                                                                name="szero" onclick="clickStars(this.value)"
                                                                value="{{ $szero_from }}" checked="checked">
                                                            <label class="form-check-label text-grey text-medium"
                                                                for="flexCheckChecked5">
                                                                @lang('lang.no_rating')
                                                            </label>
                                                        </div>
                                                        @else
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="szero"
                                                                name="szero" onclick="clickStars(this.value)" value="0">
                                                            <label class="form-check-label text-grey text-medium"
                                                                for="flexCheckChecked5">
                                                                @lang('lang.no_rating')
                                                            </label>
                                                        </div>
                                                        @endif
                                                        @if(isset($paymentone_from) == '1')
                                                        <input type="hidden" name="paymentone" value="{{ $paymentone_from }}">
                                                        @else
                                                        <input type="hidden" name="paymentone" value="">
                                                        @endif
                                                        @if(isset($paymenttwo_from) == '1')
                                                        <input type="hidden" name="paymenttwo" value="{{ $paymenttwo_from }}">
                                                        @else
                                                        <input type="hidden" name="paymenttwo" value="">
                                                        @endif
                                                        @if(isset($paymentthree_from) == '1')
                                                        <input type="hidden" name="paymentthree" value="{{ $paymentthree_from }}">
                                                        @else
                                                        <input type="hidden" name="paymentthree" value="">
                                                        @endif
                                                        @if(isset($paymentfour_from) == '1')
                                                        <input type="hidden" name="paymentfour" value="{{ $paymentfour_from }}">
                                                        @else
                                                        <input type="hidden" name="paymentfour" value="">
                                                        @endif
                                                        @if(isset($paymentfive_from) == '1')
                                                        <input type="hidden" name="paymentfive" value="{{ $paymentfive_from }}">
                                                        @else
                                                        <input type="hidden" name="paymentfive" value="">
                                                        @endif
                                                        @if(isset($disone_from))
                                                        <input type="hidden" name="disone" value="{{ $disone_from }}">
                                                        @else
                                                        <input type="hidden" name="disone" value="">
                                                        @endif
                                                        @if(isset($distwo_from))
                                                        <input type="hidden" name="distwo" value="{{ $distwo_from }}">
                                                        @else
                                                        <input type="hidden" name="distwo" value="">
                                                        @endif
                                                        @if(isset($disthree_from))
                                                        <input type="hidden" name="disthree" value="{{ $disthree_from }}">
                                                        @else
                                                        <input type="hidden" name="disthree" value="">
                                                        @endif
                                                        @if(isset($disfour_from))
                                                        <input type="hidden" name="disfour" value="{{ $disfour_from }}">
                                                        @else
                                                        <input type="hidden" name="disfour" value="">
                                                        @endif
                                                        @if(isset($disfive_from))
                                                        <input type="hidden" name="disfive" value="{{ $disfive_from }}">
                                                        @else
                                                        <input type="hidden" name="disfive" value="">
                                                        @endif
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="vl-filter">
                                                <div class="text-orange text-filter"><i
                                                        class="fas fa-gem me-2"></i>@lang('lang.payment_options')</div>
                                                <div class="ms-4 mt-2">
                                                    <form id="formPayment">
                                                        @if(isset($enjoy_id))
                                                        <input type="hidden" name="id" value="{{ $enjoy_id }}">
                                                        @else
                                                        <input type="hidden" name="id" value="">
                                                        @endif
                                                        @if(isset($c_from))
                                                        <input type="hidden" name="province" value="{{ $c_from }}">
                                                        @else
                                                        <input type="hidden" name="province" value="">
                                                        @endif
                                                        @if(isset($lower_from))
                                                        <input type="hidden" name="lower" value="{{ $lower_from }}">
                                                        @else
                                                        <input type="hidden" name="lower" value="">
                                                        @endif
                                                        @if(isset($upper_from))
                                                        <input type="hidden" name="upper" value="{{ $upper_from }}">
                                                        @else
                                                        <input type="hidden" name="upper" value="">
                                                        @endif
                                                        @if(isset($sfive_from))
                                                        <input type="hidden" name="sfive" value="{{ $sfive_from }}">
                                                        @else
                                                        <input type="hidden" name="sfive" value="">
                                                        @endif
                                                        @if(isset($sfour_from))
                                                        <input type="hidden" name="sfour" value="{{ $sfour_from }}">
                                                        @else
                                                        <input type="hidden" name="sfour" value="">
                                                        @endif
                                                        @if(isset($sthree_from))
                                                        <input type="hidden" name="sthree" value="{{ $sthree_from }}">
                                                        @else
                                                        <input type="hidden" name="sthree" value="">
                                                        @endif
                                                        @if(isset($stwo_from))
                                                        <input type="hidden" name="stwo" value="{{ $stwo_from }}">
                                                        @else
                                                        <input type="hidden" name="stwo" value="">
                                                        @endif
                                                        @if(isset($sone_from))
                                                        <input type="hidden" name="sone" value="{{ $sone_from }}">
                                                        @else
                                                        <input type="hidden" name="sone" value="">
                                                        @endif
                                                        @if(isset($szero_from))
                                                        <input type="hidden" name="szero" value="{{ $szero_from }}">
                                                        @else
                                                        <input type="hidden" name="szero" value="">
                                                        @endif
                                                        @if (isset($paymentone_from) == '1')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="paymentone"
                                                                name="paymentone" onclick="clickPayment(this.value)"
                                                                value="{{ $paymentone_from }}" checked="checked">
                                                            <label class="form-check-label text-grey text-medium"
                                                                for="flexCheckChecked1">@lang('lang.free_cancellation')
                                                            </label>
                                                        </div>
                                                        @else
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="paymentone"
                                                                name="paymentone" onclick="clickPayment(this.value)" value="1">
                                                            <label class="form-check-label text-grey text-medium"
                                                                for="flexCheckChecked1">@lang('lang.free_cancellation')
                                                            </label>
                                                        </div>
                                                        @endif
                                                        @if (isset($paymenttwo_from) == '1')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                onclick="clickPayment(this.value)" name="paymenttwo"
                                                                value="{{ $paymenttwo_from }}" id="paymenttwo" checked="checked">
                                                            <label class="form-check-label text-grey text-medium"
                                                                for="flexCheckChecked2">@lang('lang.book_nowandpay_later')
                                                            </label>
                                                        </div>
                                                        @else
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                onclick="clickPayment(this.value)" name="paymenttwo" value="1"
                                                                id="paymenttwo">
                                                            <label class="form-check-label text-grey text-medium"
                                                                for="flexCheckChecked2">@lang('lang.book_nowandpay_later')
                                                            </label>
                                                        </div>
                                                        @endif
                                                        @if (isset($paymentthree_from) == '1')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                onclick="clickPayment(this.value)" name="paymentthree"
                                                                value="{{ $paymentthree_from }}" id="paymentthree" checked="checked">
                                                            <label class="form-check-label text-grey text-medium"
                                                                for="flexCheckChecked3">@lang('lang.pay_at_hotel')
                                                            </label>
                                                        </div>
                                                        @else
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                onclick="clickPayment(this.value)" name="paymentthree" value="1"
                                                                id="paymentthree">
                                                            <label class="form-check-label text-grey text-medium"
                                                                for="flexCheckChecked3">@lang('lang.pay_at_hotel')
                                                            </label>
                                                        </div>
                                                        @endif
                                                        @if (isset($paymentfour_from) == '1')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                onclick="clickPayment(this.value)" name="paymentfour"
                                                                value="{{ $paymentfour_from }}" id="paymentfour" checked="checked">
                                                            <label class="form-check-label  text-grey text-medium"
                                                                for="flexCheckChecked4">@lang('lang.pay_Now')
                                                            </label>
                                                        </div>
                                                        @else
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                onclick="clickPayment(this.value)" name="paymentfour" value="1"
                                                                id="paymentfour">
                                                            <label class="form-check-label  text-grey text-medium"
                                                                for="flexCheckChecked4">@lang('lang.pay_Now')
                                                            </label>
                                                        </div>
                                                        @endif
                                                        @if (isset($paymentfive_from) == '1')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                onclick="clickPayment(this.value)" name="paymentfive"
                                                                value="{{ $paymentfive_from }}" id="paymentfive" checked="checked">
                                                            <label class="form-check-label  text-grey text-medium"
                                                                for="flexCheckChecked5">@lang('lang.book_without_credit_card')
                                                            </label>
                                                        </div>
                                                        @else
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                onclick="clickPayment(this.value)" name="paymentfive" value="1"
                                                                id="paymentfive">
                                                            <label class="form-check-label  text-grey text-medium"
                                                                for="flexCheckChecked5">@lang('lang.book_without_credit_card')
                                                            </label>
                                                        </div>
                                                        @endif
                                                        @if(isset($disone_from))
                                                        <input type="hidden" name="disone" value="{{ $disone_from }}">
                                                        @else
                                                        <input type="hidden" name="disone" value="">
                                                        @endif
                                                        @if(isset($distwo_from))
                                                        <input type="hidden" name="distwo" value="{{ $distwo_from }}">
                                                        @else
                                                        <input type="hidden" name="distwo" value="">
                                                        @endif
                                                        @if(isset($disthree_from))
                                                        <input type="hidden" name="disthree" value="{{ $disthree_from }}">
                                                        @else
                                                        <input type="hidden" name="disthree" value="">
                                                        @endif
                                                        @if(isset($disfour_from))
                                                        <input type="hidden" name="disfour" value="{{ $disfour_from }}">
                                                        @else
                                                        <input type="hidden" name="disfour" value="">
                                                        @endif
                                                        @if(isset($disfive_from))
                                                        <input type="hidden" name="disfive" value="{{ $disfive_from }}">
                                                        @else
                                                        <input type="hidden" name="disfive" value="">
                                                        @endif
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="vl-filter">
                                                <div class="text-orange text-filter"><i
                                                        class="fas fa-map-pin me-2"></i>@lang('lang.distance_to_center')
                                                </div>
                                                <div class="ms-4 mt-2">
                                                    <form id="formDistance">
                                                        @if(isset($enjoy_id))
                                                        <input type="hidden" name="id" value="{{ $enjoy_id }}">
                                                        @else
                                                        <input type="hidden" name="id" value="">
                                                        @endif
                                                        @if(isset($c_from))
                                                        <input type="hidden" name="province" value="{{ $c_from }}">
                                                        @else
                                                        <input type="hidden" name="province" value="">
                                                        @endif
                                                        @if(isset($lower_from))
                                                        <input type="hidden" name="lower" value="{{ $lower_from }}">
                                                        @else
                                                        <input type="hidden" name="lower" value="">
                                                        @endif
                                                        @if(isset($upper_from))
                                                        <input type="hidden" name="upper" value="{{ $upper_from }}">
                                                        @else
                                                        <input type="hidden" name="upper" value="">
                                                        @endif
                                                        @if(isset($sfive_from))
                                                        <input type="hidden" name="sfive" value="{{ $sfive_from }}">
                                                        @else
                                                        <input type="hidden" name="sfive" value="">
                                                        @endif
                                                        @if(isset($sfour_from))
                                                        <input type="hidden" name="sfour" value="{{ $sfour_from }}">
                                                        @else
                                                        <input type="hidden" name="sfour" value="">
                                                        @endif
                                                        @if(isset($sthree_from))
                                                        <input type="hidden" name="sthree" value="{{ $sthree_from }}">
                                                        @else
                                                        <input type="hidden" name="sthree" value="">
                                                        @endif
                                                        @if(isset($stwo_from))
                                                        <input type="hidden" name="stwo" value="{{ $stwo_from }}">
                                                        @else
                                                        <input type="hidden" name="stwo" value="">
                                                        @endif
                                                        @if(isset($sone_from))
                                                        <input type="hidden" name="sone" value="{{ $sone_from }}">
                                                        @else
                                                        <input type="hidden" name="sone" value="">
                                                        @endif
                                                        @if(isset($szero_from))
                                                        <input type="hidden" name="szero" value="{{ $szero_from }}">
                                                        @else
                                                        <input type="hidden" name="szero" value="">
                                                        @endif
                                                        @if(isset($paymentone_from) == '1')
                                                        <input type="hidden" name="paymentone" value="{{ $paymentone_from }}">
                                                        @else
                                                        <input type="hidden" name="paymentone" value="">
                                                        @endif
                                                        @if(isset($paymenttwo_from) == '1')
                                                        <input type="hidden" name="paymenttwo" value="{{ $paymenttwo_from }}">
                                                        @else
                                                        <input type="hidden" name="paymenttwo" value="">
                                                        @endif
                                                        @if(isset($paymentthree_from) == '1')
                                                        <input type="hidden" name="paymentthree" value="{{ $paymentthree_from }}">
                                                        @else
                                                        <input type="hidden" name="paymentthree" value="">
                                                        @endif
                                                        @if(isset($paymentfour_from) == '1')
                                                        <input type="hidden" name="paymentfour" value="{{ $paymentfour_from }}">
                                                        @else
                                                        <input type="hidden" name="paymentfour" value="">
                                                        @endif
                                                        @if(isset($paymentfive_from) == '1')
                                                        <input type="hidden" name="paymentfive" value="{{ $paymentfive_from }}">
                                                        @else
                                                        <input type="hidden" name="paymentfive" value="">
                                                        @endif
                                                        @if(isset($disone_from))
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" onclick="clickDistance(this.value)" value="{{ $disone_from }}" id="disone" name="disone" checked="checked">
                                                            <label class="form-check-label text-grey text-medium"
                                                                for="flexCheckChecked1">@lang('lang.inside_city_center')
                                                            </label>
                                                        </div>
                                                        @else
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" onclick="clickDistance(this.value)" value="1" id="disone" name="disone">
                                                            <label class="form-check-label text-grey text-medium"
                                                                for="flexCheckChecked1">@lang('lang.inside_city_center')
                                                            </label>
                                                        </div>
                                                        @endif
                                                        @if(isset($distwo_from))
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" onclick="clickDistance(this.value)" value="{{ $distwo_from }}" id="distwo" name="distwo" checked="checked">
                                                            <label class="form-check-label text-grey text-medium" for="flexCheckChecked2"><i
                                                                    class="fas fa-chevron-left me-1"></i>@lang('lang.2km_to_center')
                                                            </label>
                                                        </div>
                                                        @else
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" onclick="clickDistance(this.value)" value="2" id="distwo" name="distwo">
                                                            <label class="form-check-label text-grey text-medium" for="flexCheckChecked2"><i
                                                                    class="fas fa-chevron-left me-1"></i>@lang('lang.2km_to_center')
                                                            </label>
                                                        </div>
                                                        @endif
                                                        @if(isset($disthree_from))
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" onclick="clickDistance(this.value)" value="{{ $disthree_from }}" id="disthree" name="disthree" checked="checked">
                                                            <label class="form-check-label text-grey text-medium"
                                                                for="flexCheckChecked3">@lang('lang.2to5km_to_center')
                                                            </label>
                                                        </div>
                                                        @else
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" onclick="clickDistance(this.value)" value="3" id="disthree" name="disthree">
                                                            <label class="form-check-label text-grey text-medium"
                                                                for="flexCheckChecked3">@lang('lang.2to5km_to_center')
                                                            </label>
                                                        </div>
                                                        @endif
                                                        @if(isset($disfour_from))
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" onclick="clickDistance(this.value)" value="{{ $disfour_from }}" id="disfour" name="disfour" checked="checked">
                                                            <label class="form-check-label  text-grey text-medium"
                                                                for="flexCheckChecked4">@lang('lang.5to10km_to_center')
                                                            </label>
                                                        </div>
                                                        @else
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" onclick="clickDistance(this.value)" value="4" id="disfour" name="disfour">
                                                            <label class="form-check-label  text-grey text-medium"
                                                                for="flexCheckChecked4">@lang('lang.5to10km_to_center')
                                                            </label>
                                                        </div>
                                                        @endif
                                                        @if(isset($disfive_from))
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" onclick="clickDistance(this.value)" value="{{ $disfive_from }}" id="disfive" name="disfive" checked="checked">
                                                            <label class="form-check-label  text-grey text-medium" for="flexCheckChecked5"><i
                                                                    class="fas fa-chevron-right me-1"></i>@lang('lang.5km_to_center')
                                                            </label>
                                                        </div>
                                                        @else
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" onclick="clickDistance(this.value)" value="5" id="disfive" name="disfive">
                                                            <label class="form-check-label  text-grey text-medium" for="flexCheckChecked5"><i
                                                                    class="fas fa-chevron-right me-1"></i>@lang('lang.5km_to_center')
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
                    {{-- <div class="float-end ">
                        <div class="row g-1">
                            <div class="col-6">
                                <div class="text-sort-by">@lang('lang.sort_by') :</div>
                            </div>
                            <div class="col-6">
                                <div class="dropdown">
                                    <button class="btn-sortby dropdown-toggle" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        @lang('lang.best_match')
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="#">@lang('lang.best_match')</a></li>
                                        <li><a class="dropdown-item" href="#">@lang('lang.popular_properties')</a></li> --}}
                                    {{-- <li><a class="dropdown-item" href="#">...</a></li> --}}
                                {{-- </ul>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                @foreach ($result as $key => $val)
                <div class="card mb-3" href="#">
                    <div class="row g-0">
                        <div class="col-lg-4">
                            <?php $image = DB::table('db_image_poolvilla')->where('poolvilla_id',$val->id)->first();?>
                            <a
                                href="{{ url(Session::get('lang').'/select-rooms/'.$val->id.'/'.$check_in.'/'.$check_out.'/adult='.$a_from.'/kid='.$k_from.'/room='.$ro) }}">
                                <img src="{{ asset(@$image->image) }}" class="img-fluid rounded-start" alt="...">
                            </a>
                        </div>
                        <div class="col-lg-8">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="name-text">@if (Session::get('lang') == 'en') {{ $val->name_en }}
                                            @else {{ $val->name_th }} @endif</div>
                                        <div>
                                            @if ($val->star_rating == '5')
                                            <i class="fas fa-star text-orange size-star"></i>
                                            <i class="fas fa-star text-orange size-star"></i>
                                            <i class="fas fa-star text-orange size-star"></i>
                                            <i class="fas fa-star text-orange size-star"></i>
                                            <i class="fas fa-star text-orange size-star"></i>
                                            @elseif ($val->star_rating == '4')
                                            <i class="fas fa-star text-orange size-star"></i>
                                            <i class="fas fa-star text-orange size-star"></i>
                                            <i class="fas fa-star text-orange size-star"></i>
                                            <i class="fas fa-star text-orange size-star"></i>
                                            @elseif ($val->star_rating == '3')
                                            <i class="fas fa-star text-orange size-star"></i>
                                            <i class="fas fa-star text-orange size-star"></i>
                                            <i class="fas fa-star text-orange size-star"></i>
                                            @elseif ($val->star_rating == '2')
                                            <i class="fas fa-star text-orange size-star"></i>
                                            <i class="fas fa-star text-orange size-star"></i>
                                            @elseif ($val->star_rating == '1')
                                            <i class="fas fa-star text-orange size-star"></i>
                                            @endif
                                        </div>
                                        <div class="text-blue text-tiny"><i
                                                class="fas fa-map-marker-alt me-1"></i>@if(Session::get('lang') == 'en')
                                            {{ $val->province_en }} @else {{ $val->province_th }}
                                            @endif , @if(Session::get('lang') == 'en') {{ $val->district_en }} @else
                                            {{ $val->district_th }} @endif
                                            <span>
                                                <a href="#" class="btn-link-map">@lang('lang.show_on_map')</a>
                                            </span>
                                        </div>
                                        {{-- <div class="text-green text-tiny">
                                            <span class="text-bold me-1">FREE</span>Cancellation
                                        </div> --}}
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="vl-left">
                                            <div class="row g-0 ">
                                                <div class="col-8">
                                                    <div class="text-grey text-review">@lang('lang.exceptional')</div>
                                                    <div class="text-light-grey text-tiny">0 @lang('lang.reviews')
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="point-badge">0</div>
                                                </div>
                                            </div>
                                            <div class="text-grey text-small mt-4 text-end">
                                                @lang('lang.price_per_night_as_per_as')
                                            </div>
                                            {{-- <div class="text-light-grey text-tiny text-end">5,500</div>
                                            <div class="line-th-price"></div> --}}
                                            <div class="text-price text-grey text-bold text-end mt-1 mb-4">THB<span
                                                    class="text-red">{{number_format(@$val->price)}}</span></div>
                                            <a class="btn-select-room"
                                                href="{{ url(Session::get('lang').'/select-rooms/'.$val->id.'/'.$check_in.'/'.$check_out.'/adult='.$a_from.'/kid='.$k_from.'/room='.$ro) }}">@lang('lang.select_room')<span
                                                    class="fas fa-chevron-right text-orange arrow-select"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<script>
    $('#iconified').on('keyup', function () {
        var input = $(this);
        if (input.val().length === 0) {
            input.addClass('empty');
        } else {
            input.removeClass('empty');
        }
    });

    var dateToday = new Date();
    $(function () {
        $("#datepicker").datepicker({
            dateFormat: 'dd/mm/yy',
            minDate: dateToday,
        });
    });

    $(function () {
        $("#datepicker2").datepicker({
            dateFormat: 'dd/mm/yy',
            minDate: dateToday,
        });
    });

    $('#datepicker').change(function () {
        var date2 = $('#datepicker').datepicker('getDate', '+1d');
        date2.setDate(date2.getDate() + 1);
        $('#datepicker2').datepicker('setDate', date2);
        $('#datepicker2').datepicker('option', 'minDate', new Date(date2));
    });

    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function () {
        $('.js-example-basic-single').select2();
    });
</script>
<script>
    $(document).ready(function () {
        $(".form-control").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $(".dropdown-menu li").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<!-- ปุ่มเพิ่ม-ลด  -->
<script>
    var unit = 1;
    var total;
    // if user changes value in field
    $('.field').change(function () {
        unit = this.value;
    });
    $('.add').click(function () {
        unit++;
        var $input = $(this).prevUntil('.sub');
        $input.val(unit);
        unit = unit;
    });
    $('.sub').click(function () {
        if (unit > 1) {
            unit--;
            var $input = $(this).nextUntil('.add');
            $input.val(unit);
        }
    });
</script>
<script>
    var unit2 = 0;
    var total;
    // if user changes value in field
    $('.field2').change(function () {
        unit2 = this.value;
    });
    $('.add2').click(function () {
        unit2++;
        var $input = $(this).prevUntil('.sub2');
        $input.val(unit2);
        unit2 = unit2;
    });
    $('.sub2').click(function () {
        if (unit2 > 0) {
            unit2--;
            var $input = $(this).nextUntil('.add2');
            $input.val(unit2);
        }
    });
</script>
<script>
    var unit3 = 1;
    var total;
    // if user changes value in field
    $('.field3').change(function () {
        unit3 = this.value;
    });
    $('.add3').click(function () {
        unit3++;
        var $input = $(this).prevUntil('.sub3');
        $input.val(unit3);
        unit3 = unit3;
    });
    $('.sub3').click(function () {
        if (unit3 > 1) {
            unit3--;
            var $input = $(this).nextUntil('.add3');
            $input.val(unit3);
        }
    });
</script>
<script>
    function autocomplete(inp, arr) {
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function (e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) {
                return false;
            }
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    /*create a DIV element for each matching element:*/
                    b = document.createElement("DIV");
                    /*make the matching letters bold:*/
                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    /*insert a input field that will hold the current array item's value:*/
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    /*execute a function when someone clicks on the item value (DIV element):*/
                    b.addEventListener("click", function (e) {
                        /*insert the value for the autocomplete text field:*/
                        inp.value = this.getElementsByTagName("input")[0].value;
                        /*close the list of autocompleted values,
                        (or any other open lists of autocompleted values:*/
                        closeAllLists();
                    });
                    a.appendChild(b);
                }
            }
        });
        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function (e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                /*If the arrow DOWN key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 13) {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                    /*and simulate a click on the "active" item:*/
                    if (x) x[currentFocus].click();
                }
            }
        });

        function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }

        function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }

        function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
    }

    /*An array containing all the province names in the world:*/
    var poolvilla = {!! json_encode($results) !!};


    /*initiate the autocomplete function on the "POL" element, and pass along the countries array as possible autocomplete values:*/
    autocomplete(document.getElementById("iconified"), poolvilla);
</script>
<script>
    var lowerSlider = document.querySelector('#lower');
    var upperSlider = document.querySelector('#upper');

    document.querySelector('#two').value = upperSlider.value;
    document.querySelector('#one').value = lowerSlider.value;

    var lowerVal = parseInt(lowerSlider.value);
    var upperVal = parseInt(upperSlider.value);

    upperSlider.oninput = function () {
        lowerVal = parseInt(lowerSlider.value);
        upperVal = parseInt(upperSlider.value);

        if (upperVal < lowerVal + 4) {
            lowerSlider.value = upperVal - 4;
            if (lowerVal == lowerSlider.min) {
                upperSlider.value = 4;
            }
        }
        document.querySelector('#two').value = this.value
    };

    lowerSlider.oninput = function () {
        lowerVal = parseInt(lowerSlider.value);
        upperVal = parseInt(upperSlider.value);
        if (lowerVal > upperVal - 4) {
            upperSlider.value = lowerVal + 4;
            if (upperVal == upperSlider.max) {
                lowerSlider.value = parseInt(upperSlider.max) - 4;
            }
        }
        document.querySelector('#one').value = this.value
    };

    $('#formProvince').change(function () {
        var id = $('#id').val();
        var province = $('#province').val();
        var lower = document.getElementById('lower').value;
        var upper = document.getElementById('upper').value;
        var sfive = document.getElementById('sfive').value;
        var sfour = document.getElementById('sfour').value;
        var sthree = document.getElementById('sthree').value;
        var stwo = document.getElementById('stwo').value;
        var sone = document.getElementById('sone').value;
        var szero = document.getElementById('szero').value;
        var paymentone = $('#paymentone').val();
        var paymenttwo = $('#paymenttwo').val();
        var paymentthree = $('#paymentthree').val();
        var paymentfour = $('#paymentfour').val();
        var paymentfive = $('#paymentfive').val();
        var disone = $('#disone').val();
        var distwo = $('#distwo').val();
        var disthree = $('#disthree').val();
        var disfour = $('#disfour').val();
        var disfive = $('#disfive').val();
        document.getElementById('formProvince').submit(); // SUB
        $.ajax({
            url: "{!! url(Session::get('lang').'/category-travel/search') !!}",
            type: "GET",
            data: {
                id: id,
                province: province,
                lower: lower,
                upper: upper,
                sfive: sfive,
                sfour: sfour,
                sthree: sthree,
                stwo: stwo,
                szero: szero,
                paymentone: paymentone,
                paymenttwo: paymenttwo,
                paymentthree: paymentthree,
                paymentfour: paymentfour,
                paymentfive: paymentfive,
                disone: disone,
                distwo: distwo,
                disthree: disthree,
                disfour: disfour,
                disfive: disfive,
            },
            success: function (response) {

            }
        });
    });

    $('#formRange').change(function changeRange(value) {
        var id = $('#id').val();
        var province = $('#province').val();
        var lower = document.getElementById('lower').value;
        var upper = document.getElementById('upper').value;
        var sfive = document.getElementById('sfive').value;
        var sfour = document.getElementById('sfour').value;
        var sthree = document.getElementById('sthree').value;
        var stwo = document.getElementById('stwo').value;
        var sone = document.getElementById('sone').value;
        var szero = document.getElementById('szero').value;
        var paymentone = $('#paymentone').val();
        var paymenttwo = $('#paymenttwo').val();
        var paymentthree = $('#paymentthree').val();
        var paymentfour = $('#paymentfour').val();
        var paymentfive = $('#paymentfive').val();
        var disone = $('#disone').val();
        var distwo = $('#distwo').val();
        var disthree = $('#disthree').val();
        var disfour = $('#disfour').val();
        var disfive = $('#disfive').val();
        document.getElementById('formRange').submit(); // SUB
        $.ajax({
            url: "{!! url(Session::get('lang').'/category-travel/search') !!}",
            type: "GET",
            data: {
                id: id,
                province: province,
                lower: lower,
                upper: upper,
                sfive: sfive,
                sfour: sfour,
                sthree: sthree,
                stwo: stwo,
                szero: szero,
                paymentone: paymentone,
                paymenttwo: paymenttwo,
                paymentthree: paymentthree,
                paymentfour: paymentfour,
                paymentfive: paymentfive,
                disone: disone,
                distwo: distwo,
                disthree: disthree,
                disfour: disfour,
                disfive: disfive,
            },
            success: function (response) {

            }
        });
    });

    $('#formStars').click(function clickStars(value) {
        var id = $('#id').val();
        var province = $('#province').val();
        var lower = document.getElementById('lower').value;
        var upper = document.getElementById('upper').value;
        var sfive = document.getElementById('sfive').value;
        var sfour = document.getElementById('sfour').value;
        var sthree = document.getElementById('sthree').value;
        var stwo = document.getElementById('stwo').value;
        var sone = document.getElementById('sone').value;
        var szero = document.getElementById('szero').value;
        var paymentone = $('#paymentone').val();
        var paymenttwo = $('#paymenttwo').val();
        var paymentthree = $('#paymentthree').val();
        var paymentfour = $('#paymentfour').val();
        var paymentfive = $('#paymentfive').val();
        var disone = $('#disone').val();
        var distwo = $('#distwo').val();
        var disthree = $('#disthree').val();
        var disfour = $('#disfour').val();
        var disfive = $('#disfive').val();
        document.getElementById('formStars').submit(); // SUB
        $.ajax({
            url: "{!! url(Session::get('lang').'/category-travel/search') !!}",
            type: "GET",
            data: {
                id: id,
                province: province,
                lower: lower,
                upper: upper,
                sfive: sfive,
                sfour: sfour,
                sthree: sthree,
                stwo: stwo,
                szero: szero,
                paymentone: paymentone,
                paymenttwo: paymenttwo,
                paymentthree: paymentthree,
                paymentfour: paymentfour,
                paymentfive: paymentfive,
                disone: disone,
                distwo: distwo,
                disthree: disthree,
                disfour: disfour,
                disfive: disfive,
            },
            success: function (response) {

            }
        });
    });

    $('#formPayment').click(function clickPayment(value) {
        var id = $('#id').val();
        var province = $('#province').val();
        var lower = document.getElementById('lower').value;
        var upper = document.getElementById('upper').value;
        var sfive = document.getElementById('sfive').value;
        var sfour = document.getElementById('sfour').value;
        var sthree = document.getElementById('sthree').value;
        var stwo = document.getElementById('stwo').value;
        var sone = document.getElementById('sone').value;
        var szero = document.getElementById('szero').value;
        var paymentone = $('#paymentone').val();
        var paymenttwo = $('#paymenttwo').val();
        var paymentthree = $('#paymentthree').val();
        var paymentfour = $('#paymentfour').val();
        var paymentfive = $('#paymentfive').val();
        var disone = $('#disone').val();
        var distwo = $('#distwo').val();
        var disthree = $('#disthree').val();
        var disfour = $('#disfour').val();
        var disfive = $('#disfive').val();
        document.getElementById('formPayment').submit(); // SUB
        $.ajax({
            url: "{!! url(Session::get('lang').'/category-travel/search') !!}",
            type: "GET",
            data: {
                id: id,
                province: province,
                lower: lower,
                upper: upper,
                sfive: sfive,
                sfour: sfour,
                sthree: sthree,
                stwo: stwo,
                szero: szero,
                paymentone: paymentone,
                paymenttwo: paymenttwo,
                paymentthree: paymentthree,
                paymentfour: paymentfour,
                paymentfive: paymentfive,
                disone: disone,
                distwo: distwo,
                disthree: disthree,
                disfour: disfour,
                disfive: disfive,
            },
            success: function (response) {

            }
        });
    });

    $('#formDistance').change(function clickDistance(value) {
        var id = $('#id').val();
        var province = $('#province').val();
        var lower = document.getElementById('lower').value;
        var upper = document.getElementById('upper').value;
        var sfive = document.getElementById('sfive').value;
        var sfour = document.getElementById('sfour').value;
        var sthree = document.getElementById('sthree').value;
        var stwo = document.getElementById('stwo').value;
        var sone = document.getElementById('sone').value;
        var szero = document.getElementById('szero').value;
        var paymentone = $('#paymentone').val();
        var paymenttwo = $('#paymenttwo').val();
        var paymentthree = $('#paymentthree').val();
        var paymentfour = $('#paymentfour').val();
        var paymentfive = $('#paymentfive').val();
        var disone = $('#disone').val();
        var distwo = $('#distwo').val();
        var disthree = $('#disthree').val();
        var disfour = $('#disfour').val();
        var disfive = $('#disfive').val();
        document.getElementById('formDistance').submit(); // SUB
        $.ajax({
            url: "{!! url(Session::get('lang').'/category-travel/search') !!}",
            type: "GET",
            data: {
                id: id,
                province: province,
                lower: lower,
                upper: upper,
                sfive: sfive,
                sfour: sfour,
                sthree: sthree,
                stwo: stwo,
                szero: szero,
                paymentone: paymentone,
                paymenttwo: paymenttwo,
                paymentthree: paymentthree,
                paymentfour: paymentfour,
                paymentfive: paymentfive,
                disone: disone,
                distwo: distwo,
                disthree: disthree,
                disfour: disfour,
                disfive: disfive,
            },
            success: function (response) {

            }
        });
    });
</script>