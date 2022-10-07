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
							<form action="{{route('add_section_on_gallery_c')}}" enctype="multipart/form-data" method="post">
								@csrf
								<h6 class="mb-3">Create Section on gallery</h6>

								<div class="form-floating">
									<input type="text" class="form-control" name="gallery_sec_name" id="img_1_title"
									placeholder="Title">
									<label for="floatingInput">Section Name</label>
								</div>

								<div class="form-floating mt-2 mb-2">
									<input type="text" class="form-control" name="gallery_sec_name_ru" id="img_1_title"
									placeholder="Title">
									<label for="floatingInput">Section Name RU</label>
								</div>

								<div class="mb-3">
									<label for="formFile" class="form-label">Gallery preview image</label>
									<input class="form-control bg-dark" name="gallery_prev" type="file" id="formFile">
								</div>

								<input type="submit" class="btn btn-success mt-2 btn-upl" value="Upload">
							</form>
						</div>
					</div>


					<div class="col-sm-12 col-xl-6">
						<div class="bg-secondary rounded h-100 p-4">
							<form action="{{route('add_picture_on_gallery_c')}}" enctype="multipart/form-data" method="post">
								@csrf
								<h6 class="mb-3">Upload Picture on gallery</h6>

								<?php
									$cities = R::findAll("gallery_sec");
								?>

								<select name="section" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
									<option selected="">Change City</option>
									<?php foreach($cities as $c) {?>
									<option value="<?=$c -> id?>"><?=$c -> gallery_sec_name?></option>
									<?php }?>
								</select>

								<div class="mt-3 mb-4">
									<label for="formFile" class="mb-0 form-label">Images</label>
									
									<span id="imgBlocks">
									
										{{-- Тут появляются инпуты для изображений. --}}

										{{-- <div class="row-def mb-3 mt-1" id="img_inputs_1">
											<div class="cls-grp">
												<input class="form-control mb-1 bg-dark row-input" type="file" name="img_1" id="img_1">
												<div class="form-floating">
													<input type="text" class="form-control" name="img_1_title" id="img_1_title"
													placeholder="Title">
													<label for="floatingInput">Image title 1</label>
												</div>
											</div>
											<button type="button" class="btn cls-btn" id="img_1_delete" onclick="delImgOnClick('img_inputs_1')"><i class="bi bi-x-lg"></i></button>
										</div> --}}

									</span>
									
									<button type="button" class="btn btn-success rounded-pill mb-1" id="imgAdd" onclick="addImgOnClick()">Add <i class="fa fa-plus"></i></button>
								</div>
								<input type="submit" class="btn btn-success mt-2 btn-upl" value="Upload">
							</form>
						</div>
            
            <script>
              let imgGroupState = 0;

              function delImgOnClick(elemId) {
                $('#'+elemId).remove();
								if(imgGroupState < 200) {
									$('#imgAdd').show();
								}
              }

              function addImgOnClick() {
								imgGroupState++;
                $('#imgBlocks').append(`
									<div class="row-def mb-3 mt-1" id="img_inputs_`+imgGroupState+`">
										<div class="cls-grp">
											<input class="form-control mb-1 bg-dark row-input" type="file" name="img_`+imgGroupState+`" id="img_`+imgGroupState+`">
											<div class="form-floating">
												<input type="text" class="form-control" name="img_`+imgGroupState+`_title" id="img_`+imgGroupState+`_title"
												placeholder="Title">
												<label for="floatingInput">Image title `+imgGroupState+`</label>
											</div>
											<div class="form-floating mt-1 mb-1">
												<input type="text" class="form-control" name="img_`+imgGroupState+`_title_ru" id="img_`+imgGroupState+`_title_ru"
												placeholder="Title">
												<label for="floatingInput">Image title `+imgGroupState+` RU</label>
											</div>
										</div>
									</div>
								`);
								if(imgGroupState >= 200) {
									$('#imgAdd').hide();
								}
              }
            </script>
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