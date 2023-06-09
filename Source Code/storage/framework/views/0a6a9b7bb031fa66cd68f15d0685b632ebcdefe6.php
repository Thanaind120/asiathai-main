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

                    <div class="section-body">

                        <div class="card">
                            <?php if($check->page_create == 1): ?>
                            <div class="card-header">
                                <!-- add user button -->
                                <div class="text-right">
                                    <a href="<?php echo e(url('backend/admin/add-member')); ?>" class="btn btn-success "><i
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
                                                <th scope="col"><i class="fa fa-user"></i> Full Name</th>
                                                <th scope="col"><i class="fa fa-envelope"></i> E-Mail</th>
                                                <th scope="col"><i class="fa fa-phone"></i> Phone Number</th>
                                                <th scope="col"><i class="fa fa-check"></i> Status</th>
                                                <?php if($check->page_edit == 1 || $check->page_delete == 1): ?>
                                                <th scope="col"><i class="fa fa-key"></i> Password</th>
                                                <th scope="col"><i class="fa fa-cog"></i> Tools</th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $member; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($key+1); ?></td>
                                                <td><?php echo e($u->firstname); ?> <?php echo e($u->lastname); ?></td>
                                                <td><?php echo e($u->email); ?></td>
                                                <td><?php echo e($u->phone); ?></td>
                                                <td>
                                                    <?php if($u->status==1): ?>
                                                    <span class="text-success">Active</span>
                                                    <?php else: ?>
                                                    <span class="text-danger">Deactive</span>
                                                    <?php endif; ?>
                                                </td>
                                                <?php if($check->page_edit == 1 || $check->page_delete == 1): ?>
                                                <td>
                                                    <button class="btn btn-primary"
                                                        onclick="confirm_reset('<?php echo e($u->id); ?>')">Reset</button>
                                                </td>
                                                <td>
                                                    <a class="btn btn-warning text-white"
                                                        href="<?php echo e(url('backend/admin/update_member/'.$u->id)); ?>"><i
                                                            class="fa fa-pencil-square-o"></i> Edit</a>
                                                    
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

    <?php echo $__env->make('layout.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- form to reset password -->
    <form action="<?php echo e(url('/backend/member_reset')); ?>" method="POST" id="reset_password">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="id" id="id_reset">
    </form>
    <!-- form delete -->
    <form action="<?php echo e(url('backend/member_profile/delete')); ?>" method="POST" id="delete_form">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="id" id="delete_id2">
    </form>
    <script>
        $('#simpletable').dataTable();

        function confirm_reset(id) {
            Swal.fire({
                title: 'Are you sure to reset?',
                text: "Reset password:p123456",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {

                    $('#id_reset').val(id);
                    $('#reset_password').submit();
                }
            });
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
<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/backend/admin/manage_member/index.blade.php ENDPATH**/ ?>