<nav>
    <div class="">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-sm-6">
                    <a href="<?php echo e(url('/'.Session::get('lang'))); ?>">
                        <img src="<?php echo e(asset('assets_frontend/images/logo.svg')); ?>" class="logo footer">
                    </a>
                </div>
                <div class="col-sm-6">
                    <?php if(Session::get('lang') == 'en'): ?>
                    <ul class="nav-list-hotel-nav">
                        <li class="nav-link-hotel-nav">
                            <?php
                            $currenturl = url()->current();
                            ?>
                            <?php if($currenturl != 'https://korn2.orangeworkshop.info/Poolvilla/en/signin_hotel'): ?>
                            <a href="<?php echo e(url(Session::get('lang').'/signin')); ?>">
                                <button class="dropbtn profile"><i
                                        class="fas fa-user text-nav-hotel text-orange"></i><br><span
                                        class="text-tiny"><?php echo app('translator')->get('lang.sign_in'); ?></span>
                                </button>
                            </a>
                            <?php elseif($currenturl == 'https://korn2.orangeworkshop.info/Poolvilla/en/signin_hotel'): ?>
                            <a href="<?php echo e(url(Session::get('lang').'/signin_hotel')); ?>">
                                <button class="dropbtn profile"><i
                                        class="fas fa-user text-nav-hotel text-orange"></i><br><span
                                        class="text-tiny"><?php echo app('translator')->get('lang.sign_in'); ?></span>
                                </button>
                            </a>
                            <?php endif; ?>
                            <div class="dropdown-content profile hotel"></div>
                        </li>
                        <li class="nav-link-hotel-nav"><a href="#"><img src="<?php echo e(asset('assets_frontend/images/lang-en.png')); ?>" class="lang-hotel"></a>
                        </li>
                    </ul>
                    <?php elseif(Session::get('lang') == 'th'): ?>
                    <ul class="nav-list-hotel-nav">
                        <li class="nav-link-hotel-nav">
                            <?php
                            $currenturl = url()->current();
                            ?>
                            <?php if($currenturl != 'https://korn2.orangeworkshop.info/Poolvilla/th/signin_hotel'): ?>
                            <a href="<?php echo e(url(Session::get('lang').'/signin')); ?>">
                                <button class="dropbtn profile"><i
                                        class="fas fa-user text-nav-hotel text-orange"></i><br><span
                                        class="text-tiny"><?php echo app('translator')->get('lang.sign_in'); ?></span>
                                </button>
                            </a>
                            <?php elseif($currenturl == 'https://korn2.orangeworkshop.info/Poolvilla/th/signin_hotel'): ?>
                            <a href="<?php echo e(url(Session::get('lang').'/signin_hotel')); ?>">
                                <button class="dropbtn profile"><i
                                        class="fas fa-user text-nav-hotel text-orange"></i><br><span
                                        class="text-tiny"><?php echo app('translator')->get('lang.sign_in'); ?></span>
                                </button>
                            </a>
                            <?php endif; ?>
                            <div class="dropdown-content profile hotel">
                            </div>
                        </li>
                        <li class="nav-link-hotel-nav"><a href="#"><img src="<?php echo e(asset('assets_frontend/images/090-thailand-1.png')); ?>" class="lang-hotel"></a>
                        </li>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</nav>
<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/frontend/inc_navbar_hotel_regis.blade.php ENDPATH**/ ?>