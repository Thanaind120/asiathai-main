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
            
          <form action="<?php echo e(url('backend/country/save')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php if(!isset($country[0])): ?>
                <input type="hidden" name="type" value="1">
            <?php else: ?>
                <input type="hidden" name="type" value="2">
                <input type="hidden" name="id" value="<?php echo e($country[0]->country_id); ?>">
                <input type="hidden" name="old_image" value="<?php echo e($country[0]->country_image); ?>">
            <?php endif; ?>
            <div class="form-group row ml-4 mt-5">           
                <label for="firstname" class="col-md-2 col-form-label">Country Name :</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" value="<?php echo e(@$country[0]->country_name); ?>" name="country_name"  <?php if(!isset($country[0])): ?> required <?php endif; ?> >
                </div>
            </div>
            
            <div class="form-group row ml-4 mt-5">
                <label for="firstname" class="col-md-2 col-form-label">Country Image :</label>
                <div class="col-md-8">
                    <input class="form-control" type="file" accept=".png, .jpg, .jpeg" name="image"  <?php if(!isset($country[0])): ?> required <?php endif; ?> >
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-3"><img src="<?php echo e(asset('frontend_assets/country_image/'.@$country[0]->country_image)); ?>" height="150px" alt=""></div>
                <div class="col-3"></div>
                <div class="col-3"></div>
                
            </div>
           
            <!-- form update -->
            <div class="form-group mb-0 row mt-3">
                <div class="col-md-6">
                    <a class="btn btn-secondary btn-sm waves-effect" href="<?php echo e(url("backend/country")); ?>">
                      <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                    </a>
                </div>
                <div class="col-md-6 text-right">
                    <button type="submit" class="btn btn-success btn-sm waves-effect">
                      <i class="fa fa-save font-size-16 align-middle mr-1"></i> <?php if(!isset($country[0])): ?> Save <?php else: ?> Update <?php endif; ?>
                    </button>
                </div>
            </div>
            <br>
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
<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/backend/country/backend_country_add.blade.php ENDPATH**/ ?>