
<!DOCTYPE html>
<html lang="en">
<head>

  <?php echo $__env->make('Partner.layout.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
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
          <h1>Discount</h1>
        </div>

        <div class="section-body">
        
          <div class="card ">             
            <div class="card-header">
              <!-- add user button -->
          <div class="text-right">
           <a href="<?php echo e(url('Partner/Room/'.$room_id.'/DiscountCreate')); ?>" class="btn btn-success "><i class="fa fa-plus"></i> Create</a>
          </div><br>
            </div>
            <div class="card-body ">
              <div class="table-responsive ">
                <table id="install_datatable" class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th >#</th>
                  
                    <th scope="col"> Price</th>
                    <th scope="col"> Discount</th>
                    <th scope="col"> Total</th>
            
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col"> Tools</th>
                  </tr>
                </thead>
                <tbody>
              
              <?php $__currentLoopData = $list2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$l2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                  <td ><?php echo e($key+1); ?></td>
               
                    <td><?php echo e(@$l2->room->price); ?></td>
                    <td><?php echo e(@$l2->discount); ?> %</td>
                    <?php ($discount=($l2->room->price/100)*$l2->discount); ?>
                    <?php ($total=$l2->room->price-$discount); ?>
                    <td><?php echo e(@$total); ?></td>
                    <td><?php echo e(date('d-M-Y', strtotime(@$l2->start_date ))); ?></td>
                    <td><?php echo e(date('d-M-Y', strtotime(@$l2->end_date))); ?></td>
                   
                    
                    <td>

                    <a class="btn btn-warning text-white" href="<?php echo e(url('Partner/Room/'.$l2->id.'/DiscountEdit')); ?>"><i class="fa fa-pencil-square-o"></i> Edit</a>
                    <a class="btn btn-danger text-white"  onclick="confirm_delete('<?php echo e($room_id); ?>','<?php echo e($l2->id); ?>')"><i class="fa fa-trash"></i> Delete</a>
                  </td>
                  </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </tbody>
              </table>
            </div>
            </div>
          </div>
          </div>
        </div>
      </section>
    </div>
      <?php echo $__env->make('Partner.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>
  <input type="hidden" name="url_to_del" id="url_to_del" value="<?php echo e(url('Partner/Room/Discount/Delete/')); ?>">
  <?php echo $__env->make('Partner.layout.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- form to reset password -->
<form action="<?php echo e(url('/backend/member_reset')); ?>" method="POST" id="reset_password">
  <?php echo csrf_field(); ?>
  <input type="hidden" name="id" id="id_reset">
</form>
  <script>
     function changeStatus(id) {
           
           $.ajax({
               type: "POST",
               url:  "<?php echo e(url('/change_status_room')); ?>",
               headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   },
               data: {
                   id:id,
                   
               },
               success: function(data) {
           //  alert(data)
               },
               error: function(err){
                
                   // return alert('เกิดข้อผิดพลาด');
               }
           });
   }
    $('#install_datatable').dataTable();

    function confirm_reset(id){
      Swal.fire({
  title: 'Are you sure to reset?',
  text: "Reset password:m123456",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Confirm'
}).then((result) => {
  if (result.isConfirmed) {

    $('#id_reset').val(id);
      $('#reset_password').submit();
  }
});
    }
  </script>

  <script>
        function confirm_delete(poolvilla_id,image_id){
      Swal.fire({
  title: 'Are you sure to Delte?',
  text: "Please confirm to delete it!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Confirm'
}).then((result) => {
  if (result.isConfirmed) {

   var url=$('#url_to_del').val();
  
    window.location = url+'/'+poolvilla_id+'/'+image_id;
  }
});
    }
    </script>
</body>
</html>


<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/Partner/Discount/index.blade.php ENDPATH**/ ?>