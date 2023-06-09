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
            <div class="box-hotel-p">
                <div class="text-head-d text-grey mb-3 text-bold">Reservation</div>
                <div class="col-xl-12 mb-3">
                    <div class="row g-2">
                        <div class="col-sm-2">
                            <div class="text-detail text-bold text-grey mb-1">Sort by</div>
                            <select class="form-select" aria-label="Default select example">
                              <option selected>booking date</option>
                              <option value="1">Checkin date</option>
                              <option value="2">Checkout date</option>
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
                </div>
                <div class="text-icon-150 mt-5 text-center text-orange"><i class="far fa-folder-open"></i></div>
                <div class="text-filter text-orange  text-center">no bookings for the date </div>
            </div>
        </div>
    <div class="space-footer"></div>
    </div>
    <?php require('inc_footer_hotel.php'); ?> 
</body>
</html>

