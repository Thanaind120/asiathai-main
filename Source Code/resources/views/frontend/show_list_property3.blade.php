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
    @include('frontend/partner_js')
    <div class="bg-grey">
        
        <div class="container">
            <div class="box-hotel">
                <div style="margin-left: 90%;"><a href="{{url('partner/draft/edit_list_property3/'.$poolvilla_id.'/'.$select_room[0]->id)}}" class="btn btn-outline-warning text-warning" style="width:100px;color:;"><i class="fa fa-pencil-square-o" ></i>Edit</a></div>
               <div class="text-filter text-grey text-start text-bold" >PROPERTY DETAIL </div>
            
                <div class="vl-filter-hotel">
                    <form action="{{url('update/draft/bedroom')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="poolvilla_id" value="{{$poolvilla_id}}">
                        <input type="hidden" name="room_id" value="{{$select_room[0]->id}}">
                    <div class="text-medium text-grey text-bold mt-3">Bedroom</div>
                    <div class="d-flex f-m align-items-start">
                        <div class="nav flex-column col-sm-4 nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                @foreach($room as $key=>$r)
                                <a href="{{url('partner/draft/list_property3/'.$poolvilla_id.'/'.$r->id)}}" class="nav-link hotel @if($r->id==$select_room[0]->id) active @endif"  id="v-pills-home-tab" role="tab" >{{$r->name}} <br><span class="text-tiny text-light-grey" id="room1">{{$r->twin_bed+$r->full_bed+$r->queen_bed+$r->king_bed}} beds</span> </a>
                                {{-- <span class="text-right"style="margin-left:70%;"><i class="fa fa-trash " onclick="trash()"></i></span> --}}
                                @endforeach
                              
                              
                  <a class="btn-clear" id="btn_add_room" href="{{url('partner/add_bedroom/'.$poolvilla_id)}}"> <i class="fas fa-plus-circle me-2"></i>Add</a>
                           
                    
                {{-- </div>    --}}
                       </div>
                 
                  
                       
                           
               
                    
                        
                        <div class="tab-content col-xl-7 cols-m-85 ms-sm-5" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="text-medium text-grey  mt-3">Which beds are available in this room?</div>
                                <div class="row mt-4">
                                    <div class="col-sm-5">
                                        <div class="text-tiny text-grey text-bold">Twin bed(s)</div>
                                        <div class="text-tiny text-light-grey">35 - 51 inches wide</div>
                                    </div>
                                    <div class="col-sm-5">
                                        {{-- <div class="boxincrease">
                                            <div class="">
                                                <button data-decrease class="butincre minus" type="button"onclick="min_bed(1)">- </button> --}}
                                                <input data-value class="butincre value" name="twin" value="{{@$select_room[0]->twin_bed}}" readonly >
                                                {{-- <button data-increase class="butincre plus" type="button" onclick="plus_bed(1)">+</button>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-5">
                                        <div class="text-tiny text-grey text-bold">Full bed(s)</div>
                                        <div class="text-tiny text-light-grey">52 - 59 inches wide</div>
                                    </div>
                                    <div class="col-sm-5">
                                        {{-- <div class="boxincrease">
                                            <div class="">
                                                <button data-decrease class="butincre minus" type="button"onclick="min_bed(1)">- </button> --}}
                                                <input data-value class="butincre value" name="full" value="{{@$select_room[0]->full_bed}}"readonly />
                                                {{-- <button data-increase class="butincre plus" type="button"  onclick="plus_bed(1)">+</button>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-5">
                                        <div class="text-tiny text-grey text-bold">Queen bed(s)</div>
                                        <div class="text-tiny text-light-grey">60 - 70 inches wide</div>
                                    </div>
                                    <div class="col-sm-5">
                                        {{-- <div class="boxincrease">
                                            <div class="">
                                                <button data-decrease class="butincre minus"type="button"onclick="min_bed(1)">- </button> --}}
                                                <input data-value class="butincre value" name="queen" value="{{@$select_room[0]->queen_bed}}" readonly/>
                                                {{-- <button data-increase class="butincre plus"type="button" onclick="plus_bed(1)">+</button>
                                            </div>
                                        </div>--}}
                                    </div> 
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-5">
                                        <div class="text-tiny text-grey text-bold">King bed(s)</div>
                                        <div class="text-tiny text-light-grey">71 - 81 inches wide</div>
                                    </div>
                                    <div class="col-sm-5">
                                        {{-- <div class="boxincrease">
                                            <div class="">
                                                <button data-decrease class="butincre minus" type="button"onclick="min_bed(1)">- </button> --}}
                                                <input data-value class="butincre value" name="king" value="{{@$select_room[0]->king_bed}}" readonly/>
                                                {{-- <button data-increase class="butincre plus"type="button" onclick="plus_bed(1)">+</button>
                                            </div>
                                        </div>--}}
                                    </div> 
                                </div>
                                <hr>
                                <div class="vl-filter-hotel">
                                    <div class="row mt-5">
                                        <div class="col-sm-5">
                                            <div class="text-medium text-grey text-bold">Bathroom</div>
                                        </div>
                                        <div class="col-sm-5">
                                            {{-- <div class="boxincrease">
                                                <div class="">
                                                    <button data-decrease class="butincre minus" type="button">- </button> --}}
                                                    <input data-value class="butincre value" name="bath" value="{{@$select_room[0]->bathroom}}" readonly />
                                                    {{-- <button data-increase class="butincre plus" type="button">+</button>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="vl-filter-hotel mt-5">
                                    <div class="text-medium text-grey text-bold mt-3">How many guests can stay?</div>
                                    <div class="row mt-3">
                                        <div class="col-sm-5 mb-3">
                                            <div class="text-tiny text-grey text-bold">Adult: {{@$select_room[0]->adult}}</div>
                                              {{--<div class="">
                                               <div class="boxincrease">
                                                    <div class="">
                                                        <button data-decrease class="butincre minus"type="button">- </button> --}}
                                                        {{-- <input data-value class="butincre value" name="adult" value="{{@$select_room[0]->adult}}" readonly /> --}}
                                                        {{-- <button data-increase class="butincre plus"type="button">+</button>
                                                    </div>
                                                </div> 
                                            </div>--}}
                                        </div>
                                        <div class="col-sm-5 mb-3">
                                            <div class="text-tiny text-grey text-bold">Kids: {{@$select_room[0]->kids}}</div>
                                            {{-- <div class="">
                                                <div class="boxincrease">
                                                    <div class="">
                                                        <button data-decrease class="butincre minus"type="button">- </button>
                                                        <input data-value class="butincre value" name="kids" value="{{@$select_room[0]->kids}}" />
                                                        <button data-increase class="butincre plus"type="button">+</button>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class=" mt-5">
                                    <div class="text-medium text-grey text-bold mt-3">How big is this villa?</div>
                                    <div class="col-sm-12 mt-3">
                                        <div class="text-tiny text-grey text-bold">Villa size (square meters) – optional</div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="size" value="{{@$select_room[0]->size}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-medium text-grey text-bold mt-5">PROPERTY FACILITIES55</div>
                                <?php $fal=DB::select("select * FROM db_facilities where status='1' "); ?>
                                 <div class="vl-filter-hotel">
                                     @foreach($fal as $key=>$f)
                                     <?php $icon=DB::select("select * FROM db_icon where facilities_id='$f->id' "); ?>
                                     <div class="text-medium text-grey text-bold mt-3">{{$f->facilities}}</div>
                                         @foreach($icon as $item=>$i)
                                         <?php 
                                         $room_id=$select_room[0]->id;
                                         $icon_check=DB::select("select * FROM db_icon_room where room_id='$room_id' and icon_id='$i->id' "); 
                                         ?>
                                         <div class="form-check">
                                             <input class="form-check-input" type="checkbox" value="{{$i->id}}" name="icon[]" id="flexCheckDefault" @if(isset($icon_check[0]))checked @endif disabled>
                                             <label class="form-check-label" for="flexCheckDefault">{{$i->icon_name}}</label>
                                         </div>
                                         @endforeach
                                     @endforeach
                                 </div>
                                <div class="file-upload" style="min-width: 200px;">
                                    <div>
                                        <div class="text-medium text-grey text-bold mt-3">Picture of the room</div>
                                        <div class="row g-1">
                                            <?php $room_image=DB::select("select * FROM db_image_room where room_id='$room_id' "); ?>
                                            @foreach($room_image as $item=>$ri)
                                            <div class="col-sm-3 col-6">
                                                <div class="img-a">
                                                <img src="{{asset($ri->image)}}" style="width:100%" data-bs-toggle="modal" data-bs-target="#popup-img-head">
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                 
                                    </div>
                                           <!-- Modal -->
            <div class="modal fade" id="popup-img-head" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content popup-img">
                      <div class="modal-body">
                        <div class="clearfix mb-2">
                          <div class="float-end">
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                        </div>
                      <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
                        <div class="carousel-inner">
                            @foreach($room_image as $item=>$ri)
                          <div class="carousel-item @if($item==0)active @endif">
                            <img src="{{asset('room_image/'.$ri->image)}}" class="d-block w-100" alt="...">
                          </div>
                          @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                          {{-- <div class="text-tiny text-grey text-end mt-1">รูปภาพทั้งหมด (3)</div> --}}
                    </div>
                  </div>
                </div>
              </div>
                   
                    
                              
                                </div>
                            </div>
                       
                        </div>
                    </div>

                 
                    <div class="row justify-content-center mt-5">
                        <div class="col-sm-4 ">
                            <a href="{{url('list_property2')}}">
                                <div class="btn-grey mt-3">Back</div>
                            </a>
                        </div>
                        {{-- <div class="col-sm-4 ">
                            <button  class="btn btn-primary mt-3" style="width: 100%;" type="submit">update</button>
                        </div> --}}
                        <div class="col-sm-4 ">
                            <a href="{{url('list_property4/'.$poolvilla_id)}}">
                                <div class="btn-orange mt-3">Next</div>
                            </a>
                        </div>
                    </div>
                </form>
                </div>
            </div>
            <div class="space-footer"></div>
        </div>
       @include('frontend/inc_footer_hotel')

       <!-- show add room -->  
 
  <div class="modal fade" id="show_add_room" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Bedroom</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
              
                <div class="col-12 "><input class="form-control"type="text" name="name_bedroom" id="name_bedroom" placeholder="Name Bedroom"></div>
            </div>
        
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
          <button type="button" class="btn btn-primary"  data-dismiss="modal" aria-label="Close" onclick="add_room()">Add</button>
        </div>
      </div>
    </div>
  </div>
</body>

<script>
    $(function() {
        $('[data-decrease]').click(decrease);
        $('[data-increase]').click(increase);
        $('[data-value]').change(valueChange);
    });

    function decrease() {
        var value = $(this).parent().find('[data-value]').val();
        if (value > 0) {
            value--;
            $(this).parent().find('[data-value]').val(value);
        }
    }

    function increase() {
        var value = $(this).parent().find('[data-value]').val();
        if (value < 100) {
            value++;
            $(this).parent().find('[data-value]').val(value);
        }
    }

    function valueChange() {
        var value = $(this).val();
        if (value == undefined || isNaN(value) == true || value <= 0) {
            $(this).val(1);
        } else if (value >= 101) {
            $(this).val(100);
        }
    }
</script>

<script>
      var room=2;
    (function hide() {
        $(this).hide();
    })(jQuery);
    function add_room(){
        var name=$('#name_bedroom').val();
        $('#name_bedroom').val(null);
        room++; 
       var room_array=room-1;
        $( "#v-pills-tab" ).append( '<button class="nav-link hotel"style="width:100%;" id="v-pills-profile-tab'+room+'" data-bs-toggle="pill" data-bs-target="#v-pills-profile'+room+'" type="button" role="tab" aria-controls="v-pills-profile'+room+'" aria-selected="false">'+name+'<br><span class="text-tiny text-light-grey" id="room'+room+'">0 beds</span></button>');
        $( "#v-pills-tabContent" ).append( '<div class="tab-pane fade" id="v-pills-profile'+room+'" role="tabpanel" aria-labelledby="v-pills-profile-tab'+room+'"> <div class="text-medium text-grey mt-3">Which beds are available in this room?</div> <div class="row mt-4"> <div class="col-sm-5"> <div class="text-tiny text-grey text-bold">Twin bed(s)</div> <div class="text-tiny text-light-grey">35 - 51 inches wide</div> </div> <div class="col-sm-5"> <div class="boxincrease"> <div class=""> <button data-decrease class="butincre minus"type="button"onclick="min_bed('+room+')">- </button> <input data-value class="butincre value" name="twin['+room_array+']" value="0" /> <button data-increase class="butincre plus"type="button"onclick="plus_bed('+room+')">+</button> </div> </div> </div> </div> <div class="row mt-4"> <div class="col-sm-5"> <div class="text-tiny text-grey text-bold">Full bed(s)</div> <div class="text-tiny text-light-grey">52 - 59 inches wide</div> </div> <div class="col-sm-5"> <div class="boxincrease"> <div class=""> <button data-decrease class="butincre minus"type="button"onclick="min_bed('+room+')">- </button> <input data-value class="butincre value" name="full['+room_array+']" value="0" /> <button data-increase class="butincre plus"type="button"onclick="plus_bed('+room+')">+</button> </div> </div> </div> </div> <div class="row mt-4"> <div class="col-sm-5"> <div class="text-tiny text-grey text-bold">Queen bed(s)</div> <div class="text-tiny text-light-grey">60 - 70 inches wide</div> </div> <div class="col-sm-5"> <div class="boxincrease"> <div class=""> <button data-decrease class="butincre minus" type="button"onclick="min_bed('+room+')">- </button> <input data-value class="butincre value" name="queen['+room_array+']" value="0" /> <button data-increase class="butincre plus" type="button"onclick="plus_bed('+room+')">+</button> </div> </div> </div> </div> <div class="row mt-4"> <div class="col-sm-5"> <div class="text-tiny text-grey text-bold">King bed(s)</div> <div class="text-tiny text-light-grey">71 - 81 inches wide</div> </div> <div class="col-sm-5"> <div class="boxincrease"> <div class=""> <button data-decrease class="butincre minus" type="button"onclick="min_bed('+room+')">- </button> <input data-value class="butincre value" name="king['+room_array+']" value="0" /> <button data-increase class="butincre plus"type="button"onclick="plus_bed('+room+')">+</button> </div> </div> </div> </div> <hr> <div class="vl-filter-hotel"> <div class="row mt-5"> <div class="col-sm-5"> <div class="text-medium text-grey text-bold">Bathroom</div> </div> <div class="col-sm-5"> <div class="boxincrease"> <div class=""> <button data-decrease class="butincre minus" type="button">- </button> <input data-value class="butincre value" name="bath['+room_array+']" value="0" /> <button data-increase class="butincre plus" type="button">+</button> </div> </div> </div> </div> </div> <div class="vl-filter-hotel mt-5"> <div class="text-medium text-grey text-bold mt-3">How many guests can stay?</div> <div class="row mt-3"> <div class="col-sm-5 mb-3"> <div class="text-tiny text-grey text-bold">Adult</div> <div class=""> <div class="boxincrease"> <div class=""> <button data-decrease class="butincre minus" type="button">- </button> <input data-value class="butincre value" name="adult['+room_array+']" value="0" /> <button data-increase class="butincre plus" type="button">+</button> </div> </div> </div> </div> <div class="col-sm-5 mb-3"> <div class="text-tiny text-grey text-bold">Kids</div> <div class=""> <div class="boxincrease"> <div class=""> <button data-decrease class="butincre minus" type="button">- </button> <input data-value class="butincre value" name="kids['+room_array+']" value="0" /> <button data-increase class="butincre plus" type="button">+</button> </div> </div> </div> </div> </div> </div> <div class=" mt-5"> <div class="text-medium text-grey text-bold mt-3">How big is this villa?</div> <div class="col-sm-12 mt-3"> <div class="text-tiny text-grey text-bold">Villa size (square meters) – optional</div> <div class="input-group mb-3"> <input type="text" class="form-control" name="size['+room_array+']"> </div> </div> </div> <hr> <div class="text-medium text-grey text-bold mt-5">PROPERTY FACILITIES</div> <div class="vl-filter-hotel"> <div class="text-medium text-grey text-bold mt-3">General</div> <div class="form-check"> <input class="form-check-input" type="checkbox" value="1" name="free_wifi['+room_array+']" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">Free WIFI</label> </div> <div class="form-check"> <input class="form-check-input" type="checkbox" value="" name="airport'+room_array+'" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">Airport Transfer</label> </div> <div class="form-check"> <input class="form-check-input" type="checkbox" value="" name="breakfast['+room_array+']" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">Breakfast</label> </div> <div class="form-check"> <input class="form-check-input" type="checkbox" value="" name="smoke['+room_array+']"id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">Smorking Are</label> </div> <div class="form-check"> <input class="form-check-input" type="checkbox" value=""name="electric['+room_array+']" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">Electric vehicle charging station</label> </div> </div> <div class="vl-filter-hotel"> <div class="text-medium text-grey text-bold mt-3">Bathroom and toiletries</div> <div class="form-check"> <input class="form-check-input" type="checkbox" value="" name="hair_dryer['+room_array+']" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">Hair dryer</label> </div> <div class="form-check"> <input class="form-check-input" type="checkbox" value=""name="bathtub['+room_array+']" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">Bathtub</label> </div> <div class="form-check"> <input class="form-check-input" type="checkbox" value="" name="towels['+room_array+']" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">Towels</label> </div> <div class="form-check"> <input class="form-check-input" type="checkbox" value="" name="toilet['+room_array+']" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">Toiletries</label> </div> <div class="form-check"> <input class="form-check-input" type="checkbox" value="" name="shower['+room_array+']" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">Shower</label> </div> </div> <div class="vl-filter-hotel"> <div class="text-medium text-grey text-bold mt-3">Entertainment</div> <div class="form-check"> <input class="form-check-input" type="checkbox" value=""name="tv['+room_array+']" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">TV</label> </div> <div class="form-check"> <input class="form-check-input" type="checkbox" value="" name="karaoke['+room_array+']" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">Karaoke</label> </div> </div> <div class="vl-filter-hotel"> <div class="text-medium text-grey text-bold mt-3">Comforts</div> <div class="form-check"> <input class="form-check-input" type="checkbox" value="" name="air['+room_array+']" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">Air conditioner</label> </div> <div class="form-check"> <input class="form-check-input" type="checkbox" value="" name="alrm['+room_array+']" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">Alarm clock</label> </div> </div> <div class="vl-filter-hotel"> <div class="text-medium text-grey text-bold mt-3">Dining,drinking and snacking</div> <div class="form-check"> <input class="form-check-input" type="checkbox" value="" name="water['+room_array+']" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">Free bottle water</label> </div> <div class="form-check"> <input class="form-check-input" type="checkbox" value="" name="refrigerator['+room_array+']" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">Refrigerator</label> </div> <div class="form-check"> <input class="form-check-input" type="checkbox" value="" name="tea['+room_array+']" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">Complimentary tea</label> </div> <div class="form-check"> <input class="form-check-input" type="checkbox" value=""name="kithchen['+room_array+']" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">Kitchen</label> </div> </div> <div class="vl-filter-hotel"> <div class="text-medium text-grey text-bold mt-3">Layout and furnishings</div> <div class="form-check"> <input class="form-check-input" type="checkbox" value="" name="desk['+room_array+']" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">Desk</label> </div> <div class="form-check"> <input class="form-check-input" type="checkbox" value="" name="seating['+room_array+']" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">Seating area </label> </div> </div> <div class="vl-filter-hotel"> <div class="text-medium text-grey text-bold mt-3">Clothing and laundry</div> <div class="form-check"> <input class="form-check-input" type="checkbox" value="" name="closet['+room_array+']" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">Closet</label> </div> <div class="form-check"> <input class="form-check-input" type="checkbox" value="" name="clothes['+room_array+']" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">Clothes rack</label> </div> <div class="form-check"> <input class="form-check-input" type="checkbox" value="" name="ironing['+room_array+']" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">Ironing facilies</label> </div> </div> <div class="vl-filter-hotel"> <div class="text-medium text-grey text-bold mt-3">Safety and'+
        'security feathers</div> <div class="form-check"> <input class="form-check-input" type="checkbox" value="" name="safe_box['+room_array+']" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">In-rooms safe box</label> </div> <div class="form-check"> <input class="form-check-input" type="checkbox" value="" name="firts_aid['+room_array+']" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">Firts-aid kit </label> </div> </div> <div class="file-upload" style="min-width: 200px;"> <div> <div class="text-medium text-grey text-bold mt-3">Upload a picture of the room</div> <div class="drag-text image-upload-wrap mt-2"> <i class="far fa-image text-img text-light-grey"></i><br> <label class="text-medium" for="upFile2">BROWSE FILE HERE </label> </div> <input id="upFile'+room+'" name="image_room'+room+'[]" type="file" multiple hidden> </div> <div id="file-container"> <ul id="fileList'+room+'" class="row"> </ul> </div> <input type="hidden" id="fileArray2"> </div> </div>');
        
    }
    function trash(){
        alert('ok');
    }
    $(document).ready(function() {
      
        //Setto la data-value come oggetto vuoto {}
        $('#fileArray').val(JSON.stringify({}));

        $('#upFile').change(function(e) {
            var files = e.target.files;
            var obj = {};
            for (var i = 0; i <= files.length; i++) {

                var file = files[i];
                var reader = new FileReader();
                // when i == files.length reorder and break
                if (i == files.length) {
                    // need timeout to reorder beacuse prepend is not done
                    if ('0' != files.length) {
                        setTimeout(function() {
                            updateArray(obj);
                        }, 100);
                    }
                    break;
                }

                reader.onload = (function(file, i) {
                    return function(event) {
                        obj[i] = event.target.result;
                        $('#fileList').prepend('<div class="col-sm-4 col-6"><li data-id="' + file.lastModified + '"><div class="file-upload-image"><img class="w-100" src="' + event.target.result + '" onerror="hide()"  /><div class="removeBtn">X</div><div class="separator"><div class="ood">' + file.name + ' </div><div class="clear-both"></div></div> </div></li></div>');
                    };
                })(file, i);

                reader.readAsDataURL(file);
            } // end for;

        });


        $('#fileList').on('click', '.removeBtn', function() {
            var src = $(this).parents('.block').children('img').attr('src');
            $(this).parents('li').remove();
            removeItem(src);
        });


        function removeItem(items) {
            var obj = $('#fileArray').val();
            obj = JSON.parse(obj);

            var y = [];
            if (typeof items != "object") {
                $.each(obj, function(chiave, valore) {
                    if (valore == items) {
                        delete obj[chiave];
                        // esce alla chiave 2
                        return false;
                    }

                });


                $('#fileArray').val(JSON.stringify(obj));

                return false;

                var arr = $('#fileArray').val();

                $.each(JSON.parse(arr), function(c, v) {

                });

            }


            $.each(obj, function(c, v) {

                y.push(v);

            });

            $.each(items, function(c, v) {

                if ($.inArray(v, y) != -1) {

                    return true;
                }
                y.push(v);



            });

            obj = $.extend({}, y);

            return obj;

        }

        function updateArray(items) {

            var newArray = removeItem(items);

            $('#fileArray').val(JSON.stringify(newArray));

            var arr = $('#fileArray').val();

            $.each(JSON.parse(arr), function(c, v) {

            });


        }

        //Setto la data-value come oggetto vuoto {}
        $('#fileArray2').val(JSON.stringify({}));

        $('#upFile2').change(function(e) {
            var files = e.target.files;
            var obj = {};
            for (var i = 0; i <= files.length; i++) {

                var file = files[i];
                var reader = new FileReader();
                // when i == files.length reorder and break
                if (i == files.length) {
                    // need timeout to reorder beacuse prepend is not done
                    if ('0' != files.length) {
                        setTimeout(function() {
                            updateArray(obj);
                        }, 100);
                    }
                    break;
                }

                reader.onload = (function(file, i) {
                    return function(event) {
                        obj[i] = event.target.result;
                        $('#fileList2').prepend('<div class="col-sm-4 col-6"><li data-id="' + file.lastModified + '"><div class="file-upload-image"><img class="w-100" src="' + event.target.result + '" onerror="hide()"  /><div class="removeBtn">X</div><div class="separator"><div class="ood">' + file.name + ' </div><div class="clear-both"></div></div> </div></li></div>');
                    };
                })(file, i);

                reader.readAsDataURL(file);
            } // end for;

        });


        $('#fileList2').on('click', '.removeBtn', function() {
            var src = $(this).parents('.block').children('img').attr('src');
            $(this).parents('li').remove();
            removeItem(src);
        });


        function removeItem(items) {
            var obj = $('#fileArray2').val();
            obj = JSON.parse(obj);

            var y = [];
            if (typeof items != "object") {
                $.each(obj, function(chiave, valore) {
                    if (valore == items) {
                        delete obj[chiave];
                        // esce alla chiave 2
                        return false;
                    }

                });


                $('#fileArray2').val(JSON.stringify(obj));

                return false;

                var arr = $('#fileArray2').val();

                $.each(JSON.parse(arr), function(c, v) {

                });

            }


            $.each(obj, function(c, v) {

                y.push(v);

            });

            $.each(items, function(c, v) {

                if ($.inArray(v, y) != -1) {

                    return true;
                }
                y.push(v);



            });

            obj = $.extend({}, y);

            return obj;

        }

        function updateArray(items) {

            var newArray = removeItem(items);

            $('#fileArray2').val(JSON.stringify(newArray));

            var arr = $('#fileArray2').val();

            $.each(JSON.parse(arr), function(c, v) {

            });


        }



    });

</script>

</html>