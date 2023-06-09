<nav>
        <div class="">
            <div class="container">
                <div class="row justify-content-between">
                      <div class="col-sm-6">
                         <a href="<?php echo e(url('hotel')); ?>">
                            <img src="<?php echo e(asset('assets_frontend/images/logo.svg')); ?>" class="logo footer">
                         </a>
                      </div>
                    <div class="col-sm-6">
                        <ul class="nav-list-hotel-nav">
                            <li class="nav-link-hotel-nav">
                                <div class="dropdown profile">
                                    <button class="dropbtn profile"><i class="fas fa-user text-nav-hotel text-orange"></i><br><span class="text-tiny">Account</span></button>
                                    <div class="dropdown-content profile hotel">
                                        <a href="<?php echo e(url('hotel_account_change_password')); ?>">Change password</a>
                                        <a href="<?php echo e(url('hotel_account_manage')); ?>">Account Management</a>
                                        <a href="<?php echo e(url('hotel_account_finance')); ?>">bank detail</a>
                                        <a href="<?php echo e(url('hotel_policy_refund')); ?>">Policy and Refund</a>
                                        <a href="<?php echo e(url('signin_hotel')); ?>">Log out</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-link-hotel-nav">
                                <a href="<?php echo e(url('list_property2')); ?>">
                                    <button class="dropbtn profile"><i class="fas fa-home text-nav-hotel text-orange"></i><br><span class="text-tiny">Add new Property</span></button></a>
                                    <div class="dropdown-content profile hotel">
                                    </div>
                            </li>
                            <li class="nav-link-hotel-nav"><a href="#"><img src="<?php echo e(asset('assets_frontend/images/lang-en.png')); ?>" class="lang-hotel"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</nav><?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/frontend/inc_navbar_hotel.blade.php ENDPATH**/ ?>