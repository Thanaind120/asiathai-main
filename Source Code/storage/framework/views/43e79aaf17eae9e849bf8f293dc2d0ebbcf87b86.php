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
                        <h1>Banner</h1>
                    </div>

                    <div class="section-body">

                        <div class="card">
                            <?php if($check->page_create == 1): ?>
                            <div class="card-header">
                                <!-- add user button -->
                                <div class="text-right">
                                    <!-- <button data-target="#add_banner" data-toggle="modal" class="btn btn-success "><i class="fa fa-image"></i> add</button> -->
                                    <a class="btn btn-success" href="<?php echo e(url('backend/banner/add')); ?>"><i
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
                                                <th scope="col" class="text-center"><i class="fa fa-user"></i> Image
                                                </th>
                                                <?php if($check->page_view == 1): ?>
                                                <th scope="col" class="text-center"><i class="fa fa-home"></i> Discount
                                                    Rooms
                                                </th>
                                                <?php endif; ?>
                                                <?php if($check->page_edit == 1 || $check->page_delete == 1): ?>
                                                <th scope="col" class="text-center"><i class="fa fa-cog "></i> Tools
                                                </th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="text-center"><?php echo e($key+1); ?></td>

                                                <td class="text-center"><img
                                                        src="<?php echo e(asset('frontend_assets/banner/'.$b->banner_image)); ?>"
                                                        width="250px" height="100px" class="mt-1">
                                                </td>
                                                <?php if($check->page_view == 1): ?>
                                                <td class="text-center">
                                                    <a class="btn btn-info"
                                                        href="<?php echo e(url('backend/admin/banner/discount-rooms/'.$b->id)); ?>">View</a>
                                                </td>
                                                <?php endif; ?>
                                                <?php if($check->page_edit == 1 || $check->page_delete == 1): ?>
                                                <td class="text-center">
                                                    <!-- <button class="btn btn-warning" data-toggle="modal" data-target="#edit_banner" onclick="edit_banner('<?php echo e($b->id); ?>')">Edit</button> -->
                                                    <?php if($check->page_edit == 1): ?>
                                                    <a class="btn btn-warning"
                                                        href="<?php echo e(url('backend/banner/edit/'.$b->id)); ?>">Edit</a>
                                                    <?php endif; ?>
                                                    <?php if($check->page_delete == 1): ?>
                                                    <button class="btn btn-danger"
                                                        onclick="confirm_delete('<?php echo e($b->id); ?>')">Delete</button>
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
            </div>
            </section>
        </div>
        <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    </div>
    <!-- start add banner -->
    <div class="modal fade" id="add_banner" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="was-validated" method="POST" action="<?php echo e(url('backend/banner/save')); ?>"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-header">
                        <h3 class="modal-title"><i class="image"></i>Add Banner</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="file" accept=".png, .jpg, .jpeg" class="form-control" name="banner_image" required>

                    </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end add banner -->

    <!-- start edit banner -->
    <div class="modal fade" id="edit_banner" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="was-validated" method="POST" action="<?php echo e(url('backend/banner/update')); ?>"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-header">
                        <h3 class="modal-title"><i class="image"></i>Update Banner</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit_banner_id">
                        <input type="file" accept=".png, .jpg, .jpeg" class="form-control" name="banner_image" required>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end edit banner -->
    <?php echo $__env->make('layout.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- form delete -->
    <form action="<?php echo e(url('backend/banner/delete')); ?>" method="POST" id="delete_form">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="id" id="delete_id2">
    </form>
    <script>
        $('#simpletable').dataTable();
        function edit_banner(id) {
            $('#edit_banner_id').val(id);
        }

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

                    $('#delete_id2').val(id);
                    $('#delete_form').submit();
                }
            });
        }

    </script>
</body>

</html>
<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/backend/banner/index.blade.php ENDPATH**/ ?>