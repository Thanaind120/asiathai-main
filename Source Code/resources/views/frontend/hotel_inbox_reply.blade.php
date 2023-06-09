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
                    <a href="hotel_inbox.php" ><i class="fas fa-chevron-circle-left me-2"></i>Back</a>
                </div>
                <div class="float-end">
                  
                </div>
            </div>
            <div class="box-hotel-p">
                <div class="row justify-content-between">
                    <div class="col-8">
                        <div class="text-head-d text-grey text-bold">Title</div>
                        <div class="text-tiny text-grey mb-3">27 DEC 2021</div>
                    </div>
                    <div class="col-4">
                        <div class="row justify-content-end">
                            <div class="col-auto px-2">
                                <div class="email-starr">
                                    <i class="far fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="col-auto px-2">
                                <a href="hotel_inbox_reply.php?id=#reply">
                                    <div class="reply">
                                        <i class="fas fa-reply"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-grey">
                    <div class="text-detail pt-2 px-sm-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                </div>
                <div id="reply" class="mt-3">
                    <div class="box-reply">
                        <div class="row">
                            <div class="col-auto px-2">
                                <div class="reply">
                                    <i class="fas fa-reply"></i>
                                </div>
                            </div>
                            <div class="col-auto px-2">
                                <div class="text-tiny text-light-grey mb-3">info@poolvilla.com</div>
                            </div>
                        </div>
                        <textarea class="reply"></textarea>
                        <div class="col-sm-2">
                            <div class="btn-orange">Sent</div>
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
