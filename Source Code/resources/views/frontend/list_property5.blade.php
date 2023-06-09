<!doctype html>
<html lang="th">
<head>      
    <title>หน้าแรก</title>
   @include('frontend/inc_header')
    <link rel="stylesheet" href="{{asset('assets_frontend/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('assets_frontend/css/owl.theme.default.min.css')}}">
<script src="{{asset('assets_frontend/js/owl.carousel.min.js')}}"></script>
</head>
<body >
   @include('frontend/inc_navbar_hotel')
    <div class="bg-grey">
    <div class="container">
        <div class="box-hotel">
          <form action="{{url('partner/save/breakfast')}}" method="POST">
            @csrf
            <input type="hidden" name="poolvilla_id" value="{{$poolvilla_id}}">
            <div class="text-filter text-grey text-start text-bold">BREAKFAST DETAIL</div>
            <div class="vl-filter-hotel">
                <div class="text-filter text-grey text-bold mt-3">Do you serve guests breakfast?</div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="breakfast" value="1" id="flexRadioDefault1" @if($poolvilla[0]->breakfast==1) checked @endif>
                  <label class="form-check-label" for="flexRadioDefault1">
                   Yes
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="breakfast" value="0" id="flexRadioDefault2" @if($poolvilla[0]->breakfast==0) checked @endif>
                  <label class="form-check-label" for="flexRadioDefault2">
                    No
                  </label>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                 <div class="col-sm-4 ">
                      <a href="{{url('list_property4/'.$poolvilla_id)}}"><div class="btn-grey mt-3">Back</div></a>
                    </div>
                    <div class="col-sm-4 ">
                        <button type="submit"class="btn-orange mt-3"><div >Next</div></button>
                    </div>
               
        </div>
      </form>
        </div>
    </div>
        
        <div class="space-footer"></div>
    </div>
   @include('frontend/inc_footer_hotel')
</body>
</html>
