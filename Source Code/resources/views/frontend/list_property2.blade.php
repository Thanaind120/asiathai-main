<!doctype html>
<html lang="th">
<head>      
    <title>หน้าแรก</title>
   @include('frontend/inc_header')
    <link rel="stylesheet" href="{{asset('assets_frontend/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('assets_frontend/css/owl.theme.default.min.css')}}">
<script src="{{asset('assets_frontend/js/owl.carousel.min.js')}}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
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
  </style>
</head>
<body >
    @include('frontend/inc_navbar_hotel')
    @include('frontend/partner_js')
    <div class="bg-grey">
        <div class="container">
            <form action="{{url('/create/poolvilla')}}" method="POST">
                @csrf
            <div class="box-hotel">
                <div class="text-filter text-grey text-start text-bold">PROPERTY INFORMATION </div>
                <div class="row">
                    <?php 
                        session_start();
                       
                    ?>
                    <input type="hidden" name="partner_id" value="{{Auth::guard('partner')->user()->id}}">
                    <div class="col-sm-6">
                        <div class="text-tiny text-grey text-start mt-3">Property Name (English language)</div>
                        <input class="form-control mt-2" type="text" name="name_en" placeholder="name displayed to clients">
                    </div>
                    <div class="col-sm-6">
                        <div class="text-tiny text-grey text-start mt-3">Property Name (Thai language)</div>
                        <input class="form-control mt-2" type="text" name="name_th" placeholder="name displayed to clients">
                    </div>
                    <div class="col-sm-3">
                        <div class="text-tiny text-grey text-start mt-3">Number of Rooms</div>
                        <input class="form-control mt-2" type="text" name="rooms">
                    </div>
                    <div class="col-sm-4">
                        <div class="text-tiny text-grey text-start mt-3">Website</div>
                        <input class="form-control mt-2" type="text" name="website">
                    </div>
                    <div class="col-sm-5">
                        <div class="text-tiny text-grey text-start mt-3">Star Rating </div>
                        <input type="hidden" name="star_rating" id="star_rating_set">
                        <div class="dropdown mt-2">
                          <button class="btn-star-hotel dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <span id="star_rate">Pleases Select</span>
                          </button>
                          <ul class="dropdown-menu hotel" aria-labelledby="dropdownMenuButton1">
                            <li>
                                <a class="dropdown-item" href="javascript:void(0);" onclick="select_star_rating('5')">
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
                                <a class="dropdown-item" href="javascript:void(0);" onclick="select_star_rating('4')">
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
                                <a class="dropdown-item" href="javascript:void(0);" onclick="select_star_rating('3')">
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
                                <a class="dropdown-item" href="javascript:void(0);" onclick="select_star_rating('2')">
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
                                <a class="dropdown-item" href="javascript:void(0);" onclick="select_star_rating('1')">
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
                <div class="row">
                       <div class="col-sm-6">
                          <label for="exampleFormControlInput3" class="form-label text-tiny text-grey">Address (English Language)</label>
                          <input type="text" class="form-control" id="exampleFormControlInput3" name="address_en" placeholder="House No.,Village No,Sub-district">
                        </div>
                        <div class="col-sm-6">
                            <label for="exampleFormControlInput3" class="form-label text-tiny text-grey">Address (Thai Language)</label>
                            <input type="text" class="form-control" id="exampleFormControlInput3" name="address_th" placeholder="House No.,Village No,Sub-district">
                          </div>
                          <input type="hidden" class="form-control" id="map_google" name="url_maps" >
                        {{-- <div class="col-sm-4">
                          <label for="exampleFormControlInput3" class="form-label text-tiny text-grey">Google Maps</label>
                          <input type="text" class="form-control" id="exampleFormControlInput3" name="url_maps" placeholder="URL">
                        </div> --}}
                        {{-- <div class="col-sm-4">
                          <label for="exampleFormControlInput3" class="form-label text-tiny text-grey">Longitude</label>
                          <input type="email" class="form-control" id="exampleFormControlInput3" placeholder="....">
                        </div> --}}
                    </div>
                <div class="row">
                    {{-- <div class="col-sm-4">
                        <div class="text-tiny text-grey text-start mt-3"></div>
                        <label for="exampleDataList" class="form-label text-tiny text-grey">Country</label>
                        <input type="hidden" name="country_id" id="country_id_set">
                        <input class="form-control" list="datalistOptions1" id="country_name"  placeholder="Type to search..." onchange="set_country()">
                        <datalist id="datalistOptions1">
                            <option value="Thailand">
                            <option value="Singapore">
                            {{-- <option value="location">
                            <option value="location">
                            <option value="location">
                        </datalist>
                    </div> --}}
                    <div class="col-sm-4">
                        <div class="text-tiny text-grey text-start mt-3"></div>
                        <label for="exampleDataList" class="form-label text-tiny text-grey">City</label>
                        <input class="form-control" list="datalistOptions1" name="district" id="disctrict"  placeholder="Type to search..." onchange="set_address()">
                        <datalist id="datalistOptions1">
                            @foreach($district as $d)
                            <option value="{{$d->name_th}}">
                            @endforeach
                        </datalist>
                    </div>
                    <div class="col-sm-4">
                      <div class="text-tiny text-grey text-start mt-3"></div>
                      <label for="exampleDataList" class="form-label text-tiny text-grey">Province</label>
                      <input type="text" class="form-control" name="province" required id="province" readonly>
                      {{-- <input type="hidden" name="postal_id" id="postal_id_set">
                      <input class="form-control" list="datalistOptions3" id="postal" placeholder="Type to search..." onchange="set_postal()">
                      <datalist id="datalistOptions3">
                     
                      </datalist> --}}
                  </div>
                     <div class="col-sm-4">
                        <div class="text-tiny text-grey text-start mt-3"></div>
                        <label for="exampleDataList" class="form-label text-tiny text-grey">Postal Code</label>
                        <input type="text" class="form-control" name="postcode" id="postcode" required value="" readonly>
                        {{-- <input type="hidden" name="postal_id" id="postal_id_set">
                        <input class="form-control" list="datalistOptions3" id="postal" placeholder="Type to search..." onchange="set_postal()">
                        <datalist id="datalistOptions3">
                       
                        </datalist> --}}
                    </div>
                    <div class="col-12 mt-5">
                        <div id="map"></div>
                    </div>
                  
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-sm-4 ">
                        <button  class="btn-orange mt-3" type="submit">Next</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
        <div class="space-footer"></div>
    </div>
   @include('frontend/inc_footer_hotel')
   <input type="hidden" id="url_to" value="{{url('partner/city')}}">
   <script>

function set_address(){
       var disctrict=$('#disctrict').val();
       var url_to=$('#url_to').val();
          // Ajax request country city and postal
            $.ajax({
              type: "POST",
                url: url_to,
                headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
                data: {
                  id:disctrict,
                    
                },
            
               success:function(data) {
                // alert(data.data.province);
                $('#province').val(data.data.province);
                $('#postcode').val(data.data.postcode);
               }
            });

     }

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
function addMarker(position) {
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

