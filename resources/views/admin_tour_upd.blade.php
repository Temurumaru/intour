<?php

use RedBeanPHP\R as R;

$data = R::findOne("tours", "id = ?", [@$_GET['id']]);


?>


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
							<form action="{{route('updTourC')}}" enctype="multipart/form-data" method="post">
								<input type="hidden" name="id" value="<?=@$_GET['id']?>">
								@csrf
								<h6 class="mb-3">Tour update</h6>

								<div class="form-floating mb-3">
									<input type="text" maxlength="30" value="<?=$data -> title?>" name="title" class="form-control" id="floatingInput"
										placeholder="Title">
									<label for="floatingInput">Title</label>
								</div>
								<div class="form-floating mb-3">
									<input type="text" maxlength="30" name="title_ru" value="<?=$data -> title_ru?>" class="form-control" id="floatingInput"
										placeholder="Title RU">
									<label for="floatingInput">Title RU</label>
								</div>
								<div class="form-floating mb-3">
									<input type="text" name="address" maxlength="55" value="<?=$data -> address?>" class="form-control" id="floatingInput"
										placeholder="Address">
									<label for="floatingInput">Address</label>
								</div>

								<span class="row">
									<div class="mb-3 col">
										<label for="formFile" class="form-label">Walpaper image</label>
										<input class="form-control bg-dark" name="wallpaper_img" type="file" id="formFile">
									</div>
									<div class="mb-3 col">
										<label for="formFile" class="form-label">Preview image</label>
										<input class="form-control bg-dark" name="preview_img" type="file" id="formFile">
									</div>
								</span>

								<span class="row">
									<div class="form-floating col mb-3">
										<input type="number" min="0" value="<?=$data -> price?>" name="price" class="form-control" id="floatingInput"
											placeholder="Price $">
										<label for="floatingInput">Price $</label>
									</div>

									<div class="form-floating col mb-3">
										<input type="number" min="0" value="<?=$data -> price_ru?>" name="price_ru" class="form-control" id="floatingInput"
											placeholder="Price ₽">
										<label for="floatingInput">Price ₽</label>
									</div>
								</span>
								
								<span class="row">
									<div class="form-floating col mb-3">
										<input type="number" min="0" value="<?=json_decode($data -> duration) -> duration_days?>" name="duration_days" class="form-control" id="floatingInput"
											placeholder="Duration days">
										<label for="floatingInput">Duration days</label>

									</div>

									<div class="form-floating col mb-3">
										<input type="number" min="0" value="<?=json_decode($data -> duration) -> duration_nights?>" name="duration_nights" class="form-control" id="floatingInput1"
										placeholder="Duration nights">
										<label for="floatingInput1">Duration nights</label>
									</div>
								</span>
								
								<span class="row">
									<div class="form-floating col mb-3">
										<input type="text" maxlength="5" value="<?=$data -> group?>" name="group" class="form-control" id="floatingInput"
											placeholder="Group">
										<label for="floatingInput">Group</label>

									</div>

									
									<div class="form-floating col mb-3">
										<input type="number" min="0" value="<?=$data -> interest_places?>" name="interest_places" class="form-control" id="floatingInput1"
										placeholder="Interest places">
										<label for="floatingInput1">Interes places</label>
									</div>
								</span>

								<div class="form-floating">
									<textarea class="form-control" placeholder="Leave a comment here"
										id="floatingTextarea" name="info_text" maxlength="6000" style="height: 150px;"><?=$data -> info_text?></textarea>
									<label for="floatingTextarea">Info text</label>
								</div>
								<div class="form-floating mt-2">
									<textarea class="form-control" placeholder="Leave a comment here"
										id="floatingTextarea" name="info_text_ru" maxlength="6000" style="height: 150px;"><?=$data -> info_text_ru?></textarea>
									<label for="floatingTextarea">Info text RU</label>
								</div>

								<span class="row mt-3">
									<div class="form-floating col mb-3">
										<input type="text" min="0" value="<?=$data -> departure_location?>" name="departure_location" maxlength="55" class="form-control" id="floatingInput"
											placeholder="Departure location">
										<label for="floatingInput">Departure location</label>

									</div>

									
									<div class="form-floating col mb-3">
										<input type="text" min="0" name="departure_time" value="<?=$data -> departure_time?>" maxlength="40" class="form-control" id="floatingInput1"
										placeholder="Departure time">
										<label for="floatingInput1">Departure time</label>
									</div>
								</span>

								<span class="row">
									<div class="form-floating col mb-3">
										<input type="text" min="0" name="return_time" value="<?=$data -> return_time?>" maxlength="40" class="form-control" id="floatingInput"
											placeholder="Return time">
										<label for="floatingInput">Return time</label>

									</div>

									
									<div class="form-floating col mb-3">
										<input type="text" min="0" name="return_time_ru" value="<?=$data -> return_time_ru?>" maxlength="40" class="form-control" id="floatingInput1"
										placeholder="Return time RU">
										<label for="floatingInput1">Return time RU</label>
									</div>
								</span>

								<span class="row">
									<div class="form-floating col mb-3">
										<input type="text" min="0" name="dress_code" value="<?=$data -> dress_code?>" maxlength="100" class="form-control" id="floatingInput"
											placeholder="Dress code">
										<label for="floatingInput">Dress code</label>

									</div>

									
									<div class="form-floating col mb-3">
										<input type="text" min="0" name="dress_code_ru" value="<?=$data -> dress_code_ru?>" maxlength="120" class="form-control" id="floatingInput1"
										placeholder="Dress code RU">
										<label for="floatingInput1">Dress code RU</label>
									</div>
								</span>

								<div class="form-floating mt-2">
									<textarea class="form-control" placeholder="Leave a comment here"
										id="floatingTextarea" name="price_includes"maxlength="1900" style="height: 150px;"><?=$data -> price_includes?>s</textarea>
									<label for="floatingTextarea">Price includes</label>
								</div>
								<div class="form-floating mt-2">
									<textarea class="form-control" placeholder="Leave a comment here"
										id="floatingTextarea" name="price_includes_ru"maxlength="1900" style="height: 150px;"><?=$data -> price_includes_ru?>s</textarea>
									<label for="floatingTextarea">Price includes RU</label>
								</div>

								<div class="form-floating mt-3">
									<textarea class="form-control" placeholder="Leave a comment here"
										id="floatingTextarea" name="price_excludes"maxlength="1900" style="height: 150px;"><?=$data -> price_excludes?>s</textarea>
									<label for="floatingTextarea">Price excludes</label>
								</div>
								<div class="form-floating mt-2">
									<textarea class="form-control" placeholder="Leave a comment here"
										id="floatingTextarea" name="price_excludes_ru"maxlength="1900" style="height: 150px;"><?=$data -> price_excludes_ru?>s</textarea>
									<label for="floatingTextarea">Price excludes RU</label>
								</div>

								<div class="form-floating mt-4">
									<textarea class="form-control" placeholder="Leave a comment here"
										id="floatingTextarea" name="important_info"maxlength="500" style="height: 150px;"><?=$data -> important_info?>s</textarea>
									<label for="floatingTextarea">Important info</label>
								</div>
								<div class="form-floating mt-2">
									<textarea class="form-control" maxlength="500" placeholder="Leave a comment here"
										id="floatingTextarea" name="important_info_ru" style="height: 150px;"><?=$data -> important_info_ru?></textarea>
									<label for="floatingTextarea">Important info RU</label>
								</div>


								<div class="mt-3"><b>Tour Days:</b></div>
								<div id="tour_days_group" class="mt-2">
							
									<?php
										$td = json_decode($data -> tour_plan_data);
										$tdr = json_decode($data -> tour_plan_data_ru, true);

										// dd($tdr);
										
										$i = 1;
										foreach($td as $vl) {
											
											?>

											<div class="cls-red-bg mb-3 mt-3" id="tour_day_<?=$i?>">
												<div class="cls-grp">
													<div class="form-floating col mb-3">
														<input type="text" maxlength="30" value="<?=$vl -> title?>" name="tour_plan_title_<?=$i?>" class="form-control" id="floatingInput1"
														placeholder="Price excludes RU <?=$i?>">
														<label for="floatingInput1">Tour plan title <?=$i?></label>
													</div>
													<div class="form-floating col mb-3">
														<input type="text" maxlength="30" value="<?=$tdr['day_'.$i]['title']?>" name="tour_plan_title_ru_<?=$i?>" class="form-control" id="floatingInput1"
														placeholder="Price excludes RU <?=$i?>">
														<label for="floatingInput1">Tour plan title RU <?=$i?></label>
													</div>
													<div class="form-floating">
														<textarea class="form-control" maxlength="2200" placeholder="Leave a comment here"
															id="floatingTextarea" name="tour_plan_data_<?=$i?>" style="height: 150px;"><?=$vl -> data?></textarea>
														<label for="floatingTextarea">Tour plan data <?=$i?></label>
													</div>
													<div class="form-floating mt-2">
														<textarea class="form-control" maxlength="2200" placeholder="Leave a comment here"
															id="floatingTextarea" name="tour_plan_data_ru_<?=$i?>" style="height: 150px;"><?=$tdr['day_'.$i]['data']?></textarea>
														<label for="floatingTextarea">Tour plan data RU <?=$i?></label>
													</div>
												</div>
												<button type="button" class="btn cls-btn-b" id="" onclick="delTourDayOnClick('tour_day_<?=$i?>')">
													<div class="idc">
														<b>Delete</b>
													</div>
												</button>
											</div>

											<?php

											$i++;
										}
										?>

								</div>
								
								<button type="button" class="btn btn-success rounded-pill mb-3 mt-1" id="tourAdd" onclick="addTourDayOnClick()">Add <i class="fa fa-plus"></i></button>
								
								<input type="submit" class="btn btn-success mt-2 btn-upl" value="Update">
							</form>
						</div>
            
            <script>
              let tourGroupState = <?= count((array)$td)?>;

              function delTourDayOnClick(elemId) {
                $('#'+elemId).remove();
								if(tourGroupState < 50) {
									$('#tourAdd').show();
								}
              }

              function addTourDayOnClick(elemId) {
								tourGroupState++;
								if(tourGroupState >= 6) {
									$('#tourAdd').hide();
									if(tourGroupState >= 7) return 0;
								}
                $('#tour_days_group').append(`
									<div class="cls-red-bg mb-3 mt-3" id="tour_day_`+tourGroupState+`">
										<div class="cls-grp">
											<div class="form-floating col mb-3">
												<input type="text" maxlength="30" name="tour_plan_title_`+tourGroupState+`" class="form-control" id="floatingInput1"
												placeholder="Price excludes RU `+tourGroupState+`">
												<label for="floatingInput1">Tour plan title `+tourGroupState+`</label>
											</div>
											<div class="form-floating col mb-3">
												<input type="text" maxlength="30" name="tour_plan_title_ru_`+tourGroupState+`" class="form-control" id="floatingInput1"
												placeholder="Price excludes RU `+tourGroupState+`">
												<label for="floatingInput1">Tour plan title RU `+tourGroupState+`</label>
											</div>
											<div class="form-floating">
												<textarea class="form-control" maxlength="2200" placeholder="Leave a comment here"
													id="floatingTextarea" name="tour_plan_data_`+tourGroupState+`" style="height: 150px;"></textarea>
												<label for="floatingTextarea">Tour plan data `+tourGroupState+`</label>
											</div>
											<div class="form-floating mt-2">
												<textarea class="form-control" maxlength="2200" placeholder="Leave a comment here"
													id="floatingTextarea" name="tour_plan_data_ru_`+tourGroupState+`" style="height: 150px;"></textarea>
												<label for="floatingTextarea">Tour plan data RU `+tourGroupState+`</label>
											</div>
										</div>
										<button type="button" class="btn cls-btn-b" id="" onclick="delTourDayOnClick('tour_day_`+tourGroupState+`')">
											<div class="idc">
												<b>Delete</b>
											</div>
										</button>
									</div>
								`);
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