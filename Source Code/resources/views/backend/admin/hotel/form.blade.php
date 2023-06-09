<!DOCTYPE html>
<html lang="en">
<head>
  @include('layout.style')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
  @if($lang=="en")
  <div id="app">
    <div class="main-wrapper">
      @include('layout.nav')
      @include('layout.menu')
   <!-- Main Content -->
   <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Add - Edit Description Poolvilla</h1>
      </div>
    
      <div class="section-body ">      
        <div class="card col-8" >             
  
          <div class="card-body p-0">
            
          <form action="{{url('backend/hotel/save')}}" method="POST">
            @csrf
            <input type="hidden" name="lang" value="{{$lang}}">
            @if(!isset($poolvilla))
                <input type="hidden" name="type" value="1">
  
                <input type="hidden" name="user" value="{{$user_id}}">
            @else
            <input type="hidden" name="id" value="{{$poolvilla->id}}">
                <input type="hidden" name="type" value="2">
            @endif
            <div class="form-group row ml-4 mt-5">           
                <label for="firstname" class="col-md-2 col-form-label">Poolvilla Name :</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" value="{{@$poolvilla->hotel_name}}" name="hotel_name" required>
                </div>
            </div>
            <div class="form-group row ml-4 mt-5">           
              <label for="firstname" class="col-md-2 col-form-label">Google Maps :</label>
              <div class="col-md-8">
                  <input class="form-control" type="text" value="{{@$poolvilla->maps}}" name="maps" required>
              </div>
            </div>
            <div class="form-group row ml-4 mt-5">
                <label for="firstname" class="col-md-2 col-form-label">Country :</label>
                <div class="col-md-8">
                  <select class="form-control country" id="" name="country">
                    <option value="" disabled selected>Select Country</option>
                   @foreach($country as $key=>$c)
                    @if($c->country_id==@$poolvilla->country) 
                    <option value="{{$c->country_id}}" selected>{{$c->country_name}}</option>
                    @else
                    <option value="{{$c->country_id}}" >{{$c->country_name}}</option>
                    @endif
                  @endforeach 
                  </select>
                </div>
            </div>
            <div class="form-group row ml-4 mt-5">
              <label for="firstname" class="col-md-2 col-form-label">City :</label>
              <div class="col-md-8">
                <select class="form-control" name="city"  id="city">
                  <option value="" disabled >Select City</option>
               
                </select>
              </div>
         
          </div>
          <hr>
          <h5 class="ml-2">Space & Rooms</h5>
          <div class="form-group row ml-4 mt-5">           
            <label for="firstname" class="col-md-2 col-form-label">Max Guest :</label>
            <div class="col-md-8">
                <input class="form-control" type="text" min="0" max="80" value="{{@$poolvilla->max_guest}}" name="max_guest" id="adult" onchange="adult1()" required>
            </div>
        </div>
        <!-- <div class="form-group row ml-4 mt-5">           
            <label for="firstname" class="col-md-2 col-form-label">Max Children :</label>
            <div class="col-md-8">
            <input class="form-control" type="number" min="0" max="40" value="2" name="max_guest" id="child"  onchange="child1()" required>
            </div>
        </div> -->
        <div class="form-group row ml-4 mt-5">           
          <label for="firstname" class="col-md-2 col-form-label">Bedrooms :</label>
          <div class="col-md-8">
              <input class="form-control" type="text" value="{{@$poolvilla->bedrooms}}" name="bedrooms" required>
          </div>
        </div>
        <div class="form-group row ml-4 mt-5">           
          <label for="firstname" class="col-md-2 col-form-label">Bathrooms :</label>
          <div class="col-md-8">
              <input class="form-control" type="text" value="{{@$poolvilla->bathroom}}" name="bathroom" required>
          </div>
      </div>
      <hr>
      <div class="mt-3 ml-3">
      <h5>Hotel Facilities</h5><hr>
@foreach($facilities as $key=>$f)
<b>{{$f->facilities}}</b><br>
<?php @$icon=App\Models\Icon::where('status',1)->where('facilities_id',$f->id)->get(); ?>
<div class="row g-1 col-12">
  @foreach( $icon as $item => $i)
  <?php 
  @$poolvilla_icon=App\Models\PoolvillaIcon::where('poolvilla_id',$poolvilla->id)->where('icon_id',$i->id)->get();

  ?>

  {{-- @if($f->id == $i->facilities_id )  --}}
  <div class="col-sm-2 col-4 ">
        <div class="box-facilities">     
       
          <div class="text-orange icon-box-facilities"><img src="{{asset('frontend_assets/icon/'.$i->icon_img)}}" class="icon-facility me-2" width="20px" height="20px"></i> </div>
            <div class="text-orange text-box-facilities">{{$i->icon_name}} </div>
           
            <div><input type="checkbox" name="icon[]" value="{{@$i->id}}"  @if(count($poolvilla_icon)>0) checked @endif></div>
     
      
        </div>
    </div>
 
 {{-- @endif --}}
 @endforeach
 </div>

<hr>
@endforeach
</div>
<hr>
<h5>Area Info</h5><br>
{{-- <b>near by landmarks</b> --}}
<div class="form-group row ml-4 mt-2">           
  <label for="firstname" class="col-md-2 col-form-label">near by landmarks 1 :</label>
  <div class="col-md-4">
      <input class="form-control" type="text" value="{{@$poolvilla->near_landmark1}}" name="near_landmark1" required>
  </div>
  <div class="col-md-4">
    <input class="form-control" type="text" value="{{@$poolvilla->km1}}" name="km1" placeholder="km." required>
</div>
</div>
<div class="form-group row ml-4 mt-2">           
  <label for="firstname" class="col-md-2 col-form-label">near by landmarks 2 :</label>
  <div class="col-md-4">
      <input class="form-control" type="text" value="{{@$poolvilla->near_landmark2}}" name="near_landmark2" required>
  </div>
  <div class="col-md-4">
    <input class="form-control" type="text" value="{{@$poolvilla->km2}}" name="km2" placeholder="km." required>
</div>
</div>
<div class="form-group row ml-4 mt-2">           
  <label for="firstname" class="col-md-2 col-form-label">near by landmarks 3 :</label>
  <div class="col-md-4">
      <input class="form-control" type="text" value="{{@$poolvilla->near_landmark3}}" name="near_landmark3" required>
  </div>
  <div class="col-md-4">
    <input class="form-control" type="text" value="{{@$poolvilla->km3}}" name="km3" placeholder="km." required>
</div>
</div>
<br>
<div class="form-group row ml-4 mt-2">           
  <label for="firstname" class="col-md-2 col-form-label">population landmarks 1 :</label>
  <div class="col-md-4">
      <input class="form-control" type="text" value="{{@$poolvilla->population_landmarks1}}" name="population_landmarks1" required>
  </div>
  <div class="col-md-4">
    <input class="form-control" type="text" value="{{@$poolvilla->km4}}" name="km4" placeholder="km." required>
</div>
</div>
<div class="form-group row ml-4 mt-2">           
  <label for="firstname" class="col-md-2 col-form-label">population landmarks 2 :</label>
  <div class="col-md-4">
      <input class="form-control" type="text" value="{{@$poolvilla->population_landmarks2}}" name="population_landmarks2" required>
  </div>
  <div class="col-md-4">
    <input class="form-control" type="text" value="{{@$poolvilla->km5}}" name="km5" placeholder="km." required>
</div>
</div>
<div class="form-group row ml-4 mt-2">           
  <label for="firstname" class="col-md-2 col-form-label">population landmarks 3 :</label>
  <div class="col-md-4">
      <input class="form-control" type="text" value="{{@$poolvilla->population_landmarks3}}" name="population_landmarks3" required>
  </div>
  <div class="col-md-4">
    <input class="form-control" type="text" value="{{@$poolvilla->km6}}" name="km6" placeholder="km." required>
</div>
</div>
<hr>
            <!-- form update -->
            @if(isset($poolvilla))
            <div class="form-group row ml-4 mt-5">
              <label class="col-md-2 col-form-label">Status :</label>
              <div class="col-md-10 mt-2">
                <div class="custom-control custom-switch">
                 
                    <input type="checkbox" class="custom-control-input" id="customSwitch" name="status" {{ ( @$poolvilla->status=='1')?'checked':'' }}>
                 
                    <label class="custom-control-label" for="customSwitch"> Active / Deactive</label>
                </div>
              </div>
          </div> 
            @endif
          

            

            <div class="form-group mb-0 row">
                <div class="col-md-6">
                    <a class="btn btn-secondary btn-sm waves-effect" href="{{ url()->previous() }}">
                      <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                    </a>
                </div>
                <div class="col-md-6 text-right">
                {{--onclick="success_alert()--}}
                    <button type="submit" class="btn btn-success btn-sm waves-effect"  >
                      <i class="fa fa-save font-size-16 align-middle mr-1"></i> @if(!isset($poolvilla))Save @else Update @endif
                    </button>
                </div>
            </div><br>
        </form>
          </div>
        </div>
        </div>
      </div>
    </section>
  </div>
      @include('layout.footer')
    </div>
  </div>
<?php

?>
  @include('layout.script')
  <script>
    $(document).ready(function() {
      var city_use_json='{!! json_encode(@$poolvilla) !!}';
      var city_use=JSON.parse(city_use_json);
    
   
      city_dropdown();
      $("#city option[value='"+city_use.city+"']").attr('selected', 'selected');
      
});
function city_dropdown(){

var country_id=$('.country').val();

var city_json='{!! json_encode(@$city) !!}';

var city = JSON.parse(city_json);

  // clear city dropdown
  $('#city').empty();

  // add city dropdown
  city.forEach(myFunction);
  function myFunction(item, index) {
    if(item.country_id==country_id){
    
      $('#city').append($('<option>', { 
        value: item.city_id,
        text : item.city_name
      }));
    
    }
}

}
  function success_alert(){
    Swal.fire(
  'Success!',
  'Data is save!',
  'success'
)
  }

  function adult1(){
    var adult=$('#adult').val();
    if(adult>80){
      Swal.fire(
  'Warning!',
  'Limited 80 Person',
  'Warning'
)
$('#adult').val(80);
  }
  
    if(adult<0){
      Swal.fire(
  'Warning!',
  'Minimum 0 Person',
  'Warning'
)
$('#adult').val(0);
  }
    }

    
  function child1(){
    var child=$('#child').val();
    if(child>40){
      Swal.fire(
  'Warning!',
  'Limited 40 Person',
  'Warning'
)
$('#child').val(40);
  }
  
    if(child<0){
      Swal.fire(
  'Warning!',
  'Minimum 0 Person',
  'Warning'
)
$('#child').val(0);
  }
    }
    
    // city dropdown
    $( ".country" ).change(function() {
      //varible
      var city_json='{!! json_encode(@$city) !!}';
      var city = JSON.parse(city_json);
      var country_id=$('.country').val();

     // clear city dropdown
     $('#city').empty();
     
     // add city dropdown
     $('#city').append($('<option >', { 
      disabled: true,
        value:'',
        text :'Select City'
    }));
     city.forEach(myFunction);
     function myFunction(item, index) {
       if(item.country_id==country_id){
      $('#city').append($('<option>', { 
        value: item.city_id,
        text : item.city_name
    }));
       }
}
$("#city option[value='']").attr('selected', 'selected');   

    });
 
  </script>
  <!-- ภาษาไทย -->
@elseif($lang=="th")
<div id="app">
    <div class="main-wrapper">
      @include('layout.nav')
      @include('layout.menu')
   <!-- Main Content -->
   <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>แก้ไขรายละเอียดพูลวิลล่า</h1>
      </div>
    
      <div class="section-body ">      
        <div class="card col-8" >             
  
          <div class="card-body p-0">
            
          <form action="{{url('backend/hotel/save')}}" method="POST">
            @csrf
            <input type="hidden" name="lang" value="{{$lang}}">
  
            @if(!isset($poolvilla))
                <input type="hidden" name="type" value="1">
  
                <input type="hidden" name="user" value="{{$user_id}}">
            @else
            <input type="hidden" name="id" value="{{$poolvilla->id}}">
                <input type="hidden" name="type" value="2">
            @endif
            <div class="form-group row ml-4 mt-5">           
                <label for="firstname" class="col-md-2 col-form-label">ชื่อพูลวิลล่า :</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" value="{{@$poolvilla->hotel_name}}" name="hotel_name" required>
                </div>
            </div>
            <div class="form-group row ml-4 mt-5">           
              <label for="firstname" class="col-md-2 col-form-label">Google Maps :</label>
              <div class="col-md-8">
                  <input class="form-control" type="text" value="{{@$poolvilla->maps}}" name="maps" required>
              </div>
            </div>
            <div class="form-group row ml-4 mt-5">
                <label for="firstname" class="col-md-2 col-form-label">ประเทศ :</label>
                <div class="col-md-8">
                  <select class="form-control country" id="" name="country">
                    <option value="" disabled selected>เลือกประเทศ</option>
                   @foreach($country as $key=>$c)
                    @if($c->country_id==@$poolvilla->country) 
                    <option value="{{$c->country_id}}" selected>{{$c->country_name}}</option>
                    @else
                    <option value="{{$c->country_id}}" >{{$c->country_name}}</option>
                    @endif
                  @endforeach 
                  </select>
                </div>
            </div>
            <div class="form-group row ml-4 mt-5">
              <label for="firstname" class="col-md-2 col-form-label">เมือง :</label>
              <div class="col-md-8">
                <select class="form-control" name="city"  id="city">
                  <option value="" disabled >เลือกจังหวัด</option>
               
                </select>
              </div>
         
          </div>
          <hr>
          <h5 class="ml-2">ขนาดห้องพัก</h5>
          <div class="form-group row ml-4 mt-5">           
            <label for="firstname" class="col-md-2 col-form-label">จำนวนผู้เข้าพักสูงสุด :</label>
            <div class="col-md-8">
                <input class="form-control" type="text" min="0" max="80" value="{{@$poolvilla->max_guest}}" name="max_guest" id="adult" onchange="adult1()" required>
            </div>
        </div>
        <!-- <div class="form-group row ml-4 mt-5">           
            <label for="firstname" class="col-md-2 col-form-label">Max Children :</label>
            <div class="col-md-8">
            <input class="form-control" type="number" min="0" max="40" value="2" name="max_guest" id="child"  onchange="child1()" required>
            </div>
        </div> -->
        <div class="form-group row ml-4 mt-5">           
          <label for="firstname" class="col-md-2 col-form-label">ห้องนอน :</label>
          <div class="col-md-8">
              <input class="form-control" type="text" value="{{@$poolvilla->bedrooms}}" name="bedrooms" required>
          </div>
        </div>
        <div class="form-group row ml-4 mt-5">           
          <label for="firstname" class="col-md-2 col-form-label">ห้องน้ำ :</label>
          <div class="col-md-8">
              <input class="form-control" type="text" value="{{@$poolvilla->bathroom}}" name="bathroom" required>
          </div>
      </div>
      <hr>
      <div class="mt-3 ml-3">
      <h5>Hotel Facilities</h5><hr>
@foreach($facilities as $key=>$f)
<b>{{$f->facilities}}</b><br>
<?php @$icon=App\Models\Icon::where('status',1)->where('facilities_id',$f->id)->get(); ?>
<div class="row g-1 col-12">
  @foreach( $icon as $item => $i)
  <?php 
  @$poolvilla_icon=App\Models\PoolvillaIcon::where('poolvilla_id',$poolvilla->id)->where('icon_id',$i->id)->get();

  ?>

  {{-- @if($f->id == $i->facilities_id )  --}}
  <div class="col-sm-2 col-4 ">
        <div class="box-facilities">     
       
          <div class="text-orange icon-box-facilities"><img src="{{asset('frontend_assets/icon/'.$i->icon_img)}}" class="icon-facility me-2" width="20px" height="20px"></i> </div>
            <div class="text-orange text-box-facilities">{{$i->icon_name}} </div>
           
            <div><input type="checkbox" name="icon[]" value="{{@$i->id}}"  @if(count($poolvilla_icon)>0) checked @endif></div>
     
      
        </div>
    </div>
 
 {{-- @endif --}}
 @endforeach
 </div>

<hr>
@endforeach
</div>
<hr>
<h5>Area Info</h5><br>
{{-- <b>near by landmarks</b> --}}
<div class="form-group row ml-4 mt-2">           
  <label for="firstname" class="col-md-2 col-form-label">near by landmarks 1 :</label>
  <div class="col-md-4">
      <input class="form-control" type="text" value="{{@$poolvilla->near_landmark1}}" name="near_landmark1" required>
  </div>
  <div class="col-md-4">
    <input class="form-control" type="text" value="{{@$poolvilla->km1}}" name="km1" placeholder="km." required>
</div>
</div>
<div class="form-group row ml-4 mt-2">           
  <label for="firstname" class="col-md-2 col-form-label">near by landmarks 2 :</label>
  <div class="col-md-4">
      <input class="form-control" type="text" value="{{@$poolvilla->near_landmark2}}" name="near_landmark2" required>
  </div>
  <div class="col-md-4">
    <input class="form-control" type="text" value="{{@$poolvilla->km2}}" name="km2" placeholder="km." required>
</div>
</div>
<div class="form-group row ml-4 mt-2">           
  <label for="firstname" class="col-md-2 col-form-label">near by landmarks 3 :</label>
  <div class="col-md-4">
      <input class="form-control" type="text" value="{{@$poolvilla->near_landmark3}}" name="near_landmark3" required>
  </div>
  <div class="col-md-4">
    <input class="form-control" type="text" value="{{@$poolvilla->km3}}" name="km3" placeholder="km." required>
</div>
</div>
<br>
<div class="form-group row ml-4 mt-2">           
  <label for="firstname" class="col-md-2 col-form-label">population landmarks 1 :</label>
  <div class="col-md-4">
      <input class="form-control" type="text" value="{{@$poolvilla->population_landmarks1}}" name="population_landmarks1" required>
  </div>
  <div class="col-md-4">
    <input class="form-control" type="text" value="{{@$poolvilla->km4}}" name="km4" placeholder="km." required>
</div>
</div>
<div class="form-group row ml-4 mt-2">           
  <label for="firstname" class="col-md-2 col-form-label">population landmarks 2 :</label>
  <div class="col-md-4">
      <input class="form-control" type="text" value="{{@$poolvilla->population_landmarks2}}" name="population_landmarks2" required>
  </div>
  <div class="col-md-4">
    <input class="form-control" type="text" value="{{@$poolvilla->km5}}" name="km5" placeholder="km." required>
</div>
</div>
<div class="form-group row ml-4 mt-2">           
  <label for="firstname" class="col-md-2 col-form-label">population landmarks 3 :</label>
  <div class="col-md-4">
      <input class="form-control" type="text" value="{{@$poolvilla->population_landmarks3}}" name="population_landmarks3" required>
  </div>
  <div class="col-md-4">
    <input class="form-control" type="text" value="{{@$poolvilla->km6}}" name="km6" placeholder="km." required>
</div>
</div>
<hr>
            <!-- form update -->
            @if(isset($poolvilla))
            <div class="form-group row ml-4 mt-5">
              <label class="col-md-2 col-form-label">Status :</label>
              <div class="col-md-10 mt-2">
                <div class="custom-control custom-switch">
                 
                    <input type="checkbox" class="custom-control-input" id="customSwitch" name="status" {{ ( @$poolvilla->status=='1')?'checked':'' }}>
                 
                    <label class="custom-control-label" for="customSwitch"> Active / Deactive</label>
                </div>
              </div>
          </div> 
            @endif
          

            

            <div class="form-group mb-0 row">
                <div class="col-md-6">
                    <a class="btn btn-secondary btn-sm waves-effect" href="{{ url()->previous() }}">
                      <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                    </a>
                </div>
                <div class="col-md-6 text-right">
                {{--onclick="success_alert()--}}
                    <button type="submit" class="btn btn-success btn-sm waves-effect"  >
                      <i class="fa fa-save font-size-16 align-middle mr-1"></i> @if(!isset($poolvilla))Save @else Update @endif
                    </button>
                </div>
            </div><br>
        </form>
          </div>
        </div>
        </div>
      </div>
    </section>
  </div>
      @include('layout.footer')
    </div>
  </div>
<?php

?>
  @include('layout.script')
  <script>
    $(document).ready(function() {
      var city_use_json='{!! json_encode(@$poolvilla) !!}';
      var city_use=JSON.parse(city_use_json);
    
   
      city_dropdown();
      $("#city option[value='"+city_use.city+"']").attr('selected', 'selected');
      
});
function city_dropdown(){

var country_id=$('.country').val();

var city_json='{!! json_encode(@$city) !!}';

var city = JSON.parse(city_json);

  // clear city dropdown
  $('#city').empty();

  // add city dropdown
  city.forEach(myFunction);
  function myFunction(item, index) {
    if(item.country_id==country_id){
    
      $('#city').append($('<option>', { 
        value: item.city_id,
        text : item.city_name
      }));
    
    }
}

}
  function success_alert(){
    Swal.fire(
  'Success!',
  'Data is save!',
  'success'
)
  }

  function adult1(){
    var adult=$('#adult').val();
    if(adult>80){
      Swal.fire(
  'Warning!',
  'Limited 80 Person',
  'Warning'
)
$('#adult').val(80);
  }
  
    if(adult<0){
      Swal.fire(
  'Warning!',
  'Minimum 0 Person',
  'Warning'
)
$('#adult').val(0);
  }
    }

    
  function child1(){
    var child=$('#child').val();
    if(child>40){
      Swal.fire(
  'Warning!',
  'Limited 40 Person',
  'Warning'
)
$('#child').val(40);
  }
  
    if(child<0){
      Swal.fire(
  'Warning!',
  'Minimum 0 Person',
  'Warning'
)
$('#child').val(0);
  }
    }
    
    // city dropdown
    $( ".country" ).change(function() {
      //varible
      var city_json='{!! json_encode(@$city) !!}';
      var city = JSON.parse(city_json);
      var country_id=$('.country').val();

     // clear city dropdown
     $('#city').empty();
     
     // add city dropdown
     $('#city').append($('<option >', { 
      disabled: true,
        value:'',
        text :'Select City'
    }));
     city.forEach(myFunction);
     function myFunction(item, index) {
       if(item.country_id==country_id){
      $('#city').append($('<option>', { 
        value: item.city_id,
        text : item.city_name
    }));
       }
}
$("#city option[value='']").attr('selected', 'selected');   

    });
 
  </script>
@endif
</body>
</html>
