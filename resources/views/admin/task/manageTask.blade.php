@extends('layouts.dashboardParent')
@section('title','Create New Task')
@section('contentDashboard')
@section('pageTitle','Manage Task')
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
    <a class="nav-link active" href="#uncompleted" data-toggle="tab">Incompleted</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#completed" data-toggle="tab">Completed</a>
  </li>
</ul>
      <div class="tab-content col-lg-12">
      <div class="col-lg-12 tab-pane active" id="uncompleted">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>No.</th>
            <th>SSWPPS IoT-Net</th>
            <th>Description</th>
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
            
              <a data-toggle="modal" data-target="#exampleModal" 
              class="ti-marker-alt btn btn-info assignTask" title="Assign Task"
              taskId="{{$task->id}}"
              taskNo="{{$loop->iteration}}"
              {{$task->task_progress_status_id == 1? 'hidden' : ''}}>Assign Task</a>
              <a class="btn btn-danger deleteTech" title="Delete Task" {{$task->task_progress_status_id == 1? 'hidden' : ''}}>Delete</a></td>
             
          </tr>   
          @endforeach
        </table>
      </div>
       <div class="col-lg-12 tab-pane faed" id="completed">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>No.</th>
            <th>SSWPPS IoT-Net Name</th>
            <th>Location Address</th>
            <th>Description</th>
            <th>Progress status</th>
            <th>Completed By</th>
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
           {{$task->Technician->full_name}}             
          </tr>   
          @endforeach
        </table>
       </div>
      </div>
    </div>
  </div>
     <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Assign task No.<b class="taskNoLabel"></b> to technician</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="/assignTask">
      @csrf
      <div class="modal-body">
        <input type="text" name="id" class="task_id" hidden>
        Technician list :
        <select name="tech_id" class="form-control">
        <option disabled selected>Choose technician to be assigned</option>
        @foreach ($technicians as $technician )
        <option value="{{$technician->id}}">{{$technician->full_name}}</option>
        @endforeach
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="assignTaskToTechnician" href=""><button type="submit" class="btn btn-success">Assign</button></a>
      </div>
    </form>
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

    $('.assignTask').click(function(){
      var taskid = $(this).attr('taskId');
      var no = $(this).attr('taskNo');
      
      $('.task_id').val(taskid);
      $('.taskNoLabel').html(no);
      console.log("hello");
      console.log(no);


    });

     $("#example1").DataTable({
       "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
     $('#example2').DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
     }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');




   });
 </script>
 @endpush
 @endsection