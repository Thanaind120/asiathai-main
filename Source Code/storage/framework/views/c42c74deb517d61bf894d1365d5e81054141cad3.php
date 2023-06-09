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
        <h1>Member Account Manage</h1>
      </div>
    
      <div class="section-body ">      
        <div class="card col-8" >             
  
          <div class="card-body p-0">
            
          <form action="<?php echo e(url('backend/member_profile/save')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php if(!isset($member)): ?>
                <input type="hidden" name="type" value="1">
            <?php else: ?>
            <input type="hidden" name="id" value="<?php echo e($member->id); ?>">
                <input type="hidden" name="type" value="2">
            <?php endif; ?>
            <div class="form-group row ml-4 mt-5">           
                <label for="firstname" class="col-md-2 col-form-label">Firstname :</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" value="<?php echo e(@$member->firstname); ?>" name="firstname" required>
                </div>
            </div>

            <div class="form-group row ml-4 mt-5">           
              <label for="lastname" class="col-md-2 col-form-label">Lastname :</label>
              <div class="col-md-8">
                  <input class="form-control" type="text" value="<?php echo e(@$member->lastname); ?>" name="lastname" required>
              </div>
            </div>

            <div class="form-group row ml-4 mt-5">
                <label for="email" class="col-md-2 col-form-label">E-Mail :</label>
                <div class="col-md-8">
                    <input class="form-control" type="email" value="<?php echo e(@$member->email); ?>" name="email" required>
                </div>
            </div>

            <!-- form update -->
            <?php if(isset($member)): ?>

              <div class="form-group row ml-4 mt-5">
                <label for="phone" class="col-md-2 col-form-label">Phone Number :</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" value="<?php echo e(@$member->phone); ?>" name="phone" maxlength="10">
                </div>
              </div>

            

              <div class="form-group row ml-4 mt-5">
                <label class="col-md-2 col-form-label">Status :</label>
                <div class="col-md-10 mt-2">
                  <div class="custom-control custom-switch">
                    <?php if( empty($member) ): ?>
                      <input type="checkbox" class="custom-control-input" id="customSwitch" name="status" value="1" checked>
                    <?php else: ?>
                      <input type="checkbox" class="custom-control-input" id="customSwitch" name="status" value="1" <?php echo e(( @$member->status=='1')?'checked':''); ?>>
                    <?php endif; ?>
                      <label class="custom-control-label" for="customSwitch"> Active / Deactive</label>
                  </div>
                </div>
              </div> 

            <?php endif; ?>
            
            <div class="form-group mb-0 row">
                <div class="col-md-6">
                    <a class="btn btn-secondary btn-sm waves-effect" href="<?php echo e(url("backend/member_profile")); ?>">
                      <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                    </a>
                </div>
                <div class="col-md-6 text-right">
                    <button type="submit" class="btn btn-success btn-sm waves-effect">
                      <i class="fa fa-save font-size-16 align-middle mr-1"></i> <?php if(!isset($member)): ?>Save <?php else: ?> Update <?php endif; ?>
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
<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/backend/admin/manage_member/form.blade.php ENDPATH**/ ?>