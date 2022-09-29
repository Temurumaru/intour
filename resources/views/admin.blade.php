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


			<!-- Recent Sales Start -->
			<div class="container-fluid pt-4 px-4">

				<div class="mb-3 bg-secondary text-center rounded p-4">
					<div class="d-flex align-items-center justify-content-between mb-3">
						<h3 class="mb-0">Tours</h3>
					</div>
					<div class="table-responsive">
						<table class="table text-start align-middle table-bordered table-hover mb-0">
							<thead>
								<tr class="text-white">
									<th scope="col"><a href="?tour_srch=id">ID <?=(@$_GET['tour_srch'] == 'id') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
									<th scope="col"><a href="?tour_srch=title">Title <?=(@$_GET['tour_srch'] == 'title') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
									<th scope="col"><a href="?tour_srch=title_ru">Title RU <?=(@$_GET['tour_srch'] == 'title_ru') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
									<th scope="col"><a href="?tour_srch=price">Price <?=(@$_GET['tour_srch'] == 'price') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
									<th scope="col"><a href="?tour_srch=price_ru">Price RU <?=(@$_GET['tour_srch'] == 'price_ru') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
									<th scope="col"><a href="?tour_srch=views">Views <?=(@$_GET['tour_srch'] == 'views') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>

								<?php

								$tour_srch = "id";

								if(@$_GET['tour_srch'] == "id") $tour_srch = "id DESC";
								if(@$_GET['tour_srch'] == "title") $tour_srch = "title";
								if(@$_GET['tour_srch'] == "title_ru") $tour_srch =  "title_ru";
								if(@$_GET['tour_srch'] == "price") $tour_srch =  "price DESC";
								if(@$_GET['tour_srch'] == "price_ru") $tour_srch =  "price_ru DESC";
								if(@$_GET['tour_srch'] == "views") $tour_srch = "views DESC";


								$blogs = R::find("tours", "ORDER BY ".$tour_srch);
								foreach ($blogs as $val) { ?>

								<tr>
									<td><?=$val -> id?></td>
									<td><?=$val -> title?></td>
									<td><?=$val -> title_ru?></td>
									<td>$ <?=$val -> price?></td>
									<td>₽ <?=$val -> price_ru?></td>
									<td><?=$val -> views?></td>
									<td>
										<a class="btn btn-sm btn-success" target="_blank" href="/tour?id=<?=$val -> id?>">Open</a>
										<a class="btn btn-sm btn-warning" href="/admin_tour_upd?id=<?=$val -> id?>">Edit</a>
										<a class="btn btn-sm btn-primary" onclick="delTourOnCLick(<?=$val -> id?>, '<?=$val -> title?>')" href="#">Delete</a>
									</td>
								</tr>
								<?php }?>
								
							</tbody>
						</table>
					</div>
				</div>

				<div class=" mb-3 bg-secondary text-center rounded p-4">
					<div class="d-flex align-items-center justify-content-between mb-3">
						<h3 class="mb-0">Tourism</h3>
					</div>
					<div class="table-responsive">
						<table class="table text-start align-middle table-bordered table-hover mb-0">
							<thead>
								<tr class="text-white">
									<th scope="col"><a href="?tourism_srch=id">ID <?=(@$_GET['tourism_srch'] == 'id') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
									<th scope="col"><a href="?tourism_srch=title">Title <?=(@$_GET['tourism_srch'] == 'title') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
									<th scope="col"><a href="?tourism_srch=views">Views <?=(@$_GET['tourism_srch'] == 'views') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>

								<?php

								$tourism_srch = "id";

								if(@$_GET['tourism_srch'] == "id") $tourism_srch = "id DESC";
								if(@$_GET['tourism_srch'] == "title") $tourism_srch = "title";
								if(@$_GET['tourism_srch'] == "views") $tourism_srch = "views DESC";


								$blogs = R::find("tourism", "ORDER BY ".$tourism_srch);
								foreach ($blogs as $val) { ?>

								<tr>
									<td><?=$val -> id?></td>
									<td><?=$val -> title?></td>
									<td><?=$val -> views?></td>
									<td>
										<a class="btn btn-sm btn-success" target="_blank" href="/tourism?id=<?=$val -> id?>">Open</a>
										<a class="btn btn-sm btn-warning" href="/admin_tourism?id=<?=$val -> id?>">Edit</a>
									</td>
								</tr>
								<?php }?>
								
							</tbody>
						</table>
					</div>
				</div>

				<div class=" mb-3 bg-secondary text-center rounded p-4">
					<div class="d-flex align-items-center justify-content-between mb-3">
						<h3 class="mb-0">Cities</h3>
					</div>
					<div class="table-responsive">
						<table class="table text-start align-middle table-bordered table-hover mb-0">
							<thead>
								<tr class="text-white">
									<th scope="col"><a href="?cities_srch=id">ID <?=(@$_GET['cities_srch'] == 'id') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
									<th scope="col"><a href="?cities_srch=title">Title <?=(@$_GET['cities_srch'] == 'title') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
									<th scope="col"><a href="?cities_srch=views">Views <?=(@$_GET['cities_srch'] == 'views') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>

								<?php

								$cities_srch = "id";

								if(@$_GET['cities_srch'] == "id") $cities_srch = "id DESC";
								if(@$_GET['cities_srch'] == "title") $cities_srch = "title";
								if(@$_GET['cities_srch'] == "views") $cities_srch = "views DESC";


								$blogs = R::find("city_tours", "ORDER BY ".$cities_srch);
								foreach ($blogs as $val) { ?>

								<tr>
									<td><?=$val -> id?></td>
									<td><?=$val -> title?></td>
									<td><?=$val -> views?></td>
									<td>
										<a class="btn btn-sm btn-success" target="_blank" href="/tour_cities?id=<?=$val -> id?>">Open</a>
										<a class="btn btn-sm btn-warning" href="/admin_cities_blog?id=<?=$val -> id?>">Edit</a>
									</td>
								</tr>
								<?php }?>
								
							</tbody>
						</table>
					</div>
				</div>

				<div class="bg-secondary text-center rounded p-4">
					<div class="d-flex align-items-center justify-content-between mb-3">
						<h3 class="mb-0">Blogs</h3>
						{{-- <a href="">Show All</a> --}}
					</div>
					<div class="table-responsive">
						<table class="table text-start align-middle table-bordered table-hover mb-0">
							<thead>
								<tr class="text-white">
									<th scope="col"><a href="?srch=id">ID <?=(@$_GET['srch'] == 'id') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
									<th scope="col"><a href="?srch=title">Title <?=(@$_GET['srch'] == 'title') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
									<th scope="col"><a href="?srch=lang">Lang <?=(@$_GET['srch'] == 'lang') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
									<th scope="col"><a href="?srch=views">Views <?=(@$_GET['srch'] == 'views') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
									<th scope="col"><a href="?srch=date">Date <?=(@$_GET['srch'] == 'date') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>

								<?php

								$srch = "id";

								if(@$_GET['srch'] == "id") $srch = "id DESC";
								if(@$_GET['srch'] == "title") $srch = "title";
								if(@$_GET['srch'] == "lang") $srch =  "lang";
								if(@$_GET['srch'] == "views") $srch = "views DESC";
								if(@$_GET['srch'] == "date") $srch =  "date DESC";


								$blogs = R::find("blog", "ORDER BY ".$srch);
								foreach ($blogs as $val) { ?>

								<tr>
									<td><?=$val -> id?></td>
									<td><?=$val -> title?></td>
									<td><?=($val -> lang == "en") ? "<span style='padding: 4px;background-color:rgba(54, 54, 226, 0.8);color:black;border-radius:3px;'>EN</span>" : "<span style='padding: 4px;background-color:rgba(220, 45, 45, 0.808);color:black;border-radius:3px;'>RU</span>"?></td>
									<td><?=$val -> views?></td>
									<td><?=$val -> date?></td>
									<td>
										<a class="btn btn-sm btn-success" target="_blank" href="/blog?post_id=<?=$val -> id?>">Open</a>
										<a class="btn btn-sm btn-warning" href="/admin_blog_upd?id=<?=$val -> id?>">Edit</a>
										<a class="btn btn-sm btn-primary" onclick="delPostBlogOnCLick(<?=$val -> id?>, '<?=$val -> title?>')" href="#">Delete</a>
									</td>
								</tr>
								<?php }?>
								
							</tbody>
						</table>
					</div>
				</div>

				<div class=" mt-3 bg-secondary text-center rounded p-4">
					<div class="d-flex align-items-center justify-content-between mb-3">
						<h3 class="mb-0">Cars</h3>
					</div>
					<div class="table-responsive">
						<table class="table text-start align-middle table-bordered table-hover mb-0">
							<thead>
								<tr class="text-white">
									<th scope="col"><a href="?cars_srch=id">ID <?=(@$_GET['cars_srch'] == 'id') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
									<th scope="col"><a href="?cars_srch=car_name">Name <?=(@$_GET['cars_srch'] == 'car_name') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
									<th scope="col"><a href="?cars_srch=car_name_ru">Name RU <?=(@$_GET['cars_srch'] == 'car_name_ru') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>

								<?php

								$cars_srch = "id";

								if(@$_GET['cars_srch'] == "id") $cars_srch = "id DESC";
								if(@$_GET['cars_srch'] == "car_name") $cars_srch = "car_name";
								if(@$_GET['cars_srch'] == "car_name_ru") $cars_srch = "car_name_ru";


								$blogs = R::find("cars", "ORDER BY ".$cars_srch);
								foreach ($blogs as $val) { ?>

								<tr>
									<td><?=$val -> id?></td>
									<td><?=$val -> car_name?></td>
									<td><?=$val -> car_name_ru?></td>
									<td>
										<a class="btn btn-sm btn-primary" onclick="delCarOnCLick(<?=$val -> id?>, '<?=$val -> car_name?>')" href="">Delete</a>
									</td>
								</tr>
								<?php }?>
								
							</tbody>
						</table>
					</div>
				</div>

				<div class=" mt-3 bg-secondary text-center rounded p-4">
					<div class="d-flex align-items-center justify-content-between mb-3">
						<h3 class="mb-0">Gallery Sections</h3>
					</div>
					<div class="table-responsive">
						<table class="table text-start align-middle table-bordered table-hover mb-0">
							<thead>
								<tr class="text-white">
									<th scope="col"><a href="?sec_gallery_srch=id">ID <?=(@$_GET['sec_gallery_srch'] == 'id') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
									<th scope="col"><a href="?sec_gallery_srch=title">Title <?=(@$_GET['sec_gallery_srch'] == 'title') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
									<th scope="col"><a href="?sec_gallery_srch=title_ru">Title RU <?=(@$_GET['sec_gallery_srch'] == 'title_ru') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>

								<?php

								$sec_gallery_srch = "id";

								if(@$_GET['sec_gallery_srch'] == "id") $sec_gallery_srch = "id DESC";
								if(@$_GET['sec_gallery_srch'] == "title") $sec_gallery_srch = "title";
								if(@$_GET['sec_gallery_srch'] == "title_ru") $sec_gallery_srch = "title_ru";


								$blogs = R::find("gallery", "ORDER BY ".$sec_gallery_srch);
								foreach ($blogs as $val) { ?>

								<tr>
									<td><?=$val -> id?></td>
									<td><?=$val -> title?></td>
									<td><?=$val -> title_ru?></td>
									<td>
										<a class="btn btn-sm btn-primary" onclick="delSecGalleryOnCLick(<?=$val -> id?>, '<?=$val -> title?>')" href="">Delete</a>
									</td>
								</tr>
								<?php }?>
								
							</tbody>
						</table>
					</div>
				</div>

				<div class=" mt-3 bg-secondary text-center rounded p-4">
					<div class="d-flex align-items-center justify-content-between mb-3">
						<h3 class="mb-0">Gallery</h3>
					</div>
					<div class="table-responsive">
						<table class="table text-start align-middle table-bordered table-hover mb-0">
							<thead>
								<tr class="text-white">
									<th scope="col"><a href="?gallery_srch=id">ID <?=(@$_GET['gallery_srch'] == 'id') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
									<th scope="col"><a href="?gallery_srch=title">Title <?=(@$_GET['gallery_srch'] == 'title') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
									<th scope="col"><a href="?gallery_srch=title_ru">Title RU <?=(@$_GET['gallery_srch'] == 'title_ru') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>

								<?php

								$gallery_srch = "id";

								if(@$_GET['gallery_srch'] == "id") $gallery_srch = "id DESC";
								if(@$_GET['gallery_srch'] == "title") $gallery_srch = "title";
								if(@$_GET['gallery_srch'] == "title_ru") $gallery_srch = "title_ru";


								$blogs = R::find("gallery", "ORDER BY ".$gallery_srch);
								foreach ($blogs as $val) { ?>

								<tr>
									<td><?=$val -> id?></td>
									<td><?=$val -> title?></td>
									<td><?=$val -> title_ru?></td>
									<td>
										<a class="btn btn-sm btn-primary" onclick="delGalleryOnCLick(<?=$val -> id?>, '<?=$val -> title?>')" href="">Delete</a>
									</td>
								</tr>
								<?php }?>
								
							</tbody>
						</table>
					</div>
				</div>

			</div>
			<!-- Recent Sales End -->

		</div>
		<!-- Content End -->


		<!-- Back to Top -->
		<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
	</div>

	<script>
		function delPostBlogOnCLick(id, ps_title) {
			if(confirm('Вы точно хотите удалить '+ps_title)) {
				$.ajax({
					type: "delete",
					url: "{{route('delPostBlogC')}}",
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

		function delTourOnCLick(id, ps_title) {
			if(confirm('Вы точно хотите удалить '+ps_title)) {
				$.ajax({
					type: "delete",
					url: "{{route('delTourC')}}",
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

		function delGalleryOnCLick(id, ps_title) {
			if(confirm('Вы точно хотите удалить '+ps_title)) {
				$.ajax({
					type: "delete",
					url: "{{route('delGalleryC')}}",
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

		function delSecGalleryOnCLick(id, ps_title) {
			if(confirm('Вы точно хотите удалить '+ps_title)) {
				$.ajax({
					type: "delete",
					url: "{{route('delSecGalleryC')}}",
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

		function delCarOnCLick(id, ps_title) {
			if(confirm('Вы точно хотите удалить '+ps_title)) {
				$.ajax({
					type: "delete",
					url: "{{route('delCarC')}}",
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