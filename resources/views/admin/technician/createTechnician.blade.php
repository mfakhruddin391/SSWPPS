@extends('layouts.dashboardParent')
@section('title','Create New Task')
@section('contentDashboard')
@section('pageTitle','Create New Technician')
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
          <form method="POST" action="storeTech">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="fullname">technician's full name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter technician's full name" required>
              </div>
              <div class="form-group">
                <label for="username">technician's nickname</label>
                <input type="text" class="form-control" id="username" name="nickname" placeholder="Enter technician nickname" required>
              </div>
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" required>
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
              </div>
              <div class="form-group">
                <label for="pw">password</label>
                <input type="password" class="form-control pw" id="pw" name="password" placeholder="Enter passowrd" required>
              </div>
              <label for="password">confirm password</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text matchSign"><i class='fa fa-times-circle' style="font-size: 1.50em;color:red"></i></span>
                </div>
                <input type="password" class="form-control pw2" id="pw2" name="password_confirm" placeholder="Enter passowrd" aria-describedby="basic-addon1" required>

              </div>
              <div class="form-group">
                <label for="telno">Telephone No.</label>
                <input type="text" class="form-control" id="telno" name="phone_no" placeholder="Enter phone number" required>
              </div>
              <div class="form-group">
                <label for="tech_pic">technician profile picture</label>
                <input type="file" class="form-control" id="tech_pic" name="profile_pic">
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
 @push('BottomHeader')
 <script>
   $(document).ready(function(){

    console.log("test");
    
    $('.pw2').keyup(function(){
      var pw = $('.pw').val();
      console.log(pw);
      var pw2 = $(this).val();
      console.log(pw2);
      if(pw == pw2)
      {
        console.log("match!");
        $('.matchSign').html("<i class='fa fa-check-circle' style='font-size: 1.50em;color:green'></i>");
      } else {
        console.log("not match");
        $('.matchSign').html("<i class='fa fa-times-circle' style='font-size: 1.50em;color:red'></i>");
      }

    });

   });
   </script>
   @endpush
 @endsection