<?php
use RedBeanPHP\R as R;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>inTour Panel</title>
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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet">

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


		@include('blocks.sidebar')


		<!-- Content Start -->
		<div class="content">
			@include('blocks.adm_header')


			<!-- Form Start -->
			<div class="container-fluid pt-4 px-4">
				<div class="row g-4">

					<div class="col-sm-12 col-xl-6">
						<div class="bg-secondary rounded h-100 p-4">
							<form action="{{route('updHomeWallC')}}" enctype="multipart/form-data" method="post">
								@csrf
								<h6 class="mb-2">Update home Wallpaper</h6>

								<?php
									$data = R::findAll('wall_slide');
									
								?>


								<div class="pt-4">
									<div class="form-floating">
										<input type="text" class="form-control" name="title_1" id="title"
										placeholder="Title 1" value="{{$data[1] -> title}}">
										<label for="floatingInput">Title 1</label>
									</div>

									<div class="form-floating mt-2 mb-2">
										<input type="text" class="form-control" name="title_1_ru" id="title_ru"
										placeholder="Title 1" value="{{$data[1] -> title_ru}}">
										<label for="floatingInput">Title RU 1</label>
									</div>

									<div class="form-floating">
										<input type="text" class="form-control" name="sub_title_1" id="sub_title"
										placeholder="Sub Title 1" value="{{$data[1] -> sub_title}}">
										<label for="floatingInput">Sub Title 1</label>
									</div>

									<div class="form-floating mt-2 mb-2">
										<input type="text" class="form-control" name="sub_title_1_ru" id="sub_title_ru"
										placeholder="Sub Title 1 RU" value="{{$data[1] -> sub_title_ru}}">
										<label for="floatingInput">Sub Title RU 1</label>
									</div>

									<div class="mb-3">
										<label for="formFile" class="form-label">Wallpaper 1</label>
										<input class="form-control bg-dark" name="wall_1" type="file" id="formFile">
									</div>
								</div>


								<div class="pt-4">
									<div class="form-floating">
										<input type="text" class="form-control" name="title_2" id="title_2"
										placeholder="Title 1" value="{{$data[2] -> title}}">
										<label for="floatingInput">Title 2</label>
									</div>

									<div class="form-floating mt-2 mb-2">
										<input type="text" class="form-control" name="title_2_ru" id="title_2_ru"
										placeholder="Title 1 RU" value="{{$data[2] -> title_ru}}">
										<label for="floatingInput">Title RU 2</label>
									</div>

									<div class="form-floating">
										<input type="text" class="form-control" name="sub_title_2" id="sub_title_2"
										placeholder="Sub Title 1" value="{{$data[2] -> sub_title}}">
										<label for="floatingInput">Sub Title 2</label>
									</div>

									<div class="form-floating mt-2 mb-2">
										<input type="text" class="form-control" name="sub_title_2_ru" id="sub_title_2_ru"
										placeholder="Sub Title 1 RU" value="{{$data[2] -> sub_title_ru}}">
										<label for="floatingInput">Sub Title RU 2</label>
									</div>

									<div class="mb-3">
										<label for="formFile" class="form-label">Wallpaper 2</label>
										<input class="form-control bg-dark" name="wall_2" type="file" id="formFile">
									</div>
								</div>


								<div class="pt-4">
									<div class="form-floating">
										<input type="text" class="form-control" name="title_3" id="title_3"
										placeholder="Title 1" value="{{$data[3] -> title}}">
										<label for="floatingInput">Title 3</label>
									</div>

									<div class="form-floating mt-2 mb-2">
										<input type="text" class="form-control" name="title_3_ru" id="title_3_ru"
										placeholder="Title 1 RU" value="{{$data[3] -> title_ru}}">
										<label for="floatingInput">Title RU 3</label>
									</div>

									<div class="form-floating">
										<input type="text" class="form-control" name="sub_title_3" id="sub_title_3"
										placeholder="Sub Title 1" value="{{$data[3] -> sub_title}}">
										<label for="floatingInput">Sub Title 3</label>
									</div>

									<div class="form-floating mt-2 mb-2">
										<input type="text" class="form-control" name="sub_title_3_ru" id="sub_title_3_ru"
										placeholder="Sub Title 1 RU" value="{{$data[3] -> sub_title_ru}}">
										<label for="floatingInput">Sub Title RU 3</label>
									</div>


									<div class="mb-3">
										<label for="formFile" class="form-label">Wallpaper 3</label>
										<input class="form-control bg-dark" name="wall_3" type="file" id="formFile">
									</div>
								</div>

								<input type="submit" class="btn btn-success mt-2 btn-upl" value="Upload">
							</form>
						</div>
					</div>

				</div>
			</div>
			<!-- Form End -->
		</div>
		<!-- Content End -->


		<!-- Back to Top -->
		<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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
	{{-- <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script> --}}

	<!-- Template Javascript -->
	<script src="/main.js"></script>
</body>

</html>