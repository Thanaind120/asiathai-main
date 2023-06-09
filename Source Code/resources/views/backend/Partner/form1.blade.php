<!DOCTYPE html>
<html lang="en">
<head>
  @include('Partner.layout.style')
  <style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
      height: 100%;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    #map {
      height: 500px;
      width: 800px;
    }
    .ck-editor__editable_inline {
    min-height: 200px;
}
  </style>
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      @include('layout.nav')
      @include('layout.menu')
   <!-- Main Content -->
   <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Add / Edit Partner</h1>
      </div>
    
      <div class="section-body ">      
        <div class="card col-12" >             
  
          <div class="card-body p-5">
            
          <form action="{{url('Backend/Partner/Form1/save')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(!isset($list1))
                <input type="hidden" name="type" value="1">
            @else
            <input type="hidden" name="id" value="{{$list1->id}}">
                <input type="hidden" name="type" value="2">
            @endif
            <div class="row ">  
         <div class="col-12"><h5>PROPERTY INFORMATION</h5></div>
                {{-- <input type="hidden" name="partner_id" value="{{}}"> --}}
      <div class="col-sm-6">
      <div class="text-tiny text-grey text-start mt-3"> Name </div>
      <input class="form-control mt-2" type="text" name="firstname" placeholder="name" value="{{@$list1->firstname}}" required>
      </div>
      <div class="col-sm-6">
      <div class="text-tiny text-grey text-start mt-3"> Lastname </div>
      <input class="form-control mt-2" type="text" name="lastname" placeholder="input last name" value="{{@$list1->lastname}}" required>
      </div>
      <div class="col-sm-4">
      <div class="text-tiny text-grey text-start mt-3"> email </div>
      <input class="form-control mt-2" type="text" name="email" placeholder="input email" value="{{@$list1->email}}" required>
      </div>
      <div class="col-sm-4">
      <div class="text-tiny text-grey text-start mt-3"> Comission (%) </div>
      <input class="form-control mt-2" type="text" name="comission" placeholder="input number of percent" value="{{@$list1->comission}}" required>
      </div>
    
   
      <div class="col-12 mt-2"><hr></div>
      <div class="col-12"><h5>PROPERTY DETAIL</h5></div>
     
      <div class="col-4">
              <label for="exampleFormControlInput3" class="form-label text-orange">Birthday</label>
              <input  type="date" class="form-control" name="birthday" value="{{@$partner_detail->birthday}}" required>
            </div>
            <!-- <div class="col-4">
              <label for="exampleFormControlInput3" class="form-label text-orange">Email</label>
              <input type="email" class="form-control" name="email" value="{{@$partner->email}}"  required>
            </div> -->
            <div class=" col-4">
              <label for="exampleFormControlInput3" class="form-label text-orange">Phone1</label>
              <input type="text" class="form-control" name="phone" required value="{{@$list1->phone1}}">
            </div>
            <div class=" col-4">
              <label for="exampleFormControlInput3" class="form-label text-orange">Phone2</label>
              <input type="text" class="form-control" name="phone2"  value="{{@$list1->phone2}}">
            </div>
            <div class=" col-4">
              <label for="exampleFormControlInput3" class="form-label text-orange">Address</label>
              <input type="text" class="form-control" name="address" required value="{{@$list1->address}}">
            </div>
            <div class=" col-4">
        
                <label for="exampleFormControlInput3" class="form-label text-orange">District</label>
                <select name="district_id" class="form-control  select2"  required>
            <option value="" selected disabled>Select District</option>
            @foreach($list2 as $item1 =>$l2)
            <option value="{{$l2->code}}"  {{ @$list1->district_id == $l2->code  ? 'selected ' : null }}   >{{$l2->name_en}}</option>
            @endforeach
          </select>
        
            </div>
            <div class="col-4">
        
              <label for="exampleFormControlInput3" class="form-label text-orange">Province</label>
             
              <select name="province_id" class="form-control  select2"  required>
            <option value="" selected disabled>Select Province</option>
            @foreach($list3 as $item2 =>$l3)
            <option value="{{$l3->code}}" {{ @$list1->province_id == $l3->code  ? 'selected ' : null }}  >{{$l3->name_en}}</option>
            @endforeach
          </select>
      
          </div>

          <div class="col-4">
            <label for="exampleFormControlInput3" class="form-label text-orange">Postal Code</label>
            <input type="text" class="form-control" name="postal" id="postcode" value="{{@$partner_detail->postal}}" required >
          </div>
          <div class=" col-4">
            <label for="exampleFormControlInput3" class="form-label text-orange">Bank</label>
            <select name="ref_bank_id" class="form-control">
                <option value="" disabled selected>Please Select Bank</option>
                @foreach($bank as $b)
                  <option value="{{$b->id}}" {{@$partner_bank->ref_bank_id==$b->id ?'selected' :''}}> {{$b->name}}</option>
                @endforeach
            </select>
          </div>
          <div class="col-4">
            <label for="exampleFormControlInput3" class="form-label text-orange">สาขา</label>
            <input type="text" class="form-control" name="branch" required value="{{@$partner_bank->branch}}" >
          </div>
          <div class=" col-4">
            <label for="exampleFormControlInput3" class="form-label text-orange">Account Name</label>
            <input type="text" class="form-control" name="acct_name"  required value="{{@$partner_bank->acct_name}}" >
          </div>
          <div class=" col-4">
            <label for="exampleFormControlInput3" class="form-label text-orange">Account Number</label>
            <input type="text" class="form-control" name="acct_no" id="postcode" value="{{@$partner_bank->acct_no}}" required>
          </div>
      </div>
          

            

            <div class="container p-5">
                <div class="row">
                  <div class="col text-center">
                    <button class="btn btn-primary" type="submit">Update</button>
                  </div>
                </div>
              </div>
        </form>
          </div>
        </div>
        </div>
      </div>
    </section>
  </div>
      @include('Partner.layout.footer')
    </div>
  </div>

  @include('Partner.layout.script')
  <script>
 ClassicEditor
    .create( document.querySelector( '#editor1' ), {
      toolbar: {
    items: [
        'undo', 'redo',
        '|', 'heading',
        '|', 'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor',
        '|', 'bold', 'italic', 'strikethrough', 'subscript', 'superscript', 'code',
        '|', 'link',  'blockQuote', 'codeBlock',
        '|', 'bulletedList', 'numberedList', 'todoList', 'outdent', 'indent'
    ],
    shouldNotGroupWhenFull: false
}



    } )
    .catch( error => {
        console.log( error );
    } );

    ClassicEditor
    .create( document.querySelector( '#editor2' ), {
      toolbar: {
    items: [
        'undo', 'redo',
        '|', 'heading',
        '|', 'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor',
        '|', 'bold', 'italic', 'strikethrough', 'subscript', 'superscript', 'code',
        '|', 'link', 'blockQuote', 'codeBlock',
        '|', 'bulletedList', 'numberedList', 'todoList', 'outdent', 'indent'
    ],
    shouldNotGroupWhenFull: false
}

    } )
    .catch( error => {
        console.log( error );
    } );
</script>

   

  <script>
    $(document).ready(function() {
    $('.select-show').select2();
   var position1=$('#map_google').val();

  var check=0;
  let mark1;


let map;
let markers = [];
    });
function initMap() {
  const haightAshbury = {lat: 15.773292588828886, lng:100.95085514655405  };

  map = new google.maps.Map(document.getElementById("map"), {
    zoom: 6,
    center: haightAshbury,
 
  });
  // This event listener will call addMarker() when the map is clicked.
  map.addListener("click", (event) => {
    deleteMarkers();
    addMarker(event.latLng);
    var url_maps=(event.latLng);
    // alert(url_maps);
    $('#map_google').val(url_maps);
  });
  
}

// Adds a marker to the map and push to the array.
function addMarker() {
  const marker = new google.maps.Marker({
    position,
    map,
  });
  
  markers.push(marker);
}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
  for (let i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

// Removes the markers from the map, but keeps them in the array.
function hideMarkers() {
  setMapOnAll(null);
}

// Shows any markers currently in the array.
function showMarkers() {
  setMapOnAll(map);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
  hideMarkers();
  markers = [];
}

window.initMap = initMap;

  </script>

<script async
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDr2kjYl-DeTNNEDtk1lToNx7_PUOt0N3I&callback=initMap">
</script>

</body>
</html>
