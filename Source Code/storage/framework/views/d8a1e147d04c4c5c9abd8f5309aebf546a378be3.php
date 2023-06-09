
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
          <h1>Reviews List</h1>
        </div>

        <div class="section-body">
        
          <div class="card ">             
            <div class="card-header">
              <!-- add user button -->
          <div class="text-right">
            <!-- <a href="<?php echo e(url('Partner/Inbox/Create')); ?>" class="btn btn-success "><i class="fa fa-plus"></i> New Message</a> -->
          </div><br>
            </div>
            <div class="card-body ">
              <div class="table-responsive ">
                <table id="install_datatable" class="table table-striped text-center">
                <thead  >
                  <tr>
                    
                    <th scope="col"> Date</th>
                    <th scope="col"> Rating</th>
                    <th scope="col"> Review</th>
                    <th scope="col"> Room</th>
                    <th scope="col"> Poolvill</th>
                    <th scope="col"> Customer</th>
                    <th scope="col"> สถานะ</th>
                    <th scope="col"> Actions</th>
                  </tr>
                </thead>
                <tbody>
              
                    <?php $__currentLoopData = $list1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$l1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
            
          
                    <td><?php echo e(date( "d/m/Y", strtotime($l1->created_at))); ?> เวลา <?php echo e(date( "H:i", strtotime($l1->created_at))); ?> น.</td>
                    <td>
                      <?php for($i=1;$i<=$l1->rating;$i++): ?>
                      <i class="fa fa-star text-warning"></i> 
                      <?php endfor; ?>
                    </td>
                    <td>
                    <?php echo $l1->review; ?><br>
                    <img class="mt-2" src="<?php echo e(asset($l1->image)); ?>" width="100px" height="80px" alt="">
                    </td>
                    <td>
                      <?php echo e($l1->room->name); ?>

                    </td>
                    <td>
                      <?php echo e($l1->room->poolvilla->name_th); ?>

                    </td>
                    <td>
                      <?php echo e($l1->member1->firstname); ?>

                    </td>
                    <td>
                       <?php if($l1->status==1): ?>
                       <p class="text-success"> เผยแพร่</p>
                       <?php elseif($l1->status==2): ?>
                       <p class="text-warning"> กำลังตรวจสอบ</p>
                       <?php elseif($l1->status==3): ?>
                       <p class="text-primary"> อนุมัติ/รีวิวถูกระงับการเผยแพร่แล้ว</p>
                       <?php endif; ?>
                    </td>
                    <td>

                      
                    <button class="btn btn-danger text-white" onclick="report('<?php echo e($l1->id); ?>')" type="button" data-toggle="modal" data-target="#report"><i class="fa fa-flag" aria-hidden="true"></i> Report</button>
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


<!-- Modal -->
<div class="modal fade" id="report" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Report review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>  
      </div>
    <form action="<?php echo e(url('Review/Report')); ?>" method="POST">
      <?php echo csrf_field(); ?>
      <input type="hidden" name="id" id="id_to_report">
      <div class="modal-body">
          <div class="row">
            <div class="col-12"><input type="radio" value="1" name="report"> เป็นเนื้อหาหยาบคาย</div>
            <div class="col-12"><input type="radio" value="2" name="report"> เป็นเนื้อหาทางเพศไม่เหมาะสม</div>
            <div class="col-12"><input type="radio" value="3" name="report"> เป็นการสแปมข้อความ</div>
            <div class="col-12"><input type="radio" value="4" name="report"> จงใจก่อกวนให้เกิดความเสียหาย</div>
            <div class="col-12"><input type="radio" value="5" name="report"> อื่นๆ</div>
            <div class="col-12 mt-2"><textarea name="comment" class="form-control" style="height: 100px"  placeholder="รายละเอียดเพิ่มเติม"></textarea></div>
            
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
        <button type="submit" class="btn btn-primary">Report</button>
      </div>
    </form>
    </div>
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

    function report(id){
      $('#id_to_report').val(id);
    }
  </script>
</body>
</html>


<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/Partner/Review/index.blade.php ENDPATH**/ ?>