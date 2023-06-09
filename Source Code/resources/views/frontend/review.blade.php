<!doctype html>
<html lang="th">

<head>
    <title>@lang('lang.poolvilla')</title>
    @include('frontend/inc_header')
    <link rel="stylesheet" href="{{ asset('assets_frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_frontend/css/owl.theme.default.min.css') }}">
    <script src="{{ asset('assets_frontend/js/owl.carousel.min.js') }}"></script>
    <?php $active[1]='active'; ?>
</head>

<body>
    @include('frontend/inc_navbar')
    <div class="bg-orange">
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
                            <a style="cursor:pointer" class="btn-booking btn_show active">@lang('lang.ready_to_reviews')</a>
                            <a style="cursor:pointer" class="btn-booking btn_show">@lang('lang.published')</a>
                        </div>
                        <div>
                            <div class="boxshow">
                                @foreach ($review as $key => $val)
                                @if ($val->status == 0)
                                <form action="{{ url(Session::get('lang').'/review/id='.$val->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card booking my-3" href="#">
                                        <div class="row g-0">
                                            <div class="col-md-3">
                                                <a href="#">
                                                    <img src="{{ asset($val->image) }}"
                                                        class="img-fluid" alt="...">
                                                </a>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="card-body">
                                                    <div class="name-text">{{ $val->name_hotel }}</div>
                                                    <div class="text-orange text-review mt-3 mb-2">@lang('lang.on_a_scale')</div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="rating" id="inlineRadio1" value="1">
                                                        <label class="form-check-label" for="inlineRadio1">1</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="rating" id="inlineRadio2" value="2">
                                                        <label class="form-check-label" for="inlineRadio2">2</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="rating" id="inlineRadio3" value="3">
                                                        <label class="form-check-label" for="inlineRadio3">3 </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="rating" id="inlineRadio4" value="4">
                                                        <label class="form-check-label" for="inlineRadio4">4</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="rating" id="inlineRadio5" value="5">
                                                        <label class="form-check-label" for="inlineRadio5">5</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="rating" id="inlineRadio6" value="6">
                                                        <label class="form-check-label" for="inlineRadio6">6</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="rating" id="inlineRadio7" value="7">
                                                        <label class="form-check-label" for="inlineRadio7">7</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="rating" id="inlineRadio8" value="8">
                                                        <label class="form-check-label" for="inlineRadio8">8</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="rating" id="inlineRadio9" value="9">
                                                        <label class="form-check-label" for="inlineRadio9">9</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="rating" id="inlineRadio10" value="10">
                                                        <label class="form-check-label" for="inlineRadio10">10</label>
                                                    </div>
                                                    <div class="mt-3">
                                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                            name="review" rows="3"
                                                            placeholder="@lang('lang.write_a_review')"></textarea>
                                                    </div>
                                                    <div class="row" id="hidden_one" style="display: none;">
                                                        <div class="col">
                                                            <div class="form-group mt-3">
                                                                <label for="">@lang('lang.upload_images')</label>
                                                                {{-- <input type="file" class="form-control"
                                                                    name="image" accept="image/*"
                                                                    id="upload-img" /> --}}
                                                                <input type="file" class="form-control"
                                                                    name="image[]" multiple accept="image/*"
                                                                    id="upload-img" />
                                                            </div>
                                                            <div class="img-thumbs img-thumbs-hidden" id="img-preview"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vl-top-book">
                                            <div class="row">
                                                <div class="col-sm-9" style="text-align: right;">
                                                    <font color="orange">* @lang('lang.after_reviewing')</font>
                                                </div>
                                                <div class="col-sm-3">
                                                    <button type="submit" class="btn-blue">@lang('lang.review')</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @else
                                @endif
                                @endforeach
                                @if($check == 0 && $check != 1)
                                @php
                                if(Session::get('lang') == 'th'){
                                $message = "ข้อมูลได้รับการเผยแพร่แล้ว";
                                echo "<script type='text/javascript'>
                                    alert('$message');

                                </script>";
                                }else if(Session::get('lang') == 'en' || Session::get('lang') == '' || Session::get('lang') == null){
                                $message = "information has been published";
                                echo "<script type='text/javascript'>
                                    alert('$message');

                                </script>";
                                }
                                @endphp
                                <br>
                                <br>
                                <h4>@lang('lang.information_hasbeen_published')</h4>
                                @endif
                            </div>
                            <div class="boxshow">
                                @foreach ($reviews as $key => $val)
                                <div class="card booking my-3" href="#">
                                    <div class="row g-0">
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="{{ asset($val->image) }}"
                                                    class="img-fluid" alt="...">
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-10 col-8">
                                                        <div class="name-text">{{ $val["name_".Session::get('lang')] }} ({{ $val->name }})</div>
                                                    </div>
                                                    <div class="col-sm-2 col-4">
                                                        <div class="point-badge">{{ $val->rating }}</div>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <div class="text-tiny text-grey">{{ $val->review }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="vl-top-book">
                                        <div class="row">
                                            <div class="col-sm-9"></div>
                                            @php
                                            $room = DB::table('db_room')->where('id',$val->ref_room_id)->first();
                                            $poolvilla = DB::table('db_poolvilla')->where('id',$room->poolvilla_id)->first();
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
                                            <div class="col-sm-3">
                                                <a type="submit" class="btn-blue" href="{{ url(Session::get('lang').'/select-rooms/'.$poolvilla->id.'/'.$check_in.'/'.$check_out.'/adult='.$a_from.'/kid='.$k_from.'/room='.$ro) }}">@lang('lang.see_room')</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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

<script>
    $("#inlineRadio1").change(function () {
        var x = document.getElementById("inlineRadio1").value;
        console.log(x);
        if (x == 1) {
            $('#hidden_one').hide();
        } else {
            $('#hidden_one').hide();
        }
    });
    $("#inlineRadio2").change(function () {
        var x = document.getElementById("inlineRadio2").value;
        console.log(x);
        if (x == 2) {
            $('#hidden_one').hide();
        } else {
            $('#hidden_one').hide();
        }
    });
    $("#inlineRadio3").change(function () {
        var x = document.getElementById("inlineRadio3").value;
        console.log(x);
        if (x == 3) {
            $('#hidden_one').hide();
        } else {
            $('#hidden_one').hide();
        }
    });
    $("#inlineRadio4").change(function () {
        var x = document.getElementById("inlineRadio4").value;
        console.log(x);
        if (x == 4) {
            $('#hidden_one').hide();
        } else {
            $('#hidden_one').hide();
        }
    });
    $("#inlineRadio5").change(function () {
        var x = document.getElementById("inlineRadio5").value;
        console.log(x);
        if (x == 5) {
            $('#hidden_one').show();
        } else {
            $('#hidden_one').hide();
        }
    });
    $("#inlineRadio6").change(function () {
        var x = document.getElementById("inlineRadio6").value;
        console.log(x);
        if (x == 6) {
            $('#hidden_one').show();
        } else {
            $('#hidden_one').hide();
        }
    });
    $("#inlineRadio7").change(function () {
        var x = document.getElementById("inlineRadio7").value;
        console.log(x);
        if (x == 7) {
            $('#hidden_one').show();
        } else {
            $('#hidden_one').hide();
        }
    });
    $("#inlineRadio8").change(function () {
        var x = document.getElementById("inlineRadio8").value;
        console.log(x);
        if (x == 8) {
            $('#hidden_one').show();
        } else {
            $('#hidden_one').hide();
        }
    });
    $("#inlineRadio9").change(function () {
        var x = document.getElementById("inlineRadio9").value;
        console.log(x);
        if (x == 9) {
            $('#hidden_one').show();
        } else {
            $('#hidden_one').hide();
        }
    });
    $("#inlineRadio10").change(function () {
        var x = document.getElementById("inlineRadio10").value;
        console.log(x);
        if (x == 10) {
            $('#hidden_one').show();
        } else {
            $('#hidden_one').hide();
        }
    });

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

    var imgUpload = document.getElementById('upload-img'),
        imgPreview = document.getElementById('img-preview'),
        imgUploadForm = document.getElementById('form-upload'),
        totalFiles, previewTitle, previewTitleText, img;

    imgUpload.addEventListener('change', previewImgs, true);

    function previewImgs(event) {
        totalFiles = imgUpload.files.length;

        if (!!totalFiles) {
            imgPreview.classList.remove('img-thumbs-hidden');
        }

        for (var i = 0; i < totalFiles; i++) {
            wrapper = document.createElement('div');
            wrapper.classList.add('wrapper-thumb');
            removeBtn = document.createElement("span");
            nodeRemove = document.createTextNode('x');
            removeBtn.classList.add('remove-btn');
            removeBtn.appendChild(nodeRemove);
            img = document.createElement('img');
            img.src = URL.createObjectURL(event.target.files[i]);
            img.classList.add('img-preview-thumb');
            wrapper.appendChild(img);
            wrapper.appendChild(removeBtn);
            imgPreview.appendChild(wrapper);

            $('.remove-btn').click(function () {
                $(this).parent('.wrapper-thumb').remove();
            });

        }


    }

</script>
