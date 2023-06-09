<!DOCTYPE html>
<html lang="en">
<head>
  <?php echo $__env->make('layout.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <?php echo $__env->make('layout.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->make('layout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!-- Main Content -->
   <div class="main-content" >
    <section class="section"  >
      <div class="section-header" >
        <h1>Edit Banner</h1>
      </div>
    
      <div class="section-body"  >      
        <div class="card col-8"  >             
  
          <div class="card-body p-0" >
            
          <form action="<?php echo e(url('backend/banner/update')); ?>" method="POST"  enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" value="<?php echo e($banner->id); ?>">
            <div class="form-group row ml-4 mt-5"> 
            <img src="<?php echo e(asset('frontend_assets/banner/'.$banner->banner_image)); ?>" width="300px" height="200px" class="mt-1">
            </div>
            <div class="form-group row ml-4 mt-5">           
                <label for="firstname" class="col-md-2 col-form-label">Image:</label>
                <div class="col-md-8">
                <input type="file" accept=".png, .jpg, .jpeg" class="form-control" name="banner_image"  >
                </div>
            </div>
            <div class="form-group row ml-4 mt-5">           
              <label for="firstname" class="col-md-2 col-form-label">Promotion name(EN):</label>
              <div class="col-md-8">
                  <input class="form-control" type="text" value="<?php echo e(@$banner->head_en); ?>" name="head_en" required>
              </div>
          </div>
          <div class="form-group row ml-4 mt-5">           
            <label for="firstname" class="col-md-2 col-form-label" >Description (EN):</label>
            <div class="col-md-8">
                <textarea class="form-control" type="text"  name="detail_en"rows="10" style="height:100%" required><?php echo e(@$banner->detail_en); ?></textarea>
            </div>
        </div>
       <br>
       <hr>
       <br>
       <div class="form-group row ml-4 mt-5">           
              <label for="firstname" class="col-md-2 col-form-label">Promotion name(TH):</label>
              <div class="col-md-8">
                  <input class="form-control" type="text" value="<?php echo e(@$banner->head_th); ?>" name="head_th" required>
              </div>
          </div>
          <div class="form-group row ml-4 mt-5">           
            <label for="firstname" class="col-md-2 col-form-label">Description (TH):</label>
            <div class="col-md-8">
                <textarea class="form-control" type="text" value="" name="detail_th" required rows="10" style="height:100%"><?php echo e(@$banner->detail_th); ?></textarea>
            </div>
        </div>

 </div>

<hr>



            <!-- form update -->
            
            

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
  <script>
    $(document).ready(function() {
    $('.select_search').select2();
});
  function success_alert(){
    Swal.fire(
  'Success!',
  'Data is save!',
  'success'
)
  }
  </script>

</body>
</html>
<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/backend/banner/form2.blade.php ENDPATH**/ ?>