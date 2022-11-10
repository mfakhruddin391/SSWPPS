@extends('layouts.dashboardParent')
@section('title','Dashboard')
@section('contentDashboard')
@section('pageTitle','Dashboard')
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
     <!-- Small boxes (Stat box) -->
     <div class="row">
       <div class="col-lg-3 col-6">
         <!-- small box -->
         <div class="small-box bg-primary">
           <div class="inner">
             <h3>{{$dashboardContent['totalTechnician']}}</h3>
             <p>Total Technician</p>
           </div>
           <div class="icon">
             <i class="fas fa-users"></i>
           </div>
           <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
       </div>
       <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{$dashboardContent['totalUnassignedTask']}}</h3>

            <p>Total Unassigned Task</p>
          </div>
          <div class="icon">
            <i class="ion ion-alert-circled "></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
       <!-- ./col -->
       <div class="col-lg-3 col-6">
         <!-- small box -->
         <div class="small-box bg-success">
           <div class="inner">
             <h3>{{$dashboardContent['completedTaskLog']}}</h3>
             <p>Completed Task</p>
           </div>
           <div class="icon">
             <i class="ion ion-checkmark-circled"></i>
           </div>
           <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
       </div>
       <!-- ./col -->
       <div class="col-lg-3 col-6">
         <!-- small box -->
         <div class="small-box bg-warning">
           <div class="inner">
             <h3>{{$dashboardContent['iotImplemented']}}</h3>

             <p>SSWPPS IoT-Net Implemented</p>
           </div>
           <div class="icon">
             <i class="ion ion-hammer"></i>
           </div>
           <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
       </div>
       
     </div>
     <!-- /.row -->
     <!-- Main row -->
     <div class="row">
       
     </div>
     <!-- /.row (main row) -->
   </div><!-- /.container-fluid -->
 </section>
 @endsection