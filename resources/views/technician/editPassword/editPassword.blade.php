@extends('layouts.dashboardParent')
@section('title','Create New Task')
@section('contentDashboard')
@section('pageTitle','Reset Password')
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
          <form method="POST" action="/updatePassword">
            @csrf
            <div class="card-body">
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