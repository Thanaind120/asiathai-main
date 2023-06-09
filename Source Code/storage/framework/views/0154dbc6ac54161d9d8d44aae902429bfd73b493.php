<!doctype html>
<html lang="th">

<head>
    <title><?php echo app('translator')->get('lang.poolvilla'); ?></title>
    <?php echo $__env->make('frontend/inc_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets_frontend/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets_frontend/css/owl.theme.default.min.css')); ?>">
    <script src="<?php echo e(asset('assets_frontend/js/owl.carousel.min.js')); ?>"></script>
    <style>
        .heighttext {
            height: 53px
        }

    </style>
</head>

<body>
    <?php echo $__env->make('frontend/inc_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="bg-orange-light2">
        <form action="<?php echo e(url(Session::get('lang').'/select-hotel/search')); ?>" method="get" autocomplete="off">
            <div class="row g-1">
                <div class="col-lg-2 col-12">
                    <div class="autocomplete heighttext">
                        <input class="form-control emptytwo orange" type="text" id="iconified" name="province"
                            placeholder="&#xF002; <?php echo app('translator')->get('lang.where_are_you_going'); ?>" aria-label="" value="">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="bg-white-form">
                        <div class="row g-0">
                            <div class="col-6">
                                <div class="line-check-in">
                                    <label class="top-text-form" for="check-in"><?php echo app('translator')->get('lang.check_in'); ?></label>
                                    <div class="row g-0">
                                        <div class="col-2 text-center text-orange">
                                            <i class="far fa-calendar check-calender"></i>
                                        </div>
                                        <div class="col-10">
                                            <input class="form-control orange-check check-in-out" id="datepicker"
                                                type="text" placeholder="<?php echo app('translator')->get('lang.date'); ?>" name="ci" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="top-text-form" for="check-in"><?php echo app('translator')->get('lang.check_out'); ?></label>
                                <div class="row g-0">
                                    <div class="col-2 text-center text-orange">
                                        <i class="far fa-calendar check-calender"></i>
                                    </div>
                                    <div class="col-10">
                                        <input class="form-control orange-check check-in-out" id="datepicker2"
                                            type="text" placeholder="<?php echo app('translator')->get('lang.date'); ?>" name="co" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="bg-white-form">
                        <label class="top-text-form" for="check-in"><?php echo app('translator')->get('lang.guest'); ?></label>
                        <div class="row g-0">
                            <div class="col-1 text-center text-orange">
                                <i class="fas fa-user check-calender"></i>
                            </div>
                            <div class="col-11">
                                <div class="row g-2">

                                    <div class="col-4">
                                        <div class="row g-2">
                                            <label for="inputPassword"
                                                class="col-4 text-tiny text-orange"><?php echo app('translator')->get('lang.adult'); ?></label>
                                            <div class="col-8 mt-0">
                                                <div class="input-group input-number">
                                                    <button class="btn sub" type="button" id="sub">-</button>
                                                    <input class="input-number border-0 text-center field"
                                                        placeholder="1" type="text" id="demoInput" name="adult"
                                                        value="1">
                                                    <button class="btn add" type="button" id="add">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row g-2">
                                            <label for="inputPassword"
                                                class="col-4 text-tiny text-orange"><?php echo app('translator')->get('lang.kid'); ?></label>
                                            <div class="col-8 mt-0">
                                                <div class="input-group input-number">
                                                    <button class="btn sub2" type="button" id="sub2">-</button>
                                                    <input class="input-number border-0 text-center field2"
                                                        placeholder="1" type="text" id="demoInput2" name="kid"
                                                        value="1">
                                                    <button class="btn add2" type="button" id="add2">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row g-2">
                                            <label for="inputPassword"
                                                class="col-4 text-tiny text-orange"><?php echo app('translator')->get('lang.room'); ?></label>
                                            <div class="col-8 mt-0">
                                                <div class="input-group input-number">
                                                    <button class="btn sub3" type="button" id="sub3">-</button>
                                                    <input class="input-number border-0 text-center field3"
                                                        placeholder="1" type="text" id="demoInput3" name="ro" value="1">
                                                    <button class="btn add3" type="button" id="add3">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-12">
                    <button type="submit" class="btn-search two"><?php echo app('translator')->get('lang.search'); ?></button>
                </div>
            </div>
        </form>
    </div>
    <div class="container">
        <div class="clearfix mt-2">
            <div class="float-start">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="bread" href="<?php echo e(url('/'.Session::get('lang'))); ?>"><?php echo app('translator')->get('lang.home'); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo app('translator')->get('lang.category'); ?></li>
                    </ol>
                </nav>
            </div>
        </div>
        <?php if(Auth::user() != '' || Auth::user() != null): ?>
        <div class="head-text-index"><?php echo app('translator')->get('lang.enjoy_with'); ?></div>
        <div class="line-bottom-head-text"></div>
        <div class="row mt-5">
            <?php $__currentLoopData = $enjoywith; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-4 col-6">
                <div class="frame-item box-destination">
                    <a href="<?php echo e(url(Session::get('lang').'/category-travel/search?id='.$val->enjoy_id)); ?>" class="">
                        <img src="<?php echo e(asset('assets_frontend/images/'.$val->enjoy_image)); ?>" class="img-des">
                        <div class="bottom-left">
                            <p class="name-text text-white"><?php echo e($val->enjoy_name); ?></p>
                        </div>
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php else: ?>
        <div class="head-text-index"><?php echo app('translator')->get('lang.enjoy_with'); ?></div>
        <div class="line-bottom-head-text"></div>
        <div class="row mt-5">
            <?php $__currentLoopData = $enjoywith; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-4 col-6">
                <div class="frame-item box-destination">
                    <a href="<?php echo e(url(Session::get('lang').'/category-travel/search?id='.$val->enjoy_id)); ?>" class="">
                        <img src="<?php echo e(asset('assets_frontend/images/'.$val->enjoy_image)); ?>" class="img-des">
                        <div class="bottom-left">
                            <p class="name-text text-white"><?php echo e($val->enjoy_name); ?></p>
                        </div>
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
    </div>
    <div class="space-footer"></div>
    <?php echo $__env->make('frontend/inc_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<script>
    $(function () {
        $("#datepicker").datepicker({
            dateFormat: 'dd/mm/yy',
        });
    });

    $(function () {
        $("#datepicker2").datepicker({
            dateFormat: 'dd/mm/yy',
        });
    });

</script>
<script>
    $('#iconified').on('keyup', function () {
        var input = $(this);
        if (input.val().length === 0) {
            input.addClass('empty');
        } else {
            input.removeClass('empty');
        }
    });

    function autocomplete(inp, arr) {
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function (e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) {
                return false;
            }
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    /*create a DIV element for each matching element:*/
                    b = document.createElement("DIV");
                    /*make the matching letters bold:*/
                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    /*insert a input field that will hold the current array item's value:*/
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    /*execute a function when someone clicks on the item value (DIV element):*/
                    b.addEventListener("click", function (e) {
                        /*insert the value for the autocomplete text field:*/
                        inp.value = this.getElementsByTagName("input")[0].value;
                        /*close the list of autocompleted values,
                        (or any other open lists of autocompleted values:*/
                        closeAllLists();
                    });
                    a.appendChild(b);
                }
            }
        });
        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function (e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                /*If the arrow DOWN key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 13) {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                    /*and simulate a click on the "active" item:*/
                    if (x) x[currentFocus].click();
                }
            }
        });

        function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }

        function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }

        function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
    }

    /*An array containing all the country names in the world:*/
    var courses = ["Destination A", "Destination B", "Destination C", "Destination D", "Destination E", "Destination F",
        "Destination G"
    ];

    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
    autocomplete(document.getElementById("iconified"), courses);

</script>

<!-- ปุ่มเพิ่ม-ลด  -->
<script>
    var unit = 1;
    var total;
    // if user changes value in field
    $('.field').change(function () {
        unit = this.value;
    });
    $('.add').click(function () {
        unit++;
        var $input = $(this).prevUntil('.sub');
        $input.val(unit);
        unit = unit;
    });
    $('.sub').click(function () {
        if (unit > 0) {
            unit--;
            var $input = $(this).nextUntil('.add');
            $input.val(unit);
        }
    });

</script>
<script>
    var unit2 = 1;
    var total;
    // if user changes value in field
    $('.field2').change(function () {
        unit2 = this.value;
    });
    $('.add2').click(function () {
        unit2++;
        var $input = $(this).prevUntil('.sub2');
        $input.val(unit2);
        unit2 = unit2;
    });
    $('.sub2').click(function () {
        if (unit2 > 0) {
            unit2--;
            var $input = $(this).nextUntil('.add2');
            $input.val(unit2);
        }
    });

</script>
<script>
    var unit3 = 1;
    var total;
    // if user changes value in field
    $('.field3').change(function () {
        unit3 = this.value;
    });
    $('.add3').click(function () {
        unit3++;
        var $input = $(this).prevUntil('.sub3');
        $input.val(unit3);
        unit3 = unit3;
    });
    $('.sub3').click(function () {
        if (unit3 > 0) {
            unit3--;
            var $input = $(this).nextUntil('.add3');
            $input.val(unit3);
        }
    });

</script><?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/frontend/category.blade.php ENDPATH**/ ?>