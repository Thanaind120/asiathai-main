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
    <?php require('inc_navbar_hotel_regis.php'); ?> 
    <div class="bg-grey">
    <div class="container">
        <div class="box-sign">
            <div class="text-head-sign text-orange">Reset Your Password</div>
            <div class="text-filter mt-3 text-center text-bold">Enter a new password for account : *email@address.com*</div>
            <div class="space-footer mb-3">
              <label for="exampleFormControlInput1" class="form-label text-orange">New Password</label>
              <input type="password" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="space-footer mb-3">
              <label for="exampleFormControlInput1" class="form-label text-orange">Confirm New Password</label>
              <input type="password" class="form-control" id="exampleFormControlInput1">
            </div>
           <a href="signin.php"><div class="btn-orange w-100">Reset My Password</div></a>
             <div class="space-footer"></div>
        </div>
    </div>
        <div class="space-footer"></div>
    </div>
    <?php require('inc_footer_hotel_regis.php'); ?> 
</body>
</html>

