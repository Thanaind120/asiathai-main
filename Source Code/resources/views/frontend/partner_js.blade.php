<script>
    // Ajax request country city and postal
// $( document ).ready(function() {

//     function getMessage() {
//             $.ajax({
//                type:'get',
//                url:"{{ url('partner/city') }}",
//                data:'_token = <?php echo csrf_token() ?>',
//                success:function(data) {
//                 alert('ok');
//                }
//             });
//          }
// });
    function select_star_rating(star){

        $('#star_rating_set').val(star);
        if(star==1){
            $('#star_rate').addClass('fas fa-star fas fa-star').text(' 1 Star');
        }
        else if(star==2){
            $('#star_rate').addClass('fas fa-star fas fa-star').text(' 2 Stars');
        }
        else if(star==3){
            $('#star_rate').addClass('fas fa-star fas fa-star').text(' 3 Stars');
        }
        else if(star==4){
            $('#star_rate').addClass('fas fa-star fas fa-star').text(' 4 Stars');
        }
        else if(star==5){
            $('#star_rate').addClass('fas fa-star fas fa-star').text(' 5 Stars');
        }
       
    }

    function set_country(){
        var country_name=$('#country_name').val();
        $("#datalistOptions2").empty();     
        if(country_name=="Thailand"){           
            $('#country_id_set').val(1);
            $('#datalistOptions2').append("<option value='Bangkok'>");
            $('#datalistOptions2').append("<option value='Chiang Mai'>");
            $('#datalistOptions2').append("<option value='Chon Buri'>");
        }
        else{
            $('#country_id_set').val(2);
            $('#datalistOptions2').append("<option value='Bedok'>");
            $('#datalistOptions2').append("<option value='Jurong'>");
            $('#datalistOptions2').append("<option value='Woodlands'>");
        }
    }
    function set_city(){     
        var city_name=$('#city_name').val();
      
        $("#datalistOptions3").empty();     
        if(city_name=="Bangkok"){           
            $('#city_id_set').val(1);
            $('#datalistOptions3').append("<option value='10001'>");
            $('#datalistOptions3').append("<option value='10002'>");
            $('#datalistOptions3').append("<option value='10003'>");
        }
        else if(city_name=="Chiang Mai"){         
            $('#city_id_set').val(2);
            $('#datalistOptions3').append("<option value='20001'>");
            $('#datalistOptions3').append("<option value='20002'>");
            $('#datalistOptions3').append("<option value='20003'>");
        }
        else if(city_name=="Chon Buri"){         
            $('#city_id_set').val(3);
            $('#datalistOptions3').append("<option value='30001'>");
            $('#datalistOptions3').append("<option value='30002'>");
            $('#datalistOptions3').append("<option value='30003'>");
        }
        else if(city_name=="Bedok"){         
            $('#city_id_set').val(4);
            $('#datalistOptions3').append("<option value='40001'>");
            $('#datalistOptions3').append("<option value='40002'>");
            $('#datalistOptions3').append("<option value='40003'>");
        }
        else if(city_name=="Jurong"){         
            $('#city_id_set').val(5);
            $('#datalistOptions3').append("<option value='50001'>");
            $('#datalistOptions3').append("<option value='50002'>");
            $('#datalistOptions3').append("<option value='50003'>");
        }
        else if(city_name=="Woodlands"){         
            $('#city_id_set').val(6);
            $('#datalistOptions3').append("<option value='60001'>");
            $('#datalistOptions3').append("<option value='60002'>");
            $('#datalistOptions3').append("<option value='60003'>");
        }
        
    }

    function set_postal(){
        var postal=$('#postal').val();
        if(postal=="10001"){           
            $('#postal_id_set').val(1);
        }
        else if(postal=="10002"){         
            $('#postal_id_set').val(2);
           
        }
        else if(postal=="10003"){         
            $('#postal_id_set').val(3);
           
        }
        else if(postal=="20001"){         
            $('#postal_id_set').val(4);
           
        }
        else if(postal=="20002"){         
            $('#postal_id_set').val(5);
           
        }
        else if(postal=="20003"){         
            $('#postal_id_set').val(6);
           
        }
        else if(postal=="30001"){         
            $('#postal_id_set').val(7);
           
        }
        else if(postal=="30002"){         
            $('#postal_id_set').val(8);
           
        }
        else if(postal=="30003"){         
            $('#postal_id_set').val(9);
           
        }
        else if(postal=="40001"){         
            $('#postal_id_set').val(10);
           
        }
        else if(postal=="40002"){         
            $('#postal_id_set').val(11);
           
        }
        else if(postal=="40003"){         
            $('#postal_id_set').val(12);
           
        }
        else if(postal=="50001"){         
            $('#postal_id_set').val(13);
           
        }
        else if(postal=="50002"){         
            $('#postal_id_set').val(14);
           
        }
        else if(postal=="50003"){         
            $('#postal_id_set').val(15);
           
        }
        else if(postal=="60001"){         
            $('#postal_id_set').val(16);
           
        }
        else if(postal=="60002"){         
            $('#postal_id_set').val(17);
           
        }
        else if(postal=="60003"){         
            $('#postal_id_set').val(18);
           
        }
    }
    var room1=0;
    var room2=0;
//     function plus_bed(id){
   
//         if(id==1){
//             room1++;
//         $('#room'+id).text(room1+' beds')
//         }
//         else if(id==2){
//             room2++;
//         $('#room'+id).text(room2+' beds')
//         }
  
//     }
//     function min_bed(id){
   
//    if(id==1){
//        if(room1!=0){
//        room1--;
//         }
//    $('#room'+id).text(room1+' beds')
//    }
//    else if(id==2){
//     if(room2!=0){
//        room2--;
//         }
//    $('#room'+id).text(room2+' beds')
//    }

// }
function delete_room(){
    let text = "Please confirm to delete room";
  if (confirm(text) == true) {
    $('#delete_room').submit();
  } else {
    
  }


}
</script>