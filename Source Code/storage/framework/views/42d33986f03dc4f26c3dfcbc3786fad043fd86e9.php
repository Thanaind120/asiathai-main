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
                        <h1>Country : <?php echo e($country[0]->country_name); ?></h1>
                    </div>

                    <div class="section-body">

                        <div class="card">
                            <?php if($check->page_create == 1): ?>
                            <div class="card-header">
                                <!-- add user button -->
                                <div class="text-right">
                                    <a href="<?php echo e(url('backend/country/city/add/'.$country[0]->country_id)); ?>"
                                        class="btn btn-success "><i class="fa fa-plus"></i> add</a>
                                </div><br>
                            </div>
                            <?php endif; ?>
                            <div class="card-body ">
                                <div class="table-responsive">
                                    <table id="simpletable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col"><i class="fa fa-flag"></i> City Name</th>
                                                <th scope="col"><i class="far fa-image"></i> City Image</th>
                                                <?php if($check->page_edit == 1 || $check->page_delete == 1): ?>
                                                <th scope="col"><i class="fa fa-cog"></i> Tools</th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php ($i = 1); ?>
                                            <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td style="width: 10%"><?php echo e($i); ?></td>
                                                <td style="width: 35%"><?php echo e($row->name_en); ?></td>
                                                <td style="width: 35%">
                                                    <img src="<?php echo e(asset('frontend_assets/city_image/'.$row->city_image)); ?>"
                                                        height="150px" alt="">
                                                </td>
                                                <?php if($check->page_edit == 1 || $check->page_delete == 1): ?>
                                                <td style="width: 20%">
                                                    <?php if($check->page_edit == 1): ?>
                                                    <a class="btn btn-warning text-white"
                                                        href="<?php echo e(url('backend/country/city/edit/'.$row->code)); ?>"><i
                                                            class="fa fa-pencil-square-o"></i> Edit</a>
                                                    <?php endif; ?>
                                                    <?php if($check->page_delete == 1): ?>
                                                    <button class="btn btn-danger text-white"
                                                      type="button" onclick="confirm_delete('<?php echo e($row->code); ?>')"><i
                                                            class="fa fa-pencil-square-o"></i> Delete</button>
                                                    <?php endif; ?>
                                                </td>
                                                <?php endif; ?>
                                            </tr>
                                            <?php ($i++); ?>
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
        <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    </div>

    <?php echo $__env->make('layout.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- form to reset password -->
    <form action="<?php echo e(url('/backend/member_reset')); ?>" method="POST" id="reset_password">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="id" id="id_reset">
    </form>
    <script>
        $('#simpletable').dataTable();

        function confirm_delete(id) {
            Swal.fire({
                title: 'Are you sure to delete?',
                // text: "Reset password:m123456",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location ="<?php echo e(url('backend/country/city/delete')); ?>/"+id;
                }
            });
        }

    </script>
</body>

</html>
<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/backend/country/city/backend_country_city.blade.php ENDPATH**/ ?>