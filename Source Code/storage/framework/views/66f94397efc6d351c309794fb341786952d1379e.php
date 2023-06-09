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
        <h1>Add / Edit Poolvilla</h1>
      </div>
    
      <div class="section-body ">      
        <div class="card col-12" >             
  
          <div class="card-body p-5">
            
          <form action="<?php echo e(url('Partner/Poolvilla/Form1/save')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php if(!isset($list1)): ?>
                <input type="hidden" name="type" value="1">
            <?php else: ?>
            <input type="hidden" name="id" value="<?php echo e($list1->id); ?>">
                <input type="hidden" name="type" value="2">
            <?php endif; ?>
            <div class="row ">  
         <div class="col-12"><h5>PROPERTY INFORMATION</h5></div>
                
      <div class="col-sm-4">
      <div class="text-tiny text-grey text-start mt-3">Property Name (English language)</div>
      <input class="form-control mt-2" type="text" name="name_en" placeholder="name displayed to clients" value="<?php echo e(@$list1->name_en); ?>" required>
      </div>
      <div class="col-sm-4">
      <div class="text-tiny text-grey text-start mt-3">Property Name (Thai language)</div>
      <input class="form-control mt-2" type="text" name="name_th" placeholder="name displayed to clients" value="<?php echo e(@$list1->name_th); ?>" required>
      </div>
      <div class="col-sm-4">
        <div class="text-tiny text-grey text-start mt-3">Enjoy with</div>
        <select name="ref_enjoy_id" class="form-control mt-2"  required>
          <option value="" selected disabled>Select Enjoy with</option>
            <?php $__currentLoopData = $enjoy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 =>$enj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($enj->enjoy_id); ?>"  <?php echo e(@$list1->ref_enjoy_id == $enj->enjoy_id  ? 'selected ' : null); ?>   ><?php echo e($enj->enjoy_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </select>
      </div>
      <div class="col-sm-4">
        <div class="text-tiny text-grey text-start mt-3">Rooms</div>
        <input class="form-control mt-2" type="number" name="rooms" placeholder="Number of rooms" value="<?php echo e(@$list1->rooms); ?>" required>
      </div>
      <div class="col-sm-4">
        <div class="text-tiny text-grey text-start mt-3">Website</div>
        <input class="form-control mt-2" type="text" name="website" placeholder="www.example.com" value="<?php echo e(@$list1->website); ?>" required>
      </div>

      <div class="col-sm-4">
        <div class="text-tiny text-grey text-start mt-3">Star Rate</div>
        <select name="star_rating" class="form-control mt-2"  required>
          <option value="" selected disabled>Select Star Rate</option>
          <?php for($i=1;$i<=5;$i++): ?>
          <option value="<?php echo e($i); ?>" <?php echo e(@$list1->star_rating == $i  ? 'selected ' : null); ?>  ><?php echo e($i); ?> Stars</option>
          <?php endfor; ?>
        </select>
      </div>
      <div class="col-sm-6">
                  <div class="text-medium text-grey text-bold mt-3">Detail (EN)</div>
                  <div class="col-12 mt-3">
                    <textarea rows="10" class="form-control mb-3"id="editor1" type="text" name="detail_en"><?php echo e(@$list1->detail_en); ?></textarea>
                  </div>
      </div>
      <div class="col-sm-6">
                  <div class="text-medium text-grey text-bold mt-3">Detail (TH)</div>
                  <div class="col-12 mt-3">
                    <textarea rows="10" class="form-control mb-3"id="editor2" type="text" name="detail_th"><?php echo e(@$list1->detail_th); ?></textarea>
                  </div>
      </div>      
      <div class="col-12 mt-2"><hr></div>
      <div class="col-12"><h5>PROPERTY ADDRESS</h5></div>
      <div class="col-sm-6">
        <div class="text-tiny text-grey text-start mt-3">Address (English Language)</div>
        <input class="form-control mt-2" type="text" name="address_en" placeholder="House No.,Village No.Sub-district,District,Province" value="<?php echo e(@$list1->address_en); ?>" required>
        </div>
        <div class="col-sm-6">
        <div class="text-tiny text-grey text-start mt-3">Address Name (Thai language)</div>
        <input class="form-control mt-2" type="text" name="address_th" placeholder="House No.,Village No.Sub-district,District,Provinces" value="<?php echo e(@$list1->address_en); ?>" required>
        </div>
        <div class="col-sm-3">
          <div class="text-tiny text-grey text-start mt-3">District</div>
          <select name="district" class="form-control  select2"  required>
            <option value="" selected disabled>Select District</option>
            <?php $__currentLoopData = $list2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item1 =>$l2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($l2->code); ?>"  <?php echo e(@$list1->ref_district_id == $l2->code  ? 'selected ' : null); ?>   ><?php echo e($l2->name_en); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
  
        <div class="col-sm-3">
          <div class="text-tiny text-grey text-start mt-3">Province</div>
          <select name="province" class="form-control  select2"  required>
            <option value="" selected disabled>Select Province</option>
            <?php $__currentLoopData = $list3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2 =>$l3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($l3->code); ?>" <?php echo e(@$list1->ref_province_id == $l3->code  ? 'selected ' : null); ?>  ><?php echo e($l3->name_en); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
        <div class="col-sm-3">
          <div class="text-tiny text-grey text-start mt-3">Country</div>
          <select name="ref_country_id" class="form-control  select2"  required>
            <option value="" selected disabled>Select Country</option>
            <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 =>$ct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($ct->country_id); ?>" <?php echo e(@$list1->ref_country_id == $ct->country_id  ? 'selected ' : null); ?>  ><?php echo e($ct->country_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
        <div class="col-sm-3">
          <div class="text-tiny text-grey text-start mt-3">Postal Code</div>
          <input class="form-control " type="text" name="postal" placeholder="Please input postal code" value="<?php echo e(@$list1->postal); ?>" required>
        </div>
  
      </div>
          
      <div class="col-12 mt-5 " align="center">
        <div id="map"></div>
    </div>
         <input type="hidden" name="url_maps" id="map_google" value="<?php echo e(@$list1->url_maps); ?>" required>
            

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
<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/Partner/Poolvilla/form1.blade.php ENDPATH**/ ?>