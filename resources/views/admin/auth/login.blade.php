@extends('layouts.loginHeader')
@section('content')
{{-- <body> --}}
{{--    
	<a href="https://front.codes/" class="logo" target="_blank">
		<img src="https://assets.codepen.io/1462889/fcy.png" alt="">
	</a> --}}

	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						{{-- <h6 class="mb-0 pb-3"><span>Admin Log In </span><span></span></h6> --}}
			          	<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
			          	<label for="reg-log"></label>
			          	@if (session('message'))
		                    <div class="alert alert-success" role="alert">
		                        {{ session('message') }}
		                    </div>
		                @endif
		                @if (session('error'))
		                    <div class="alert alert-danger" role="alert">
		                        {{ session('error') }}
		                    </div>
		                @endif
		                @if(count($errors) > 0)
			                @foreach ($errors->all() as $error)
								<div class="alert alert-danger" role="alert">
									{{ $error }}
								</div>
							@endforeach
						@endif
						@if ($message = Session::get('success'))
							<div class="alert alert-success" role="alert">
					              <p>{{ $message }}</p>
					          </div>
					    @endif
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<form action="{{url('admin/login')}}"  method="post">
												@csrf
												<h4 class="mb-4 pb-3">Admin Log In</h4>
												<div class="form-group">
													<input type="email" name="email" class="form-style" placeholder="Your Email" id="logemail" autocomplete="off">
													<i class="input-icon uil uil-at"></i>
												</div>	
												<div class="form-group mt-2">
													<input type="password" name="password" class="form-style" placeholder="Your Password" id="logpass" autocomplete="off">
													<i class="input-icon uil uil-lock-alt"></i>
												</div>
												<button class="btn mt-4">submit</button>
											</form>
										
                            				<p class="mb-0 mt-4 text-center"><a href="#0" class="link">Forgot your password?</a></p>
				      					</div>
			      					</div>
			      				</div>
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
											{{-- <form action="{{route('register')}}" method="post">
												@csrf
												<h4 class="mb-4 pb-3">Sign Up</h4>
												<div class="form-group">
													<input type="text" name="name" class="form-style" placeholder="Your UserName" id="logname" autocomplete="off">
													<i class="input-icon uil uil-user"></i>
												</div>	
												<div class="form-group mt-2">
													<input type="email" name="email" class="form-style" placeholder="Your Email" id="logemail" autocomplete="off">
													<i class="input-icon uil uil-at"></i>
												</div>	
												<div class="form-group mt-2">
													<input type="password" name="password" class="form-style" placeholder="Your Password" id="logpass" autocomplete="off">
													<i class="input-icon uil uil-lock-alt"></i>
												</div>
												<div class="form-group mt-2">
													<input type="password" name="password_confirmation" class="form-style" placeholder="Confirm Your Password" id="logpass" autocomplete="off">
													<i class="input-icon uil uil-lock-alt"></i>
												</div>
												<button class="btn mt-4">Select Plan</button>
											
											</form> --}}
				      					</div>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      		{{-- <h6 class="mb-0 pt-3"><a href="{{url('/articles')}}" class="btn btn-sm btn-success" > <i class="fa fa-newspaper-o" aria-hidden="true"></i></a></h6> --}}
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>
{{-- </body> --}}
@endsection