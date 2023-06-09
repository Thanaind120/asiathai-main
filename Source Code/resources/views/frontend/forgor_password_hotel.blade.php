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
            <div class="text-head-sign text-orange">Forgot Your Password?</div>
            <div class="text-filter mt-3 text-center text-bold">No worries! Enter your email and we will send you a reset. </div>
            <div class="space-footer mb-3">
              <label for="exampleFormControlInput1" class="form-label text-orange">Email</label>
              <input type="email" class="form-control" id="exampleFormControlInput1">
            </div>
            <a class="btn-sign"  data-bs-toggle="modal" data-bs-target="#exampleModal">Send Request</a>
             <div class="space-footer"></div>
        </div>
    </div>
        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">  
            <div class="text-icon-re text-orange"><i class="fas fa-envelope-open-text"></i></div>
            <div class="text-filter mt-3 text-center text-bold">Please, Cheack on email and reset a password</div>
            <div class="row mt-3">
                <div class="col-6"><button type="button" class="btn-grey w-100" data-bs-dismiss="modal">Close</button></div>
                <div class="col-6"><a href="signin_hotel.php"><div class="btn-orange w-100">Back to Sign in</div></a></div>
            </div>
          
        
      </div>
    </div>
  </div>
</div>
        <div class="space-footer"></div>
    </div>
    <?php require('inc_footer_hotel.php'); ?> 
</body>
</html>

