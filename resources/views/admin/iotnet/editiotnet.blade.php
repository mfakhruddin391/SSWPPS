@extends('layouts.dashboardParent')
@section('title','Edit SSWPPS-IoT Net')
@section('contentDashboard')
@section('pageTitle','Edit SSWPPS-IoT Net Profile')
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
            
           <!-- <h3 class="card-title">Create Technician</h3>-->
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="POST" action="{{route('updateIotNet')}}">
            @csrf
            

            <div class="card-body">
                <input type="Text" name="id" value="{{$iotnet->id}}" hidden>
              <div class="form-group">
                <label for="apiname">Cloud API label</label>
                <input type="text" class="form-control" id="cloudapi" name="api_label" value="{{$iotnet->iotnet_name}}" placeholder="Short name for the API as references" required>
              </div>
              <div class="form-group">
                <label for="cloudAPI">IoT Net Cloud API</label>
                <input type="text" class="form-control" id="cloudapi" name="cloud_api" value="{{$iotnet->iotnet_cloud_API}}" placeholder="API received from the Cloud Services ie: Google Cloud Platform" required>
              </div>
              <div class="form-group">
                <label for="address">State</label>
                <select name="state" class="form-control" placeholder="test">
                  <option value="n/a" selected disabled>Select State</option>
                  @foreach ($states as $state)
                    <option value='{{$state->id}}' {{$iotnet->iotnet_state_id == $state->id? 'selected' : ''}}>{{$state->state_name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="address">SSWPPS-IoT Net Location Address</label>
                <input type="text" class="form-control" name="address" value="{{$iotnet->iotnet_location_address}}" placeholder="Location of the SSWPPS-IoT Net" required>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
               <a href="/manageIotNet"> <button type="button" class="btn btn-secondary">Back</button></a>
              <button type="submit" class="btn btn-primary">Update</button>
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