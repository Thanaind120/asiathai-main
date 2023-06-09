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
            <!-- Tab navigation -->
<ul class="nav nav-tabs" id="myTab" role="tablist" hidden>
    <li class="nav-item">
      <a class="nav-link active" id="list2" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
    </li>
  </ul>

  <!-- Tab content -->
  {{-- <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <h1>Tab Home</h1>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <h1>Tab Profile</h1>
    </div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
      <h1>Tab Contact</h1>
    </div>
  </div> --}} <form action="{{url('partner/update_draft')}}" method="POST">
                    @csrf
            <div class="box-hotel tab-content" id="myTabContent">
               <input type="hidden" name="id" value="{{@$poolvilla[0]->id}}">
                <div class=" tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="list2-tab">
                <div class="text-filter text-grey text-start text-bold">PROPERTY INFORMATION</div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="text-tiny text-grey text-start mt-3">Property Name (name displayed to clients)</div>
                        <input class="form-control mt-2" name="name" type="text" value="{{@$poolvilla[0]->name}}">
                    </div>
                    <div class="col-sm-3">
                        <div class="text-tiny text-grey text-start mt-3">Number of Rooms</div>
                        <input class="form-control mt-2" name="room" type="text"  value="{{@$poolvilla[0]->room}}">
                    </div>
                    <div class="col-sm-4">
                        <div class="text-tiny text-grey text-start mt-3">Website</div>
                        <input class="form-control mt-2" name="web" type="text"value="{{@$poolvilla[0]->web}}">
                    </div>
                    <input type="hidden" name="star_rate" id="star_rate_get">
                    <div class="col-sm-5">
                        <div class="text-tiny text-grey text-start mt-3">Star Rating </div>
                        <div class="dropdown">
                          <button class="btn-star-hotel dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                           <span id="star_change">Pleases Select </span> 
                          </button>
                          <ul class="dropdown-menu hotel" aria-labelledby="dropdownMenuButton1">
                            <li>
                                <a class="dropdown-item" href="#" onclick="change_star('{{5}}')">
                                    <div class="row">
                                        <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                        </div>
                                          <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                        </div>
                                          <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                        </div>
                                          <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                        </div>
                                          <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="star-rating text-tiny text-grey">( 5 stars )</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" onclick="change_star('{{4}}')">
                                    <div class="row">
                                        <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                        </div>
                                          <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                        </div>
                                          <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                        </div>
                                          <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="star-rating text-tiny text-grey">( 4 stars )</div>
                                    </div>
                                </a>
                              </li>
                            <li>
                                <a class="dropdown-item" href="#" onclick="change_star('{{3}}')">
                                    <div class="row">
                                        <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                        </div>
                                          <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                        </div>
                                          <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="star-rating text-tiny text-grey">( 3 stars )</div>
                                    </div>
                                </a>
                              </li>
                            <li>
                                <a class="dropdown-item" href="#" onclick="change_star('{{2}}')">
                                    <div class="row">
                                        <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                        </div>
                                          <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="star-rating text-tiny text-grey">( 2 stars )</div>
                                    </div>
                                </a>
                              </li>
                            <li>
                                <a class="dropdown-item" href="#" onclick="change_star('{{1}}')">
                                    <div class="row">
                                        <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="star-rating text-tiny text-grey">( 1 stars )</div>
                                    </div>
                                </a>
                              </li>
                          </ul>
                        </div>
                    </div>
                </div>
                <div class="text-filter text-grey text-start text-bold mt-5">PROPERTY ADDRESS</div>
                <div class="col-sm-4">
                       <div class="">
                          <label for="exampleFormControlInput3" class="form-label text-tiny text-grey">Address</label>
                          <input type="text" class="form-control" name="address"value="{{@$poolvilla[0]->address}}" id="exampleFormControlInput3" placeholder="....">
                        </div>
                    </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="text-tiny text-grey text-start mt-3"></div>
                        <label for="exampleDataList" class="form-label text-tiny text-grey">Country</label>
                        <input class="form-control city_select1" name="country" value="{{@$poolvilla[0]->country}}"onchange="city_select()" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                        <datalist id="datalistOptions" class="" >
                            <?php  $country = DB::select("select * from db_country"); ?>
                            @foreach($country as $item =>$co)
                                <option >{{$co->country_name}}</option>
                            @endforeach
                        </datalist>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-tiny text-grey text-start mt-3"></div>
                        <label for="exampleDataList" class="form-label text-tiny text-grey">City</label>
                        <input class="form-control" value="{{@$poolvilla[0]->city}}" list="datalistOptions2" name="city" id="exampleDataList2" placeholder="Type to search...">
                        <datalist id="datalistOptions2" class="city_show">
                           
                        </datalist>
                    </div>
                     <div class="col-sm-4">
                        <div class="text-tiny text-grey text-start mt-3"></div>
                        <label for="exampleDataList" class="form-label text-tiny text-grey">Postal Code</label>
                        <input class="form-control" list="datalistOptions3" name="postal"value="{{@$poolvilla[0]->postal}}" id="exampleDataList" placeholder="Type to search...">
                        <datalist id="datalistOptions3">
                            <option value="10001">
                            <option value="10002">
                            <option value="10003">
                            <option value="10004">
                            <option value="10005">
                        </datalist>
                    </div>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-sm-4 ">
                        <button class=" btn-far " type="submit">Save Draft</button>
                    </div>
                    <div class="col-sm-4 ">
                         
                        <button class="btn-orange nexttab" type="button">Next</button>
                        {{-- <a href="{{url('list_property3')}}"><div class="btn-orange mt-3">Next</div></a> --}}
                    </div>
                </div>
            </div>




            {{-- start list 3 --}}
            <div class=" tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="text-filter text-grey text-start text-bold">PROPERTY DETAIL</div>
                <div class="vl-filter-hotel">
                    <div class="text-medium text-grey text-bold mt-3">Bedroom</div>
                    <div class="d-flex f-m align-items-start">
                  <div class="nav flex-column col-sm-4 nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link hotel active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Master Bedroom<br><span class="text-tiny text-light-grey">0 beds</span></button>
                    <button class="nav-link hotel" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Second Bedroom<br><span class="text-tiny text-light-grey">0 beds</span></button>
                      <button class="btn-clear"><i class="fas fa-plus-circle me-2"></i>Add more bedroom</button>
                  </div>
                  <div class="tab-content col-xl-5 cols-m-85 ms-sm-5" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="text-medium text-grey  mt-3">Which beds are available in this room?</div>  
                        <div class="row mt-4">
                            <div class="col-sm-5">
                                <div class="text-tiny text-grey text-bold">Twin bed(s)</div> 
                                <div class="text-tiny text-light-grey">35 - 51 inches wide</div>
                            </div>
                            <div class="col-sm-7">
                            <div class="boxincrease">
                                <div class="">
                                    <button data-decrease type="button" class="butincre minus">-   </button>
                                    <input data-value class="butincre value" name="twin_bed" value="{{@$poolvilla[0]->twin_bed}}" />
                                    <button data-increase type="button" class="butincre plus">+</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-5">
                                <div class="text-tiny text-grey text-bold">Full bed(s)</div> 
                                <div class="text-tiny text-light-grey">52 - 59 inches wide</div>
                            </div>
                            <div class="col-sm-7">
                            <div class="boxincrease">
                                <div class="">
                                    <button data-decrease type="button" class="butincre minus">-   </button>
                                    <input data-value class="butincre value" name="full_bed" value="{{@$poolvilla[0]->full_bed}}" />
                                    <button data-increase type="button" class="butincre plus">+</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-5">
                                <div class="text-tiny text-grey text-bold">Queen bed(s)</div> 
                                <div class="text-tiny text-light-grey">60 - 70 inches wide</div>
                            </div>
                            <div class="col-sm-7">
                            <div class="boxincrease">
                                <div class="">
                                    <button data-decrease type="button" class="butincre minus">-   </button>
                                    <input data-value class="butincre value" name="queen_bed" value="{{@$poolvilla[0]->queen_bed}}" />
                                    <button data-increase type="button" class="butincre plus">+</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-5">
                                <div class="text-tiny text-grey text-bold">King bed(s)</div> 
                                <div class="text-tiny text-light-grey">71 - 81 inches wide</div>
                            </div>
                            <div class="col-sm-7">
                            <div class="boxincrease">
                                <div class="">
                                    <button data-decrease type="button" class="butincre minus">-   </button>
                                    <input data-value class="butincre value" name="king_bed" value="{{@$poolvilla[0]->king_bed}}" />
                                    <button data-increase type="button" class="butincre plus">+</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="text-medium text-grey mt-3">Which beds are available in this room?</div>  
                        <div class="row mt-4">
                            <div class="col-sm-5">
                                <div class="text-tiny text-grey text-bold">Twin bed(s)</div> 
                                <div class="text-tiny text-light-grey">35 - 51 inches wide</div>
                            </div>
                            <div class="col-sm-7">
                            <div class="boxincrease">
                                <div class="">
                                    <button data-decrease class="butincre minus">-   </button>
                                    <input data-value class="butincre value" name="twin_bed" value="{{@$poolvilla[0]->twin_bed}}" />
                                    <button data-increase type="button" class="butincre plus">+</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-5">
                                <div class="text-tiny text-grey text-bold">Full bed(s)</div> 
                                <div class="text-tiny text-light-grey">52 - 59 inches wide</div>
                            </div>
                            <div class="col-sm-7">
                            <div class="boxincrease">
                                <div class="">
                                    <button data-decrease class="butincre minus">-   </button>
                                    <input data-value class="butincre value" name="full_bed" value="{{@$poolvilla[0]->full_bed}}" />
                                    <button data-increase type="button" class="butincre plus">+</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-5">
                                <div class="text-tiny text-grey text-bold">Queen bed(s)</div> 
                                <div class="text-tiny text-light-grey">60 - 70 inches wide</div>
                            </div>
                            <div class="col-sm-7">
                            <div class="boxincrease">
                                <div class="">
                                    <button data-decrease class="butincre minus">-   </button>
                                    <input data-value class="butincre value" name="queen_bed" value="{{@$poolvilla[0]->queen_bed}}"/>
                                    <button data-increase type="button" class="butincre plus">+</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-5">
                                <div class="text-tiny text-grey text-bold">King bed(s)</div> 
                                <div class="text-tiny text-light-grey">71 - 81 inches wide</div>
                            </div>
                            <div class="col-sm-7">
                            <div class="boxincrease">
                                <div class="">
                                    <button data-decrease class="butincre minus">-   </button>
                                    <input data-value class="butincre value" name="king_bed" value="{{@$poolvilla[0]->king_bed}}"/>
                                    <button data-increase type="button" class="butincre plus">+</button>
                                </div>
                            </div>
                            </div>
                        </div>
                      </div> --}}
                  </div>
                </div>
                </div>
                <div class="vl-filter-hotel">
                    <div class="text-medium text-grey text-bold mt-3">Bathroom</div>
                    <div class="mb-3">
                        <div class="col-sm-4 ">
                            <div class="boxincrease">
                                <div class="">
                                    <button data-decrease type="button" class="butincre minus">-   </button>
                                    <input data-value class="butincre value" name="bathroom" value="{{@$poolvilla[0]->bathroom}}" />
                                    <button data-increase type="button" class="butincre plus">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vl-filter-hotel">
                    <div class="text-medium text-grey text-bold mt-3">How many guests can stay?</div>
                    <div class="mb-3">
                        <div class="text-tiny text-grey text-bold">Adult</div> 
                        <div class="col-sm-4 ">
                            <div class="boxincrease">
                                <div class="">
                                    <button data-decrease type="button" class="butincre minus">-   </button>
                                    <input data-value class="butincre value" name="adult" value="{{@$poolvilla[0]->adult}}" />
                                    <button data-increase type="button" class="butincre plus">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                    <div class="text-tiny text-grey text-bold">Kids</div> 
                    <div class="col-sm-4 ">
                        <div class="boxincrease">
                            <div class="">
                                <button data-decrease type="button" class="butincre minus">-   </button>
                                <input data-value class="butincre value" name="kids" value="{{@$poolvilla[0]->kids}}"/>
                                <button data-increase type="button" class="butincre plus">+</button>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="vl-filter-hotel">
                <div class="text-medium text-grey text-bold mt-3">How big is this villa?</div>
                    <div class="col-sm-4 mt-3">
                        <div class="text-tiny text-grey text-bold">Villa size (square meters) – optional</div>
                        <div class="input-group mb-3">
                          <input type="text" name="villa_size" class="form-control" value="{{@$poolvilla[0]->villa_size}}">
                        </div>
                    </div>
                </div>
                <div class="vl-filter-hotel">
                <div class="text-medium text-grey text-bold mt-3">More about villas</div>
                    <div class="col-12 mt-3">
                       <textarea rows="3" class="form-control mb-3" name="more_about" type="text">{{@$poolvilla[0]->more_about}}</textarea>
                    </div>
                </div>
                <div class="mb-3">
                <div class="text-medium text-grey text-bold mt-3">Frequently asked questions</div>
                    <div class="col-12 mt-3">
                        <div class="row mb-3 copy_quest">
                            <div class="col-sm-6 a_class">
                                <div class="text-tiny text-bold">Questions</div>
                                 <input class="form-control mb-3" type="text" >
                            </div>
                            <div class="col-sm-6 b_class">
                                <div class="text-tiny text-bold">Answer</div>
                                 <textarea rows="3" class="form-control mb-3" type="text" ></textarea>
                            </div>
                        </div>
                        <div class="row mb-3 copy_quest2">
                            
                        </div>
                        <button class="btn-clear" onclick="more_quest()"><i class="fas fa-plus-circle me-2"></i>Add more </button>
                    </div>
                </div>
                <div class="row justify-content-center mt-5">
                     <div class="col-sm-4 ">
                          {{-- <a href="{{url('list_property2')}}"><div class="btn-grey mt-3">Back</div></a> --}}
                          <button class="btn-grey prevtab" type="button">Back</button>
                        </div>
                        <div class="col-sm-4 ">
                            <button class=" btn-far " type="submit">Save Draft</button>
                        </div>
                        <div class="col-sm-4 ">
                            <button class="btn-orange nexttab" type="button">Next</button>
                        </div>
                </div>
        </div>
            {{-- end list 3 --}}
  
        </div>  </form>
        </div>
        <div class="space-footer"></div>
    </div>
  @include('frontend/inc_footer_hotel')
</body>
</html>
<script>
        var country;
        var city;
    $( document ).ready(function() {
        //ajax call city
   
        $.ajax({
            type:"get",
            url:"http://localhost/poolvilla/partner/city",
            _token: "{{ csrf_token() }}",
        
            success:function(data){
                //success
                console.log(data.data.city);
                console.log(data.data.country);
                city=data.data.city;
                country=data.data.country;
                // console.log('sound_set2:' +sound_set);
               
               
            
            },
            error:function (error){
                console.log(error)
            // alert("Data not save");
            }
    });
});
    function change_star(star){
        if(star==5){
            $('#star_change').text('5 stars');
            $('#star_rate_get').val('5 stars');
        }
        if(star==4){
            $('#star_change').text('4 stars');
            $('#star_rate_get').val('4 stars');
        }
        if(star==3){
            $('#star_change').text('3 stars');
            $('#star_rate_get').val('3 stars');
        }
        if(star==2){
            $('#star_change').text('2 stars');
            $('#star_rate_get').val('2 stars');
        }
        if(star==1){
            $('#star_change').text('1 star');
            $('#star_rate_get').val('1 star');
        }
    }

    function city_select(){
        $('#datalistOptions2').empty();
        $('#exampleDataList2').empty();
        $('#exampleDataList2').val('');
     cout_country=country.length;
     var country_name=$('.city_select1').val();
     var i=0;
    
     while (i<cout_country) {
       
        if(country_name==country[i].country_name){
      

            for (const f of city) {
                if(country[i].country_id==f.country_id){
            const list = document.getElementById('datalistOptions2');
            const option = document.createElement('option');
            option.value = f.city_name;
            list.appendChild(option);
            }
            
            }
            i=cout_country;
        }
      
        i++;
    }
    }
    function bootstrapTabControl(){
  var i, items = $('.nav-link'), pane = $('.tab-pane');
  // next
  $('.nexttab').on('click', function(){
      for(i = 0; i < items.length; i++){
          if($(items[i]).hasClass('active') == true){
              break;
          }
      }
      if(i < items.length - 1){
          // for tab
          $(items[i]).removeClass('active');
          $(items[i+1]).addClass('active');
          // for pane
          $(pane[i]).removeClass('show active');
          $(pane[i+1]).addClass('show active');
      }

  });
  // Prev
  $('.prevtab').on('click', function(){
      for(i = 0; i < items.length; i++){
          if($(items[i]).hasClass('active') == true){
              break;
          }
      }
      if(i != 0){
          // for tab
          $(items[i]).removeClass('active');
          $(items[i-1]).addClass('active');
          // for pane
          $(pane[i]).removeClass('show active');
          $(pane[i-1]).addClass('show active');
      }
  });
}
bootstrapTabControl();  

$(function() {
	$('[data-decrease]').click(decrease);
	$('[data-increase]').click(increase);
	$('[data-value]').change(valueChange);
});

function decrease() {
	var value = $(this).parent().find('[data-value]').val();
	if(value > 0) {
		value--;
		$(this).parent().find('[data-value]').val(value);
	}
}

function increase() {
	var value = $(this).parent().find('[data-value]').val();
	if(value < 100) {
		value++;
		$(this).parent().find('[data-value]').val(value);
	}
}

function valueChange() {
	var value = $(this).val();
	if(value == undefined || isNaN(value) == true || value <= 0) {
		$(this).val(1);
	} else if(value >= 101) {
		$(this).val(100);
	}
}

function more_quest(){
    // var clone =$( ".copy_quest" ).clone().insertAfter( ".copy_quest2" );
    // var clone =$( ".b_class" ).clone().appendTo( ".copy_quest" );
    $("<div class='col-sm-6 '>   <div class='text-tiny text-bold'>Questions</div>  <input class='form-control mb-3' type='text' ></div><div class='col-sm-6 '><div class='text-tiny text-bold'>Answer</div><textarea rows='3' class='form-control mb-3' type='text' ></textarea></div>").appendTo('.copy_quest');
}
</script>
