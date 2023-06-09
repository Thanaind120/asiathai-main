<!doctype html>
<html lang="th">
<head>      
    <title>หน้าแรก</title>
    <?php require('inc_header.php'); ?> 
    <link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<script src="js/owl.carousel.min.js"></script>
</head>
<body >
    <?php require('inc_navbar_hotel.php'); ?> 
    <div class="bg-orange">
         <?php require('inc_menu_bar_hotel.php'); ?> 
    </div>
    <div class="bg-grey">
        <div class="container">
             <div class="text-head-d text-grey  mt-3 mb-2  text-bold">Inbox</div>
                <div class="box-hotel-p">
                    <div class="col-xl-12 mb-5">
                    <div class="row g-2">
                        <div class="col-sm-2">
                            <div class="text-detail text-bold text-grey mb-1">Sort by</div>
                            <select class="form-select" aria-label="Default select example">
                              <option selected>Option</option>
                              <option value="1">Option</option>
                              <option value="2">Option</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <div class="text-detail text-bold text-grey mb-1">Property</div>
                            <select class="form-select" aria-label="Default select example">
                              <option selected>All Property</option>
                              <option value="1">Poolvilla1</option>
                              <option value="1">Poolvilla2</option>
                              <option value="1">Poolvilla3</option>
                              <option value="1">Poolvilla4</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <div class="text-detail text-bold text-grey  mb-1">From</div>
                            <input class="form-control" type="date" placeholder="Search" aria-label="default input example">
                        </div>
                        <div class="col-sm-2 ">
                            <div class="text-detail text-bold text-grey  mb-1">To</div>
                            <input class="form-control" type="date" placeholder="Search" aria-label="default input example">
                        </div>
                        
                        <div class="col-sm-2">
                            <div class="text-detail text-bold text-grey  mb-1"><br></div>
                            <button class="btn-orange resevation">Submit</button>
                        </div>
                    </div>
                    <a href="hotel_inbox_write.php">
                        <div class="text-detail text-bold text-grey mt-3"><i class="fas fa-plus-circle me-2"></i>Write</div>
                    </a>
                </div>
                    <div class="row">
                        <div class="mb-5">
                            <a class="btn-booking btn_show active">All Messages</a>
                            <a class="btn-booking btn_show ">Starred</a>
                            <a class="btn-booking btn_show ">Sent</a>
                        </div>
                    </div>
                    <div>
                        <div class="boxshow">
                            <div class="vl-booking-inbox">
                                    <div class="row">
                                        <div class="col-1">
                                            <div class="email-starr">
                                                <i class="far fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-10 col-8">
                                        <a href="hotel_inbox_detail.php">
                                        <div class="text-detail"><span class="text-bold">Title </span>- detail</div>
                                        </a>
                                    </div>
                                    <div class="col-sm-1 col-2">
                                        <a href="hotel_inbox_detail.php">
                                        <div class="text-tiny text-bold">27 DEC</div>
                                        </a>
                                    </div>
                                    </div>
                            </div>
                            <div class="vl-booking-inbox read">
                                <div class="row">
                                    <div class="col-1 ">
                                        <div class="email-starr active">
                                            <i class="far fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                   <div class="col-sm-10 col-8">
                                        <a href="hotel_inbox_detail.php">
                                        <div class="text-detail"><span >Title </span>- detail</div>
                                        </a>
                                    </div>
                                    <div class="col-sm-1 col-2">
                                        <a href="hotel_inbox_detail.php">
                                        <div class="text-tiny ">27 DEC</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="vl-booking-inbox">
                                
                                <div class="row">
                                    <div class="col-1">
                                        <div class="email-starr">
                                            <i class="far fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-8">
                                        <a href="hotel_inbox_detail.php">
                                        <div class="text-detail"><span class="text-bold">Title </span>- detail</div>
                                        </a>
                                    </div>
                                    <div class="col-sm-1 col-2">
                                        <a href="hotel_inbox_detail.php">
                                        <div class="text-tiny text-bold">27 DEC</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="vl-booking-inbox">
                                <div class="row">
                                    <div class="col-1">
                                        <div class="email-starr">
                                            <i class="far fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-8">
                                        <a href="hotel_inbox_detail.php">
                                        <div class="text-detail"><span class="text-bold">Title </span>- detail</div>
                                        </a>
                                    </div>
                                    <div class="col-sm-1 col-2">
                                        <a href="hotel_inbox_detail.php">
                                        <div class="text-tiny text-bold">27 DEC</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="boxshow">
                            <div class="vl-booking-inbox ">
                                <div class="row">
                                    <div class="col-1">
                                        <div class="email-starr active">
                                            <i class="far fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-8">
                                        <a href="hotel_inbox_detail.php">
                                        <div class="text-detail"><span class="text-bold">Title </span>- detail</div>
                                        </a>
                                    </div>
                                    <div class="col-sm-1 col-2">
                                        <a href="hotel_inbox_detail.php">
                                        <div class="text-tiny text-bold">27 DEC</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="boxshow">
                            <div class="text-icon-150 mt-5 text-center text-orange"><i class="far fa-folder-open"></i></div>
                            <div class="text-filter text-orange  text-center">no message </div>
                        </div>
                    </div>
                </div>
            
        </div>
    <div class="space-footer"></div>
    </div>
    <?php require('inc_footer_hotel.php'); ?> 
</body>
</html>

<script>
    $( '.btn_show' ).click(function (event) {
        var rsnum = $(this).index();
        if (  $( ".boxshow" ).eq(rsnum).is( ":hidden" ) ) {
            $( ".boxshow" ).hide();
            $( ".boxshow" ).eq(rsnum).fadeIn();
        } else {
        }
        event.stopPropagation();
 	});
</script> 
