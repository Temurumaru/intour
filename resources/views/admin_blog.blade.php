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
							<form action="{{route('addPostOnBlogC')}}" enctype="multipart/form-data" method="post">
								@csrf
								<h6 class="mb-3">Blog Post</h6>
								<span style="display: flex;" class="mb-2 mt-0"> 
									Russian &thinsp;
                  <div class="form-check form-switch">
										<input class="form-check-input" name="lang" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked="">
                  	<label class="form-check-label" for="flexSwitchCheckChecked">English</label>
                  </div>
								</span>

								<div class="form-floating mb-3">
									<input type="text" name="title" required class="form-control" id="floatingInput" minlength="4" maxlength="50"
										placeholder="Title">
									<label for="floatingInput">Title</label>
								</div>
								<div class="mb-3">
									<label for="formFile" class="form-label">Walpaper image</label>
									<input class="form-control bg-dark" required name="wallpaper_img" type="file" id="formFile">
								</div>
								<div class="mb-3">
									<label for="formFile" class="form-label">Preview image</label>
									<input class="form-control bg-dark" required name="preview_img" type="file" id="formFile">
								</div>
								<div class="form-floating">
									<textarea class="form-control" placeholder="Leave a comment here"
										id="floatingTextarea" name="top_text" required style="height: 150px;"></textarea>
									<label for="floatingTextarea">Top text</label>
								</div>
								<div class="mt-3 mb-4">
									<label for="formFile" class="mb-0 form-label">Images</label>
									
									<span id="imgBlocks">
									
										{{-- Тут появляются инпуты для изображений. --}}

										<div class="row-def mb-3 mt-1" id="img_inputs_1">
											<div class="cls-grp">
												<input class="form-control mb-1 bg-dark row-input" type="file" name="img_1" id="img_1">
												<div class="form-floating">
													<input type="text" class="form-control" name="img_1_title" id="img_1_title"
													placeholder="Title">
													<label for="floatingInput">Image title 1</label>
												</div>
											</div>
											{{-- <button type="button" class="btn cls-btn" id="img_1_delete" onclick="delImgOnClick('img_inputs_1')"><i class="bi bi-x-lg"></i></button> --}}
										</div>

										<div class="row-def mb-3 mt-1" id="img_inputs_2">
											<div class="cls-grp">
												<input class="form-control mb-1 bg-dark row-input" type="file" name="img_2" id="img_2">
												<div class="form-floating">
													<input type="text" class="form-control" name="img_2_title" id="img_2_title"
													placeholder="Title">
													<label for="floatingInput">Image title 2</label>
												</div>
											</div>
											{{-- <button type="button" class="btn cls-btn" id="img_2_delete" onclick="delImgOnClick('img_inputs_2')"><i class="bi bi-x-lg"></i></button> --}}
										</div>

										<div class="row-def mb-3 mt-1" id="img_inputs_3">
											<div class="cls-grp">
												<input class="form-control mb-1 bg-dark row-input" type="file" name="img_3" id="img_3">
												<div class="form-floating">
													<input type="text" class="form-control" name="img_3_title" id="img_3_title"
													placeholder="Title">
													<label for="floatingInput">Image title 3</label>
												</div>
											</div>
											{{-- <button type="button" class="btn cls-btn" id="img_3_delete" onclick="delImgOnClick('img_inputs_3')"><i class="bi bi-x-lg"></i></button> --}}
										</div>

										<div class="row-def mb-3 mt-1" id="img_inputs_4">
											<div class="cls-grp">
												<input class="form-control mb-1 bg-dark row-input" type="file" name="img_4" id="img_4">
												<div class="form-floating">
													<input type="text" class="form-control" name="img_4_title" id="img_4_title"
													placeholder="Title">
													<label for="floatingInput">Image title 4</label>
												</div>
											</div>
											{{-- <button type="button" class="btn cls-btn" id="img_4_delete" onclick="delImgOnClick('img_inputs_4')"><i class="bi bi-x-lg"></i></button> --}}
										</div>

										<div class="row-def mb-3 mt-1" id="img_inputs_5">
											<div class="cls-grp">
												<input class="form-control mb-1 bg-dark row-input" type="file" name="img_5" id="img_5">
												<div class="form-floating">
													<input type="text" class="form-control" name="img_5_title" id="img_5_title"
													placeholder="Title">
													<label for="floatingInput">Image title 5</label>
												</div>
											</div>
											{{-- <button type="button" class="btn cls-btn" id="img_5_delete" onclick="delImgOnClick('img_inputs_5')"><i class="bi bi-x-lg"></i></button> --}}
										</div>

										<div class="row-def mb-3 mt-1" id="img_inputs_6">
											<div class="cls-grp">
												<input class="form-control mb-1 bg-dark row-input" type="file" name="img_6" id="img_6">
												<div class="form-floating">
													<input type="text" class="form-control" name="img_6_title" id="img_6_title"
													placeholder="Title">
													<label for="floatingInput">Image title 6</label>
												</div>
											</div>
											{{-- <button type="button" class="btn cls-btn" id="img_6_delete" onclick="delImgOnClick('img_inputs_6')"><i class="bi bi-x-lg"></i></button> --}}
										</div>

									</span>
									
									{{-- <button type="button" class="btn btn-success rounded-pill mb-1" id="imgAdd" onclick="addImgOnClick()">Add <i class="fa fa-plus"></i></button> --}}
								</div>
								<div class="form-floating">
									<textarea class="form-control" placeholder="Leave a comment here"
										id="floatingTextarea" name="bottom_text" style="height: 150px;"></textarea>
									<label for="floatingTextarea">Bottom text</label>
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