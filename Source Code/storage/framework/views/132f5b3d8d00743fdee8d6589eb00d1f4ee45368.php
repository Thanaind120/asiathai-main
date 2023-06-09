

<?php if($message = Session::get('success')): ?>
<script type="text/javascript">
    swal.fire({
        icon:'success',
        title:'Success!',
        text:"<?php echo e(Session::get('success')); ?>",
        // timer:2500,
        type:'success'
    }).then((value) => {
        // window.location.reload();

    }).catch(swal.noop);
</script>

<?php endif; ?>

<?php if($message = Session::get('error')): ?>
<script type="text/javascript">
    swal.fire({
        title:'Error!',
        text:"<?php echo e(Session::get('error')); ?>",
        timer:3000,
        type:'error'
    }).then((value) => {
    }).catch(swal.noop);
</script>
<?php endif; ?>

<?php if($message = Session::get('warning')): ?>
<script type="text/javascript">
    swal.fire({
        icon: 'error',
        title:'Warning!',
        text:"<?php echo e(Session::get('warning')); ?>",
        // timer:3000,
        type:'warning'
    }).then((value) => {
        // window.location.reload();
    }).catch(swal.noop);
</script>
<?php endif; ?>

<?php if($message = Session::get('loginfail')): ?>
<script type="text/javascript">
    swal.fire({
        title:'Sorry!',
        text:"<?php echo e(Session::get('loginfail')); ?>",
        type:'error'
    }).then((value) => {
    }).catch(swal.noop);
</script>
<?php endif; ?>

<?php if($message = Session::get('info')): ?>
<div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong><?php echo e($message); ?></strong>
</div>
<?php endif; ?>

<?php if($errors->any()): ?>
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    Please check the form below for errors
</div>
<?php endif; ?>
<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/Partner/layout/sweetalert.blade.php ENDPATH**/ ?>