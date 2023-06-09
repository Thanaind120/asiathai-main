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
        <h1>Add / Edit Discount <?php echo e($list3->name); ?></h1>
      </div>
    
      <div class="section-body ">      
        <div class="card col-12" >             
  
          <div class="card-body p-5">
            
          <form action="<?php echo e(url('Partner/Discout/Form1/save')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php if(!isset($list1)): ?>
                <input type="hidden" name="type" value="1">
            <?php else: ?>
            <input type="hidden" name="id" value="<?php echo e($list1->id); ?>">
                <input type="hidden" name="type" value="2">
            <?php endif; ?>
            <input type="hidden" name="room_id" value="<?php echo e($list3->id); ?>">
            <div class="row ">  
                
      <div class="col-sm-4">
      <div class="text-tiny text-grey text-start mt-3">Start Discount </div>
      <input class="form-control mt-2" type="date" name="start_date" placeholder="name displayed to clients" value="<?php echo e(@$list1->start_date); ?>" required>
      </div>
      <div class="col-sm-4">
        <div class="text-tiny text-grey text-start mt-3">End Discount </div>
        <input class="form-control mt-2" type="date" name="end_date" placeholder="Input your price" value="<?php echo e(@$list1->end_date); ?>" required>
        </div>
        <div class="col-sm-4">
        <div class="text-tiny text-grey text-start mt-3">Discount(Percent) </div>
        <input class="form-control mt-2" type="number" name="discount" min="1" max="95" placeholder="Input your percent to discount" value="<?php echo e(@$list1->discount); ?>" required>

        </div>
  
           </div>
          
    
       
            

            <div class="container p-5">
                <div class="row">
                  <div class="col text-center">
                    <button class="btn btn-warning" type="submit">Save</button>
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
<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/Partner/Discount/form1.blade.php ENDPATH**/ ?>