<!doctype html>
<html lang="th">

<head>
    <title>หน้าแรก</title>
    @include('frontend/inc_header')
    <link rel="stylesheet" href="{{asset('assets_frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_frontend/css/owl.theme.default.min.css')}}">
    <script src="{{asset('assets_frontend/js/owl.carousel.min.js')}}"></script>
</head>

<body>
  @include('frontend/inc_navbar_hotel')
    <div class="bg-grey">
        <div class="container">
            <div class="box-hotel">
                <div class="text-filter text-grey text-start text-bold">PRICE PER NIGHT</div>
                <div class="vl-filter-hotel mt-2">
                         <form action="{{url('save/price')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="room_id" value="{{$room[0]->id}}">
                                <input type="hidden" name="poolvilla_id" value="{{$poolvilla_id[0]->id}}">
                    <div class="mt-3">
                        <div class="text-filter text-grey text-bold mt-3">The room rate per night paid by the guest.</div>
                        <div class="d-flex f-m align-items-start">
                            <div class="nav flex-column col-sm-4 nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                       
                                @foreach($room as $key=>$r)
                            @if($key==0)
                                <button class="nav-link hotel active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">{{$r->name}}<br><span class="text-tiny text-light-grey">{{$r->twin_bed+$r->full_bed+$r->queen_bed+$r->king_bed}} beds</span></button>
                                @else
                                <button class="nav-link hotel" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">{{$r->name}}<br><span class="text-tiny text-light-grey">{{$r->twin_bed+$r->full_bed+$r->queen_bed+$r->king_bed}} beds</span></button>
                                @endif
                   
                                @endforeach
                            </div>
                            <div class="tab-content col-xl-7 cols-m-85 ms-sm-5" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <div class="input-group mt-2">
                                        <span class="input-group-text hotel" id="inputGroup-sizing-default">THB</span>
                                        <input type="number" name="price" id="money1" onchange="money1()" class="form-control text-l " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                    <small class="text-light-grey">Including taxes, commission, and fees</small>
                                    <hr>
                                    <div class="vl-filter-hotel mt-2">
                                        <div class="mt-3">
                                            <div class="text-filter text-grey text-bold mt-3">ส่วนลดให้กับลูกค้า</div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label for="">รายวัน</label>
                                                    <select name="oneday" class="form-control" id="">
                                                        {{-- <option value="0" selected>0%</option> --}}
                                                        @for($i=0;$i<100;$i=$i+5)
                                                        <option value="{{$i}}" >{{$i}}%</option>
                                                      
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <label for="">รายสัปดาห์</label>
                                                    <select name="week" class="form-control" id="">
                                                        {{-- <option value="0" selected>0%</option> --}}
                                                        @for($i=0;$i<100;$i=$i+5)
                                                        <option value="{{$i}}" >{{$i}}%</option>
                                                      
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <label for="">รายเดือน</label>
                                                    <select name="month" class="form-control" id="">
                                                        {{-- <option value="0" selected>0%</option> --}}
                                                        @for($i=0;$i<100;$i=$i+5)
                                                        <option value="{{$i}}" >{{$i}}%</option>
                                                      
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <label class="col-12">วันที่เริ่มต้นในการลดราคา</label>
                                               <div class="col-12 mt-2"> <input type="date" class="form-control" name="start_date"></div>
                                            </div>
                                            <div class="row mt-2">
                                                <label class="col-12">วันที่สิ้นสุดในการลดราคา</label>
                                               <div class="col-12 mt-2"> <input type="date" class="form-control" name="end_date"></div>
                                            </div>
                                            {{-- <div class="">
                                                <small class="text-grey">Get your first bookings quicker and reach the three reviews needed to display a guest review score. You can raise your price anytime.</small><br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="vl-filter-hotel mt-2">
                                        <div class="mt-3">
                                            <div class="text-filter text-grey mt-3">15.00% Poolvilla commission</div>
                                            <div class="col-sm-6 mt-3">
                                                <li class="text-tiny"><i class="fas fa-check text-green me-2"></i>24/7 help in your language</li>
                                                <li class="text-tiny"><i class="fas fa-check text-green me-2"></i>Save time with automatically confirmed bookings</li>
                                                <li class="text-tiny"><i class="fas fa-check text-green me-2"></i>We promote your place on Google</li>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <div class="text-filter text-red mt-3">THB <span id="sum1">00.00</span> Your earnings (including taxes)</div>
                                        </div>
                                    </div>

                                </div>
                               
                            </div>
                        </div>
                        <div class="col-sm-6">

                        </div>
                    </div>
                </div>
                
                <div class="row justify-content-center mt-5">
                    <div class="col-sm-4 ">
                        <a href="{{url('/partner/list_property10/'.$poolvilla_id)}}">
                            <div class="btn-grey mt-3">Back</div>
                        </a>
                    </div>
                    <div class="col-sm-4 ">
                        <button class="btn-orange mt-3">
                           Next
                        </button>
                    </div>
                </div>
            </div>
            </form>
        </div>

        <div class="space-footer"></div>
    </div>
   @include('frontend/inc_footer_hotel')
</body>
<script>
    function money1(){
        var money=$('#money1').val();
        var com =money*0.15;
        var sum=money-com;
        var money=$('#sum1').text(sum);
    }
    $( "#money1" ).change(function() {
        var money=$('#money1').val();
        var com =money*0.15;
        var sum=money-com;
        var money=$('#sum1').text(sum);
});
    function money2(){
        var money=$('#money2').val();
        var com =money*0.15;
        var sum=money-com;
        var money=$('#sum2').text(sum);
    }

</script>
</html>