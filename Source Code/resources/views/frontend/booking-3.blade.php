<!doctype html>
<html lang="th">
<head>      
    <title>@lang('lang.poolvilla')</title>
    @include('frontend/inc_header')
    <link rel="stylesheet" href="{{ asset('assets_frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_frontend/css/owl.theme.default.min.css') }}">
    <script src="{{ asset('assets_frontend/js/owl.carousel.min.js') }}"></script>
</head>
<body >
    @include('frontend/inc_navbar')
    <div class="bg-orange">
        <div class="booking-step">
            <div class="row g-0 justify-content-center">
                <div class="col-auto">
                    <div class="round-booking step">1</div>
                </div>
                <div class="col-4">
                    <div class="line-booking step"></div>
                </div>
                <div class="col-auto">
                    <div class="round-booking step">2</div>
                </div>
                <div class="col-4">
                    <div class="line-booking step"></div>
                </div>
                <div class="col-auto">
                    <div class="round-booking step">3</div>
                </div>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-4">
                   <div class="text-tiny text-white text-star">@lang('lang.customer_information')</div>
                </div>
               
                <div class="col-4">
                    <div class="text-tiny text-white text-center">@lang('lang.customer_information')</div>
                </div>
                
                <div class="col-4">
                    <div class="text-tiny text-white text-end">@lang('lang.customer_information')</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row g-2">
        <div class="col-sm-9">
            <div class="box-white">
                <div class="row justify-content-center my-4">
                 <div class="col-sm-5 col-8">
                    <img src="{{ asset('assets_frontend/images/complete-book.jpg') }}" class="w-100">
                 </div>  
                </div>
                <div class="text-complete text-grey text-center">Your booking is now complete !</div>
                <div class="text-head-sign text-grey my-2">Enjoy your <span class="text-orange">trip</span></div>
                <div class="text-tiny text-grey">
                    <i class="fas fa-check text-green me-2"></i>In the next 10 minutes your'll receive a booking confirmation with booking details in your inbox at *email*
                </div>
                <div class="text-tiny text-grey">
                    <i class="fas fa-check text-green me-2"></i>Your booking ID is Poo{{sprintf('%06d', $booking->id)}}
                </div>
                <div class="text-tiny text-grey">
                    <i class="fas fa-check text-green me-2"></i>Please present this confirmation at check-in
                </div>
            </div>
            <div class="for-mobile">
                <div class="box-white">
                    <div class="row g-2">
                    <div class="col-6">
                        <a href="#">
                            <img src="{{ asset($image_poolvilla->image) }}" class="img-fluid rounded-start" alt="...">
                        </a>
                    </div>
                    <div class="col-6">
                        <div class="text-medium text+grey text-bold">{{$room->name_en}}</div>
                        <div>
                            @for($i=0;$i<$room->star_rating;$i++)
                                    <i class="fas fa-star text-orange text-small"></i>

                            @endfor
                        </div>
                        <div class="text-blue text-tiny"><i class="fas fa-map-marker-alt me-1 text-small"></i>{{$room->district_name}} , {{$room->province_name}}
                          
                        </div>
                    </div>
                </div>
                    <div class="row mt-1 g-2">
                    <div class="col-9">
                        <div class="text-bold text-tiny text-grey">{{date("d M Y", strtotime($booking->check_in))}} - {{date("d M Y", strtotime($booking->check_out))}}</div>
                    </div>
                    <div class="col-3">
                        <div class="text-bold text-tiny text-grey">{{$booking->number_of_night}} nights</div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-9">
                        <div class="text-bold text-tiny text-grey">{{$booking->number_of_room}} X {{$room->name}}</div>
                    </div>
                    <div class="col-3">
                    </div>
                </div>
                <div class="text-grey text-small"><i class="fas fa-award me-2"></i>Room Special offer : Early Check-in {{$room->check_in_from}}:{{sprintf('%02d', $room->check_in_unit)}} o'clock  and Late Check-out {{$room->check_out_from}}:{{sprintf('%02d', $room->check_out_unit)}} o'clock</div>
                <div class="text-grey text-small"><i class="fas fa-user me-2"></i>{{$booking->number_of_room}} room,{{$booking->adult}} adults @if(@$booking->kid>0),{{$booking->kid}} children(0-3 years)@endif</div>
                <div class="text-grey text-small"><i class="fas fa-users me-2"></i>Max {{$room->adult}} adults, {{$room->kids}} children(0-3 years)</div>
                </div>
            </div>
            <div class="row g-2 justify-content-center">
                <div class="col-sm-4">
                    <a class="btn-finish" href="{{ url(Session::get('lang').'/select-rooms/'.$room->poolvilla_id.'/'.$today.'/'.$tomorrow.'/adult=1/kid=0/room=1') }}">Book another room</a>
                </div>
                <div class="col-sm-4">
                    <a class="btn-finish" href="{{ url(Session::get('lang').'/') }}">Book another hotel</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="none-mobile">
            <div class="box-white">
                <div class="row g-2">
                    <div class="col-lg-5">
                        <a href="#">
                            <img src="{{ asset($image_poolvilla->image)}}" class="img-fluid rounded-start" alt="...">
                        </a>
                    </div>
                    <div class="col-lg-7">
                        <div class="text-medium text+grey text-bold">{{$room->name_en}}</div>
                        <div>
                        @for($i=0;$i<$room->star_rating;$i++)
                                    <i class="fas fa-star text-orange text-small"></i>
                               
                         @endfor
                        </div>
                        <div class="text-blue text-tiny"><i class="fas fa-map-marker-alt me-1 text-small"></i>{{$room->district_name}} , {{$room->province_name}}
                          
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-white">
                <div class="row g-2">
                    <div class="col-lg-9">
                        <div class="text-bold text-tiny text-grey">{{date("d M Y", strtotime($booking->check_in))}} - {{date("d M Y", strtotime($booking->check_out))}}</div>
                    </div>
                    <div class="col-lg-3">
                        <div class="text-bold text-tiny text-grey">{{$booking->number_of_night}} nights</div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-9">
                        <div class="text-bold text-tiny text-grey">{{$booking->number_of_room}} X {{$room->name}}</div>
                    </div>
                    <div class="col-lg-3">
                    </div>
                </div>
                <div class="text-grey text-small"><i class="fas fa-award me-2"></i>Room Special offer : Early Check-in {{$room->check_in_from}}:{{sprintf('%02d', $room->check_in_unit)}} o'clock  and Late Check-out {{$room->check_out_from}}:{{sprintf('%02d', $room->check_out_unit)}} o'clock</div>
                <div class="text-grey text-small"><i class="fas fa-user me-2"></i>{{$booking->number_of_room}} room,{{$booking->adult}} adults @if(@$booking->kid>0),{{$booking->kid}} children(0-3 years)@endif</div>
                <div class="text-grey text-small"><i class="fas fa-users me-2"></i>Max {{$room->adult}} adults, {{$room->kids}} children(0-3 years)</div>
            </div>
            <div class="box-white">
                <div class="row g-2 justify-content-between">
                    <div class="col-sm-8">
                        <div class="text-tiny text-grey">Price({{$booking->number_of_room}} room X {{$booking->number_of_night}} nights)</div>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-tiny text-end text-grey">{{number_format($booking->price)}} THB</div>
                    </div>
                </div>
                <!-- <div class="row g-2 justify-content-between vl-total">
                    <div class="col-sm-8">
                        <div class="text-tiny text-grey">Discount</div>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-tiny text-red text-end">2,000 THB</div>
                    </div>
                </div> -->
                <div class="row g-2 justify-content-between">
                    <div class="col-sm-8">
                        <div class="text-tiny text-grey">Total</div>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-tiny text-end text-grey">{{number_format($booking->price)}} THB</div>
                    </div>
                </div>
                <div class="text-small mt-1"><span class="text-bold">Inculded in price :</span>Service charge 10%, Tax 7%, City tax 1%</div>
                
            </div>
        </div>
            </div>
        </div>
    </div>
        <div class="space-footer"></div>
        @include('frontend/inc_footer')
</body>
</html>

<script>