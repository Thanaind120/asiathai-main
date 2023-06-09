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
          <form action="{{url('partner/save/languages')}}" method="POST">
            @csrf
            <input type="hidden" name="poolvilla_id" value="{{$poolvilla_id}}">
            <div class="text-filter text-grey text-start text-bold">What languages do you or your staff speak?</div>
            <div class="vl-filter-hotel">
                <div class="text-filter text-grey text-bold mt-3">Select languages</div>
                <div class="form-check">
                  <?php $lang=DB::select("select * FROM db_staff_languages where language='1' and poolvilla_id='$poolvilla_id' "); ?>
                  <input class="form-check-input" type="checkbox" value="1" name="languages[]" @if(@$lang[0]->language==1) checked @endif>
                  <label class="form-check-label" for="flexCheckDefault">Thai</label>
                </div>
                <div class="form-check">
                  <?php $lang2=DB::select("select * FROM db_staff_languages where language='2' and poolvilla_id='$poolvilla_id' "); ?>
                  <input class="form-check-input" type="checkbox" value="2" name="languages[]" @if(@$lang2[0]->language==2) checked @endif>
                  <label class="form-check-label" for="flexCheckDefault">English</label>
                </div>
                <div class="form-check">
                  <?php $lang3=DB::select("select * FROM db_staff_languages where language='3' and poolvilla_id='$poolvilla_id' "); ?>
                  <input class="form-check-input" type="checkbox" value="3" name="languages[]" @if(@$lang3[0]->language==3) checked @endif>
                  <label class="form-check-label" for="flexCheckDefault">Chinese</label>
                </div>
                <div class="form-check">
                  <?php $lang4=DB::select("select * FROM db_staff_languages where language='4' and poolvilla_id='$poolvilla_id' "); ?>
                  <input class="form-check-input" type="checkbox" value="4" name="languages[]" @if(@$lang4[0]->language==4) checked @endif>
                  <label class="form-check-label" for="flexCheckDefault">French</label>
                </div>
                <div class="form-check">
                  <?php $lang5=DB::select("select * FROM db_staff_languages where language='5'  and poolvilla_id='$poolvilla_id'"); ?>
                  <input class="form-check-input" type="checkbox" value="5" name="languages[]" @if(@$lang5[0]->language==5) checked @endif>
                  <label class="form-check-label" for="flexCheckDefault">German</label>
                </div>
                {{-- <div class="col-sm-4">
                    <label class="form-check-label text-filter text-grey   text-bold mt-3" for="flexCheckDefault">Add additional languages</label>
                    <div class="dropdown mt-2">
                          <button class="btn-star-hotel dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Pleases Select
                          </button>
                          <ul class="dropdown-menu hotel" aria-labelledby="dropdownMenuButton1">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                      <label class="form-check-label" for="flexCheckDefault">Singapore</label>
                                    </div>
                                </a>
                            </li>
                              <li>
                                <a class="dropdown-item" href="#">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                      <label class="form-check-label" for="flexCheckDefault">Poland</label>
                                    </div>
                                </a>
                            </li>
                              <li>
                                <a class="dropdown-item" href="#">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                      <label class="form-check-label" for="flexCheckDefault">Russian</label>
                                    </div>
                                </a>
                            </li>
                              <li>
                                <a class="dropdown-item" href="#">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                      <label class="form-check-label" for="flexCheckDefault">Malaysia</label>
                                    </div>
                                </a>
                            </li>
                          </ul>
                        </div>
                </div> --}}
            </div>
            <div class="row justify-content-center mt-5">
                 <div class="col-sm-4 ">
                      <a href="{{url('partner/list_property5-2/'.$poolvilla_id)}}"><div class="btn-grey mt-3">Back</div></a>
                    </div>
                    <div class="col-sm-4 ">
                        <button type="submit" class="btn-orange mt-3"><div >Next</div></button>
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
