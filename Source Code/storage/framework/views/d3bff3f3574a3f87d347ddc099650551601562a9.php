
<!DOCTYPE html>
<html lang="en">
<head>

  <?php echo $__env->make('Partner.layout.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
          <h1>Messages List</h1>
        </div>

        <div class="section-body">
        
          <div class="card ">             
            <div class="card-header">
              <!-- add user button -->
          <div class="text-right">
            <a href="<?php echo e(url('Partner/Inbox/Create')); ?>" class="btn btn-success "><i class="fa fa-plus"></i> New Message</a>
          </div><br>
            </div>
            <div class="card-body ">
              <div class="table-responsive ">
                <table id="install_datatable" class="table table-striped text-center">
                <thead  >
                  <tr>
                   <th >#</th> 
                    <th scope="col"> Subject</th>
                    <th scope="col">Send Date</th>
                    <th scope="col">Update Date</th>
                    <th scope="col"> Actions</th>
                  </tr>
                </thead>
                <tbody>
        
                    <?php $__currentLoopData = $list1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$l1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                  
                <td ><?php echo e($key+1); ?></td> 
                  <td><?php echo e($l1->title); ?></td>
                    <td><?php echo e(date( "d-m-Y", strtotime($l1->created_at))); ?> เวลา <?php echo e(date( "H:i", strtotime($l1->created_at))); ?> น.</td>
                    <td><?php echo e(date( "d-m-Y", strtotime($l1->updated_at))); ?> เวลา <?php echo e(date( "H:i", strtotime($l1->updated_at))); ?> น.</td>
                    <td>
                      
                    <a class="btn btn-warning text-white" href="<?php echo e(url('Partner/Inbox/'.$l1->id)); ?>"><i class="fa fa-reply" aria-hidden="true"></i> Reply</a>
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

  <?php echo $__env->make('Partner.layout.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- form to reset password -->
<form action="<?php echo e(url('/backend/member_reset')); ?>" method="POST" id="reset_password">
  <?php echo csrf_field(); ?>
  <input type="hidden" name="id" id="id_reset">
</form>
  <script>
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
</body>
</html>


<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/Partner/Inbox/index.blade.php ENDPATH**/ ?>