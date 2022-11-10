@extends('layouts.dashboardParent')
@section('title','Manage SSWPPS-IoT Net')
@section('contentDashboard')
@section('pageTitle','Manage SSWPPS-IoT Net Profile')
@push('topHeader')
 <!-- DataTables -->
 <link rel="stylesheet" href={{asset("plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}>
 <link rel="stylesheet" href={{asset("plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}>
 <link rel="stylesheet" href={{asset("plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}>
@endpush
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
     <!-- Small boxes (Stat box) -->
     <x-success-alert/>
      <x-error-alert :message="$errors"/> 
     <div class="row">
      
      <div class="card col-lg-12">
        <div class="card-header">
         <!-- <h3 class="card-title">Create Technician</h3>-->
        </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
          <tr class="text-center">
            <th>No</th>
            <th>IoT-Net Name</th>
            <th>API address</th>
            <th>manage</th>
          </tr>
          </thead>
          <tbody class="text-center">
            @foreach ($iotnets as $iotnet)
            <tr id={{$iotnet->id}}>
            <td>{{$loop->iteration}}</td>
            <td>{{$iotnet->iotnet_name}}</td> 
            <td>{{$iotnet->iotnet_cloud_API}}</td>
            <td>
              <a  data-toggle="modal" data-target="#viewModal" 
              class="btn btn-warning viewIotNet" 
              IotnetId="{{$iotnet->id}}"
              IotnetName="{{$iotnet->iotnet_name}}"
              IotnetCloudAPI = "{{$iotnet->iotnet_cloud_API}}"
              IotnetAddress = "{{$iotnet->iotnet_location_address}}"
              IotnetState  = "{{$iotnet->state->state_name}}"
              
              title="View SSWPPS IoT-Net">View</a>
                |
                <a href="/manageIotNet/editIotNet/{{$iotnet->id}}" class="ti-marker-alt btn btn-primary" title="Edit technician">Edit</a> |
                <a  data-toggle="modal" data-target="#exampleModal" 
                class="btn btn-danger deleteIotNet" 
                IotnetName="{{$iotnet->iotnet_name}}" 
                IotnetId="{{$iotnet->id}}"
                title="Delete Technician">Delete</a></td>     
            </tr>   
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    </div>
 </section>
 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete notification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure want to delete the selected SSWPPS-IoT Net? <br/>
        SSWPPS-IoT Net Name :<b class="iotnetname">Loading..</b>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="deleteUsingId" href=""><button type="button" class="btn btn-danger">Delete</button></a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewModalLabel">SSWPPS-IoT Net Profile Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Iot-Net Name:<input type="text" disabled class="form-control iotnetname"><br/>
        Cloud API :<input type="text" disabled class="form-control cloudapi"><br/>
        State :<input type="text" disabled class="form-control iotnetstate"><br/>
        Address :<br/>
        <textarea class="form-control iotnetaddress" disabled></textarea>
        
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
@push('BottomHeader')
<!-- DataTables  & Plugins -->
<script src={{asset("plugins/datatables/jquery.dataTables.min.js")}} type="text/javascript"></script>
<script src={{asset("plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}} type="text/javascript"></script>
<script src={{asset("plugins/datatables-responsive/js/dataTables.responsive.min.js")}} type="text/javascript"></script>
<script src={{asset("plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}} type="text/javascript"></script>
<script src={{asset("plugins/datatables-buttons/js/dataTables.buttons.min.js")}} type="text/javascript"></script>
<script src={{asset("plugins/datatables-buttons/js/buttons.bootstrap4.min.js")}} type="text/javascript"></script>
<script src={{asset("plugins/jszip/jszip.min.js")}} type="text/javascript"></script>
<script src={{asset("plugins/pdfmake/pdfmake.min.js")}} type="text/javascript"></script>
<script src={{asset("plugins/pdfmake/vfs_fonts.js")}} type="text/javascript"></script>
<script src={{asset("plugins/datatables-buttons/js/buttons.html5.min.js")}} type="text/javascript"></script>
<script src={{asset("plugins/datatables-buttons/js/buttons.print.min.js")}} type="text/javascript"></script>
<script src={{asset("plugins/datatables-buttons/js/buttons.colVis.min.js")}} type="text/javascript"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["csv", "excel", "pdf", "print"]

    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $('.deleteIotNet').click(function(){
      var name = $(this).attr('IotnetName');
      var id = $(this).attr('IotnetId');

      var deleteRoute = "/deleteIotNet/"+id+"";

      $('.iotnetname').html(name);
      $('.deleteUsingId').attr('href',deleteRoute);

    });

    $('.viewIotNet').click(function(){
      var name = $(this).attr('IotnetName');
      var api = $(this).attr('IotnetCloudAPI');
      var addrss = $(this).attr('IotnetAddress');
      var state = $(this).attr('IotnetState');

   
      $('.iotnetname').val(name);
      $('.cloudapi').val(api);
      $('.iotnetaddress').html(addrss);
      $('.iotnetstate').val(state);
     

    });

  });
</script>
@endpush
@endsection
