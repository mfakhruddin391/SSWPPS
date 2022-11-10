@extends('layouts.dashboardParent')
@section('title','Distributed Task')
@section('contentDashboard')
@section('pageTitle','Distributed Task')
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
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="#ongoing" data-toggle="tab">On-Going</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#completed" data-toggle="tab">Completed</a>
        </li>
      </ul>
      <div class="tab-content col-lg-12">
        <div class="col-lg-12 tab-pane active" id="ongoing">
          <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>No.</th>
                <th>SSWPPS IoT-Net</th>
                <th>Task Description</th>
                <th>Progress status</th>
                <th>Manage</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($tasks as $task)
              <tr id={{$task->id}}>
              <td>{{$loop->iteration}}</td>
              <td>{{$task->iotnet->iotnet_name}}</td>
              <td>{{$task->task_description}}</td>
              <td>{{$task->Status_dictionary->status_name}}</td>
              <td>
                <a data-toggle="modal" data-target="#viewModal" 
                  class="ti-marker-alt btn btn-warning viewTask" title="View Task"
                  iotnetname="{{$task->iotnet->iotnet_name}}"
                  description = "{{$task->task_description}}"
                  state= "{{$task->iotnet->state->state_name}}"
                  address = "{{$task->iotnet->iotnet_location_address}}"
                  >View Details</a> |
  
                  <a data-toggle="modal" data-target="#exampleModal" 
                  class="ti-marker-alt btn btn-success completeTask" title="Complete Task"
                  taskId="{{$task->id}}"
                  >Complete task</a> 
              </tr>   
              @endforeach
            </table>
        </div>
        <div class="col-lg-12 tab-pane faed" id="completed">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No.</th>
              <th>SSWPPS IoT-Net</th>
              <th>Location Address</th>
              <th>Task Description</th>
              <th>Progress Status</th>
              <th>Report</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($completedTasks as $task)
            <tr id={{$task->id}}>
            <td>{{$loop->iteration}}</td>
            <td>{{$task->iotnet->iotnet_name}}</td>
            <td>{{$task->iotnet->iotnet_location_address}}</td>
            <td>{{$task->task_description}}</td>
            <td>{{$task->Status_dictionary->status_name}}</td>
            <td>
             {{$task->task_completed_report}}
            </tr>   
            @endforeach
          </table>
      </div>
      
    </div>
     <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Please fill in the report below</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="/completeTask">
      @csrf
      <div class="modal-body">
      <input type="text" class="taskId" name="id" value="" hidden>
       <textarea class="form-control" name="report"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="assignTaskToTechnician" href=""><button type="submit" class="btn btn-success">Submit</button></a>
      </div>
    </form>
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
        Iot-Net Name :<input type="text" disabled class="form-control iotnetname"><br/>
        Task description :<textarea class="form-control description" disabled></textarea>
       
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

 </section>
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

    $('.viewTask').click(function(){
      var iotnetname = $(this).attr('iotnetname');
      var desc = $(this).attr('description');
      var state = $(this).attr('state');
      var address = $(this).attr('address');
      

      $('.iotnetname').val(iotnetname);
      $('.description').html(desc);
      $('.iotnetstate').val(state);
      $('.iotnetaddress').html(address);


      $('.task_id').val(taskid);
      $('.taskNoLabel').html(no);
      console.log("hello");
      console.log(no);


    });

    $('.completeTask').click(function(){

      var taskId = $(this).attr('taskId');

      $('.taskId').val(taskId);

    });

     $("#example1").DataTable({
       "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
     $('#example2').DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');




   });
 </script>
 @endpush
 @endsection