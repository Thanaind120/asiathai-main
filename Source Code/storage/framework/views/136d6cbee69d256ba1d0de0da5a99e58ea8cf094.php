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
                        <h1>Manage Facilities</h1>
                    </div>

                    <div class="section-body">

                        <div class="card">
                            <?php if($check->page_create == 1): ?>
                            <div class="card-header">
                                <!-- add user button -->
                                <div class="text-right">
                                    <a href="<?php echo e(url('backend/admin/add_facilities')); ?>" class="btn btn-success "><i
                                            class="fa fa-plus"></i> add</a>
                                </div><br>
                            </div>
                            <?php endif; ?>
                            <div class="card-body ">
                                <div class="table-responsive">
                                    <table id="simpletable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col" class="text-center"> Facilities</th>
                                                <?php if($check->page_edit == 1 || $check->page_delete == 1): ?>
                                                <th scope="col" class="text-center"><i class="fa fa-cog "></i> Tools
                                                </th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $__currentLoopData = $facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="text-center"><?php echo e($key+1); ?></td>
                                                <td class="text-center"><?php echo e($f->facilities); ?></td>
                                                <?php if($check->page_edit == 1 || $check->page_delete == 1): ?>
                                                <td class="text-center">
                                                    <?php if($check->page_edit == 1): ?>
                                                    <a class="btn btn-warning"
                                                        href="<?php echo e(url('backend/admin/edit_facilities/'.$f->id)); ?>">Edit</a>
                                                    <?php endif; ?>
                                                    <?php if($check->page_delete == 1): ?>
                                                    <button class="btn btn-danger"
                                                        onclick="confirm_delete('<?php echo e($f->id); ?>')">Delete</button>
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
    <!-- start edit user -->
    <div class="modal fade" id="upload" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="was-validated" method="POST" action="<?php echo e(url('director/managing-user')); ?>"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-header">
                        <h3 class="modal-title"><i class="image"></i>Upload Image</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="file" accept="image/png, image/gif, image/jpeg" class="form-control">
                    </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary waves-effect waves-light "
                            data-dismiss="modal">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end edit user -->
    <!-- form delete -->
    <form action="<?php echo e(url('backend/facilities/delete')); ?>" method="POST" id="delete_form">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="id" id="delete_id2">
    </form>
    <?php echo $__env->make('layout.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- form to reset password -->
    <form action="<?php echo e(url('/backend/member_reset')); ?>" method="POST" id="reset_password">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="id" id="id_reset">
    </form>
    <script>
        // $('#simpletable').dataTable();

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
<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/backend/facilities/index.blade.php ENDPATH**/ ?>