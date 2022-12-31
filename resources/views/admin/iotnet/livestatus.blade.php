@extends('layouts.dashboardParent')
@section('title','Live Status')
@section('contentDashboard')
@section('pageTitle','Live Status')
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
     <!-- Small boxes (Stat box) -->
     <div class="row listOfIotNet">
    
     </div>
     <!-- /.row -->
     <!-- Main row -->
     <div class="row">
       
     </div>
     <!-- /.row (main row) -->
   </div><!-- /.container-fluid -->
 </section>
 @push('BottomHeader')
 <script>
  $(document).ready(function(){

    var livePageInterval = 2000;

    setInterval(() => {
      $.ajax({
         url: '/liveStatusAJAXRequest',
         type: 'get',
         dataType: 'json',
        
         success: function(response){
          var LiveStatusProfile = [];
          for(var i = 0; i<response.length;i++)
          {
           // console.log(response[i]);

            var iotnet_bg_box = "bg-secondary";
            var iotnet_torrential = "N/A";
            var icon_torrential = "N/A";

            if(response[i]['iotnet_torrential']=="High")
            {
              iotnet_bg_box = "bg-danger";
              iotnet_torrential = "danger";
              icon_torrential = "fa-times-circle";
            
            }else if(response[i]['iotnet_torrential']=="Medium"){  
              iotnet_bg_box = "bg-warning";
              iotnet_torrential = "Low";
              icon_torrential = "fa-tint";
            }
            else if(response[i]['iotnet_torrential']=="Low"){  
              iotnet_bg_box = "bg-success";
              iotnet_torrential = "Low";
              icon_torrential = "fa-check-circle";
            }

              LiveStatusProfile.push("<div class='col-lg-3 col-6'>"+
                "<div class='small-box "+iotnet_bg_box+"'>"+
                "<div class='inner'>"+
                "<p>"+response[i]['iotnet_name']+"</p>"+
                "<p>Status : <b>"+response[i]['status_name']+"</b></p>"+
                "<p>Water Level : <b>"+response[i]['iotnet_waterlvl']+" ("+response[i]['iotnet_torrential']+")</b></p></div>"+
                "<div class='icon'>"+
                "<i class='fa "+icon_torrential+"' aria-hidden='true'></i>"+
                "</div><div></div></div></div>");

              $(".listOfIotNet").html(LiveStatusProfile);
              }
        }
    })
  },livePageInterval);

});
  </script>
@endpush
 @endsection