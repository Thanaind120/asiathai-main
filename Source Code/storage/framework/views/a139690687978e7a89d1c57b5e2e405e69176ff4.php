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
        <h1>Add - Edit Bank</h1>
      </div>
    
      <div class="section-body ">      
        <div class="card col-8" >             
  
          <div class="card-body p-0">
            
          <form action="<?php echo e(url('backend/banking/save')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php if(!isset($bank)): ?>
                <input type="hidden" name="type" value="1">
            <?php else: ?>
            <input type="hidden" name="id" value="<?php echo e(@$bank[0]->id); ?>">
                <input type="hidden" name="type" value="2">
                <input type="hidden" name="old_image" value="<?php echo e(@$bank[0]->logo); ?>">
            <?php endif; ?>
            <div class="form-group row ml-4 mt-5">           
                <label for="firstname" class="col-md-2 col-form-label">Bank Name :</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" value="<?php echo e(@$bank[0]->name); ?>" name="name" required>
                </div>
            </div>      
        

            <div class="form-group row ml-4 mt-5">
                <label for="firstname" class="col-md-2 col-form-label">Bank Logo :</label>
                <div class="col-md-8">
                <input type="file" accept="image/png, image/gif, image/jpeg" class="form-control" name="logo" id="logo" > 
                </div>
            </div>
            <?php if(isset($bank)): ?>
            <div class="form-group row ml-4 mt-5">
                <label for="firstname" class="col-md-2 col-form-label">Logo Image:</label>
                <div class="col-md-8">
                <img src="<?php echo e(asset(@$bank[0]->logo)); ?>" width="250px" height="250px">
                </div>
            </div>
            <?php endif; ?>
            <!-- form update -->
             <?php if(isset($bank)): ?>         


            <div class="form-group row ml-4 mt-5">
              <label class="col-md-2 col-form-label">Status :</label>
              <div class="col-md-10 mt-2">
                <div class="custom-control custom-switch">
                  <?php if( empty(@$bank[0]->status) ): ?>
                    <input type="checkbox" class="custom-control-input" id="customSwitch" name="status" value="1"  >
                  <?php else: ?>
                    <input type="checkbox" class="custom-control-input" id="customSwitch" name="status" value="1" <?php echo e(( @$bank[0]->status=='1')?'checked':''); ?>>
                  <?php endif; ?>
                    <label class="custom-control-label" for="customSwitch"> Active / Deactive</label>
                </div>
              </div>
          </div> 

            <?php endif; ?>
            

            <div class="form-group mb-0 row">
                <div class="col-md-6">
                    <a class="btn btn-secondary btn-sm waves-effect" href="<?php echo e(url("backend/admin/banking")); ?>">
                      <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                    </a>
                </div>
                <div class="col-md-6 text-right">
                    <button type="submit" class="btn btn-success btn-sm waves-effect">
                      <i class="fa fa-save font-size-16 align-middle mr-1"></i> <?php if(!isset($bank)): ?>Save <?php else: ?> Update <?php endif; ?>
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
<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/backend/banking/form.blade.php ENDPATH**/ ?>