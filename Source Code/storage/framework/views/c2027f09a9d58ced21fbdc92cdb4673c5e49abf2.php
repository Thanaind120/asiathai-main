
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
          <h1> Reversation List</h1>
        </div>

        <div class="section-body">
        
          <div class="card ">             
            <div class="card-header bg-secondary row">
                <!-- Filter -->
          
              <div class="col-sm-12 col-md-2"><label >วันที่เริ่มต้น</label> <input class="form-control" type="date" name="startdate" id="startdate" value="<?php echo e(@$startdate); ?>"></div>
              <div class="col-sm-12 col-md-2"><label >วันที่สิ้นสุด</label> <input class="form-control" type="date" name="enddate" id="enddate" value="<?php echo e(@$enddate); ?>"></div>
             <!-- dropdown type -->
             <div class="col-sm-12 col-md-2"><label > Check-In/Check-Out</label> 
                  <select name="type" id="check" class="form-control">
                      <option value="checkin" <?php echo e($check === "checkin" ? "selected" : ""); ?>>Check-In</option>
                      <option value="checkout"<?php echo e($check === "checkout" ? "selected" : ""); ?>>Check-Out</option>
                  </select>
              </div>              
              <!-- dropdown type -->
              <div class="col-sm-12 col-md-2"><label >ประเภทห้อง</label> 
                  <select name="type" id="type" class="form-control">
                  <option value="0" <?php echo e($type === "0" ? "selected" : ""); ?>>ทั้งหมด</option>
                    <?php $__currentLoopData = $room; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item1=>$r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php ($type_check=$r->id); ?>
                      <option value="<?php echo e($r->id); ?>" <?php echo e($type == $type_check ? "selected" : ""); ?>><?php echo e($r->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
              </div>
              <!-- dropdown type -->
              <div class="col-sm-12 col-md-2"><label >สถานะ</label> 
                  <select name="status" id="status" class="form-control">
                      <option value="All"<?php echo e($status === "All" ? "selected" : ""); ?>>ทั้งหมด</option>
                      <option value="Unpaid" <?php echo e($status === "Unpaid" ? "selected" : ""); ?>>ยังไม่ชำระ</option>
                      <option value="Paid"  <?php echo e($status === "Paid" ? "selected" : ""); ?>>ชำระแล้ว</option>
                      <option value="Cancle" <?php echo e($status === "Cancle" ? "selected" : ""); ?>>ยกเลิก</option>
                  </select>
              </div>  
              <!-- dropdown type -->
              <div class="col-sm-12 col-md-2">
                  <button type="button" class="btn btn-md btn-success mt-4" onclick="search()"><i class="fa fa-search"></i> ค้นหา</button>
              </div>                            

    
          <div class="text-right">

          </div>
            </div>
         

            <div class="card-body ">
               

              <div class="table-responsive ">
                <table id="install_datatable" class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th >#</th>
                    <th scope="col"> Date</th>
                    <th scope="col"> Guset</th>
                    <th scope="col"> Room</th>
                    <th scope="col"> Poovilla</th>
                    <th scope="col"> Price</th>
                    <th scope="col"> Status</th>
                    <th scope="col"> Create</th>
                    <th scope="col"> Tools</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $booking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2 =>$b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                  
                      <tr>
                          <td class="text-center"><?php echo e($item2+1); ?></td> 
                          <td class="text-center"><p><?php echo e(date( "dMY", strtotime($b->check_in))); ?></p><p><?php echo e(date( "dMY", strtotime($b->check_out))); ?><p><?php echo e($b->number_of_night); ?> Night</p></p></td> 
                          <td class="text-center"><?php echo e($b->fullname2); ?></td> 
                          <td class="text-center"><?php echo e($b->name); ?></td> 
                          <td class="text-center"><?php echo e($b->name_th); ?></td> 
                          <td class="text-center text-success"><?php echo e(number_format($b->price)); ?> ฿</td> 
                          <td class="text-center">
                            <span class="<?php if($b->status=='paid'): ?>badge badge-success <?php elseif($b->status=='unpaid'): ?>badge badge-warning <?php elseif($b->status=='cancle'): ?>badge badge-danger <?php endif; ?>"><?php echo e(ucfirst($b->status)); ?></span>
                          </td> 
                          <td class="text-center"><?php echo e(date( "d-m-Y H:i", strtotime($b->created_at))); ?></td>
                          <td class="text-center"><button class="btn btn-danger"   <?php echo e($b->status === "cancle" ? "disabled" : ""); ?> onclick="report('<?php echo e($b->id); ?>')"  data-toggle="modal" data-target="#report" ><i class="fas fa-times-circle"></i> ยกเลิก</button></td>
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
        <h5 class="modal-title" id="exampleModalLongTitle">แจ้งยกเลิกการจอง</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>  
      </div>
    <form action="<?php echo e(url('Partner/Cancle/Reserve')); ?>" method="POST">
      <?php echo csrf_field(); ?>
      <input type="hidden" name="id" id="id_to_report">
      <div class="modal-body">
          <div class="row">
            <p></p>
            <!-- <div class="col-12"><input type="radio" value="1" name="report"> เป็นเนื้อหาหยาบคาย</div>
            <div class="col-12"><input type="radio" value="2" name="report"> เป็นเนื้อหาทางเพศไม่เหมาะสม</div>
            <div class="col-12"><input type="radio" value="3" name="report"> เป็นการสแปมข้อความ</div>
            <div class="col-12"><input type="radio" value="4" name="report"> จงใจก่อกวนให้เกิดความเสียหาย</div>
            <div class="col-12"><input type="radio" value="5" name="report"> อื่นๆ</div> -->
            <div class="col-12 mt-2"><textarea name="comment" class="form-control" style="height: 100px"  placeholder="รายละเอียดการยกเลิก"></textarea></div>
            
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
        <button type="submit" class="btn btn-primary">Confirm</button>
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
      function report(id){
      $('#id_to_report').val(id);
    }
    function search(){
      var startdate=$('#startdate').val();
      var enddate=$('#enddate').val();
      // var enddate=$('#enddate').val();
      var check=$('#check').val();
      var type=$('#type').val();
      var status=$('#status').val();
      window.location.href="<?php echo e(url('')); ?>"+"/Partner/Reservation/"+startdate+"/"+enddate+"/"+check+"/"+type+"/"+status;
    }

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
</body>
</html>


<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/Partner/Reservation/index.blade.php ENDPATH**/ ?>