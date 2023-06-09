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
      @include('Partner.layout.nav')
      @include('Partner.layout.menu')
   <!-- Main Content -->
   <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Add / Edit Poolvilla</h1>
      </div>
    
      <div class="section-body ">      
        <div class="card col-12" >             
  
          <div class="card-body p-5">
            
          <form action="{{url('Partner/Poolvilla/Form1/save')}}" method="POST" enctype="multipart/form-data">
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
      <div class="col-sm-4">
      <div class="text-tiny text-grey text-start mt-3">Property Name (English language)</div>
      <input class="form-control mt-2" type="text" name="name_en" placeholder="name displayed to clients" value="{{@$list1->name_en}}" required>
      </div>
      <div class="col-sm-4">
      <div class="text-tiny text-grey text-start mt-3">Property Name (Thai language)</div>
      <input class="form-control mt-2" type="text" name="name_th" placeholder="name displayed to clients" value="{{@$list1->name_th}}" required>
      </div>
      <div class="col-sm-4">
        <div class="text-tiny text-grey text-start mt-3">Enjoy with</div>
        <select name="ref_enjoy_id" class="form-control mt-2"  required>
          <option value="" selected disabled>Select Enjoy with</option>
            @foreach($enjoy as $key1 =>$enj)
            <option value="{{$enj->enjoy_id}}"  {{ @$list1->ref_enjoy_id == $enj->enjoy_id  ? 'selected ' : null }}   >{{$enj->enjoy_name}}</option>
            @endforeach
          </select>
        </select>
      </div>
      <div class="col-sm-4">
        <div class="text-tiny text-grey text-start mt-3">Rooms</div>
        <input class="form-control mt-2" type="number" name="rooms" placeholder="Number of rooms" value="{{@$list1->rooms}}" required>
      </div>
      <div class="col-sm-4">
        <div class="text-tiny text-grey text-start mt-3">Website</div>
        <input class="form-control mt-2" type="text" name="website" placeholder="www.example.com" value="{{@$list1->website}}" required>
      </div>

      <div class="col-sm-4">
        <div class="text-tiny text-grey text-start mt-3">Star Rate</div>
        <select name="star_rating" class="form-control mt-2"  required>
          <option value="" selected disabled>Select Star Rate</option>
          @for($i=1;$i<=5;$i++)
          <option value="{{$i}}" {{ @$list1->star_rating == $i  ? 'selected ' : null }}  >{{$i}} Stars</option>
          @endfor
        </select>
      </div>
      <div class="col-sm-6">
                  <div class="text-medium text-grey text-bold mt-3">Detail (EN)</div>
                  <div class="col-12 mt-3">
                    <textarea rows="10" class="form-control mb-3"id="editor1" type="text" name="detail_en">{{@$list1->detail_en}}</textarea>
                  </div>
      </div>
      <div class="col-sm-6">
                  <div class="text-medium text-grey text-bold mt-3">Detail (TH)</div>
                  <div class="col-12 mt-3">
                    <textarea rows="10" class="form-control mb-3"id="editor2" type="text" name="detail_th">{{@$list1->detail_th}}</textarea>
                  </div>
      </div>      
      <div class="col-12 mt-2"><hr></div>
      <div class="col-12"><h5>PROPERTY ADDRESS</h5></div>
      <div class="col-sm-6">
        <div class="text-tiny text-grey text-start mt-3">Address (English Language)</div>
        <input class="form-control mt-2" type="text" name="address_en" placeholder="House No.,Village No.Sub-district,District,Province" value="{{@$list1->address_en}}" required>
        </div>
        <div class="col-sm-6">
        <div class="text-tiny text-grey text-start mt-3">Address Name (Thai language)</div>
        <input class="form-control mt-2" type="text" name="address_th" placeholder="House No.,Village No.Sub-district,District,Provinces" value="{{@$list1->address_en}}" required>
        </div>
        <div class="col-sm-3">
          <div class="text-tiny text-grey text-start mt-3">District</div>
          <select name="district" class="form-control  select2"  required>
            <option value="" selected disabled>Select District</option>
            @foreach($list2 as $item1 =>$l2)
            <option value="{{$l2->code}}"  {{ @$list1->ref_district_id == $l2->code  ? 'selected ' : null }}   >{{$l2->name_en}}</option>
            @endforeach
          </select>
        </div>
  
        <div class="col-sm-3">
          <div class="text-tiny text-grey text-start mt-3">Province</div>
          <select name="province" class="form-control  select2"  required>
            <option value="" selected disabled>Select Province</option>
            @foreach($list3 as $item2 =>$l3)
            <option value="{{$l3->code}}" {{ @$list1->ref_province_id == $l3->code  ? 'selected ' : null }}  >{{$l3->name_en}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-sm-3">
          <div class="text-tiny text-grey text-start mt-3">Country</div>
          <select name="ref_country_id" class="form-control  select2"  required>
            <option value="" selected disabled>Select Country</option>
            @foreach($country as $key2 =>$ct)
            <option value="{{$ct->country_id}}" {{ @$list1->ref_country_id == $ct->country_id  ? 'selected ' : null }}  >{{$ct->country_name}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-sm-3">
          <div class="text-tiny text-grey text-start mt-3">Postal Code</div>
          <input class="form-control " type="text" name="postal" placeholder="Please input postal code" value="{{@$list1->postal}}" required>
        </div>
  
      </div>
          
      <div class="col-12 mt-5 " align="center">
        <div id="map"></div>
    </div>
         <input type="hidden" name="url_maps" id="map_google" value="{{@$list1->url_maps}}" required>
            

            <div class="container p-5">
                <div class="row">
                  <div class="col text-center">
                    <button class="btn btn-warning" type="submit">Next</button>
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
