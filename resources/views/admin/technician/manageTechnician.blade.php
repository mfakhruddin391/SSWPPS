@extends('layouts.dashboardParent')
@section('title','Manage Technician')
@section('contentDashboard')
@section('pageTitle','Manage Technician')
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
          <tr>
            <th>No</th>
            <th>Full name</th>
            <th>nickname</th>
            <th>username</th>
            <th>email</th>
            <th>manage</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($technicians as $tech)
            <tr id={{$tech->id}}>
            <td>{{$loop->iteration}}</td>
            <td>{{$tech->full_name}}</td>
            <td>{{$tech->nickname}}</td>
            <td>{{$tech->username}}</td>
            <td>{{$tech->email}}</td>
            <td>
                <a href="/manageTech/editTech/{{$tech->id}}" class="ti-marker-alt btn btn-primary" title="Edit technician">Edit</a> |
                <a  data-toggle="modal" data-target="#exampleModal" 
                class="btn btn-danger deleteTech" 
                technicianName="{{$tech->full_name}}" 
                technicianId="{{$tech->id}}"
                title="Delete Technician">Delete</a></td>
               <!-- href="/manageTech/deleteTech/{{$tech->id}}"-->
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
        Are you sure want to delete the technician? <br/>
        Technician's name :<b class="techName">Test</b>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="deleteUsingTechId" href=""><button type="button" class="btn btn-danger">Delete</button></a>
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
      "buttons": ["csv", "excel", "pdf", "print", "colvis"]

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

    $('.deleteTech').click(function(){
      var techname = $(this).attr('technicianName');
      var techid = $(this).attr('technicianId');

      var deleteRoute = "/deleteTech/"+techid+"";

      $('.techName').html(techname);
      $('.deleteUsingTechId').attr('href',deleteRoute);

    });



  });
</script>
@endpush
@endsection
