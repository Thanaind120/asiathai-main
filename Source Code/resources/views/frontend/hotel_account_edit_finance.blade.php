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
            <div class="text-head-d text-grey  mt-3 mb-2 text-bold">Account Management</div>
            <div class="box-hotel-p">
                <div class="">
                    <div class="clearfix">
                        <div class="float-start">
                             <div class="text-filter text-grey mb-2 text-bold">Edit Profile</div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label text-grey">Fiscal Name/Bank Account Owner</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Bank">
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlInput2" class="form-label  text-grey">Branch</label>
                          <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="branch">
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlInput3" class="form-label  text-grey">Property Fiscal Number</label>
                          <input type="email" class="form-control" id="exampleFormControlInput3" placeholder="0000000000000">
                        </div>
                        <div class=" mb-3">
                          <label for="exampleFormControlInput3" class="form-label  text-grey">Account Holder Name</label>
                          <input type="email" class="form-control" id="exampleFormControlInput3" placeholder="Name">
                        </div>
                        <div class=" mb-3">
                          <label for="exampleFormControlInput3" class="form-label  text-grey">Currency</label>
                          <select class="form-select" aria-label="Default select example">
                                  <option selected>THAI BAHT</option>
                                  <option value="1">Currency</option>
                                  <option value="2">Currency</option>
                                  <option value="3">Currency</option>
                                </select>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-5">
                        <div class="col-sm-4">
                             <a href="hotel_account_finance.php"><div class="btn-grey mt-3">Cancel</div></a>
                        </div>
                        <div class="col-sm-4">
                             <a href="hotel_account_finance.php"><div class="btn-orange mt-3">Update</div></a>
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

