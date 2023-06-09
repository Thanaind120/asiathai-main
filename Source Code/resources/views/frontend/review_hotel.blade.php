<!doctype html>
<html lang="th">

<head>
    <title>@lang('lang.poolvilla')</title>
    @include('frontend/inc_header')
    <link rel="stylesheet" href="{{ asset('assets_frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_frontend/css/owl.theme.default.min.css') }}">
    <script src="{{ asset('assets_frontend/js/owl.carousel.min.js') }}"></script>
    <style>
        .heighttext {
            height: 53px
        }

    </style>
</head>

<body>
    @include('frontend/inc_navbar')
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
                                                type="text" placeholder="@lang('lang.date')" name="ci" value="{{ $today }}">
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
                                            type="text" placeholder="@lang('lang.date')" name="co" value="{{ $tomorrow }}">
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
    <div class="bg-orange">
        <!-- <div class="clearfix">
            <div class="float-end width-search">
                <input class="form-control empty orange" type="text" id="iconified" placeholder="&#xF002;  Where  are  you  looking for ?"aria-label="default input example">
            </div>
        </div> -->
    </div>
    <div class="container">
        <div class="clearfix">
            <div class="float-start">
                <div class="for-destop">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="bread" href="{{ url('/') }}">@lang('lang.home')</a>
                            </li>
                            @php
                                if(Session::get('lang') == 'en'){
                                    $province_name = $poolvilla->name_en;
                                }else{
                                    $province_name = $poolvilla->name_th;
                                }
                                $checkin = date('d-m-Y');
                                $checkout = date('d-m-Y', strtotime($checkin . ' +1 day'));
                                $explode = explode("-",$checkin);
                                $explode2 = explode("-",$checkout);
                                $check_in = $explode[0].'-'.$explode[1].'-'.$explode[2];
                                $check_out = $explode2[0].'-'.$explode2[1].'-'.$explode2[2];
                                $adult = 1;
                                $kid = 0;
                                $select_room = 1;
                            @endphp
                            <li class="breadcrumb-item"><a class="bread" href="{{ url(Session::get('lang').'/select-hotel/search?province='.$province_name.'&ci='.$today.'&co='.$tomorrow.'&adult='.$adult.'&kid='.$kid.'&ro='.$select_room) }}">Select Hotel</a>
                            </li>
                            {{-- <li class="breadcrumb-item"><a class="bread">*cities*</a></li> --}}
                            <li class="breadcrumb-item"><a class="bread" href="{{ url(Session::get('lang').'/select-rooms/'.$poolvilla->id.'/'.$check_in.'/'.$check_out.'/adult='.$adult.'/kid='.$kid.'/room='.$select_room) }}">Select Rooms</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@lang('lang.reviews')</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="box-white">
            <div class="vl-bottom">
                <div class="row g-1">
                    <div class="col-auto">
                        <div class="text-title text-bold text-grey mb-2">
                            @if (Session::get('lang') == 'en')
                            {{ $poolvilla->poolvilla_en }}
                            @else   
                            {{ $poolvilla->poolvilla_th }} 
                            @endif
                        </div>
                    </div>&nbsp;
                    <div class="col-auto">
                        <div class="point-badge">{{ $poolvilla->star_rating }}</div>
                    </div>
                </div>
                <div class="">
                    <div class="text-grey text-review">@lang('lang.exceptional')</div>
                    <div class="text-light-grey text-tiny">0 @lang('lang.reviews')</div>
                </div>
                <div class="clearfix">
                    <div class="float-start">
                        <div class="text-medium text-bold textw-sort text-orange">@lang('lang.reviews_from_customer')
                        </div>
                    </div>
                    {{-- <div class="float-end">
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
                                        <li><a class="dropdown-item" href="#">@lang('lang.popular_properties')</a></li>
                                        <li><a class="dropdown-item" href="#">...</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            @php
                $poohVilas = DB::table('db_poolvilla')->where('id',$poolvilla->id)->first(); 
                $rooms = DB::table('db_room')->where('poolvilla_id',$poohVilas->id)->first();
                $reviews = DB::table('db_review')->where('ref_room_id',$rooms->id)->get();
            @endphp
            @foreach ($reviews as $key => $val)
            <div class="vl-bottom">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="text-blue text-title text-bold">{{ $val->rating }}</div>
                        <div class="text-grey text-tiny"><i class="fas fa-user-edit me-2"></i>Miss A</div>
                        <div class="text-grey text-tiny"><i class="fas fa-home me-2"></i>Room type A</div>
                        <div class="text-grey text-tiny"><i class="fas fa-calendar me-2"></i>18 Jan 2019 - 23 Jan 2019
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="box-grey my-2">
                            <div class="clearfix">
                                <img src="{{ asset('assets_frontend/images/review.svg') }}"
                                    class="float-end reviewpage-icon">
                            </div>
                            <div class="text-medium text-grey p-3 mt-3">{{ $val->review }}</div>
                        </div>
                        <div class="row g-1">
                            @php
                                $image = DB::table('db_image_review')->where('ref_review_id',$val->id)->get();
                            @endphp
                            @foreach ($image as $key => $val2)
                            <div class="col-sm-3 col-6">
                                <div class="img-a">
                                    <img src="{{ asset(@$val2->image) }}" style="width:100%"
                                        data-bs-toggle="modal" data-bs-target="#popup-img-head">
                                </div>
                            </div>
                            @endforeach
                            {{-- <div class="col-sm-3 col-6">
                                <div class="img-a">
                                    <img src="{{ asset('assets_frontend/images/cities%20(2).jpg') }}" style="width:100%"
                                        data-bs-toggle="modal" data-bs-target="#popup-img-head">
                                </div>
                            </div>
                            <div class="col-sm-3 col-6">
                                <div class="img-a">
                                    <img src="{{ asset('assets_frontend/images/cities%20(3).jpg') }}" style="width:100%"
                                        data-bs-toggle="modal" data-bs-target="#popup-img-head">
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="popup-img-head" data-bs-backdrop="static" data-bs-keyboard="false"
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
                                        <div class="carousel-item active">
                                            <img src="{{ asset('assets_frontend/images/cities%20(1).jpg') }}"
                                                class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('assets_frontend/images/cities%20(2).jpg') }}"
                                                class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('assets_frontend/images/cities%20(3).jpg') }}"
                                                class="d-block w-100" alt="...">
                                        </div>
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
                                <div class="text-tiny text-grey text-end mt-1">@lang('lang.all_pictures') (3)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="vl-bottom">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="text-blue text-title text-bold">8</div>
                        <div class="text-grey text-tiny"><i class="fas fa-user-edit me-2"></i>Miss A</div>
                        <div class="text-grey text-tiny"><i class="fas fa-home me-2"></i>Room type A</div>
                        <div class="text-grey text-tiny"><i class="fas fa-calendar me-2"></i>18 Jan 2019 - 23 Jan 2019
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="box-grey my-2">
                            <div class="clearfix">
                                <img src="{{ asset('assets_frontend/images/review.svg') }}"
                                    class="float-end reviewpage-icon">
                            </div>
                            <div class="text-medium text-grey p-3 mt-3"> Lorem Ipsum has been the industry's standard
                                dummy text ever since the 1500s, when an unknown printer took a galley of type and
                                scrambled it to make a type specimen book. </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="vl-bottom">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="text-blue text-title text-bold">10</div>
                        <div class="text-grey text-tiny"><i class="fas fa-user-edit me-2"></i>Miss A</div>
                        <div class="text-grey text-tiny"><i class="fas fa-home me-2"></i>Room type A</div>
                        <div class="text-grey text-tiny"><i class="fas fa-calendar me-2"></i>18 Jan 2019 - 23 Jan 2019
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="box-grey my-2">
                            <div class="clearfix">
                                <img src="{{ asset('assets_frontend/images/review.svg') }}"
                                    class="float-end reviewpage-icon">
                            </div>
                            <div class="text-medium text-grey p-3 mt-3"> Lorem Ipsum has been the industry's standard
                                dummy text ever since the 1500s, when an unknown printer took a galley of type and
                                scrambled it to make a type specimen book. </div>
                        </div>
                        <div class="row g-1">
                            <div class="col-sm-3 col-6">
                                <div class="img-a">
                                    <img src="{{ asset('assets_frontend/images/cities%20(1).jpg') }}" style="width:100%"
                                        data-bs-toggle="modal" data-bs-target="#popup-img-head">
                                </div>
                            </div>
                            <div class="col-sm-3 col-6">
                                <div class="img-a">
                                    <img src="{{ asset('assets_frontend/images/cities%20(2).jpg') }}" style="width:100%"
                                        data-bs-toggle="modal" data-bs-target="#popup-img-head">
                                </div>
                            </div>
                            <div class="col-sm-3 col-6">
                                <div class="img-a">
                                    <img src="{{ asset('assets_frontend/images/cities%20(3).jpg') }}" style="width:100%"
                                        data-bs-toggle="modal" data-bs-target="#popup-img-head">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="popup-img-head" data-bs-backdrop="static" data-bs-keyboard="false"
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
                                        <div class="carousel-item active">
                                            <img src="{{ asset('assets_frontend/images/cities%20(1).jpg') }}"
                                                class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('assets_frontend/images/cities%20(2).jpg') }}"
                                                class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('assets_frontend/images/cities%20(3).jpg') }}"
                                                class="d-block w-100" alt="...">
                                        </div>
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
                                <div class="text-tiny text-grey text-end mt-1">@lang('lang.all_pictures') (3)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
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