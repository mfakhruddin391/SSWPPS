@extends("layouts.loginParent")
@section("content")
@section("userType","Administrator")
			<form action="adminLoginAuth" name="form" id="form" class="form-horizontal" method="POST" >
			   @csrf
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input id="user" type="text" class="form-control" name="username" placeholder="Username" required>                                        
				</div>
				
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					<input id="password" type="password" class="form-control inputPassword" name="password" placeholder="Password" required>
					<span class="input-group-addon "><i class="glyphicon glyphicon-eye-open showPassword" id="togglePassword" style="cursor: pointer;"></i>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="remember_me" id="flexCheckDefault">
					<label class="form-check-label" for="flexCheckDefault">
						Remember Me
					</label>
				  </div>                                                        
				<div class="form-group">
					<!-- Button -->
					<div class="col-sm-12 controls">
						<button type="submit" href="#" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Log in</button>                          
					</div>
				</div>
			</form>  
			@push('BottomHeader')
			
			@endpush 
@endsection