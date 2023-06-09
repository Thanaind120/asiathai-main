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
            <div class="clearfix">
                <div class="float-start">
                    <a href="hotel_guest_review.php" ><i class="fas fa-chevron-circle-left me-2"></i>Back</a>
                </div>
                <div class="float-end">
                  
                </div>
            </div>
            <div class="box-hotel-p">
                <div class="mb-3 row">
                    <label class="col-sm-1  col-form-label">To</label>
                    <div class="col-sm-11"> 
                        <input class="form-control reply-2" type="text" value="info@poolvilla.com" aria-label="info@poolvilla.com" disabled readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-1 col-form-label">Tiltle</label>
                    <div class="col-sm-11">
                      <input  class="form-control reply-2" >
                    </div>
                </div>
                <div class="mt-3">
                    <div class="box-reply">
                        <textarea class="reply"></textarea>
                        <div class="row g-2">
                            <div class="col-sm-1 col-2">
                                <div class="btn-orange">Sent</div>
                            </div>
                            <div class="col-auto">
                                <div class="field-file">
    <input id="file" type="file" name="">
    <label for=file >
      <img src="https://cdn.iconscout.com/icon/free/png-256/attach-attachment-clip-paperclip-pin-collate-include-6-14738.png">
    </label>
  </div>
                            </div>
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
