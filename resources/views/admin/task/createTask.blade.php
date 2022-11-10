@extends('layouts.dashboardParent')
@section('title','Create New Task')
@section('contentDashboard')
@section('pageTitle','Create New Task')
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
     <!-- Small boxes (Stat box) -->
     <div class="row">
      <div class="col-lg-12">
        <x-success-alert/>
        <x-error-alert :message="$errors"/>
        <!-- general form elements -->
        <div class="card card-secondary">
          <div class="card-header">
            <!--<h3 class="card-title">Quick Example</h3>-->
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="POST" action="/storeTask">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">SSWPPS IoT-Net :</label>
                <select class="form-control" name="iotnetid">
                  <option selected disabled>Please select the SSWPPS-IoT Net</option>
                  @foreach ($iotnets as $iotnet )
                    <option value="{{$iotnet->id}}">{{$iotnet->iotnet_name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description"></textarea>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
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