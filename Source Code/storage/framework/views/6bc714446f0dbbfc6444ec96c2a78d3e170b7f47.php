<!DOCTYPE html>
<html lang="en">
<head>
  <?php echo $__env->make('layout.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <?php echo $__env->make('layout.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->make('layout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!-- Main Content -->
   <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Partner Account Manage</h1>
      </div>
    
      <div class="section-body ">      
        <div class="card col-8" >             
  
          <div class="card-body p-0">
            
          <form action="<?php echo e(url('backend/hotel_profile/save')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php if(!isset($user)): ?>
                <input type="hidden" name="type" value="1">
            <?php else: ?>
            <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                <input type="hidden" name="type" value="2">
            <?php endif; ?>
            <div class="form-group row ml-4 mt-5">           
                <label for="firstname" class="col-md-2 col-form-label">First Name :</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" value="<?php echo e(@$user->firstname); ?>" name="firstname" required>
                </div>
            </div>
            <div class="form-group row ml-4 mt-5">           
              <label for="firstname" class="col-md-2 col-form-label">Last Name :</label>
              <div class="col-md-8">
                  <input class="form-control" type="text" value="<?php echo e(@$user->lastname); ?>" name="lastname" required>
              </div>
          </div>
          <div class="form-group row ml-4 mt-5">           
            <label for="firstname" class="col-md-2 col-form-label">Adress :</label>
            <div class="col-md-8">
                <input class="form-control" type="text" value="<?php echo e(@$user->address); ?>" name="address" required>
            </div>
        </div>
        <div class="form-group row ml-4 mt-5">           
          <label for="firstname" class="col-md-2 col-form-label">Tel. :</label>
          <div class="col-md-8">
              <input class="form-control" type="text" value="<?php echo e(@$user->phone_number); ?>" name="phone_number" required>
          </div>
      </div>
        

            <div class="form-group row ml-4 mt-5">
                <label for="firstname" class="col-md-2 col-form-label">Email :</label>
                <div class="col-md-8">
                    <input class="form-control" type="email" value="<?php echo e(@$user->email); ?>" name="email" required>
                </div>
            </div>

            <?php if(!isset($user)): ?>
            <div class="form-group row ml-4 mt-5">
                <label for="firstname" class="col-md-2 col-form-label mt-2">Bank :</label>
                <div class="col-md-8">
                    <select name="bank" class="form-control" required>
                        <option disabled selected>Choose Bank</option>
                        <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option  value="<?php echo e($b->name); ?>"><?php echo e($b->name); ?></option> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <?php else: ?>
            <div class="form-group row ml-4 mt-5">
                <label for="firstname" class="col-md-2 col-form-label mt-2">Bank :</label>
                <div class="col-md-8">
                    <select name="bank" class="form-control" required>
                        <option disabled >Choose Bank</option>
                        <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option  value="<?php echo e($b->name); ?>"<?php echo e($b->name === $user->bank ?  'selected' : ''); ?>><?php echo e($b->name); ?></option> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <?php endif; ?>
            <div class="form-group row ml-4 mt-5">
                <label for="firstname" class="col-md-2 col-form-label">Account Number :</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" value="<?php echo e(@$user->account_number); ?>" name="account_number" required>
                </div>
            </div>
            <!-- form update -->
            <?php if(isset($user)): ?>
                <!-- อนาคตเผื่อกรณีอยากเพิ่มบัญชีตำแหน่งพนักงาน -->
            

            <div class="form-group row ml-4 mt-5">
              <label class="col-md-2 col-form-label">Status :</label>
              <div class="col-md-10 mt-2">
                <div class="custom-control custom-switch">
                  <?php if( empty($user) ): ?>
                    <input type="checkbox" class="custom-control-input" id="customSwitch" name="status" value="1" checked >
                  <?php else: ?>
                    <input type="checkbox" class="custom-control-input" id="customSwitch" name="status" value="1" <?php echo e(( @$user->status=='1')?'checked':''); ?>>
                  <?php endif; ?>
                    <label class="custom-control-label" for="customSwitch"> Active / Deactive</label>
                </div>
              </div>
          </div> 

            <?php endif; ?>
            

            <div class="form-group mb-0 row">
                <div class="col-md-6">
                    <a class="btn btn-secondary btn-sm waves-effect" href="<?php echo e(url("backend/hotel_profile")); ?>">
                      <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                    </a>
                </div>
                <div class="col-md-6 text-right">
                    <button type="submit" class="btn btn-success btn-sm waves-effect">
                      <i class="fa fa-save font-size-16 align-middle mr-1"></i> <?php if(!isset($user)): ?>Save <?php else: ?> Update <?php endif; ?>
                    </button>
                </div>
            </div><br>
        </form>
          </div>
        </div>
        </div>
      </div>
    </section>
  </div>
      <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>

  <?php echo $__env->make('layout.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/backend/admin/manage_hotel/form.blade.php ENDPATH**/ ?>