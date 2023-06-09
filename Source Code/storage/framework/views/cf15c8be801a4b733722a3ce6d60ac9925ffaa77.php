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
      <?php echo $__env->make('Partner.layout.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->make('Partner.layout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!-- Main Content -->
   <div class="main-content container">
    <section class="section col-12">
      <div class="section-header row">
        <div class="col-12">  <h1><?php echo e($list1->title); ?></h1></div>
      <div class="col-12">   <p><?php echo $list1->detail; ?></p></div>
      <div class="mt-5 col-12" style="font-size: 10px"> <p>โดย: <?php echo e(Auth::user()->firstname); ?> <?php echo e(Auth::user()->lastname); ?> เมื่อ <?php echo e(date( "d-m-Y", strtotime($list1->created_at))); ?> เวลา <?php echo e(date( "H:i", strtotime($list1->created_at))); ?> น.</p></div>
      </div>
   
      <?php $__currentLoopData = $list2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item1 =>$l2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="section-body container">      
        <div class="card " >             
  
          <div class="card-body p-1"> 
            <div class="col-12">   <p><?php echo $l2->message; ?></p></div>
           
            <div class="mt-5 col-12" style="font-size: 10px"> <p>โดย: <?php echo e($l2->Partner->firstname); ?> <?php echo e($l2->Partner->lastname); ?> เมื่อ <?php echo e(date( "d-m-Y", strtotime($l2->created_at))); ?> เวลา <?php echo e(date( "H:i", strtotime($l2->created_at))); ?> น.</p></div>
        
          </div>
        </div>
        </div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <div class="section-body container">      
        <div class="card " >             
  
          <div class="card-body ">
            
          <form action="<?php echo e(url('Partner/Message/Reply')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
           <input type="hidden" name="ref_inbox_id" value="<?php echo e($list1->id); ?>">
            <div class="row ">  
        
      <div class="col-sm-12 ">
        <textarea id="editor" placeholder="Reply Message" name="message"></textarea>
      </div>


     
         
            

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
      <?php echo $__env->make('Partner.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>

  <?php echo $__env->make('Partner.layout.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/Partner/Inbox/form2.blade.php ENDPATH**/ ?>