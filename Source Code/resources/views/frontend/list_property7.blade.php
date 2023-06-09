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
            <form action="{{url('partner/save/allow')}}" method="POST">
                @csrf
                <input type="hidden" name="poolvilla_id" value="{{$poolvilla_id}}">
            <div class="text-filter text-grey text-start text-bold">HOUSE RULES</div>
            <div class="vl-filter-hotel mt-3">
                <div class="row">
                    <div class="col-sm-6 col-8">
                        <div class="text-tiny text-grey">Smoking allowed</div>
                    </div>
                    <div class="col-sm-6 col-4">
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" value="1" name="smoke" @if(@$poolvilla[0]->smoke==1) checked @endif>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-8">
                        <div class="text-tiny text-grey">Pets allowed</div>
                    </div>
                    <div class="col-sm-6 col-4">
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox"value="1" name="pet"id="flexSwitchCheckDefault"@if(@$poolvilla[0]->pet==1) checked @endif>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-8">
                        <div class="text-tiny text-grey">Children allowed</div>
                    </div>
                    <div class="col-sm-6 col-4">
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox"value="1" name="child" id="flexSwitchCheckDefault"@if(@$poolvilla[0]->child==1) checked @endif>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-8">
                        <div class="text-tiny text-grey">Parties/events allowed</div>
                    </div>
                    <div class="col-sm-6 col-4">
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox"value="1" name="party" id="flexSwitchCheckDefault"@if(@$poolvilla[0]->party==1) checked @endif>
                        </div>
                    </div>
                </div>
            </div>
            <div class="vl-filter-hotel mt-2">
                <div class="text-tiny text-bold text-grey">Check-in</div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="text-tiny text-bold text-grey">From</div>
                            <select class="form-select" aria-label="Default select example" name="check_in_from">
                              @if(!isset($poolvilla[0]->check_in_from))
                              <option selected>select</option>
                              @else
                              <option value="{{$poolvilla[0]->check_in_from}}" selected>{{$poolvilla[0]->check_in_from}}</option>
                              @endif
                              <option value="00">00</option>
                              <option value="01">01</option>
                              <option value="02">02</option>
                              <option value="03">03</option>
                              <option value="04">04</option>
                              <option value="05">05</option>
                              <option value="06">06</option>
                              <option value="07">07</option>
                              <option value="08">08</option>
                              <option value="09">09</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20">20</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                              <option value="23">23</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-tiny text-bold text-grey">Unit</div>
                            <select class="form-select" aria-label="Default select example" name="check_in_unit">
                                @if(!isset($poolvilla[0]->check_in_unit))
                                <option selected>select</option>
                                @else
                                <option value="{{$poolvilla[0]->check_in_unit}}" selected>{{$poolvilla[0]->check_in_unit}}</option>
                                @endif
                              @for($i=0;$i<60;$i++)
                              <option value="{{$i}}">{{$i}}</option>
                      
                              @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="text-tiny text-bold text-grey mt-4">Check-out</div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="text-tiny text-bold text-grey">From</div>
                            <select class="form-select" aria-label="Default select example" name="check_out_from">
                                @if(!isset($poolvilla[0]->check_out_from))
                                <option selected>select</option>
                                @else
                                <option value="{{$poolvilla[0]->check_out_from}}" selected>{{$poolvilla[0]->check_out_from}}</option>
                                @endif
                              <option value="00">00</option>
                              <option value="01">01</option>
                              <option value="02">02</option>
                              <option value="03">03</option>
                              <option value="04">04</option>
                              <option value="05">05</option>
                              <option value="06">06</option>
                              <option value="07">07</option>
                              <option value="08">08</option>
                              <option value="09">09</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20">20</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                              <option value="23">23</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-tiny text-bold text-grey">Unit</div>
                            <select class="form-select" aria-label="Default select example" name="check_out_unit">
                                @if(!isset($poolvilla[0]->check_out_unit))
                                <option selected>select</option>
                                @else
                                <option value="{{$poolvilla[0]->check_out_unit}}" selected>{{$poolvilla[0]->check_out_unit}}</option>
                                @endif
                              @for($i=0;$i<60;$i++)
                              <option value="{{$i}}"><label for="">{{$i}}</label></option>
                      
                              @endfor
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                 <div class="col-sm-4 ">
                      <a href="{{url('partner/list_property6/'.$poolvilla_id)}}"><div class="btn-grey mt-3">Back</div></a>
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
