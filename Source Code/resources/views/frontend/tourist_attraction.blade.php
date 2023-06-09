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
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="text-title text-bold text-white">@lang('lang.fine_a_great_experience')</div>
                <form id="formProvince" action="{{ url(Session::get('lang').'/select-hotel/search') }}" method="get" autocomplete="off">
                    <div class="autocomplete">
                        @php
                        $checkin = date('d-m-Y');
                        $checkout = date('d-m-Y', strtotime($checkin . ' +1 day'));
                        $explode = explode("-",$checkin);
                        $explode2 = explode("-",$checkout);
                        $ci = $explode[0].'/'.$explode[1].'/'.$explode[2];
                        $co = $explode2[0].'/'.$explode2[1].'/'.$explode2[2];
                        @endphp
                        <input class="form-control empty orange" type="text" name="province" id="iconified"
                            placeholder="&#xF002; @lang('lang.where_are_you_going')" aria-label="">
                        <input type="hidden" name="ci" value="{{ $ci }}">
                        <input type="hidden" name="co" value="{{ $co }}">
                        <input type="hidden" name="adult" value="1">
                        <input type="hidden" name="kid" value="0">
                        <input type="hidden" name="ro" value="1">
                    </div>
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
                            <li class="breadcrumb-item"><a class="bread" href="{{ url('/'.Session::get('lang')) }}">@lang('lang.home')</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">@lang('lang.tourist_attraction')</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="head-text-index">@lang('lang.top_destinations')</div>
        <div class="line-bottom-head-text"></div>
        <div class="row justify-content-center  my-5">
            @foreach ($_province as $key => $val)
            @php
                if(Session::get('lang') == 'en'){
                    $province = $val->name_en;
                    $district = $val->district_en;
                }else{
                    $province = $val->name_th;
                    $district = $val->district_th;
                }
            @endphp
            <div class="col-sm-4 col-6">
                <div class="frame-item box-destination">
                    <a href="{{ url(Session::get('lang').'/tourist_attraction_province/search?id='.$val->district_code.'&province='.$province.'&district='.$district) }}" class="">
                        <img src="{{ ($val->district_image != '')? asset('assets_frontend/images/'.$val->district_image) : asset('assets_frontend/images/destination1.jpg') }}" class="img-des">
                        <div class="bottom-left">
                            <p class="name-text text-white">@if(Session::get('lang') == 'en') {{ $val->name_en }} @else {{ $val->name_th }} @endif , @if(Session::get('lang') == 'en') {{ $val->district_en }} @else {{ $val->district_th }} @endif</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="head-text-index">@lang('lang.explore_more')</div>
        <div class="line-bottom-head-text"></div>

        <div class="row my-5">
            @foreach ($_provinces as $key => $val)
            @if ($key+1 >= 4)
            @php
                if(Session::get('lang') == 'en'){
                    $province = $val->name_en;
                    $district = $val->district_en;
                }else{
                    $province = $val->name_th;
                    $district = $val->district_th;
                }
            @endphp
            <div class="col-sm-4 col-6">
                <div class="frame-item box-destination">
                    <a href="{{ url(Session::get('lang').'/tourist_attraction_province/search?id='.$val->district_code.'&province='.$province.'&district='.$district) }}" class="">
                        <img src="{{ ($val->district_image != '')? asset('assets_frontend/images/'.$val->district_image) : asset('assets_frontend/images/destination1.jpg') }}" class="img-des">
                        <div class="bottom-left">
                            <p class="name-text text-white">@if(Session::get('lang') == 'en') {{ $val->name_en }} @else {{ $val->name_th }} @endif , @if(Session::get('lang') == 'en') {{ $val->district_en }} @else {{ $val->district_th }} @endif</p>
                            {{-- <p class="detail-text text-white">100 properties</p> --}}
                        </div>
                    </a>
                </div>
            </div>
            @endif
            @endforeach
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

    $('#formProvince').change(function () {

        document.getElementById('formProvince').submit(); // SUB

    });

</script>
