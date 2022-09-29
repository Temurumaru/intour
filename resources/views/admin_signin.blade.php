<!DOCTYPE html>
<html lang="en">

  <head>
	<meta charset="utf-8">
	<title>DarkPan - Bootstrap 5 Admin Template</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">

	<!-- Favicon -->
	<link href="img/favicon.ico" rel="icon">

	<!-- Google Web Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
	
	<!-- Icon Font Stylesheet -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

	<!-- Libraries Stylesheet -->
	<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

	<!-- Customized Bootstrap Stylesheet -->
	<link rel="stylesheet" href="bootstrap.min.css">

	<!-- Template Stylesheet -->
	<link rel="stylesheet" href="app.css">
  </head>

  <body>
	<div class="container-fluid position-relative d-flex p-0">
		<!-- Spinner Start -->
		<div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
			<div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</div>
		<!-- Spinner End -->

		@if($errors->any() || session('success'))
			<div class="err-claster shadow-all">
				@if(isset($errors))
					@if($errors->any())
						<div class="tst tst-err">
							@foreach($errors->all() as $error)
								<p>{{ $error }}</p>
							@endforeach
						</div>
					@endif
				@endif
				@if(session('warning'))
					<div class="tst tst-warr">{{session('warning')}}</div>
				@endif
				
				@if(session('success'))
					<div class="tst tst-succ">{{session('success')}}</div>
				@endif
			</div>
		@endif

		<!-- Sign In Start -->
		<form action="{{route('signInAdminC')}}" method="post" class="container-fluid">
			@csrf
			{{-- <div class="container-fluid"> --}}
				<div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
					<div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
						<div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
							<div class="d-flex align-items-center justify-content-between mb-3">
								<a href="/admin" class="">
									<h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>inTour Panel</h3>
								</a>
								<h3>Sign In</h3>
							</div>
							<div class="form-floating mb-3">
								<input type="text" name="login" class="form-control" minlength="4" maxlength="20" id="floatingInput" placeholder="Login">
								<label for="floatingInput">Login</label>
							</div>
							<div class="form-floating mb-4">
								<input type="password" name="password" minlength="8" maxlength="64" class="form-control" id="floatingPassword" placeholder="Password">
								<label for="floatingPassword">Password</label>
							</div>
							<button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>

						</div>
					</div>
				</div>
			{{-- </div> --}}
		</form>
		<!-- Sign In End -->
	</div>

	<!-- JavaScript Libraries -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="lib/chart/chart.min.js"></script>
	<script src="lib/easing/easing.min.js"></script>
	<script src="lib/waypoints/waypoints.min.js"></script>
	<script src="lib/owlcarousel/owl.carousel.min.js"></script>
	<script src="lib/tempusdominus/js/moment.min.js"></script>
	<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
	<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

	<!-- Template Javascript -->
	<script src="/main.js"></script>
  </body>

</html>