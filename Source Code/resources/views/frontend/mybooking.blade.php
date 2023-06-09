<!doctype html>
<html lang="th">
<head>
    <title>@lang('lang.poolvilla')</title>
    @include('frontend/inc_header')
    <link rel="stylesheet" href="{{ asset('assets_frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_frontend/css/owl.theme.default.min.css') }}">
    <script src="{{ asset('assets_frontend/js/owl.carousel.min.js') }}"></script>
    <?php $active[0]='active'; ?>
</head>
<body>
    @include('frontend/inc_navbar')
    <div class="bg-orange">
        {{-- <div class="clearfix">
            <div class="float-end width-search">
                <input class="form-control empty orange" type="text" id="iconified"
                    placeholder="&#xF002;  Where  are  you  looking for ?" aria-label="default input example">
            </div>
        </div> --}}
    </div>
    <div class="bg-grey-2">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="none-mobile">
                        @include('frontend/inc_account')
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="mt-4"></div>
                    <div class="row">
                        <div>
                            <a style="cursor:pointer" class="btn-booking btn_show active">@lang('lang.upcoming')</a>
                            <a style="cursor:pointer" class="btn-booking btn_show">@lang('lang.completed')</a>
                            <a style="cursor:pointer" class="btn-booking btn_show">@lang('lang.cancelled')</a>
                        </div>
                    </div>
                    {{-- <div class="clearfix">
                        <div class="float-end">
                            <div class="row g-1">
                                <div class="col-6">
                                    <div class="text-sort-by">@lang('lang.sort_by') :</div>
                                </div>
                                <div class="col-6">
                                    <div class="dropdown">
                                        <button class="btn-sortby dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            @lang('lang.best_match')
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="#">@lang('lang.best_match')</a></li>
                                            <li><a class="dropdown-item" href="#">@lang('lang.popular_properties')</a></li>
                                            <li><a class="dropdown-item" href="#">...</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div>
                        <div class="boxshow">
                            <br>
                            {{-- <br> --}}
                            {{-- <div class="bg-orange-light3 my-4">
                                <div class="text-bold text-filter">@lang('lang.my_booking')</div>
                                <form class="row g-3 mt-1" action="{{ url(Session::get('lang').'/mybooking/search') }}" method="get" autocomplete="off">
                                    <div class="col-sm-6">
                                        <div class="autocomplete">
                                            <input type="text" class="form-control booking" id="room" name="room">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-6">
                                        <button type="submit" class="btn-search-booking">@lang('lang.search')</button>
                                    </div>
                                    <div class="col-sm-3 col-6">
                                        <button type="submit" class="btn-clear">@lang('lang.clear')</button>
                                    </div>
                                </form>
                            </div> --}}
                            @foreach ($mybooking as $key => $val)
                            <div class="card booking mb-3" href="#">
                                <div class="row g-0">
                                    <div class="col-md-3">
                                        <?php $image = DB::table('db_image_poolvilla')->where('poolvilla_id',$val->poolvilla_id)->first();?>
                                        <a href="#">
                                            <img src="{{ asset(@$image->image) }}" class="img-fluid" alt="...">
                                        </a>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-7">
                                                    <div class="name-text">
                                                        @if(Session::get('lang') == 'en')
                                                        {{ $val->name_en }} @else {{ $val->name_th }}
                                                        @endif - {{ $val->name }}
                                                    </div>
                                                        @if ($val->booking_id >= 1 && $val->booking_id <= 9)
                                                        <div class="text-grey text-review">@lang('lang.booking_id') : B0000000{{ $val->booking_id }}</div>
                                                        @elseif ($val->booking_id >= 10 && $val->booking_id <= 99)
                                                        <div class="text-grey text-review">@lang('lang.booking_id') : B000000{{ $val->booking_id }}</div>
                                                        @elseif ($val->booking_id >= 100 && $val->booking_id <= 999)
                                                        <div class="text-grey text-review">@lang('lang.booking_id') : B00000{{ $val->booking_id }}</div>
                                                        @elseif ($val->booking_id >= 1000 && $val->booking_id <= 9999)
                                                        <div class="text-grey text-review">@lang('lang.booking_id') : B0000{{ $val->booking_id }}</div>
                                                        @elseif ($val->booking_id >= 10000 && $val->booking_id <= 99999)
                                                        <div class="text-grey text-review">@lang('lang.booking_id') : B000{{ $val->booking_id }}</div>
                                                        @elseif ($val->booking_id >= 100000 && $val->booking_id <= 999999)
                                                        <div class="text-grey text-review">@lang('lang.booking_id') : B00{{ $val->booking_id }}</div>
                                                        @elseif ($val->booking_id >= 1000000 && $val->booking_id <= 9999999)
                                                        <div class="text-grey text-review">@lang('lang.booking_id') : B0{{ $val->booking_id }}</div>
                                                        @elseif ($val->booking_id >= 10000000 && $val->booking_id <= 99999999)
                                                        <div class="text-grey text-review">@lang('lang.booking_id') : B{{ $val->booking_id }}</div>
                                                        @elseif ($val->booking_id >= 100000000)
                                                        <div class="text-grey text-review">@lang('lang.booking_id') : B{{ $val->booking_id }}</div>
                                                        @endif
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="vl-left">
                                                        <div class="text-light-grey text-small">@lang('lang.booked_on') 
                                                            @php
                                                            $date = new DateTime($val->booking_date);
                                                            $dates = $val->booking_date;
                                                            $newdate = $date->format(DateTime::RFC822); 
                                                            $explode = explode(" ",$newdate);
                                                            $explodes = explode("-",$dates);
                                                            echo $explode[1]." ".$explode[2]." ".$explodes[0];
                                                            @endphp
                                                        </div>
                                                        <div class="row g-0 mt-2">
                                                            <div class="col-5">
                                                                <div class="text-light-grey text-tiny">@lang('lang.Check_in')</div>
                                                                <div class="row g-0">
                                                                    <div class="col-6">
                                                                        <div class="text-light-grey text-check">
                                                                            @php
                                                                            $date = new DateTime($val->check_in);
                                                                            $dates = $val->check_in;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(" ",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[1];
                                                                            @endphp
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="text-light-grey text-small">
                                                                            @php
                                                                            $date = new DateTime($val->check_in);
                                                                            $dates = $val->check_in;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(" ",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[2];
                                                                            @endphp
                                                                        </div>
                                                                        <div class="text-light-grey text-small">
                                                                            @php
                                                                            $date = new DateTime($val->check_in);
                                                                            $dates = $val->check_in;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(",",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[0];
                                                                            @endphp
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-7">
                                                                <div class="vl-left-dash">
                                                                    <div class="text-light-grey text-tiny">@lang('lang.Check_out')
                                                                    </div>
                                                                    <div class="row g-0">
                                                                        <div class="col-6">
                                                                            <div class="text-light-grey text-check">
                                                                            @php
                                                                            $date = new DateTime($val->check_out);
                                                                            $dates = $val->check_out;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(" ",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[1];
                                                                            @endphp
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="text-light-grey text-small">
                                                                            @php
                                                                            $date = new DateTime($val->check_out);
                                                                            $dates = $val->check_out;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(" ",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[2];
                                                                            @endphp
                                                                            </div>
                                                                            <div class="text-light-grey text-small">
                                                                            @php
                                                                            $date = new DateTime($val->check_out);
                                                                            $dates = $val->check_out;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(",",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[0];
                                                                            @endphp
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-price text-grey text-bold text-end mt-4">
                                                            THB <span class="text-red">{{ number_format($val->price) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vl-top-book">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <a style="cursor:pointer" class="text-blue text-small" data-bs-toggle="modal"
                                                        data-bs-target="#confirmation_{{ $val->booking_id }}">@lang('lang.send_booking_confirmation')</a>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="vl-blue">
                                                        <a style="cursor:pointer" class="text-blue text-small"
                                                            href="{{ $val->url_maps }}"
                                                            target="_blank">@lang('lang.view_on_map')
                                                        </a>
                                                        {{-- <a style="cursor:pointer" class="text-blue text-small"
                                                            href="https://www.google.com/maps/dir//16.487357,102.835101/@16.487645,102.843716,15z?hl=th-TH"
                                                            target="_blank">@lang('lang.view_on_map')
                                                        </a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal confirmation-->
                                            <div class="modal fade" id="confirmation_{{ $val->booking_id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form action="{{ url(Session::get('lang').'/mybooking/updated/'.$val->booking_id) }}" method="post" autocomplete="off">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">@lang('lang.get_booking_confirmation')</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label text-bold text-tiny">@lang('lang.email')</label>
                                                                <input type="email" class="form-control"
                                                                    id="email" name="email" required>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn-search-booking">@lang('lang.send_to_email')</button>
                                                                {{-- <div class="text-light-grey text-center text-tiny">@lang('lang.or')</div> --}}
                                                                {{-- <button type="submit" class="btn-blue">@lang('lang.download')</button> --}}
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <a type="submit" class="btn-blue" href="{{ url(Session::get('lang').'/booking_detail/id='.$val->booking_id) }}">@lang('lang.view_details')</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="space-booking"></div>
                        </div>
                        <div class="boxshow">
                            <br>
                            {{-- <br> --}}
                            {{-- <div class="bg-orange-light3 my-4">
                                <div class="text-bold text-filter">@lang('lang.my_booking')</div>
                                <form class="row g-3 mt-1" action="{{ url(Session::get('lang').'/mybooking/search') }}" method="get" autocomplete="off">
                                    <div class="col-sm-6">
                                        <div class="autocomplete">
                                            <input type="text" class="form-control booking" id="room" name="room">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-6">
                                        <button type="submit" class="btn-search-booking">@lang('lang.search')</button>
                                    </div>
                                    <div class="col-sm-3 col-6">
                                        <button type="submit" class="btn-clear">@lang('lang.clear')</button>
                                    </div>
                                </form>
                            </div> --}}
                            @foreach ($mybookings as $key => $val)
                            <div class="card booking mb-3" href="#">
                                <div class="row g-0">
                                    <div class="col-md-3">
                                        <?php $image = DB::table('db_image_poolvilla')->where('poolvilla_id',$val->poolvilla_id)->first();?>
                                        <a href="#">
                                            <img src="{{ asset(@$image->image) }}" class="img-fluid" alt="...">
                                        </a>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-7">
                                                    <div class="name-text">
                                                        @if(Session::get('lang') == 'en')
                                                        {{ $val->name_en }} @else {{ $val->name_th }}
                                                        @endif - {{ $val->name }}
                                                    </div>
                                                    @if ($val->booking_id >= 1 && $val->booking_id <= 9)
                                                    <div class="text-grey text-review">@lang('lang.booking_id') : B0000000{{ $val->booking_id }}</div>
                                                    @elseif ($val->booking_id >= 10 && $val->booking_id <= 99)
                                                    <div class="text-grey text-review">@lang('lang.booking_id') : B000000{{ $val->booking_id }}</div>
                                                    @elseif ($val->booking_id >= 100 && $val->booking_id <= 999)
                                                    <div class="text-grey text-review">@lang('lang.booking_id') : B00000{{ $val->booking_id }}</div>
                                                    @elseif ($val->booking_id >= 1000 && $val->booking_id <= 9999)
                                                    <div class="text-grey text-review">@lang('lang.booking_id') : B0000{{ $val->booking_id }}</div>
                                                    @elseif ($val->booking_id >= 10000 && $val->booking_id <= 99999)
                                                    <div class="text-grey text-review">@lang('lang.booking_id') : B000{{ $val->booking_id }}</div>
                                                    @elseif ($val->booking_id >= 100000 && $val->booking_id <= 999999)
                                                    <div class="text-grey text-review">@lang('lang.booking_id') : B00{{ $val->booking_id }}</div>
                                                    @elseif ($val->booking_id >= 1000000 && $val->booking_id <= 9999999)
                                                    <div class="text-grey text-review">@lang('lang.booking_id') : B0{{ $val->booking_id }}</div>
                                                    @elseif ($val->booking_id >= 10000000 && $val->booking_id <= 99999999)
                                                    <div class="text-grey text-review">@lang('lang.booking_id') : B{{ $val->booking_id }}</div>
                                                    @elseif ($val->booking_id >= 100000000)
                                                    <div class="text-grey text-review">@lang('lang.booking_id') : B{{ $val->booking_id }}</div>
                                                    @endif
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="vl-left">
                                                        <div class="text-light-grey text-small">@lang('lang.booked_on') 
                                                            @php
                                                            $date = new DateTime($val->booking_date);
                                                            $dates = $val->booking_date;
                                                            $newdate = $date->format(DateTime::RFC822); 
                                                            $explode = explode(" ",$newdate);
                                                            $explodes = explode("-",$dates);
                                                            echo $explode[1]." ".$explode[2]." ".$explodes[0];
                                                            @endphp
                                                        </div>
                                                        <div class="row g-0 mt-2">
                                                            <div class="col-5">
                                                                <div class="text-light-grey text-tiny">@lang('lang.Check_in')</div>
                                                                <div class="row g-0">
                                                                    <div class="col-6">
                                                                        <div class="text-light-grey text-check">
                                                                            @php
                                                                            $date = new DateTime($val->check_in);
                                                                            $dates = $val->check_in;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(" ",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[1];
                                                                            @endphp
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="text-light-grey text-small">
                                                                            @php
                                                                            $date = new DateTime($val->check_in);
                                                                            $dates = $val->check_in;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(" ",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[2];
                                                                            @endphp
                                                                        </div>
                                                                        <div class="text-light-grey text-small">
                                                                            @php
                                                                            $date = new DateTime($val->check_in);
                                                                            $dates = $val->check_in;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(",",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[0];
                                                                            @endphp
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-7">
                                                                <div class="vl-left-dash">
                                                                    <div class="text-light-grey text-tiny">@lang('lang.Check_out')
                                                                    </div>
                                                                    <div class="row g-0">
                                                                        <div class="col-6">
                                                                            <div class="text-light-grey text-check">
                                                                                @php
                                                                                $date = new DateTime($val->check_out);
                                                                                $dates = $val->check_out;
                                                                                $newdate = $date->format(DateTime::RFC822); 
                                                                                $explode = explode(" ",$newdate);
                                                                                $explodes = explode("-",$dates);
                                                                                echo $explode[1];
                                                                                @endphp
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="text-light-grey text-small">
                                                                            @php
                                                                            $date = new DateTime($val->check_out);
                                                                            $dates = $val->check_out;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(" ",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[2];
                                                                            @endphp
                                                                            </div>
                                                                            <div class="text-light-grey text-small">
                                                                            @php
                                                                            $date = new DateTime($val->check_out);
                                                                            $dates = $val->check_out;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(",",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[0];
                                                                            @endphp
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-price text-grey text-bold text-end mt-4">
                                                            THB <span class="text-red">{{ number_format($val->price) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vl-top-book">
                                    <div class="row">
                                        <div class="col-sm-9">
                                        </div>
                                        <div class="col-sm-3">
                                            <a type="submit" class="btn-blue" href="{{ url(Session::get('lang').'/booking_detail/id='.$val->booking_id) }}">@lang('lang.view_details')</a>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            @endforeach
                            <div class="space-booking"></div>
                        </div>
                        <div class="boxshow">
                            <br>
                            {{-- <br> --}}
                            {{-- <div class="bg-orange-light3 my-4">
                                <div class="text-bold text-filter">@lang('lang.my_booking')</div>
                                <form class="row g-3 mt-1" action="{{ url(Session::get('lang').'/mybooking/search') }}" method="get" autocomplete="off">
                                    <div class="col-sm-6">
                                        <div class="autocomplete">
                                            <input type="text" class="form-control booking" id="room" name="room">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-6">
                                        <button type="submit" class="btn-search-booking">@lang('lang.search')</button>
                                    </div>
                                    <div class="col-sm-3 col-6">
                                        <button type="submit" class="btn-clear">@lang('lang.clear')</button>
                                    </div>
                                </form>
                            </div> --}}
                            @foreach ($Mybookings as $key => $val)
                            <div class="card booking mb-3" href="#">
                                <div class="row g-0">
                                    <div class="col-md-3">
                                        <?php $image = DB::table('db_image_poolvilla')->where('poolvilla_id',$val->poolvilla_id)->first();?>
                                        <a href="#">
                                            <img src="{{ asset(@$image->image) }}" class="img-fluid" alt="...">
                                        </a>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-7">
                                                    <div class="name-text">
                                                        @if(Session::get('lang') == 'en')
                                                        {{ $val->name_en }} @else {{ $val->name_th }}
                                                        @endif - {{ $val->name }}
                                                    </div>
                                                    @if ($val->booking_id >= 1 && $val->booking_id <= 9)
                                                    <div class="text-grey text-review">@lang('lang.booking_id') : B0000000{{ $val->booking_id }}</div>
                                                    @elseif ($val->booking_id >= 10 && $val->booking_id <= 99)
                                                    <div class="text-grey text-review">@lang('lang.booking_id') : B000000{{ $val->booking_id }}</div>
                                                    @elseif ($val->booking_id >= 100 && $val->booking_id <= 999)
                                                    <div class="text-grey text-review">@lang('lang.booking_id') : B00000{{ $val->booking_id }}</div>
                                                    @elseif ($val->booking_id >= 1000 && $val->booking_id <= 9999)
                                                    <div class="text-grey text-review">@lang('lang.booking_id') : B0000{{ $val->booking_id }}</div>
                                                    @elseif ($val->booking_id >= 10000 && $val->booking_id <= 99999)
                                                    <div class="text-grey text-review">@lang('lang.booking_id') : B000{{ $val->booking_id }}</div>
                                                    @elseif ($val->booking_id >= 100000 && $val->booking_id <= 999999)
                                                    <div class="text-grey text-review">@lang('lang.booking_id') : B00{{ $val->booking_id }}</div>
                                                    @elseif ($val->booking_id >= 1000000 && $val->booking_id <= 9999999)
                                                    <div class="text-grey text-review">@lang('lang.booking_id') : B0{{ $val->booking_id }}</div>
                                                    @elseif ($val->booking_id >= 10000000 && $val->booking_id <= 99999999)
                                                    <div class="text-grey text-review">@lang('lang.booking_id') : B{{ $val->booking_id }}</div>
                                                    @elseif ($val->booking_id >= 100000000)
                                                    <div class="text-grey text-review">@lang('lang.booking_id') : B{{ $val->booking_id }}</div>
                                                    @endif
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="vl-left">
                                                        <div class="text-light-grey text-small">@lang('lang.booked_on') 
                                                            @php
                                                            $date = new DateTime($val->booking_date);
                                                            $dates = $val->booking_date;
                                                            $newdate = $date->format(DateTime::RFC822); 
                                                            $explode = explode(" ",$newdate);
                                                            $explodes = explode("-",$dates);
                                                            echo $explode[1]." ".$explode[2]." ".$explodes[0];
                                                            @endphp
                                                        </div>
                                                        <div class="row g-0 mt-2">
                                                            <div class="col-5">
                                                                <div class="text-light-grey text-tiny">@lang('lang.Check_in')</div>
                                                                <div class="row g-0">
                                                                    <div class="col-6">
                                                                        <div class="text-light-grey text-check">
                                                                            @php
                                                                            $date = new DateTime($val->check_in);
                                                                            $dates = $val->check_in;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(" ",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[1];
                                                                            @endphp
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="text-light-grey text-small">
                                                                            @php
                                                                            $date = new DateTime($val->check_in);
                                                                            $dates = $val->check_in;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(" ",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[2];
                                                                            @endphp
                                                                        </div>
                                                                        <div class="text-light-grey text-small">
                                                                            @php
                                                                            $date = new DateTime($val->check_in);
                                                                            $dates = $val->check_in;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(",",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[0];
                                                                            @endphp
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-7">
                                                                <div class="vl-left-dash">
                                                                    <div class="text-light-grey text-tiny">@lang('lang.Check_out')
                                                                    </div>
                                                                    <div class="row g-0">
                                                                        <div class="col-6">
                                                                            <div class="text-light-grey text-check">
                                                                                @php
                                                                                $date = new DateTime($val->check_out);
                                                                                $dates = $val->check_out;
                                                                                $newdate = $date->format(DateTime::RFC822); 
                                                                                $explode = explode(" ",$newdate);
                                                                                $explodes = explode("-",$dates);
                                                                                echo $explode[1];
                                                                                @endphp
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="text-light-grey text-small">
                                                                            @php
                                                                            $date = new DateTime($val->check_out);
                                                                            $dates = $val->check_out;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(" ",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[2];
                                                                            @endphp
                                                                            </div>
                                                                            <div class="text-light-grey text-small">
                                                                            @php
                                                                            $date = new DateTime($val->check_out);
                                                                            $dates = $val->check_out;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(",",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[0];
                                                                            @endphp
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-price text-grey text-bold text-end mt-4">
                                                            THB <span class="text-red">{{ number_format($val->price) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vl-top-book">
                                    <div class="row">
                                        <div class="col-sm-9">
                                        </div>
                                        <div class="col-sm-3">
                                            <a type="submit" class="btn-blue" href="{{ url(Session::get('lang').'/booking_detail/id='.$val->booking_id) }}">@lang('lang.view_details')</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="space-booking"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('frontend/inc_footer')
    <script>
        $('.btn_show').click(function (event) {
            var rsnum = $(this).index();
            if ($(".boxshow").eq(rsnum).is(":hidden")) {
                $(".boxshow").hide();
                $(".boxshow").eq(rsnum).fadeIn();
            } else {}
            event.stopPropagation();
        });
    
        $(function () {
            $('.btn_show').click(function () {
                $('.btn_show').removeClass('active');
                $(this).addClass('active');
            });
        });

        // $('#room').on('keyup', function () {
        //     var input = $(this);
        //     if (input.val().length === 0) {
        //         input.addClass('empty');
        //     } else {
        //         input.removeClass('empty');
        //     }
        // });
    
    </script>
    {{-- <script>
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
        autocomplete(document.getElementById("room"), poolvilla);
    </script> --}}
</body>

</html>


