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
    @include('frontend/inc_navbar_scroll')
    <div class="banner">
        <img src="{{ asset('assets_frontend/images/banner_index.jpg') }}" class="banner-index">
        <div class="centered_box">
            <div class="text-banner-country">@lang('lang.search_poolvilla_in') *@lang('lang.province')*</div>
            <div class="box-search-destination">
                <form action="{{ url(Session::get('lang').'/select-hotel/search') }}" method="get" autocomplete="off">
                    <div class="autocomplete">
                        <input class="form-control empty orange" type="text" name="province" id="iconified"
                            placeholder="&#xF002; @lang('lang.where_are_you_going')" aria-label="">
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-5">
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
                                                    <input class="form-control orange-check check-in-out"
                                                        id="datepicker" type="text" placeholder="@lang('lang.date')"
                                                        name="ci" value="{{ $today }}">
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
                        <div class="col-lg-7">
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
                                                                placeholder="0" type="text" id="demoInput" name="kid"
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
                                                                placeholder="1" type="text" id="demoInput" name="ro"
                                                                value="1">
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
                    </div>
                    <button type="submit" class="btn-search">@lang('lang.search')</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="clearfix">
            <div class="float-start">
                <div class="for-destop">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="bread"
                                    href="{{ url('/'.Session::get('lang')) }}">@lang('lang.home')</a></li>
                            <li class="breadcrumb-item active" aria-current="page">*@if(Session::get('lang') ==
                                'en'){{ $_province->name_en }}@else{{ $_province->name_th }}@endif*</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="head-text-index">@lang('lang.most_popular_cities_in') *@if(Session::get('lang') ==
            'en'){{ $_province->name_en }}@else{{ $_province->name_th }}@endif*</div>
        <div class="line-bottom-head-text"></div>
        <div class="row my-5">
            @foreach ($_city as $key => $val)
            @php
            if(Session::get('lang') == 'en'){
            $province = $val->provinces_en;
            $district = $val->district_en;
            }else{
            $province = $val->provinces_th;
            $district = $val->district_th;
            }
            $checkin = date('d-m-Y');
            $checkout = date('d-m-Y', strtotime($checkin . ' +1 day'));
            $explode = explode("-",$checkin);
            $explode2 = explode("-",$checkout);
            $ci = $explode[0].'/'.$explode[1].'/'.$explode[2];
            $co = $explode2[0].'/'.$explode2[1].'/'.$explode2[2];
            $adult = 1;
            $kid = 0;
            $ro = 1;
            @endphp
            <div class="col-sm-4 col-6">
                <div class="frame-item box-destination">
                    <a href="{{ url(Session::get('lang').'/select-hotel/search?district='.$district.'&ci='.$ci.'&co='.$co.'&adult='.$adult.'&kid='.$kid.'&ro='.$ro) }}"
                        class="">
                        <img src="{{ ($val->district_image != '')? asset('assets_frontend/images/'.$val->district_image) : asset('assets_frontend/images/destination1.jpg') }}"
                            class="img-des">
                        <div class="bottom-left">
                            <p class="name-text text-white">@if(Session::get('lang') == 'en')
                                {{ $val->provinces_en }}@else {{ $val->provinces_th }}@endif, @if(Session::get('lang')
                                == 'en') {{ $val->district_en }} @else {{ $val->district_th }} @endif</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="head-text-index">@lang('lang.Top_picks_for_PoolVilla_in') *@if(Session::get('lang') ==
            'en'){{ $_province->name_en }}@else{{ $_province->name_th }}@endif*</div>
        <div class="line-bottom-head-text"></div>
        <!-- Recommend  slide -->
        <div class="container mt-5">
            <div class="owl-carousel slide-carousel owl-theme  recommend">
                @foreach ($poolvilla as $key => $val)
                @php
                $image=DB::table('db_image_poolvilla')->where('poolvilla_id',$val->id)->first();
                $discount = DB::table('db_discount')->where('ref_poolvilla_id',$val->id)->get();
                if(Session::get('lang') == 'en'){
                $province = $val->name_en;
                }else{
                $province = $val->name_th;
                }
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
                <div class="">
                    <a
                        href="{{ url(Session::get('lang').'/select-rooms/'.$val->id.'/'.$check_in.'/'.$check_out.'/adult='.$a_from.'/kid='.$k_from.'/room='.$ro) }}">
                        <div class="box-save-red-image">
                            @foreach($discount as $key=>$val2)
                            <div class="text-head-sale">{{ $val2->discount }}%</div>
                            @endforeach
                            <p>@lang('lang.sale')</p>
                        </div>
                        <div class="img-cat-place">
                            <img src="{{ asset(@$image->image) }}" class="img-des pool" alt="...">
                        </div>
                    </a>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-9">
                                <a
                                    href="{{ url(Session::get('lang').'/select-rooms/'.$val->id.'/'.$check_in.'/'.$check_out.'/adult='.$a_from.'/kid='.$k_from.'/room='.$ro) }}">
                                    <p class="name-text">@if(Session::get('lang') == 'en') {{ $val->name_en }} @else
                                        {{ $val->name_th }} @endif</p>
                                    <p class="detail-text">
                                        @if(Session::get('lang') == 'en')
                                        {{ $val->province_en }} @else {{ $val->province_th }}
                                        @endif,@if(Session::get('lang') == 'en') {{ $val->district_en }} @else
                                        {{ $val->district_th }} @endif
                                    </p>
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
                        <div class="row justify-content-between">
                            <div class="col-auto">
                                <?php
                                    $price = $val->price;
                                    if(isset($val2->discount)){
                                        $discount = $val2->discount;
                                    }else{
                                        $discount = 0;
                                    }
                                    $total = $price - ($price * ($discount / 100));
                                ?>
                                <p class="small text-orange">{{ number_format($total) }}฿ / @lang('lang.night')</p>
                            </div>
                        </div>
                        <div class="small text-light-grey" style="text-decoration: line-through;">
                            @lang('lang.from_normal') {{ number_format($val->price) }}฿
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- end of Recommend slide -->
    </div>
    <div class="space-footer"></div>
    @include('frontend/inc_footer')
</body>

</html>
<script>
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
</script>
<script>
    $('#iconified').on('keyup', function () {
        var input = $(this);
        if (input.val().length === 0) {
            input.addClass('empty');
        } else {
            input.removeClass('empty');
        }
    });

    $('.slide-carousel').owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        navText: ['<span><i class="fas fa-chevron-left"></i></span>',
            '<span><i class="fas fa-chevron-right"></i></span>'
        ],
        autoplayHoverPause: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5500,
        smartSpeed: 500,
        stagePadding: 30,
        slideBy: 1,
        responsive: {
            0: {
                items: 1
            },
            500: {
                items: 2
            },
            768: {
                items: 3
            },
            1201: {
                items: 4
            }
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
    var poolvilla = {!! json_encode($result) !!};


    /*initiate the autocomplete function on the "POL" element, and pass along the countries array as possible autocomplete values:*/
    autocomplete(document.getElementById("iconified"), poolvilla);
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