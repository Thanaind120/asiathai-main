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
</head>

<body>
    @include('frontend/inc_navbar')
    <div class="bg-orange">
        {{-- <div class="clearfix">
            <div class="float-end width-search">
                <input class="form-control empty orange" type="text" id="iconified" placeholder="&#xF002;  Where  are  you  looking for ?"aria-label="default input example">
            </div>
        </div> --}}
    </div>
    <div class="bg-grey-2">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="none-mobile">
                        <div class="box-sidebaraccount mt-3">
                            <a href="{{ url(Session::get('lang').'/mybooking') }}" class="menu-account">
                                <div class="text-menu-account active">
                                    <div class="row">
                                        <div class="col-2"><i class="far fa-calendar"></i></div>
                                        <div class="col-10">@lang('lang.my_booking')</div>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ url(Session::get('lang').'/review') }}" class="menu-account">
                                <div class="text-menu-account">
                                    <div class="row">
                                        <div class="col-2"><i class="far fa-star"></i></div>
                                        <div class="col-10">@lang('lang.my_review')</div>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ url(Session::get('lang').'/profile') }}" class="menu-account">
                                <div class="text-menu-account">
                                    <div class="row">
                                        <div class="col-2"><i class="far fa-user"></i></div>
                                        <div class="col-10">@lang('lang.profile')</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="mt-4"></div>
                    <a href="{{ url(Session::get('lang').'/mybooking') }}" class="text-sort-by"><i
                            class="fas fa-chevron-left text-light-grey me-2"></i>@lang('lang.back_to_bookings')</a>
                    <div class="box-white my-4">
                        <div class="text-bold text-filter">@lang('lang.yourbooking_isconfirmed_noreconfirmation_required')</div>
                        <div class="row mt-2">
                            <div class="col-sm-6">
                                <a style="cursor:pointer" class="text-tiny text-orange" data-bs-toggle="modal" data-bs-target="#confirmation_{{ $mybooking->booking_id }}">
                                    <i class="fas fa-envelope me-2"></i>@lang('lang.get_booking_confirmation')
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a style="cursor:pointer" class="text-tiny text-orange" data-bs-toggle="modal" data-bs-target="#guest_{{ $mybooking->booking_id }}"><i
                                        class="fas fa-user-tie me-2"></i>@lang('lang.manage_guest')</a>
                            </div>
                            <div class="col-sm-6">
                                <a style="cursor:pointer" class="text-tiny text-orange" data-bs-toggle="modal" data-bs-target="#cancel_{{ $mybooking->booking_id }}"><i
                                        class="fas fa-ban me-2"></i>@lang('lang.cancel_booking')</a>
                            </div>
                            <div class="col-sm-6">
                                <a style="cursor:pointer" class="text-tiny text-orange" data-bs-toggle="modal" data-bs-target="#policies"><i
                                        class="fas fa-file-alt me-2"></i>@lang('lang.view_propoty_policies')</a>
                            </div>
                        </div>
                    </div>
                    <!-- Modal confirmation-->
                    <div class="modal fade" id="confirmation_{{ $mybooking->booking_id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="{{ url(Session::get('lang').'/mybooking/updated/'.$mybooking->booking_id) }}" method="post" autocomplete="off">
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
                    <!-- Modal guest-->
                    <div class="modal fade" id="guest_{{ $mybooking->booking_id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="{{ url(Session::get('lang').'/mybooking/update/'.$mybooking->booking_id) }}" method="post" autocomplete="off">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">@lang('lang.manage_guest')</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="exampleFormControlInput2"
                                                    class="form-label text-bold text-tiny">@lang('lang.first_name') - @lang('lang.last_name')</label>
                                                <input type="text" class="form-control" id="fullname1" name="fullname1" value="{{ $mybooking->fullname1 }}">
                                            </div>
                                            {{-- <div class="col-sm-6">
                                                <label for="exampleFormControlInput3"
                                                    class="form-label text-bold text-tiny">@lang('lang.last_name')</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput3">
                                            </div> --}}
                                        {{-- </div> --}}
                                        {{-- <div id="Create" style="display:none"> --}}
                                            {{-- <div class="row"> --}}
                                            @if(isset($mybooking->fullname2))
                                            <div id="Create" class="col-sm-6">
                                                <label for="exampleFormControlInput2"
                                                    class="form-label text-bold text-tiny">@lang('lang.first_name') - @lang('lang.last_name')</label>
                                                <input type="text" class="form-control" id="fullname2" name="fullname2" value="{{ $mybooking->fullname2 }}">
                                            </div>
                                            @else
                                            <div id="Create" style="display:none" class="col-sm-6">
                                                <label for="exampleFormControlInput2"
                                                    class="form-label text-bold text-tiny">@lang('lang.first_name') - @lang('lang.last_name')</label>
                                                <input type="text" class="form-control" id="fullname2" name="fullname2" value="">
                                            </div>
                                            @endif
                                                {{-- <div class="col-sm-6">
                                                    <label for="exampleFormControlInput3"
                                                        class="form-label text-bold text-tiny">@lang('lang.last_name')</label>
                                                    <input type="text" class="form-control" id="exampleFormControlInput3">
                                                </div> --}}
                                        </div>
                                        {{-- </div> --}}
                                        <div>
                                            <input style="cursor:pointer" id="btn" class="text-small text-blue btn-anoter"
                                                value="@lang('lang.add_another_guest')">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="row g-1 justify-content-end">
                                            <div class="col-4">
                                                <button type="submit" class="btn-grey"
                                                    data-bs-dismiss="modal">@lang('lang.cancel')</button>
                                            </div>
                                            <div class="col-4">
                                                <button type="submit" class="btn-search-booking">@lang('lang.save')</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal cancel-->
                    <div class="modal fade" id="cancel_{{ $mybooking->booking_id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="{{ url(Session::get('lang').'/mybooking/cancel/'.$mybooking->booking_id) }}" method="post" autocomplete="off">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">@lang('lang.cancel_booking')</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="exampleFormControlInput1" class="form-label text-bold text-tiny">@lang('lang.reason_for_cancellation')</label>
                                        <div class="dropdown">
                                            {{-- <button class="btn-reason-cancel dropdown-toggle" type="button"
                                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                @lang('lang.select_an_option')
                                            </button> --}}
                                            {{-- <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1"> --}}
                                            <select class="js-example-basic-single" style="width: 100%" id="cancle_comment" name="cancle_comment">
                                                <option value="">@lang('lang.please_select')</option>
                                                <option value="@lang('lang.booking_was_not_confirmed_quickly_enough')">@lang('lang.booking_was_not_confirmed_quickly_enough')</option>
                                                <option value="@lang('lang.concerns_about_reliabilityandtrustworthiness')">@lang('lang.concerns_about_reliabilityandtrustworthiness')</option>
                                                <option value="@lang('lang.concerns_about_safety_at_thehotel_location')">@lang('lang.concerns_about_safety_at_thehotel_location')</option>
                                                <option value="@lang('lang.decided_on_a_different_hotel_not_offered_byyour_site')">@lang('lang.decided_on_a_different_hotel_not_offered_byyour_site')</option>
                                                <option value="@lang('lang.did_not_like_cancellation_terms')">@lang('lang.did_not_like_cancellation_terms')</option>
                                                <option value="@lang('lang.did_not_like_payment_terms')">@lang('lang.did_not_like_payment_terms')</option>
                                                <option value="@lang('lang.forced_to_cancel_or_postpone_trip')">@lang('lang.forced_to_cancel_or_postpone_trip')</option>
                                                <option value="@lang('lang.found_lower_price_on_the_Internet')">@lang('lang.found_lower_price_on_the_Internet')</option>
                                                <option value="@lang('lang.found_lower_price_through_a_local_agent')">@lang('lang.found_lower_price_through_a_local_agent')</option>
                                                <option value="@lang('lang.natural_disaster')">@lang('lang.natural_disaster')</option>
                                                <option value="@lang('lang.will_book_a_different_hotel_through_your_site')">@lang('lang.will_book_a_different_hotel_through_your_site')</option>
                                                <option value="@lang('lang.will_book_with_hotel_directly')">@lang('lang.will_book_with_hotel_directly')</option>
                                                <option value="@lang('lang.other')">@lang('lang.other')</option>
                                            </select>
                                                {{-- <li><a class="dropdown-item" href="#">@lang('lang.booking_was_not_confirmed_quickly_enough')</a></li>
                                                <li><a class="dropdown-item" href="#">@lang('lang.concerns_about_reliabilityandtrustworthiness')</a></li>
                                                <li><a class="dropdown-item" href="#">@lang('lang.concerns_about_safety_at_thehotel_location')</a></li>
                                                <li><a class="dropdown-item" href="#">@lang('lang.decided_on_a_different_hotel_not_offered_byyour_site')</a></li>
                                                <li><a class="dropdown-item" href="#">@lang('lang.did_not_like_cancellation_terms')</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">@lang('lang.did_not_like_payment_terms')</a></li>
                                                <li><a class="dropdown-item" href="#">@lang('lang.forced_to_cancel_or_postpone_trip')</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">@lang('lang.found_lower_price_on_the_Internet')</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">@lang('lang.found_lower_price_through_a_local_agent')</a></li>
                                                <li><a class="dropdown-item" href="#">@lang('lang.natural_disaster')</a></li>
                                                <li><a class="dropdown-item" href="#">@lang('lang.will_book_a_different_hotel_through_your_site')</a></li>
                                                <li><a class="dropdown-item" href="#">@lang('lang.will_book_with_hotel_directly')</a></li>
                                                <li><a class="dropdown-item" href="#">@lang('lang.other')</a></li> --}}
                                            {{-- </ul> --}}
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="row g-1 justify-content-end">
                                            <div class="col-4">
                                                <button type="button" class="btn-grey"
                                                    data-bs-dismiss="modal">@lang('lang.cancel')</button>
                                            </div>
                                            <div class="col-4">
                                                <button type="submit" class="btn-search-booking">@lang('lang.cancel_booking')</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal policies-->
                    <div class="modal fade" id="policies" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">@lang('lang.view_propoty_policies')</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-small text-bold text-grey">@lang('lang.title')</div>
                                    <div class="text-small  text-grey">@lang('lang.title_details')</div>
                                    <div class="text-small text-bold text-grey">@lang('lang.title')</div>
                                    <div class="text-small  text-grey">@lang('lang.title_details')</div>
                                </div>
                                <div class="modal-footer"></div>
                            </div>
                        </div>
                    </div>
                    <div class="box-white my-4">
                        <div class="row">
                            <div class="col-md-3">
                                <?php $image = DB::table('db_image_poolvilla')->where('poolvilla_id',$mybooking->poolvilla_id)->first();?>
                                <a href="#">
                                    <img src="{{ asset(@$image->image) }}" class="img-fluid" alt="...">
                                </a>
                            </div>
                            <div class="col-md-9">
                                <div class="mb-4">
                                    <div class="name-text">
                                        @if(Session::get('lang') == 'en')
                                            {{ $mybooking->name_en }} 
                                        @else 
                                            {{ $mybooking->name_th }}
                                        @endif - {{ $mybooking->name }}
                                    </div>
                                    <div class="mb-2">
                                        @if ($mybooking->star_rating == 5)
                                        <i class="fas fa-star text-orange size-star"></i>
                                        <i class="fas fa-star text-orange size-star"></i>
                                        <i class="fas fa-star text-orange size-star"></i>
                                        <i class="fas fa-star text-orange size-star"></i>
                                        <i class="fas fa-star text-orange size-star"></i>
                                        @elseif ($mybooking->star_rating == 4)
                                        <i class="fas fa-star text-orange size-star"></i>
                                        <i class="fas fa-star text-orange size-star"></i>
                                        <i class="fas fa-star text-orange size-star"></i>
                                        <i class="fas fa-star text-orange size-star"></i>
                                        @elseif ($mybooking->star_rating == 3)
                                        <i class="fas fa-star text-orange size-star"></i>
                                        <i class="fas fa-star text-orange size-star"></i>
                                        <i class="fas fa-star text-orange size-star"></i>
                                        @elseif ($mybooking->star_rating == 2)
                                        <i class="fas fa-star text-orange size-star"></i>
                                        <i class="fas fa-star text-orange size-star"></i>
                                        @elseif ($mybooking->star_rating == 1)
                                        <i class="fas fa-star text-orange size-star"></i>
                                        @endif
                                    </div>
                                    <div class="text-blue text-tiny"><i class="fas fa-phone me-2"></i>{{ $mybooking->phone1 }}, @if (isset($mybooking->phone2)) {{ $mybooking->phone1 }} @endif</div>
                                    <div class="text-blue text-tiny"><i class="fas fa-map-marker-alt me-2"></i> 
                                        @if(Session::get('lang') == 'en')
                                            {{ $mybooking->province_en }} 
                                        @else 
                                            {{ $mybooking->province_th }}
                                        @endif
                                        , @if(Session::get('lang') == 'en')
                                        {{ $mybooking->district_en }} 
                                        @else 
                                        {{ $mybooking->district_th }}
                                        @endif
                                        <span>
                                            {{-- <a href="https://www.google.com/maps/dir//16.487357,102.835101/@16.487645,102.843716,15z?hl=th-TH"
                                                class="btn-link-map" target="_blank">@lang('lang.show_on_map')</a> --}}
                                            <a href="{{ $mybooking->url_maps }}"
                                                class="btn-link-map" target="_blank">@lang('lang.show_on_map')</a>
                                        </span>
                                    </div>
                                </div>
                                <div class="vl-booking-detail">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold">@lang('lang.booking_id')</div>
                                        </div>
                                        <div class="col-sm-8">
                                            @if ($mybooking->booking_id >= 1 && $mybooking->booking_id <= 9)
                                            <div class="text-tiny">@lang('lang.booking_id') : B0000000{{ $mybooking->booking_id }}</div>
                                            @elseif ($mybooking->booking_id >= 10 && $mybooking->booking_id <= 99)
                                            <div class="text-tiny">@lang('lang.booking_id') : B000000{{ $mybooking->booking_id }}</div>
                                            @elseif ($mybooking->booking_id >= 100 && $mybooking->booking_id <= 999)
                                            <div class="text-tiny">@lang('lang.booking_id') : B00000{{ $mybooking->booking_id }}</div>
                                            @elseif ($mybooking->booking_id >= 1000 && $mybooking->booking_id <= 9999)
                                            <div class="text-tiny">@lang('lang.booking_id') : B0000{{ $mybooking->booking_id }}</div>
                                            @elseif ($mybooking->booking_id >= 10000 && $mybooking->booking_id <= 99999)
                                            <div class="text-tiny">@lang('lang.booking_id') : B000{{ $mybooking->booking_id }}</div>
                                            @elseif ($mybooking->booking_id >= 100000 && $mybooking->booking_id <= 999999)
                                            <div class="text-tiny">@lang('lang.booking_id') : B00{{ $mybooking->booking_id }}</div>
                                            @elseif ($mybooking->booking_id >= 1000000 && $mybooking->booking_id <= 9999999)
                                            <div class="text-tiny">@lang('lang.booking_id') : B0{{ $mybooking->booking_id }}</div>
                                            @elseif ($mybooking->booking_id >= 10000000 && $mybooking->booking_id <= 99999999)
                                            <div class="text-tiny">@lang('lang.booking_id') : B{{ $mybooking->booking_id }}</div>
                                            @elseif ($mybooking->booking_id >= 100000000)
                                            <div class="text-tiny">@lang('lang.booking_id') : B{{ $mybooking->booking_id }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="vl-booking-detail">
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold">@lang('lang.check_in')</div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-tiny">
                                                @php
                                                $date = new DateTime($mybooking->check_in);
                                                $dates = $mybooking->check_in;
                                                $newdate = $date->format(DateTime::RFC822); 
                                                $explode = explode(" ",$newdate);
                                                $explodes = explode("-",$dates);
                                                echo $explode[1]." ".$explode[2]." ".$explodes[0];
                                                @endphp
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold">@lang('lang.check_out')</div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-tiny">
                                                @php
                                                $date = new DateTime($mybooking->check_out);
                                                $dates = $mybooking->check_out;
                                                $newdate = $date->format(DateTime::RFC822); 
                                                $explode = explode(" ",$newdate);
                                                $explodes = explode("-",$dates);
                                                echo $explode[1]." ".$explode[2]." ".$explodes[0];
                                                @endphp
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold"></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-tiny">
                                                @php
                                                $date1 = date_create($mybooking->check_in);
                                                $date2 = date_create($mybooking->check_out);
                                                $diff = date_diff($date1,$date2);
                                                $explode = $diff->format("%a days");
                                                $explodes = explode(" ",$explode);
                                                echo $explodes[0];
                                                @endphp
                                                @lang('lang.nights')</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vl-booking-detail">
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold">@lang('lang.contact_detail')</div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-tiny">@lang('lang.email') @if($mybooking->email != '') : {{ $mybooking->email }} @endif</div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold"></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-tiny">{{ $mybooking->phone1 }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vl-booking-detail">
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold">@lang('lang.lead_guest')</div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-tiny">{{ $mybooking->fullname1 }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vl-booking-detail">
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold">@lang('lang.additional_guest')</div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-tiny">{{ $mybooking->fullname2 }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="title-booking-detail">@lang('lang.rooms')</div>
                        <div class="row mt-4">
                            <div class="col-md-3">
                                <?php $image = DB::table('db_image_poolvilla')->where('poolvilla_id',$mybooking->poolvilla_id)->first();?>
                                <a href="#">
                                    <img src="{{ asset(@$image->image) }}" class="img-fluid" alt="...">
                                </a>
                                <div class="text-small text-light-grey mt-2">@lang('lang.room_size') : {{ $mybooking->size }}</div>
                                <div class="text-small text-light-grey mt-1">{{ $mybooking->king_bed }} King bed & {{ $mybooking->queen_bed }}  Queen bed</div>
                                <div class="text-small text-light-grey mt-1">Private pool</div>
                            </div>
                            <div class="col-md-9">
                                <div class="vl-booking-detail">
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold">@lang('lang.rooms_booked')</div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-tiny">privates pool (x{{ $mybooking->number_of_room }})</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vl-booking-detail">
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold">@lang('lang.booked_capacity')</div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-tiny">{{ $mybooking->booking_adult }} adults</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vl-booking-detail">
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold">@lang('lang.max_capacity')</div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-tiny">{{ $mybooking->room_adult }} adults</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vl-booking-detail">
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold">@lang('lang.room_type')</div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-tiny">Privated pool</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vl-booking-detail">
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold">@lang('lang.room_capacity')</div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-tiny">Max {{ $mybooking->max_room }} adults</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="title-booking-detail">@lang('lang.payment')</div>
                        <div class="row mt-4">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <div class="vl-booking-detail">
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold">@lang('lang.payment_details')</div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="text-tiny">@lang('lang.total_amount_charged')</div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-tiny">THB {{ number_format($mybooking->price) }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vl-booking-detail">
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold">@lang('lang.payment_methods')</div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="text-tiny">@lang('lang.card_holder_name')</div>
                                                </div>
                                                <div class="col-6">
                                                    <?php $member = DB::table('db_payment')->where('id_member', Auth::guard('member')->user()->id)->first();?>
                                                    <div class="text-tiny">@if(isset($member->credit_number)) {{ $member->credit_number }} @else xxxx-xxxx-xxxx-xxxx @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="text-tiny">@lang('lang.card_type')</div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-tiny">Visa</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="text-tiny">@lang('lang.card_number')</div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-tiny">
                                                        @php
                                                        $payment = isset($member->credit_cvv);
                                                        $explode = explode("-",$payment);
                                                        if(isset($explode[3])){
                                                            echo 'xxxx-xxxx-xxxx-'.$explode[3];
                                                        } else {
                                                            echo 'xxxx-xxxx-xxxx-xxxx';
                                                        }
                                                        @endphp
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('frontend/inc_footer')
</body>

</html>

<script type="text/javascript">
    $(document).ready(function () {
        $("#btn").click(function () {
            $("#Create").toggle();
        });
    });

</script>
