<?php
use RedBeanPHP\R as R;
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<title>inTour Admin Dashboard</title>
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
		

		@include('blocks.sidebar')

		<!-- Content Start -->
		<div class="content">

			@include('blocks.adm_header')


			<!-- Form Start -->
			<div class="container-fluid pt-4 px-4">
				<div class="row g-4">
					<div class="col-sm-12 col-xl-6">
						<div class="bg-secondary rounded h-100 p-4">
							<form action="{{route('addAdminC')}}" enctype="multipart/form-data" method="post">
								@csrf
								<h6 class="mb-3">Create Administrator</h6>

								<div class="form-floating">
									<input type="text" class="form-control" name="login" 
									placeholder="Title">
									<label for="floatingInput">Login</label>
								</div>

								<div class="form-floating mt-2 mb-2">
									<input type="password" class="form-control" name="password" 
									placeholder="Title">
									<label for="floatingInput">Password</label>
								</div>

								<input type="submit" class="btn btn-success mt-2 btn-upl" value="Upload">
							</form>
						</div>
					</div>

					<div class="col-sm-12 col-xl-6">
						<div class="bg-secondary rounded h-100 p-4">
							<h6 class="mb-4">Bordered Table</h6>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th scope="col">ID</th>
										<th scope="col">Login</th>
										{{-- <th scope="col">Level</th> --}}
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$ads = R::find("admins", "level != ?", [5]);
									foreach ($ads as $val) {
										?>
									<tr>
										<th scope="row"><?=$val -> id?></th>
										<td><?=$val -> login?></td>
										{{-- <td><?=$val -> level?></td> --}}
										<td>
											<a class="btn btn-sm btn-primary" onclick="delAdminOnCLick(<?=$val -> id?>, '<?=$val -> login?>')" href="#">Delete</a>
										</td>
									</tr>

									<?php }?>
									
								</tbody>
							</table>
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

	<script>
		function delAdminOnCLick(id, ps_title) {
			if(confirm('Вы точно хотите удалить '+ps_title)) {
				$.ajax({
					type: "delete",
					url: "{{route('delAdminC')}}",
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}'
					},
					data: {
						id: id
					},
					dataType: "html",
					success: function (data) {
						location.reload();
					}
				});
			}
		}
	</script>

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