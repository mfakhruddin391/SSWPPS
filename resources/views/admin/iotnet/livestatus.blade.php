@extends('layouts.dashboardParent')
@section('title','Live Status')
@section('contentDashboard')
@section('pageTitle','Live Status')
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
     <!-- Small boxes (Stat box) -->
     <div class="row">
        @foreach($iotnets as $iotnet)
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <p><b>{{$iotnet->iotnet_name}}</b></p>
                <p>&nbsp;</p>
              </div>
              <div class="icon">
                <i class="fa fa-tint" aria-hidden="true"></i>

              </div>
              <a class="small-box-footer">Flow Torrential : <i class=
                
                "{{$iotnet->iotnet_torrential == "true" ? "fa fa-exclamation-triangle": "fa fa-check" }}" aria-hidden="true"></i>              </a>
              <a class="small-box-footer">Water level : <b>{{$iotnet->iotnet_waterlvl}}CM</b></i></a>
            </div>
          </div>
        @endforeach
     </div>
     <!-- /.row -->
     <!-- Main row -->
     <div class="row">
       
     </div>
     <!-- /.row (main row) -->
   </div><!-- /.container-fluid -->
 </section>
 @endsection