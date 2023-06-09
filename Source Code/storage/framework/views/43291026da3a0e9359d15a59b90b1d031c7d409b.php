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
        <h1>Edit Profile</h1>
      </div>
    
      <div class="section-body ">      
        <div class="card col-8" >             
  
          <div class="card-body p-0">
            
          <form action="<?php echo e(url('backend/profile/save')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
             
            <div class="form-group row ml-4 mt-5">           
                <label for="firstname" class="col-md-2 col-form-label">Name :</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" value="<?php echo e(@$user->name); ?>" name="name" required>
                </div>
            </div>

            <div class="form-group row ml-4 mt-5">
                <label for="firstname" class="col-md-2 col-form-label">Email :</label>
                <div class="col-md-8">
                    <input class="form-control" type="email" value="<?php echo e(@$user->email); ?>" name="email" required>
                </div>
            </div>
            <!-- form update -->
            <?php if(isset($user)): ?>
            <div class="form-group row ml-4 mt-5">
              <label for="prename" class="col-md-2 col-form-label">Position :</label>
              <div class="col-md-10">
                <select name="position" class="form-control  col-md-8" disabled >
                  <option value="" disabled>Select</option>                
                  <option value="seuper_admin"<?php echo e(($user->position=="seuper_admin" )?'selected':''); ?>>Super Admin</option>
                      <option value="admin"<?php echo e(($user->position=="admin" )?'selected':''); ?>>Admin</option>
                      <option value="hotel"<?php echo e(($user->position=="hotel" )?'selected':''); ?>>Hotel</option>
                      <option value="member"<?php echo e(($user->position=="member" )?'selected':''); ?>>Member</option>
                   
         
                </select>
              </div>
            </div>

     
            <?php endif; ?>
            

            <div class="form-group mb-0 row">
                <div class="col-md-6">
                    <a class="btn btn-secondary btn-sm waves-effect" href="<?php echo e(url()->previous()); ?>">
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
<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/backend/profile/edit_profile.blade.php ENDPATH**/ ?>