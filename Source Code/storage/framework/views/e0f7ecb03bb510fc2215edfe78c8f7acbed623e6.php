<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    
    
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
          <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
       
        </ul>
       
      </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="<?php echo e(asset('asset/img/avatar/avatar-1.png')); ?>" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">Hi,<?php echo e(Auth::user()->name); ?></div></a>
        <div class="dropdown-menu dropdown-menu-right">
     
        <a href="<?php echo e(url('backend/edit_profile')); ?>" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
            </a>
            <a href="<?php echo e(url('backend/change_password')); ?>" class="dropdown-item has-icon">
            <i class="fas fa-key"></i> Change Password
            </a>
            
            <div class="dropdown-divider"></div>
          <a href="<?php echo e(url('/logout')); ?>" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
        </li>
    </ul>
</nav><?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/layout/nav.blade.php ENDPATH**/ ?>