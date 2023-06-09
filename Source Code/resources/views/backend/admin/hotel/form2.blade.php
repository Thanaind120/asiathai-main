<!DOCTYPE html>
<html lang="en">
<head>
  @include('layout.style')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('ckeditor5/ckeditor.js')}}"></script>
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
  
        @if(!isset($house))
        <h1>Add House</h1>
        @else
        <h1>Edit {{$house->name}}</h1>
        @endif
      </div>
    
      <div class="section-body ">      
        <div class="card col-8" >             
  
          <div class="card-body p-0">
            
          <form action="{{url('backend/house/save')}}" method="POST">
            @csrf
            <input type="hidden" name="lang" value="{{$lang}}">
            @if(!isset($house))
                <input type="hidden" name="type" value="1">
                <input type="hidden" name="poolvilla_id" value="{{$id}}">
            @else
            <input type="hidden" name="id" value="{{$house->id}}">
            <input type="hidden" name="poolvilla_id" value="{{$id}}">
                <input type="hidden" name="type" value="2">
            @endif
            <div class="form-group row ml-4 mt-5">           
                <label for="firstname" class="col-md-2 col-form-label">House Name :</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" value="{{@$house->name}}" name="name" required>
                </div>
            </div>
            <div class="form-group row ml-4 mt-5">           
              <label for="firstname" class="col-md-2 col-form-label">Room size :</label>
              <div class="col-md-8">
                  <input class="form-control" type="text" value="{{@$house->room_size}}" name="room_size" required>
              </div>
          </div>
          <div class="form-group row ml-4 mt-5">           
            <label for="firstname" class="col-md-2 col-form-label">House Price :</label>
            <div class="col-md-8">
                <input class="form-control" type="number" value="{{@$house->room_price}}" name="room_price" required>
            </div> <span class="mt-2">$</span>
        </div>
        <div class="form-group row ml-4 mt-5">           
          <label for="firstname" class="col-md-2 col-form-label">Max Rooms :</label>
          <div class="col-md-8">
              <input class="form-control" type="number" min="0" max="40" value="{{@$house->max_rooms}}" name="max_rooms" id="adult" onchange="adult1()" required>
          </div>
      </div>
      <div class="form-group row ml-4 mt-5">           
        <label for="firstname" class="col-md-2 col-form-label">Max Adult :</label>
        <div class="col-md-8">
            <input class="form-control" type="number" min="0" max="10" value="{{@$house->max_adult}}" name="max_adult" id="adult2" onchange="adult22()" required>
        </div>
    </div>
    <div class="form-group row ml-4 mt-5">           
      <label for="firstname" class="col-md-2 col-form-label">Max Children :</label>
      <div class="col-md-8">
          <input class="form-control" type="number" min="0" max="10" value="{{@$house->max_children}}" name="max_children" id="child" onchange="child1()" required>
      </div>
  </div>
      </div>
          <div class="form-group row ml-4 mt-5">           
            <label for="firstname" class="col-md-2 col-form-label">Bed :</label>
            <div class="col-md-8">
                <input class="form-control" type="text" value="{{@$house->bed}}" name="bed" required>
            </div>
        </div>
        <div class="form-group row ml-4 mt-5">           
          <label for="firstname" class="col-md-2 col-form-label">Pool :</label>
          <div class="col-md-8">
              <input class="form-control" type="text" value="{{@$house->pool}}" name="pool" required>
          </div>
      </div>

            
          <hr>
          <h5>Description</h5><hr>
    
              
            <textarea name="description" rows="10" style="height:100%;" class="text-tiny text-grey my-3 form-control">{{@$house->description}}</textarea>
            
            <br><br>
    
          <hr>
<h5>House Facilities</h5><hr>
@foreach($facilities as $key=>$f)
<b>{{$f->facilities}}</b><br>
<div class="row g-1 col-12">
  @foreach( $icon as $item => $i)
  <!-- @if($f->id == $i->facilities_id ) -->
  <div class="col-sm-2 col-4 ">
        <div class="box-facilities">
     
          <div class="text-orange icon-box-facilities"><img src="{{asset('frontend_assets/icon/'.$i->icon_img)}}" class="icon-facility me-2" width="20px" height="20px"></i> </div>
            <div class="text-orange text-box-facilities">{{$i->icon_name}} </div>
            <div><input type="checkbox" name="" id="" ></div>
      
        </div>
    </div>
 
  <!-- @endif -->
 @endforeach
 </div>

<hr>
@endforeach
<!-- <b>Comfort</b><br>
<div class="row g-1 col-12">
  <div class="col-sm-2 col-4 ">
      <div class="box-facilities">
          <div class="text-orange icon-box-facilities"><img src="{{asset('frontend_assets/images/air-conditioner.png')}}" class="icon-facility me-2" width="20px" height="20px"></i> </div>
          <div class="text-orange text-box-facilities">Air conditioner </div>
          <div><input type="checkbox" name="" id="" checked></div>
      </div>
  </div>

    <div class="col-sm-2 col-4 ">
        <div class="box-facilities">
          <div class="text-orange icon-box-facilities"><img src="{{asset('frontend_assets/images/alarm-clock.png')}}" class="icon-facility me-2" width="20px" height="20px"></i> </div>
            <div class="text-orange text-box-facilities">Alarm clock </div>
            <div><input type="checkbox" name="" id="" checked></div>
        </div>
    </div>
  </div>
  <hr> -->

            <!-- form update -->
            {{-- @if(isset($user))
            <div class="form-group row ml-4 mt-5">
              <label for="prename" class="col-md-2 col-form-label">Position :</label>
              <div class="col-md-10">
                <select name="position" class="form-control  col-md-8" required >
                  <option value="" disabled>Select</option>                
                  
                      <option value="admin"{{ ($user->position=="admin" )?'selected':'' }}>Admin</option>
                      <option value="hotel"{{ ($user->position=="hotel" )?'selected':'' }}>Hotel</option>
                      <option value="member"{{ ($user->position=="member" )?'selected':'' }}>Member</option>
                   
         
                </select>
              </div>
            </div>

            <div class="form-group row ml-4 mt-5">
              <label class="col-md-2 col-form-label">Status :</label>
              <div class="col-md-10 mt-2">
                <div class="custom-control custom-switch">
                  @if( empty($user) )
                    <input type="checkbox" class="custom-control-input" id="customSwitch" name="status" value="1" checked >
                  @else
                    <input type="checkbox" class="custom-control-input" id="customSwitch" name="status" value="1" {{ ( @$user->status=='1')?'checked':'' }}>
                  @endif
                    <label class="custom-control-label" for="customSwitch"> Active / Deactive</label>
                </div>
              </div>
          </div>  

            @endif--}}
            

            <div class="form-group mb-0 row">
                <div class="col-md-6">
                    <a class="btn btn-secondary btn-sm waves-effect" href="{{ url()->previous() }}">
                      <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                    </a>
                </div>
                <div class="col-md-6 text-right">
                    <button type="submit" class="btn btn-success btn-sm waves-effect" >
                      <i class="fa fa-save font-size-16 align-middle mr-1"></i> @if(!isset($house))Save @else Update @endif
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

  @include('layout.script')
  <script>
    $(document).ready(function() {
    $('.select_search').select2();
});
  function success_alert(){
    Swal.fire(
  'Success!',
  'Data is save!',
  'success'
)
  }

  function adult1(){

    var adult=$('#adult').val();
    if(adult>40){
      Swal.fire(
  'Warning!',
  'Limited 40 Person',
  'Warning'
)
$('#adult').val(40);
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

    
  function adult22(){
    
    var adult=$('#adult2').val();
    if(adult>10){
      Swal.fire(
  'Warning!',
  'Adult Limited 10 Person',
  'Warning'
)
$('#adult2').val(10);
  }
  
    if(adult<0){
      Swal.fire(
  'Warning!',
  'Minimum 0 Person',
  'Warning'
)
$('#adult2').val(0);
  }
    }

    function child1(){
    var child=$('#child').val();
    if(child>10){
      Swal.fire(
  'Warning!',
  'Children Limited 10 Person',
  'Warning'
)
$('#child').val(10);
  }
  
    if(child<0){
      Swal.fire(
  'Warning!',
  'Minimum 0 Person',
  'Warning'
)
$('#adult').val(0);
  }
    }


    function MyCustomUploadAdapterPlugin( editor ) {
    editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
        return new MyUploadAdapter( loader );
    };
}
    InlineEditor
            .create( document.querySelector( '#editor' ),{
              extraPlugins: [ MyCustomUploadAdapterPlugin ],

            } )
            .catch( error => {
                console.error( error );
            } );
  </script>
  <!-- ภาษาไทย -->
@elseif($lang=='th')
<div id="app">
    <div class="main-wrapper">
      @include('layout.nav')
      @include('layout.menu')
   <!-- Main Content -->
   <div class="main-content">
    <section class="section">
      <div class="section-header">
  
        @if(!isset($house))
        <h1>เพิ่มบ้านพัก</h1>
        @else
        <h1>แก้ไข {{$house->name}}</h1>
        @endif
      </div>
    
      <div class="section-body ">      
        <div class="card col-8" >             
  
          <div class="card-body p-0">
            
          <form action="{{url('backend/house/save')}}" method="POST">
            @csrf
            <input type="hidden" name="lang" value="{{$lang}}">
            @if(!isset($house))
                <input type="hidden" name="type" value="1">
                <input type="hidden" name="poolvilla_id" value="{{$id}}">
            @else
            <input type="hidden" name="id" value="{{$house->id}}">
            <input type="hidden" name="poolvilla_id" value="{{$id}}">
                <input type="hidden" name="type" value="2">
            @endif
            <div class="form-group row ml-4 mt-5">           
                <label for="firstname" class="col-md-2 col-form-label">ชื่อบ้าน:</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" value="{{@$house->name}}" name="name" required>
                </div>
            </div>
            <div class="form-group row ml-4 mt-5">           
              <label for="firstname" class="col-md-2 col-form-label">ขนาดบ้าน :</label>
              <div class="col-md-8">
                  <input class="form-control" type="text" value="{{@$house->room_size}}" name="room_size" required>
              </div>
          </div>
          <div class="form-group row ml-4 mt-5">           
            <label for="firstname" class="col-md-2 col-form-label">ราคาบ้าน :</label>
            <div class="col-md-8">
                <input class="form-control" type="number" value="{{@$house->room_price}}" name="room_price" required>
            </div> <span class="mt-2">$</span>
        </div>
        <div class="form-group row ml-4 mt-5">           
          <label for="firstname" class="col-md-2 col-form-label">จำนวนห้องพัก :</label>
          <div class="col-md-8">
              <input class="form-control" type="number" min="0" max="40" value="{{@$house->max_rooms}}" name="max_rooms" id="adult" onchange="adult1()" required>
          </div>
      </div>
      <div class="form-group row ml-4 mt-5">           
        <label for="firstname" class="col-md-2 col-form-label">รองรับผู้ใหญ่ได้สูงสุด :</label>
        <div class="col-md-8">
            <input class="form-control" type="number" min="0" max="10" value="{{@$house->max_adult}}" name="max_adult" id="adult2" onchange="adult22()" required>
        </div>
    </div>
    <div class="form-group row ml-4 mt-5">           
      <label for="firstname" class="col-md-2 col-form-label">รองรับเด็กได้สูงสุด:</label>
      <div class="col-md-8">
          <input class="form-control" type="number" min="0" max="10" value="{{@$house->max_children}}" name="max_children" id="child" onchange="child1()" required>
      </div>
  </div>
      </div>
          <div class="form-group row ml-4 mt-5">           
            <label for="firstname" class="col-md-2 col-form-label">เตียงนอน :</label>
            <div class="col-md-8">
                <input class="form-control" type="text" value="{{@$house->bed}}" name="bed" required>
            </div>
        </div>
        <div class="form-group row ml-4 mt-5">           
          <label for="firstname" class="col-md-2 col-form-label">สระว่ายน้ำ :</label>
          <div class="col-md-8">
              <input class="form-control" type="text" value="{{@$house->pool}}" name="pool" required>
          </div>
      </div>

            
          <hr>
          <h5>รายละเอียดเพิ่มเติม</h5><hr>
    
              
            <textarea name="description" rows="10" style="height:100%;" class="text-tiny text-grey my-3 form-control">{{@$house->description}}</textarea>
            
            <br><br>
    
          <hr>
<h5>House Facilities</h5><hr>
@foreach($facilities as $key=>$f)
<b>{{$f->facilities}}</b><br>
<div class="row g-1 col-12">
  @foreach( $icon as $item => $i)
  <!-- @if($f->id == $i->facilities_id ) -->
  <div class="col-sm-2 col-4 ">
        <div class="box-facilities">
     
          <div class="text-orange icon-box-facilities"><img src="{{asset('frontend_assets/icon/'.$i->icon_img)}}" class="icon-facility me-2" width="20px" height="20px"></i> </div>
            <div class="text-orange text-box-facilities">{{$i->icon_name}} </div>
            <div><input type="checkbox" name="" id="" ></div>
      
        </div>
    </div>
 
  <!-- @endif -->
 @endforeach
 </div>

<hr>
@endforeach
<!-- <b>Comfort</b><br>
<div class="row g-1 col-12">
  <div class="col-sm-2 col-4 ">
      <div class="box-facilities">
          <div class="text-orange icon-box-facilities"><img src="{{asset('frontend_assets/images/air-conditioner.png')}}" class="icon-facility me-2" width="20px" height="20px"></i> </div>
          <div class="text-orange text-box-facilities">Air conditioner </div>
          <div><input type="checkbox" name="" id="" checked></div>
      </div>
  </div>

    <div class="col-sm-2 col-4 ">
        <div class="box-facilities">
          <div class="text-orange icon-box-facilities"><img src="{{asset('frontend_assets/images/alarm-clock.png')}}" class="icon-facility me-2" width="20px" height="20px"></i> </div>
            <div class="text-orange text-box-facilities">Alarm clock </div>
            <div><input type="checkbox" name="" id="" checked></div>
        </div>
    </div>
  </div>
  <hr> -->

            <!-- form update -->
            {{-- @if(isset($user))
            <div class="form-group row ml-4 mt-5">
              <label for="prename" class="col-md-2 col-form-label">Position :</label>
              <div class="col-md-10">
                <select name="position" class="form-control  col-md-8" required >
                  <option value="" disabled>Select</option>                
                  
                      <option value="admin"{{ ($user->position=="admin" )?'selected':'' }}>Admin</option>
                      <option value="hotel"{{ ($user->position=="hotel" )?'selected':'' }}>Hotel</option>
                      <option value="member"{{ ($user->position=="member" )?'selected':'' }}>Member</option>
                   
         
                </select>
              </div>
            </div>

            <div class="form-group row ml-4 mt-5">
              <label class="col-md-2 col-form-label">Status :</label>
              <div class="col-md-10 mt-2">
                <div class="custom-control custom-switch">
                  @if( empty($user) )
                    <input type="checkbox" class="custom-control-input" id="customSwitch" name="status" value="1" checked >
                  @else
                    <input type="checkbox" class="custom-control-input" id="customSwitch" name="status" value="1" {{ ( @$user->status=='1')?'checked':'' }}>
                  @endif
                    <label class="custom-control-label" for="customSwitch"> Active / Deactive</label>
                </div>
              </div>
          </div>  

            @endif--}}
            

            <div class="form-group mb-0 row">
                <div class="col-md-6">
                    <a class="btn btn-secondary btn-sm waves-effect" href="{{ url()->previous() }}">
                      <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                    </a>
                </div>
                <div class="col-md-6 text-right">
                    <button type="submit" class="btn btn-success btn-sm waves-effect" >
                      <i class="fa fa-save font-size-16 align-middle mr-1"></i> @if(!isset($house))Save @else Update @endif
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

  @include('layout.script')
  <script>
    $(document).ready(function() {
    $('.select_search').select2();
});
  function success_alert(){
    Swal.fire(
  'Success!',
  'Data is save!',
  'success'
)
  }

  function adult1(){

    var adult=$('#adult').val();
    if(adult>40){
      Swal.fire(
  'Warning!',
  'Limited 40 Person',
  'Warning'
)
$('#adult').val(40);
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

    
  function adult22(){
    
    var adult=$('#adult2').val();
    if(adult>10){
      Swal.fire(
  'Warning!',
  'Adult Limited 10 Person',
  'Warning'
)
$('#adult2').val(10);
  }
  
    if(adult<0){
      Swal.fire(
  'Warning!',
  'Minimum 0 Person',
  'Warning'
)
$('#adult2').val(0);
  }
    }

    function child1(){
    var child=$('#child').val();
    if(child>10){
      Swal.fire(
  'Warning!',
  'Children Limited 10 Person',
  'Warning'
)
$('#child').val(10);
  }
  
    if(child<0){
      Swal.fire(
  'Warning!',
  'Minimum 0 Person',
  'Warning'
)
$('#adult').val(0);
  }
    }


    function MyCustomUploadAdapterPlugin( editor ) {
    editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
        return new MyUploadAdapter( loader );
    };
}
    InlineEditor
            .create( document.querySelector( '#editor' ),{
              extraPlugins: [ MyCustomUploadAdapterPlugin ],

            } )
            .catch( error => {
                console.error( error );
            } );
  </script>

@endif
</body>
</html>
