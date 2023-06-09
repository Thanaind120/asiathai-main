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
    <div class="bg-orange">
        <div class="booking-step">
            <div class="row g-0 justify-content-center">
                <div class="col-auto">
                    <div class="round-booking step">1</div>
                </div>
                <div class="col-4">
                    <div class="line-booking"></div>
                </div>
                <div class="col-auto">
                    <div class="round-booking">2</div>
                </div>
                <div class="col-4">
                    <div class="line-booking"></div>
                </div>
                <div class="col-auto">
                    <div class="round-booking">3</div>
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
                    <div class="row g-1">
                        <div class="col-auto">
                            <i class="fas fa-user-circle text-orange text-medium"></i>
                        </div>
                        <div class="col-auto">
                            <div class="text-orange text-medium">@lang('lang.welcome'),@if(Auth::guard('member')->user()
                                != null) {{ Auth::guard('member')->user()->firstname }} @else Elle @endif
                                <!--(not Elle? <span><a href="signin.php" class="text-orange" style="text-decoration:underline">sing out</a></span>)-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="for-mobile">
                    <div class="box-white">
                        <div class="row g-2">
                            <div class="col-6">
                                <a href="#">
                                    <img src="{{ asset($image_poolvilla->image) }}"
                                        class="img-fluid rounded-start" alt="...">
                                </a>
                            </div>
                            <div class="col-6">
                                <div class="text-medium text+grey text-bold">{{$room->name_en}}</div>
                                <div>
                                    <i class="fas fa-star text-orange text-small"></i>
                                    <i class="fas fa-star text-orange text-small"></i>
                                    <i class="fas fa-star text-orange text-small"></i>
                                    <i class="fas fa-star text-orange text-small"></i>
                                    <i class="fas fa-star text-orange text-small"></i>
                                </div>
                                <div class="text-blue text-tiny"><i
                                        class="fas fa-map-marker-alt me-1 text-small"></i>{{$room->district_name}} , {{$room->province_name}}
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1 g-2">
                            <div class="col-9">
                                <div class="text-bold text-tiny text-grey">{{date("d M Y", strtotime($check_in))}} - {{date("d M Y", strtotime($check_out))}}</div>
                            </div>
                            <div class="col-3">
                                <div class="text-bold text-tiny text-grey">{{$night}} nights</div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-9">
                                <div class="text-bold text-tiny text-grey">{{$total_room}} X {{$room->name}}</div>
                            </div>
                            <div class="col-3">
                                <a href="{{ url(Session::get('lang').'/select-rooms/'.$room->poolvilla_id.'/'.$convert_check_in.'/'.$convert_check_out.'/adult='.$adult.'/kid='.$kid.'/room='.$total_room) }}" class="text-blue text-tiny"
                                    style="text-decoration:underline!important;">change</a>
                            </div>
                        </div>
                        <div class="text-grey text-small"><i
                                class="fas fa-award me-2"></i>@lang('lang.room_special_offer') : Early
                            Check-in {{$room->check_in_from}}:{{sprintf('%02d', $room->check_in_unit)}} o'clock  and Late Check-out {{$room->check_out_from}}:{{sprintf('%02d', $room->check_out_unit)}} o'cloc</div>
                        <div class="text-grey text-small"><i class="fas fa-user me-2"></i>{{$total_room}} room,{{$adult}} adults @if(@$kid>0),{{$kid}} children(0-3 years)@endif</div>
                        <div class="text-grey text-small"><i class="fas fa-users me-2"></i>Max {{$room->adult}} adults, {{$room->kids}} children(0-3
                            years)</div>
                    </div>
                </div>
                <form action="{{url(Session::get('lang').'/save/booking1')}}" method="post">
                    @csrf
                        <input type="hidden" name="room_id" value="{{$room->room_id}}">
                        <input type="hidden" name="check_in" value="{{$check_in}}">
                        <input type="hidden" name="check_out" value="{{$check_out}}">
                        <input type="hidden" name="adult" value="{{$adult}}">
                        <input type="hidden" name="kid" value="{{$kid}}">
                        <input type="hidden" name="total_room" value="{{$total_room}}">
                        <input type="hidden" name="night" value="{{$night}}">
                        <input type="hidden" name="total_price" value="{{$total_price}}">
                <div class="box-white">
                    <div class="text-tiny text-bold">@lang('lang.choose_your_payment_option')</div>
                    <!-- <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label text-tiny" for="flexRadioDefault1">
                            @lang('lang.pay_later')
                        </label>
                    </div> -->
                    <div class="box-green">
                        <div class="text-tiny">*@lang('lang.remark')</div>
                        <div class="text-small">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vitae
                            dapibus mi. Vivamus congue sodales luctus</div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                            checked>
                        <label class="form-check-label text-tiny" for="flexRadioDefault2">
                            @lang('lang.free_cancellation')
                        </label>
                    </div>
                </div>
                <div class="box-white">
                    <div class="text-tiny text-bold">@lang('lang.contact_detail')</div>
                    <label for="exampleFormControlInput1" class="form-label text-tiny">@lang('lang.fullname')</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="fullname1" required>
                    <label for="exampleFormControlInput1" class="form-label text-tiny mt-1">@lang('lang.email')</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" name="email1">
                    <div class="row mt-1">
                        <div class="col-sm-6">
                            <label for="exampleFormControlInput1" class="form-label text-tiny">@lang('lang.phone_numbers')</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="phone1" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="exampleFormControlInput1" class="form-label text-tiny">@lang('lang.pndd_of_residence')</label>
                            <div class="dropdown">
                                <input class="form-control dropdown-toggle" type="text" data-toggle="dropdown"
                                    id="exampleFormControlInput1" name="address1" required>
                                  
                          
                                <!-- <ul class="dropdown-menu boxwhitedro">
                                    <input class="form-control" type="text" placeholder="Search..">
                                    <li><a href="#" class="dropdown-item division">Province a</a></li>
                                    <li><a href="#" class="dropdown-item division">Province b</a></li>
                                    <li><a href="#" class="dropdown-item division">Province c</a></li>
                                    <li><a href="#" class="dropdown-item division">Province d</a></li>
                                    <li><a href="#" class="dropdown-item division">Province e</a></li>
                                    <li><a href="#" class="dropdown-item division">Province f</a></li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="other">
                        <label class="form-check-label" for="flexCheckDefault">
                            @lang('lang.please_tick_if')
                        </label>
                    </div>
                    <div class="text-tiny text-bold mt-2">@lang('lang.contact_detail')</div>
                    <label for="exampleFormControlInput1" class="form-label text-tiny">@lang('lang.fullname')</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="fullname2" required>
                    <div class="col-sm-6">
                        <label for="exampleFormControlInput1" class="form-label text-tiny">@lang('lang.pndd_of_residence')</label>
                        <div class="dropdown">
                            <input class="form-control dropdown-toggle" type="text" data-toggle="dropdown"
                                id="exampleFormControlInput1" name="address2" required>

                            <!-- <ul class="dropdown-menu boxwhitedro">
                                <input class="form-control" type="text" placeholder="Search..">
                                <li><a href="#" class="dropdown-item division">Province a</a></li>
                                <li><a href="#" class="dropdown-item division">Province b</a></li>
                                <li><a href="#" class="dropdown-item division">Province c</a></li>
                                <li><a href="#" class="dropdown-item division">Province d</a></li>
                                <li><a href="#" class="dropdown-item division">Province e</a></li>
                                <li><a href="#" class="dropdown-item division">Province f</a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
                <!-- <div class="box-white">
                    <div class="text-tiny text-bold">@lang('lang.room_upgrade_deals')</div>
                    <div class="box-grey2">
                        <div class="row justify-content-between">
                            <div class="col-sm-8">
                                <div class="text-tiny text-bold">Deal A</div>
                                <div class="text-small">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                                    vitae dapibus mi. Vivamus congue sodales luctus</div>
                            </div>
                            <div class="col-sm-4">
                                <div class="row g-2 justify-content-end">
                                    <div class="col-auto">
                                        <div class="text-light-grey text-small text-end"
                                            style=" text-decoration: line-through">700</div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="text-tiny text-green text-bold text-end">500 THB</div>
                                    </div>
                                </div>
                                <button type="submit" class="btn-added">@lang('lang.added')</button>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="box-white">
                    <div class="text-tiny text-bold">@lang('lang.traveling_with_kids')</div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="with_kid">
                        <label class="form-check-label" for="flexCheckDefault">
                            @lang('lang.im_traveling_with_kids')
                        </label>
                    </div>
                    <div class="text-tiny text-bold mt-2 mb-1">@lang('lang.let_us_know_when_you_are_arriving')</div>
                    <div class="dropdown">
                        <select class="form-control dropdown-toggle" type="button" data-toggle="dropdown"
                            id="exampleFormControlInput1" name="arriving" required>
                            <option value="i don't sure">@lang('lang.I_dont_sure')</option>
                            <option value="00.00-01.00">00.00-01.00</option>
                            <option value="01.00-02.00">01.00-02.00</option>
                            <option value="02.00-03.00">02.00-03.00</option>
                            <option value="04.00-05.00">04.00-05.00</option>
                            <option value="05.00-06.00">05.00-06.00</option>
                            <option value="06.00-07.00">06.00-07.00</option>
                            <option value="07.00-08.00">07.00-08.00</option>
                            <option value="08.00-09.00">08.00-09.00</option>
                            <option value="09.00-10.00">09.00-10.00</option>
                            <option value="11.00-12.00">11.00-12.00</option>
                            <option value="12.00-13.00">12.00-13.00</option>
                            <option value="13.00-14.00">13.00-14.00</option>
                            <option value="14.00-15.00">14.00-15.00</option>
                            <option value="15.00-16.00">15.00-16.00</option>
                            <option value="16.00-17.00">16.00-17.00</option>
                            <option value="17.00-18.00">17.00-18.00</option>
                            <option value="18.00-19.00">18.00-19.00</option>
                            <option value="19.00-20.00">19.00-20.00</option>
                            <option value="20.00-21.0">20.00-21.00</option>
                            <option value="21.00-22.00">21.00-22.00</option>
                            <option value="22.00-23.00">22.00-23.00</option>
                            <option value="23.00-24.0">23.00-24.00</optioni>
                            <option value="00.00-01.00">00.00-01.00 (@lang('lang.next_day'))</option>
                            <option value="01.00-02.00">01.00-02.00 (@lang('lang.next_day'))</option>
                        </select>
                        
                    </div>
                </div>
                <button class="btn-next" type="submit">@lang('lang.next')</button>
            </div>
            </form>
            <div class="col-sm-3">
                <div class="none-mobile">
                    <div class="box-white">
                        <div class="row g-2">
                            <div class="col-lg-5">
                                <a href="#">
                                    <img src="{{ asset($image_poolvilla->image) }}"
                                        class="img-fluid rounded-start" alt="...">
                                </a>
                            </div>
                            <div class="col-lg-7">
                                <div class="text-medium text+grey text-bold">{{$room->name_en}}</div>
                                <div>
                                    @for($i=0;$i<$room->star_rating;$i++)
                                    <i class="fas fa-star text-orange text-small"></i>
                               
                                    @endfor
                                </div>
                                <div class="text-blue text-tiny"><i
                                        class="fas fa-map-marker-alt me-1 text-small"></i>
                                         {{$room->district_name}}, {{$room->province_name}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-white">
                        <div class="row g-2">
                            <div class="col-lg-9">
                                <div class="text-bold text-tiny text-grey">{{date("d M Y", strtotime($check_in))}} - {{date("d M Y", strtotime($check_out))}}</div>
                            </div>
                            <div class="col-lg-3">
                                <div class="text-bold text-tiny text-grey">{{$night}} nights</div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-9">
                                <div class="text-bold text-tiny text-grey">{{$total_room}} X {{$room->name}}</div>
                            </div>
                            <div class="col-lg-3">
                                <a href="{{ url(Session::get('lang').'/select-rooms/'.$room->poolvilla_id.'/'.$convert_check_in.'/'.$convert_check_out.'/adult='.$adult.'/kid='.$kid.'/room='.$total_room) }}" class="text-blue text-tiny"
                                    style="text-decoration:underline!important;">@lang('lang.change')</a>
                            </div>
                        </div>
                        <div class="text-grey text-small"><i
                                class="fas fa-award me-2"></i>@lang('lang.room_special_offer') : Early
                            Check-in {{$room->check_in_from}}:{{sprintf('%02d', $room->check_in_unit)}} o'clock  and Late Check-out {{$room->check_out_from}}:{{sprintf('%02d', $room->check_out_unit)}} o'clock </div>
                        <div class="text-grey text-small"><i class="fas fa-user me-2"></i>{{$total_room}} room,{{$adult}} adults @if(@$kid>0),{{$kid}} children(0-3 years)@endif</div>
                        <div class="text-grey text-small"><i class="fas fa-users me-2"></i>Max {{$room->adult}} adults, {{$room->kids}} children(0-3
                            years)</div>
                    </div>
                    <div class="box-white">
                        <div class="row g-2 justify-content-between">
                            <div class="col-sm-8">
                                <div class="text-tiny text-grey">@lang('lang.price') ({{$total_room}} room X {{$night}} nights)</div>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-tiny text-end text-grey">{{number_format($total_price)}} THB</div>
                            </div>
                        </div>
                        <!-- <div class="row g-2 justify-content-between vl-total">
                            <div class="col-sm-8">
                                <div class="text-tiny text-grey">@lang('lang.discount')</div>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-tiny text-red text-end">2,000 THB</div>
                            </div>
                        </div> -->
                        <div class="row g-2 justify-content-between">
                            <div class="col-sm-8">
                                <div class="text-tiny text-grey">@lang('lang.total')</div>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-tiny text-end text-grey">{{number_format($total_price)}} THB</div>
                            </div>
                        </div>
                        <div class="text-small mt-1"><span class="text-bold">@lang('lang.inculded_in_price') :</span>
                            @lang('lang.service_charge')</div>
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
    $(document).ready(function () {
        $(".form-control").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $(".dropdown-menu li").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

</script>
