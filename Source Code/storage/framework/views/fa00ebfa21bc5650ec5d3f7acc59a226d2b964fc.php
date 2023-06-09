<!doctype html>
<html lang="th">
<head>      
    <title>Identity Verification</title>
   <?php echo $__env->make('frontend/inc_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets_frontend/css/owl.carousel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets_frontend/css/owl.theme.default.min.css')); ?>">
<script src="<?php echo e(asset('assets_frontend/js/owl.carousel.min.js')); ?>"></script>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body >
    <?php echo $__env->make('frontend/inc_navbar_hotel_regis', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('sweetalert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="bg-grey">
      <form action="<?php echo e(url('partner/verification')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
    <div class="container">
        <div class="box-sign">
            <div class="text-head-sign text-orange">Identity Verification</div>
            <div class="space-footer mb-3">
              <label for="exampleFormControlInput1" class="form-label text-orange">First Name</label>
              <input type="text" class="form-control" name="firstname" value="<?php echo e($partner->firstname); ?>" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput2" class="form-label text-orange">Last Name</label>
              <input type="text" class="form-control"  name="lastname" value="<?php echo e($partner->lastname); ?>" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput3" class="form-label text-orange">Birthday</label>
              <input  type="date" class="form-control" name="date" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput3" class="form-label text-orange">Email</label>
              <input type="email" class="form-control" name="email" value="<?php echo e($partner->email); ?>"  required>
            </div>
            <div class=" mb-3">
              <label for="exampleFormControlInput3" class="form-label text-orange">Phone1</label>
              <input type="text" class="form-control" name="phone" required value="<?php echo e($partner->partnerdetail->phone1); ?>">
            </div>
            <div class=" mb-3">
              <label for="exampleFormControlInput3" class="form-label text-orange">Phone2</label>
              <input type="text" class="form-control" name="phone2"  value="<?php echo e(@$partner->partnerdetail->phone2); ?>">
            </div>
            <div class=" mb-3">
              <label for="exampleFormControlInput3" class="form-label text-orange">Address</label>
              <input type="text" class="form-control" name="address" required value="<?php echo e(@$partner->partnerdetail->address); ?>">
            </div>
            <div class=" mb-3">
        
                <label for="exampleFormControlInput3" class="form-label text-orange">District</label>
                <select name="district_id" class="form-control  select2"  required>
            <option value="" selected disabled>Select District</option>
            <?php $__currentLoopData = $list2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item1 =>$l2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($l2->code); ?>"  <?php echo e(@$list1->ref_district_id == $l2->code  ? 'selected ' : null); ?>   ><?php echo e($l2->name_en); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        
            </div>
            <div class=" mb-3">
        
              <label for="exampleFormControlInput3" class="form-label text-orange">Province</label>
             
              <select name="province_id" class="form-control  select2"  required>
            <option value="" selected disabled>Select Province</option>
            <?php $__currentLoopData = $list3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2 =>$l3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($l3->code); ?>" <?php echo e(@$list1->ref_province_id == $l3->code  ? 'selected ' : null); ?>  ><?php echo e($l3->name_en); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
      
          </div>

          <div class=" mb-3">
            <label for="exampleFormControlInput3" class="form-label text-orange">Postal Code</label>
            <input type="text" class="form-control" name="postal" id="postcode" required >
          </div>
          <div class=" mb-3">
            <label for="exampleFormControlInput3" class="form-label text-orange">Bank</label>
            <select name="ref_bank_id" class="form-control">
                <option value="" disabled selected>Please Select Bank</option>
                <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($b->id); ?>"> <?php echo e($b->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class=" mb-3">
            <label for="exampleFormControlInput3" class="form-label text-orange">สาขา</label>
            <input type="text" class="form-control" name="branch" required value="" >
          </div>
          <div class=" mb-3">
            <label for="exampleFormControlInput3" class="form-label text-orange">Account Name</label>
            <input type="text" class="form-control" name="acct_name"  required value="" >
          </div>
          <div class=" mb-3">
            <label for="exampleFormControlInput3" class="form-label text-orange">Account Number</label>
            <input type="text" class="form-control" name="acct_no" id="postcode" required>
          </div>
          <div class=" mb-3">
            <label for="exampleFormControlInput3" class="form-label text-orange">Identification Card</label>
            <input type="file" class="form-control" name="idcard" id="idcard" required value="" >
          </div>
          <div class=" mb-3">
            <label for="exampleFormControlInput3" class="form-label text-orange">Accommodation Permit	</label>
            <input type="file" class="form-control" name="accommodation_permit" >
          </div>
            </div>

       
              </div>
            
            <button class="btn-sign" type="submit">Send</button>
            
            
             <div class="space-footer"></div>
        </div>
    </div>
  </form>
        <div class="space-footer"></div>
    </div>
    <input type="hidden" id="url_to" value="<?php echo e(url('partner/city')); ?>">
   <?php echo $__env->make('frontend/inc_footer_hotel_regis', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <script>
      $(document).ready(function() {
    $('.select2').select2();

   

    });
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
   </script>
</body>
</html>

<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/frontend/identity_verification.blade.php ENDPATH**/ ?>