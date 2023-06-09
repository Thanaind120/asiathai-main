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
 img{
   width:100%;
 }
  </style>
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      @include('Partner.layout.nav')
      @include('Partner.layout.menu')
   <!-- Main Content -->
   <div class="main-content container">
    <section class="section col-12">
      <div class="section-header row">
        <div class="col-12">  <h1>{{$list1->title}}</h1></div>
      <div class="col-12">   <p>{!! $list1->detail !!}</p></div>
      <div class="mt-5 col-12" style="font-size: 10px"> <p>โดย: {{Auth::user()->firstname}} {{Auth::user()->lastname}} เมื่อ {{date( "d-m-Y", strtotime($list1->created_at))}} เวลา {{date( "H:i", strtotime($list1->created_at))}} น.</p></div>
      </div>
   
      @foreach($list2 as $item1 =>$l2)
      <div class="section-body container">      
        <div class="card " >             
  
          <div class="card-body p-1"> 
            <div class="col-12">   <p>{!! $l2->message !!}</p></div>
           
            <div class="mt-5 col-12" style="font-size: 10px"> <p>โดย: {{$l2->Partner->firstname}} {{$l2->Partner->lastname}} เมื่อ {{date( "d-m-Y", strtotime($l2->created_at))}} เวลา {{date( "H:i", strtotime($l2->created_at))}} น.</p></div>
        
          </div>
        </div>
        </div>
     @endforeach
      <div class="section-body container">      
        <div class="card " >             
  
          <div class="card-body ">
            
          <form action="{{url('Partner/Message/Reply')}}" method="POST" enctype="multipart/form-data">
            @csrf
           <input type="hidden" name="ref_inbox_id" value="{{$list1->id}}">
            <div class="row ">  
        
      <div class="col-sm-12 ">
        <textarea id="editor" placeholder="Reply Message" name="message"></textarea>
      </div>


     
         {{-- <input type="hidden" name="url_maps" id="map_google" value="{{@$list1->url_maps}}" required> --}}
            

            <div class="container mt-2">
                <div class="row">
                  <div class="col text-center">
                    <button class="btn btn-warning" type="submit"><i class="fa fa-reply"></i> Reply</button>
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
    .create( document.querySelector( '#editor' ), {
        toolbar: [ '' ]
    } )
    .catch( error => {
        console.log( error );
    } );
</script>

   
  <script>
    $(document).ready(function() {
    $('.select-show').select2();

   var position1=$('#map_google').val();

    });



  var check=0;
  let mark1;


let map;
let markers = [];

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
