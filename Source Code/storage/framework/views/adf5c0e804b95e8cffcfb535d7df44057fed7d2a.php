<!DOCTYPE html>
<html lang="en">
<head>
  <?php echo $__env->make('Partner.layout.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<body>
  <div id="app">
    <div class="main-wrapper">
      <?php echo $__env->make('Partner.layout.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->make('Partner.layout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!-- Main Content -->
   <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Add / Edit Room in <?php echo e($list3->name_en); ?></h1>
      </div>
    
      <div class="section-body ">      
        <div class="card col-12" >             
  
          <div class="card-body p-5">
            
          <form action="<?php echo e(url('Partner/Room/Form1/save')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php if(!isset($list1)): ?>
                <input type="hidden" name="type" value="1">
            <?php else: ?>
            <input type="hidden" name="id" value="<?php echo e($list1->id); ?>">
                <input type="hidden" name="type" value="2">
            <?php endif; ?>
            <input type="hidden" name="poolvilla_id" value="<?php echo e($list3->id); ?>">
            <div class="row ">  
         <div class="col-12"><h5>PROPERTY INFORMATION ROOM</h5></div>
                
      <div class="col-sm-6">
      <div class="text-tiny text-grey text-start mt-3">Room Name(EN) </div>
      <input class="form-control mt-2" type="text" name="name" placeholder="name displayed to clients" value="<?php echo e(@$list1->name); ?>" required>
      </div>
      <div class="col-sm-6">
      <div class="text-tiny text-grey text-start mt-3">Room Name(TH) </div>
      <input class="form-control mt-2" type="text" name="name_th" placeholder="name displayed to clients" value="<?php echo e(@$list1->name_th); ?>" required>
      </div>
      <div class="col-sm-4">
        <div class="text-tiny text-grey text-start mt-3">Price </div>
        <input class="form-control mt-2" type="number" name="price" placeholder="Input your price" value="<?php echo e(@$list1->price); ?>" required>
        </div>
        <div class="col-sm-4">
        <div class="text-tiny text-grey text-start mt-3">Max Room </div>
        <input class="form-control mt-2" type="number" name="max_room" placeholder="Input your price" value="<?php echo e(@$list1->max_room); ?>" required>
        </div>
      <div class="col-12 mt-2"><hr></div>
      <div class="col-12"><h5>Which beds are available in this room?</h5></div>
      <div class="col-sm-6">
      <div class="text-tiny text-grey text-start mt-3">Twin bed(s)</div>
      <input class="form-control mt-2" type="number" name="twin_bed" placeholder="Number of Twin Bed" value="<?php echo e(@$list1->twin_bed); ?>" required>
      </div>
      <div class="col-sm-6">
        <div class="text-tiny text-grey text-start mt-3">Full bed(s)</div>
        <input class="form-control mt-2" type="number" name="full_bed" placeholder="Number of Full Bed" value="<?php echo e(@$list1->twin_bed); ?>" required>
        </div>
        <div class="col-sm-6">
          <div class="text-tiny text-grey text-start mt-3">Queen bed(s)</div>
          <input class="form-control mt-2" type="number" name="queen_bed" placeholder="Number of Queen Bed" value="<?php echo e(@$list1->twin_bed); ?>" required>
          </div>
          <div class="col-sm-6">
            <div class="text-tiny text-grey text-start mt-3">King bed(s)</div>
            <input class="form-control mt-2" type="number" name="king_bed" placeholder="Number of King Bed" value="<?php echo e(@$list1->twin_bed); ?>" required>
            </div>

            <div class="col-12 mt-2"><hr></div>
            <div class="col-12"><h5>Bathroom</h5></div>
            <div class="col-sm-6">
            <div class="text-tiny text-grey text-start mt-3">Bathroom</div>
            <input class="form-control mt-2" type="number" name="bathroom" placeholder="Number of Bathroom" value="<?php echo e(@$list1->bathroom); ?>" required>
            </div>
            <div class="col-12 mt-2"><hr></div>
      
            <div class="col-12"><h5>How many guests can stay?</h5></div>
            <div class="col-sm-6">
            <div class="text-tiny text-grey text-start mt-3">Adult</div>
            <input class="form-control mt-2" type="number" name="adult" placeholder="Number of Adult" value="<?php echo e(@$list1->adult); ?>" required>
            </div>
            <div class="col-sm-6">
              <div class="text-tiny text-grey text-start mt-3">Kids</div>
              <input class="form-control mt-2" type="number" name="kids" placeholder="Number of Kids" value="<?php echo e(@$list1->kids); ?>" required>
              </div>
            <div class="col-12 mt-2"><hr></div>

            <div class="col-12"><h5>How big is this villa?</h5></div>
            <div class="col-sm-6">
            <div class="text-tiny text-grey text-start mt-3">Villa size (square meters) – optional</div>
            <input class="form-control mt-2" type="text" name="size" placeholder="size of room" value="<?php echo e(@$list1->size); ?>" required>
            </div>
   
            <div class="col-12 mt-2"><hr></div>

              <div class="col-12"><h5>PROPERTY FACILITIES Poolvilla</h5></div>
              <?php $fal=DB::select("select * FROM db_facilities where status='1' "); ?>
              <div class="vl-filter-hotel  row col-12">
                  <?php $__currentLoopData = $fal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-12">
                  <?php $icon=DB::select("select * FROM db_icon where facilities_id='$f->id' "); ?>
                  
                  <div class="text-medium text-grey text-bold mt-3"><?php echo e($f->facilities); ?></div>
                      <?php $__currentLoopData = $icon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item=>$i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php 
                      $room_id=@$list1->id;
                      $icon_check=DB::select("select * FROM db_icon_room where room_id='$room_id' and icon_id='$i->id' "); 
                      ?>
                      <div class="form-check ">
                          <input class="form-check-input" type="checkbox" value="<?php echo e($i->id); ?>" name="icon[]" id="flexCheckDefault<?php echo e($i->id); ?>" <?php if(isset($icon_check[0])): ?>checked <?php endif; ?>>
                          <label class="form-check-label" for="flexCheckDefault<?php echo e($i->id); ?>"><?php echo e($i->icon_name); ?></label>
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
              <div class="col-12 mt-2"><hr></div>
  
      </div>
          
    
       
            

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
      <?php echo $__env->make('Partner.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>

  <?php echo $__env->make('Partner.layout.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/Partner/Room/form1.blade.php ENDPATH**/ ?>