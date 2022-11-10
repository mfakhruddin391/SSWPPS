@extends('layouts.dashboardParent')
@section('title','Update Technician')
@section('contentDashboard')
@section('pageTitle','Update Technician')
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
          <form method="POST" action="{{route('updateTech')}}">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <input type="hidden" value="{{$technician->id}}" name="id">
                <label for="fullname">technician's full name</label>
                <input  type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter technician full name" value="{{$technician->full_name}}" required>
              </div>
              <div class="form-group">
                <label for="username">technician's nickname</label>
                <input value="{{$technician->nickname}}" type="text" class="form-control" id="username" name="nickname" placeholder="Enter technician nickname" required>
              </div>
              <div class="form-group">
                <label for="email">Email Address</label>
                <input value="{{$technician->email}}" type="text" class="form-control" id="email" name="email" placeholder="Enter email" required>
              </div>
              
              <div class="form-group">
                <label for="telno">Telephone No.</label>
                <input value="{{$technician->phone_no}}" type="text" class="form-control" id="telno" name="phone_no" placeholder="Enter phone number" required>
              </div>
              <div class="form-group">
                <label for="tech_pic">technician profile picture</label>
                <input value="{{$technician->profile_pic}}" type="file" class="form-control" id="tech_pic" name="profile_pic">
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="/manageTech"><button type="button" class="btn btn-secondary">Back</button></a>
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