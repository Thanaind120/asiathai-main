@extends('backend.layouts.master')

@section('title') Richy-Cat Report @endsection

@section('css')
<style>
    .select2-selection {height: 34px !important;margin-left: 3px;}
    .border-left-0 {height: 73%;}


</style>
@endsection

@section('content')
<div class="myloading"></div>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18"> รายงานการซื้อ  </h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <form action="{{url('backend/report_04')}}" method="get">
                         @csrf
                <div class="row">
                 
             
                
                    
                      
                 
                      <div class="col-md-4 d-flex  ">
                       
                       
                         <input id="startDate" name="start_date"  autocomplete="off" placeholder="วันเริ่ม" value="{{$start_date}}" />
                         
                      </div>
                      <div class="col-md-4 d-flex  ">
                       
                       
               
                       <input id="endDate"  name="end_date"  autocomplete="off" placeholder="วันสิ้นสุด" value="{{$end_date}}" />
                    </div>


                      <div class="col-md-2">
                        <div class="form-group row"> &nbsp; &nbsp;
                          <button type="submit" class="btn btn-success btn-sm waves-effect " style="font-size: 14px !important;cursor: pointer;" >
                          <i class="bx bx-search font-size-16 align-middle mr-1" style="cursor: pointer;" ></i> ค้น
                          </button>
                        </div>
                      </div>
                  
                    </div>
              
                </form>
                  <div class="myBorder">
         
                    <span style="font-weight: bold;padding-right: 10px;"><i class="bx bx-play"></i> รายงานการซื้อของเล่นและแมว  </span>

                    {{-- <table id="data-table-0001" class="table table-bordered dt-responsive" style="width: 100%;">
                 
                    </table> --}}
                    <div class="table-responsive">
                <table id="simpletable" class="table table-bordered dt-responsive" style="width: 100%;">
                   
                        <thead>
                          <tr>
                            <th class="text-center">ลำดับ</th>                      
                            <th class="text-center">วันที่</th>
                            <th class="text-center">ชื่อผู้ใช้งาน</th>
                            <th class="text-center">ของเล่น/แมว</th>
                            <th class="text-center">ราคา</th>
                          
                       
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($sRow41 as $key=>$t)
                            <tr>
                                <td class="text-center">{{$key+1}}</td>                               
                              
                                <td class="text-center">
                                   {{$t->created_at}}
                                </td>
                                <td class="text-center">
                                   {{$t->call_user->username}}
                                 </td>
                                <td class="text-center">
                                  @if($t->type==3)
                                    {{@$t->call_cat->cat_name}}
                                  @elseif($t->type==4)
                                  {{@$t->call_toy->toy_name}}
                                  @else
                                  @endif
                                </td>
                                <td class="text-center">{{$t->money}}</td>
                            </tr>
                            @endforeach  
                    </tbody>
                </table>
              </div>
                  </div>
          
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                  <div class="myBorder">
                    
                    <span style="font-weight: bold;padding-right: 10px;"><i class="bx bx-play"></i> สรุปการซื้อของเล่นและแมว  </span>

                    <div class="table-responsive">
                <table id="simpletable" class="table table-bordered dt-responsive" style="width: 100%;">
                   
                        <thead>
                          <tr>
                            <th class="text-center">รวมยอดซื้อของเล่น(บาท)</th>                      
                            <th class="text-center">รวมยอดจำนวนของเล่น(ชิ้น)</th>     
                            <th class="text-center">รวมยอดซื้อแมว(บาท)</th>
                            <th class="text-center">รวมยอดจำนวนแมว(ตัว)</th>
                            <th class="text-center">ราคา</th>
                          
                       
                          </tr>
                        </thead>
                        <tbody>
                      
                            <tr>
                                <td class="text-center">{{$total_toy_price}}</td>                               
                              
                                <td class="text-center">
                                   {{$count_toy}}
                                </td>
                                <td class="text-center">
                                   {{$total_cat_price}}
                                 </td>
                               
                                <td class="text-center">{{$count_cat}}</td>
                                <td class="text-center">{{$total_cat_price}}</td>     
                            </tr>
                          
                    </tbody>
                </table>
              </div>
                  </div>
          
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


@endsection

@section('script')


    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script>
        // var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $('#startDate').datepicker({
            // format: 'dd/mm/yyyy',
            format: 'yyyy-mm-dd',
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
        });
        $('#endDate').datepicker({
            // format: 'dd/mm/yyyy',
            format: 'yyyy-mm-dd',
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: function () {
                return $('#startDate').val();
            }
        });

        $('#startDate').change(function(event) {
            if($('#endDate').val()>$(this).val()){
            }else{
              $('#endDate').val($(this).val());
            }
        });



</script>

  <script>

        $(document).ready(function() {

         function formatNumber(num) {
              return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
          }

           

            $(document).on('click', '.btnSearch', function(event) {
                  event.preventDefault();

                  $(".myloading").show();

                  var startDate =  $('#startDate').val();
                  if(startDate==''){
                    $('#startDate').focus();
                    // $(".myloading").hide();
                    return false;
                  }        

                  var endDate =  $('#endDate').val();
                  if(endDate==''){
                    $('#endDate').focus();
                    // $(".myloading").hide();
                    return false;
                  }   
     

               $.ajax({

                   type:'POST',
                   url: " {{ url('backend/ajaxProcessReport') }} ", 
                   data:{ _token: '{{csrf_token()}}',type:'report_04',startDate:startDate,
                            endDate:endDate, },
                    success:function(data){
                         // console.log(data); 
                         
                // @@@@@@@@@@@@@@@@@@@@@@@@@ DataTable @@@@@@@@@@@@@@@@@@@@@@@
                        // var txtSearch = $("input[name='txtSearch']").val();
                        $.fn.dataTable.ext.errMode = 'throw';
                        var oTable0001;
                        $(function() {
                            oTable0001 = $('#data-table-0001').DataTable({
                             "sDom": "<'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>",
                                processing: true,
                                serverSide: true,
                                scroller: true,
                                ordering: false,
                                "info":   false,
                                "paging": false,
                                destroy:true,
                                 ajax: {
                                    url: '{{ route('backend.report_041.datatable') }}',
                                    data :{
                                      _token: '{{csrf_token()}}',
                                        startDate:startDate,
                                        endDate:endDate,
                                        },
                                      method: 'POST',
                                },
                                columns: [
          
                                    {data: 'id', title :'<span style="vertical-align: middle;"> No. </span> ', className: 'text-center'},
                                    {data: 'action_date', title :'<span style="vertical-align: middle;"> วันที่-เวลา </span> ', className: 'text-center'},
                                    {data: 'customer_name', title :'<center>User name</center>', className: 'text-center w150 '},
                                    {data: 'toy_cat_name',   title :'<center>ประเภทของเล่น/แมว </center>', className: 'text-center',render: function(d) {
                                       return d;
                                    }},
                                    {data: 'prices',   title :'<center>ราคา (บาท) </center>', className: 'text-center',render: function(d) {
                                       return d;
                                    }},
                             
                                ],
                                 rowCallback: function(nRow, aData, dataIndex){
                            
                                    var info = $(this).DataTable().page.info();
                                    $("td:eq(0)", nRow).html(info.start + dataIndex + 1);
                                    $('td:eq(4)', nRow).html(formatNumber(parseFloat(aData['prices']).toFixed(2)));

                                }
                            });
                          
                        });
                // @@@@@@@@@@@@@@@@@@@@@@@@@ DataTable @@@@@@@@@@@@@@@@@@@@@@@
                        // var txtSearch = $("input[name='txtSearch']").val();
                        $.fn.dataTable.ext.errMode = 'throw';
                        var oTable0001;
                        $(function() {
                            oTable0001 = $('#data-table-0002').DataTable({
                             "sDom": "<'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>",
                                processing: true,
                                serverSide: true,
                                scroller: true,
                                ordering: false,
                                "info":   false,
                                "paging": false,
                                destroy:true,
                                 ajax: {
                                    url: '{{ route('backend.report_042.datatable') }}',
                                    data :{
                                      _token: '{{csrf_token()}}',
                                        startDate:startDate,
                                        endDate:endDate,
                                        },
                                      method: 'POST',
                                },
                                columns: [
                                    {data: 'id', title :'<span style="vertical-align: middle;"> No. </span> ', className: 'text-center'},
                                    {data: 'action_date', title :'<span style="vertical-align: middle;"> วันที่ </span> ', className: 'text-center w200 '},
                                    {data: 'toy_buy',   title :'<center>รวมยอดการซื้อของเล่น (บาท)</center>', className: 'text-center',render: function(d) {
                                       return d;
                                    }},
                                    
                                    {data: 'toy_amt',   title :'<center>รวมจำนวนของเล่น (ชิ้น) </center>', className: 'text-center',render: function(d) {
                                       return d;
                                    }},

                                    {data: 'cat_buy',   title :'<center>รวมยอดการซื้อแมว (บาท) </center>', className: 'text-center',render: function(d) {
                                       return d;
                                    }},

                                    {data: 'cat_amt',   title :'<center>รวมจำนวนแมว (ตัว) </center>', className: 'text-center',render: function(d) {
                                       return d;
                                    }},
                                ],
                                 rowCallback: function(nRow, aData, dataIndex){

                                    var info = $(this).DataTable().page.info();
                                    $("td:eq(0)", nRow).html(info.start + dataIndex + 1);
                                    $('td:eq(2)', nRow).html(formatNumber(parseFloat(aData['toy_buy']).toFixed(2)));
                                    $('td:eq(4)', nRow).html(formatNumber(parseFloat(aData['cat_buy']).toFixed(2)));
                              
                                }
                            });
                       
                        });
                // @@@@@@@@@@@@@@@@@@@@@@@@@ DataTable @@@@@@@@@@@@@@@@@@@@@@@


                          $(".myloading").hide();
                      },
                    error: function(jqXHR, textStatus, errorThrown) { 
                        console.log(JSON.stringify(jqXHR));
                        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                    }
                });


            });

            setTimeout(function(){
                $(".myloading").hide();
            }, 3000);

        });
    </script>



@endsection

