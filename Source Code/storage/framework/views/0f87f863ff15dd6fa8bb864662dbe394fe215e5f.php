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
                        <h1><a href="<?php echo e(url('backend/admin/banner')); ?>">Banner</a> > Discount Rooms</h1>
                    </div>
                    <div class="section-body">
                        <div class="card">
                            <?php if($check->page_create == 1): ?>
                            <div class="card-header">
                                <!-- add user button -->
                                <div class="text-right">
                                    <a class="btn btn-success" href="<?php echo e(url('backend/banner/discount-rooms/add/'.$banner->id)); ?>"><i
                                            class="fa fa-image"></i> add</a>
                                </div><br>
                            </div>
                            <?php endif; ?>
                            <div class="card-body ">
                                <div class="table-responsive">
                                    <table id="simpletable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col" class="text-center"><i class="fa fa-user"></i> Poolvilla
                                                </th>
                                                <th scope="col" class="text-center"><i class="fa fa-home"></i> Room
                                                </th>
                                                <th scope="col" class="text-center"><i class="fa fa-calendar"></i> start date
                                                </th>
                                                <th scope="col" class="text-center"><i class="fa fa-calendar"></i> end date
                                                </th>
                                                <th scope="col" class="text-center"><i class="fa fa-check"></i> Status</th>
                                                <?php if($check->page_edit == 1 || $check->page_delete == 1): ?>
                                                <th scope="col" class="text-center"><i class="fa fa-cog "></i> Tools
                                                </th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $discountrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="text-center"><?php echo e($key+1); ?></td>
                                                <td class="text-center"><?php echo e($b->name_en); ?></td>
                                                <td class="text-center"><?php echo e($b->name); ?></td>
                                                <td class="text-center"><?php echo e($b->ref_start_date); ?></td>
                                                <td class="text-center"><?php echo e($b->ref_end_date); ?></td>
                                                <td class="text-center">
                                                    <?php if($b->status == 1): ?>
                                                    <span class="text-success">Active</span>
                                                    <?php else: ?>
                                                    <span class="text-danger">Deactive</span>
                                                    <?php endif; ?>
                                                </td>
                                                <?php if($check->page_edit == 1 || $check->page_delete == 1): ?>
                                                <td class="text-center">
                                                    <?php if($check->page_edit == 1): ?>
                                                    <a class="btn btn-warning"
                                                        href="<?php echo e(url('backend/banner/discount-rooms/edit/'.$banner->id.'/'.$b->id_roomdetails)); ?>">Edit</a>
                                                    <?php endif; ?>
                                                    <?php if($check->page_delete == 1): ?>
                                                    <button class="btn btn-danger"
                                                        onclick="confirm_delete('<?php echo e($b->id_roomdetails); ?>')">Delete</button>
                                                    <?php endif; ?>
                                                </td>
                                                <?php endif; ?>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php echo $__env->make('layout.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- form delete -->
    <form action="<?php echo e(url('backend/banner/discount-rooms/delete/'.$banner->id)); ?>" method="POST" id="delete_form">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="id" id="delete_id2">
    </form>
    <script>
        $('#simpletable').dataTable();

        function confirm_delete(id) {
            Swal.fire({
                title: 'Are you sure to delete?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete_id2').val(id);
                    $('#delete_form').submit();
                }
            });
        }

    </script>
</body>

</html>
<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/backend/banner/manage_roomdetail_discount/index.blade.php ENDPATH**/ ?>