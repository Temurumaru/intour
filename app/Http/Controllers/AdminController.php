<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RedBeanPHP\R as R;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{

	public function signInAdmin(Request $req) {
		$req -> validate([
			'login' => 'required|min:4|max:20|regex:/^[a-zA-Z0-9_\-]*$/',
			'password' => 'required|min:8|max:64|regex:/^[a-zA-Z0-9_\-]*$/',
		]);

		$adm = R::findOne("admins", "login = ? AND password = ?", [$req -> login, hash('sha256', $req -> password)]);

		if(isset($adm)) {
			$_SESSION['admin'] = $adm;

			return redirect() -> route('admin') -> with('success', 'Sign In was successed');
		} else {
			return back() -> withErrors(['login' => 'Login was Failed']);
		}
	}

	public function addAdmin(Request $req) {
		$req -> validate([
			'login' => 'required|min:4|max:20|regex:/^[a-zA-Z0-9_\-]*$/',
			'password' => 'required|min:8|max:64|regex:/^[a-zA-Z0-9_\-]*$/',
		]);

		if(R::count("admins", "login = ?", [$req -> login]) == 0) {
			$adm = R::dispense('admins');

			$adm -> login = $req -> login;
			$adm -> password = hash('sha256', $req -> password);
			$adm -> level = 1;

			if(R::store($adm)) {
				return redirect() -> route('admin_creator') -> with('success', 'Administrator was created');
			} else {
				return back() -> withErrors(['login' => 'Administrator was NOT created']);
			}
		} else {
			return back() -> withErrors(['login' => 'Еhere is already such an Administrator']);
		}
	}

	public function addPostOnBlog(Request $req) {
		$req -> validate([
			'title' => 'required|min:4|max:50',
			'top_text' => 'required|min:20|max:6000',
			'bottom_text' => 'max:6000',
		]);

		$max_avatar_size = 3 * 1024 * 1024;

		if(empty($req -> wallpaper_img)) {
			return back() -> withErrors(['wallpaper_img' => 'Wallpaper image not found.']);
		}

		$file = $req -> wallpaper_img;
		$type = $file -> getMimeType();
		$error = $file -> getError();
		$size = $file -> getSize();

		if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
			return back() -> withErrors(['wallpaper_img' => 'Incorrect Wallpaper image extension.']);
		}

		if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
			return back() -> withErrors(['wallpaper_img' => 'The Wallpaper image is too heavy.']);
		}

		$wlpp = date("YmdHis").rand(0, 99999999).".jpg";

		Image::make($file->path())->save(public_path('upl_data/wallpapers/').$wlpp, 100, 'jpg');


		if(empty($req -> preview_img)) {
			return back() -> withErrors(['preview_img' => 'Preview image not found.']);
		}

		$file = $req -> preview_img;
		$type = $file -> getMimeType();
		$error = $file -> getError();
		$size = $file -> getSize();

		if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
			return back() -> withErrors(['preview_img' => 'Incorrect Preview image extension.']);
		}

		if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
			return back() -> withErrors(['preview_img' => 'The Preview image is too heavy.']);
		}

		$prv = date("YmdHis").rand(0, 99999999).".jpg";

		Image::make($file->path())->save(public_path('upl_data/prevs/').$prv, 100, 'jpg');

		$imgs_json = [];
		$img_titles_json = [];

		$i = 1;
		while($i <= 6) {
			$fil_path = '';
			eval('$file = $req -> img_'.$i.';');
			if(!$file) {
				$imgs_json['img_'.$i] = '';
				$img_titles_json['img_'.$i.'_title'] = '';
				$i++;
				continue;
			}
			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['imgs' => 'Incorrect image '.$i.' extension.']);
			}

			if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['imgs' => 'The image '.$i.' is too heavy.']);
			}

			$fil_path = date("YmdHis").rand(0, 99999999).".jpg";

			Image::make($file->path())->save(public_path('upl_data/imgs/').$fil_path, 100, 'jpg');

			eval('$fil_ttl = $req -> img_'.$i.'_title;');

			$imgs_json['img_'.$i] = $fil_path;
			$img_titles_json['img_'.$i.'_title'] = $fil_ttl;

			$i++;
		}

		$blog = R::dispense("blog");

		$blog -> title = $req -> title;
		$blog -> lang = ($req -> lang) ? "en" : "ru";
		$blog -> wallpaper = $wlpp;
		$blog -> preview = $prv;
		$blog -> top_text = $req -> top_text;
		if(isset($req -> bottom_text)) $blog -> bottom_text = $req -> bottom_text;
		$blog -> img = (string)json_encode($imgs_json);
		$blog -> img_titles = (string)json_encode($img_titles_json);
		$blog -> views = 0;
		$blog -> date = date("m d, Y");

		R::store($blog);

		return redirect('admin_blog') -> with('success', 'Post was created.');

	}

	public function updPostOnBlog(Request $req) {
		$req -> validate([
			'title' => 'required|min:4|max:50',
			'top_text' => 'required|min:20|max:6000',
			'bottom_text' => 'max:6000',
		]);

		$max_avatar_size = 3 * 1024 * 1024;

		if(isset($req -> wallpaper_img)) {

			$file = $req -> wallpaper_img;
			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['wallpaper_img' => 'Incorrect Wallpaper image extension.']);
			}

			if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['wallpaper_img' => 'The Wallpaper image is too heavy.']);
			}

			$wlpp = date("YmdHis").rand(0, 99999999).".jpg";

			Image::make($file->path())->save(public_path('upl_data/wallpapers/').$wlpp, 100, 'jpg');
		
		}

		if(isset($req -> preview_img)) {

			$file = $req -> preview_img;
			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['preview_img' => 'Incorrect Preview image extension.']);
			}

			if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['preview_img' => 'The Preview image is too heavy.']);
			}

			$prv = date("YmdHis").rand(0, 99999999).".jpg";

			Image::make($file->path())->save(public_path('upl_data/prevs/').$prv, 100, 'jpg');
		}


		$blog = R::findOne("blog", "id = ?", [$req -> id]);


		$imgs_json = [];
		$img_titles_json = [];

		$i = 1;
		while($i <= 6) {
			$fil_path = '';
			$gallery = json_decode($blog -> img, true);
			eval('$file = $req -> img_'.$i.';');
			eval('$fil_ttl = $req -> img_'.$i.'_title;');
			if(!$file) {
				$imgs_json['img_'.$i] = (isset($gallery['img_'.$i])) ? $gallery['img_'.$i] : "";
				$img_titles_json['img_'.$i.'_title'] = $fil_ttl;
				$i++;
				continue;
			}
			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['imgs' => 'Incorrect image '.$i.' extension.']);
			}

			if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['imgs' => 'The image '.$i.' is too heavy.']);
			}

			$fil_path = date("YmdHis").rand(0, 99999999).".jpg";

			Image::make($file->path())->save(public_path('upl_data/imgs/').$fil_path, 100, 'jpg');

			$imgs_json['img_'.$i] = $fil_path;
			$img_titles_json['img_'.$i.'_title'] = $fil_ttl;

			$i++;
		}

		$blog -> title = $req -> title;
		$blog -> lang = ($req -> lang) ? "en" : "ru";
		if(isset($wlpp)) $blog -> wallpaper = $wlpp;
		if(isset($prv)) $blog -> preview = $prv;
		$blog -> top_text = $req -> top_text;
		if(isset($req -> bottom_text)) $blog -> bottom_text = $req -> bottom_text;
		if(!isset($req -> bottom_text)) $blog -> bottom_text = "";
		$blog -> img = (string)json_encode($imgs_json);
		$blog -> img_titles = (string)json_encode($img_titles_json);
		$blog -> views = 0;
		$blog -> date = date("m d, Y");

		R::store($blog);

		return redirect('admin') -> with('success', 'Post was updated.');

	}



	public function updPostOnTourism(Request $req) {
		$req -> validate([
			'title' => 'required|min:4|max:20',
			'top_text' => 'required|min:20|max:6000',
			'bottom_text' => 'required|min:50|max:6000',
		]);

		$max_avatar_size = 3 * 1024 * 1024;

		if(isset($req -> wallpaper_img)) {

			$file = $req -> wallpaper_img;
			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['wallpaper_img' => 'Incorrect Wallpaper image extension.']);
			}

			if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['wallpaper_img' => 'The Wallpaper image is too heavy.']);
			}

			$wlpp = date("YmdHis").rand(0, 99999999).".jpg";

		}

		if(isset($req -> preview_img)) {

			$file2 = $req -> preview_img;
			$type = $file2 -> getMimeType();
			$error = $file2 -> getError();
			$size = $file2 -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['preview_img' => 'Incorrect Preview image extension.']);
			}

			if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['preview_img' => 'The Preview image is too heavy.']);
			}

			$prv = date("YmdHis").rand(0, 99999999).".jpg";

		}


		$blog = R::findOne("tourism", "id = ?", [$req -> id]);
		// dd($req);
		$gallery = json_decode($blog -> img, true);
		$imgs_json = [];
		$img_titles_json = [];

		$i = 1;
		while($i <= 3) {
			$fil_path = '';
			eval('$file3 = $req -> img_'.$i.';');
			if(!$file3) {
				$imgs_json['img_'.$i] = (isset($gallery['img_'.$i])) ? $gallery['img_'.$i] : "";
				$i++;
				continue;
			}
			$type = $file3 -> getMimeType();
			$error = $file3 -> getError();
			$size = $file3 -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['imgs' => 'Incorrect image '.$i.' extension.']);
			}

			if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['imgs' => 'The image '.$i.' is too heavy.']);
			}

			$fil_path = date("YmdHis").rand(0, 99999999).".jpg";

			$imgs_json['img_'.$i] = $fil_path;
			File::delete(public_path('upl_data/imgs/').(isset($gallery['img_'.$i])) ? $gallery['img_'.$i] : "");
			Image::make($file3->path())->save(public_path('upl_data/imgs/').$fil_path, 100, 'jpg');

			$i++;
		}


		$blog -> title = $req -> title;
		$blog -> title_ru = $req -> title_ru;
		if(isset($wlpp)) $blog -> wallpaper = $wlpp;
		if(isset($prv)) $blog -> preview = $prv;
		$blog -> top_text = $req -> top_text;
		$blog -> top_text_ru = $req -> top_text_ru;
		$blog -> bottom_text = $req -> bottom_text;
		$blog -> bottom_text_ru = $req -> bottom_text_ru;
		$blog -> img = (string)json_encode($imgs_json);
		$blog -> views = 0;

		R::store($blog);
		if(isset($wlpp)) Image::make($file->path())->save(public_path('upl_data/wallpapers/').$wlpp, 100, 'jpg');
		if(isset($prv)) Image::make($file2->path())->save(public_path('upl_data/prevs/').$prv, 100, 'jpg');

		return redirect('admin') -> with('success', 'Tourism was updated.');

	}

	public function addSectionOnGallery(Request $req) {
		$req -> validate([
			'gallery_sec_name' => 'required|min:4|max:25',
			'gallery_sec_name_ru' => 'required|min:4|max:25',
		]);

		$max_avatar_size = 3 * 1024 * 1024;

		if(empty($req -> gallery_prev)) {
			return back() -> withErrors(['gallery_prev' => 'Preview image not found.']);
		}

		$file = $req -> gallery_prev;
		$type = $file -> getMimeType();
		$error = $file -> getError();
		$size = $file -> getSize();

		if(empty($req -> gallery_prev)) {
			return back() -> withErrors(['gallery_prev' => 'Preview image not found.']);
		}
		if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
			return back() -> withErrors(['gallery_prev' => 'Incorrect Preview image extension.']);
		}

		if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
			return back() -> withErrors(['gallery_prev' => 'The Preview image is too heavy.']);
		}

		$wlpp = date("YmdHis").rand(0, 99999999).".jpg";

		Image::make($file->path())->save(public_path('upl_data/gallery_prevs/').$wlpp, 100, 'jpg');


		$gallery_section = R::dispense("gallery_sec");

		$gallery_section -> gallery_sec_name = $req -> gallery_sec_name;
		$gallery_section -> gallery_sec_name_ru = $req -> gallery_sec_name_ru;
		$gallery_section -> wallpaper = $wlpp;
		$gallery_section -> clicks = 0;

		R::store($gallery_section);

		return redirect('admin_gallery') -> with('success', 'Gallery section was created.');

	}

	public function addPictureOnGallery(Request $req) {

		$max_avatar_size = 3 * 1024 * 1024;

		$i = 1;
		while($i <= 201) {

			$fil_path = '';
			eval('$file = $req -> img_'.$i.';');
			if(!$file) {
				$i++;
				continue;
			}

			$req -> validate([
				'img_'.$i.'_title' => 'required|min:4|max:25',
				'img_'.$i.'_title_ru' => 'required|min:4|max:25',
			]);

			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['imgs' => 'Incorrect image '.$i.' extension.']);
			}

			if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['imgs' => 'The image '.$i.' is too heavy.']);
			}

			$fil_path = date("YmdHis").rand(0, 99999999).".jpg";


			$gl = R::dispense("gallery");

			eval('$gl -> title = $req -> img_'.$i.'_title;');
			eval('$gl -> title_ru = $req -> img_'.$i.'_title_ru;');
			$gl -> img = $fil_path;
			$gl -> sec_id = $req -> section;

			R::store($gl);
			Image::make($file->path())->save(public_path('upl_data/gallery/').$fil_path, 100, 'jpg');

			$i++;
		}

		return redirect('admin_gallery') -> with('success', 'Gallery pucture was created.');
	}

	public function updCityTour(Request $req) {
		$req -> validate([
			'title' => 'required|min:4|max:20',
			'title_ru' => 'required|min:4|max:20',
			'text' => 'required|min:20|max:6000',
			'text_ru' => 'required|min:20|max:6000',
			'historial_places' => 'required|min:20|max:2700',
			'historial_places_ru' => 'required|min:20|max:2700',
		]);

		$max_avatar_size = 3 * 1024 * 1024;

		if(isset($req -> wallpaper_img)) {

			$file = $req -> wallpaper_img;
			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['wallpaper_img' => 'Incorrect Wallpaper image extension.']);
			}

			if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['wallpaper_img' => 'The Wallpaper image is too heavy.']);
			}

			$wlpp = date("YmdHis").rand(0, 99999999).".jpg";

			Image::make($file->path())->save(public_path('upl_data/wallpapers/').$wlpp, 100, 'jpg');
		}
		
		$imgs_json = [];
		$img_titles_json = [];
		$img_titles_ru_json = [];
		
		$blog = R::findOne("city_tours", "id = ?", [$req -> id]);
		$gallery = json_decode($blog -> img, true);
		$i = 1;
		while($i <= 6) {
			$fil_path = '';

			// eval('$file = $req -> img_'.$i.';');
			// if(!$file) {
			// 	$imgs_json['img_'.$i] = '';
			// 	$img_titles_json['img_'.$i.'_title'] = '';
			// 	$img_titles_ru_json['img_'.$i.'_title_ru'] = '';
			// 	$i++;
			// 	continue;
			// }

			eval('$file = $req -> img_'.$i.';');
			eval('$fil_ttl = $req -> img_'.$i.'_title;');
			eval('$fil_ttl_ru = $req -> img_'.$i.'_title_ru;');
			if(!$file) {
				$imgs_json['img_'.$i] = (isset($gallery['img_'.$i])) ? $gallery['img_'.$i] : "";
				$img_titles_json['img_'.$i.'_title'] = $fil_ttl;
				$img_titles_ru_json['img_'.$i.'_title'] = $fil_ttl_ru;
				$i++;
				continue;
			}

			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['imgs' => 'Incorrect image '.$i.' extension.']);
			}

			if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['imgs' => 'The image '.$i.' is too heavy.']);
			}

			$fil_path = date("YmdHis").rand(0, 99999999).".jpg";

			Image::make($file->path())->save(public_path('upl_data/imgs/').$fil_path, 100, 'jpg');

			eval('$fil_ttl = $req -> img_'.$i.'_title;');
			eval('$fil_ttl_ru = $req -> img_'.$i.'_title;');

			$imgs_json['img_'.$i] = $fil_path;
			$img_titles_json['img_'.$i.'_title'] = $fil_ttl;
			$img_titles_ru_json['img_'.$i.'_title'] = $fil_ttl_ru;

			$i++;
		}

		if(in_array('embed', explode('/', $req -> video))) {
			$vd_url = $req -> video;
		} else {
			$vd_url = 'https://youtube.com/embed/'.array_reverse(explode('/', $req -> video))[0];
		}

		// $blog = R::dispense("city_tours");


		$blog -> title = $req -> title;
		$blog -> title_ru = $req -> title_ru;
		if(isset($wlpp)) $blog -> wallpaper = $wlpp;
		$blog -> text = $req -> text;
		$blog -> text_ru = $req -> text_ru;
		$blog -> video = $vd_url;
		$blog -> historial_places = $req -> historial_places;
		$blog -> historial_places_ru = $req -> historial_places_ru;
		$blog -> img = (string)json_encode($imgs_json);
		$blog -> img_titles = (string)json_encode($img_titles_json);
		$blog -> img_titles_ru = (string)json_encode($img_titles_ru_json);
		$blog -> views = 0;
		$blog -> date = date("m d, Y");

		R::store($blog);

		return redirect('admin') -> with('success', 'City tour was updated.');

	}

	public function addTour(Request $req) {

		// echo str_replace(":star:", "★", $req -> tour_plan_data_1);
		// echo str_replace(":dot:", "⊙", str_replace("\r\n", "<br>", $req -> tour_plan_data_1));
		// echo str_replace(":c:", "<i class="ri-check-line text-[#22C55E] text-2xl mr-2"></i>", str_replace("\r\n", "<br>", $req -> tour_plan_data_1));
		// echo str_replace(":x:", "<i class="ri-close-line text-[#DC2626] text-2xl mr-2"></i>", str_replace("\r\n", "<br>", $req -> tour_plan_data_1));
		// dd($req);
		$req -> validate([
			'title' => 'required|min:4|max:30',
			'title_ru' => 'required|min:4|max:30',
			'address' => 'required|min:4|max:55',
			'price' => 'required|numeric',
			'price_ru' => 'required|numeric',
			'duration_days' => 'required|numeric',
			'duration_nights' => 'required|numeric',
			'group' => 'required|min:1|max:5',
			'interest_places' => 'required|numeric',
			'departure_location' => 'required|min:4|max:55',
			'departure_time' => 'required|min:3|max:40',
			'return_time' => 'required|min:4|max:40',
			'return_time_ru' => 'required|min:4|max:40',
			'dress_code' => 'required|min:4|max:100',
			'dress_code_ru' => 'required|min:4|max:120',
			'price_includes' => 'required|min:4|max:2050',
			'price_includes_ru' => 'required|min:4|max:2050',
			'price_excludes' => 'required|min:4|max:2050',
			'price_excludes_ru' => 'required|min:4|max:2050',
			'important_info' => 'required|min:20|max:550',
			'important_info_ru' => 'required|min:20|max:625',
			'info_text' => 'required|min:20|max:6400',
			'info_text_ru' => 'required|min:20|max:6400',
		]);

		$max_avatar_size = 3 * 1024 * 1024;

		if(empty($req -> wallpaper_img)) {
			return back() -> withErrors(['wallpaper' => 'Wallpaper image not found.']);
		}

		$file = $req -> wallpaper_img;
		$type = $file -> getMimeType();
		$error = $file -> getError();
		$size = $file -> getSize();

		if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
			return back() -> withErrors(['wallpaper' => 'Incorrect Wallpaper image extension.']);
		}

		if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
			return back() -> withErrors(['wallpaper' => 'The Wallpaper image is too heavy.']);
		}

		$wlpp = date("YmdHis").rand(0, 99999999).".jpg";

		
		

		if(empty($req -> preview_img)) {
			return back() -> withErrors(['preview' => 'Wallpaper image not found.']);
		}

		$file2 = $req -> preview_img;
		$type2 = $file2 -> getMimeType();
		$error2 = $file2 -> getError();
		$size2 = $file2 -> getSize();
		
		if(($type2 != "image/png") and ($type2 != "image/jpg") and ($type2 != "image/jpeg")) {
			return back() -> withErrors(['preview' => 'Incorrect preview image extension.']);
		}

		if(($size2 > $max_avatar_size) || ($error2 == 2) || ($error2 == 1)) {
			return back() -> withErrors(['preview' => 'The preview image is too heavy.']);
		}
		
		$prv = date("YmdHis").rand(0, 99999999).".jpg";

		
		$days_json = [];
		$days_ru_json = [];
		// $day_titles_json = [];
		// $day_titles_ru_json = [];

		
		$i = 1;
		$i2 = 1;
		while($i <= 50) {
			
			eval('$tour_title = @$req -> tour_plan_title_'.$i.';');
			if(!@$tour_title) {
				$i++;
				continue;
			}
			
			$req -> validate([
				'tour_plan_title_'.$i => 'required|min:4|max:30',
				'tour_plan_title_ru_'.$i => 'required|min:4|max:30',
				'tour_plan_data_'.$i => 'required|min:4|max:2200',
				'tour_plan_data_ru_'.$i => 'required|min:4|max:2200',
			]);

			eval('$ttl = $req -> tour_plan_title_'.$i.';');
			eval('$ttl_ru = $req -> tour_plan_title_ru_'.$i.';');
			
			eval('$dt = $req -> tour_plan_data_'.$i.';');
			eval('$dt_ru = $req -> tour_plan_data_ru_'.$i.';');
			
			$days_json['day_'.$i2] = [];
			$days_json['day_'.$i2]['title'] = $ttl;
			$days_json['day_'.$i2]['data'] = $dt;

			$days_ru_json['day_'.$i2] = [];
			$days_ru_json['day_'.$i2]['title'] = $ttl_ru;
			$days_ru_json['day_'.$i2]['data'] = $dt_ru;
			
			$i++;
			$i2++;
		}

		$tour = R::dispense("tours");
		
		// $tour = R::findOne("city_tours", "id = ?", [$req -> id]);
		
		$tour -> title = $req -> title;
		$tour -> title_ru = $req -> title_ru;
		$tour -> address = $req -> address;
		if(isset($wlpp)) $tour -> wallpaper = $wlpp;
		$tour -> price = $req -> price;
		$tour -> price_ru = $req -> price_ru;
		if(isset($prv)) $tour -> preview = $prv;
		$tour -> duration = '{"duration_days":"'.$req -> duration_days.'", "duration_nights":"'.$req -> duration_nights.'"}';
		$tour -> interest_places = $req -> interest_places;
		$tour -> group = $req -> group;
		$tour -> info_text = $req -> info_text;
		$tour -> info_text_ru = $req -> info_text_ru;
		$tour -> departure_location = $req -> departure_location;
		$tour -> departure_time = $req -> departure_time;
		$tour -> return_time = $req -> return_time;
		$tour -> return_time_ru = $req -> return_time_ru;
		$tour -> dress_code = $req -> dress_code;
		$tour -> dress_code_ru = $req -> dress_code_ru;
		$tour -> price_includes = $req -> price_includes;
		$tour -> price_includes_ru = $req -> price_includes_ru;
		$tour -> price_excludes = $req -> price_excludes;
		$tour -> price_excludes_ru = $req -> price_excludes_ru;
		$tour -> important_info = $req -> important_info;
		$tour -> important_info_ru = $req -> important_info_ru;
		$tour -> tour_plan_data = json_encode($days_json);
		$tour -> tour_plan_data_ru = json_encode($days_ru_json);
		$tour -> views = 0;
		// $tour ->  = 0;
		
		R::store($tour);
		if(isset($wlpp)) Image::make($file->path())->save(public_path('upl_data/wallpapers/').$wlpp, 100, 'jpg');
		if(isset($prv)) Image::make($file2->path())->save(public_path('upl_data/prevs/').$prv, 100, 'jpg');
		
		return redirect('admin_tour') -> with('success', 'Tour was created.');
		
	}

	public function updTour(Request $req) {

		$req -> validate([
			'title' => 'required|min:4|max:30',
			'title_ru' => 'required|min:4|max:30',
			'address' => 'required|min:4|max:55',
			'price' => 'required|numeric',
			'price_ru' => 'required|numeric',
			'duration_days' => 'required|numeric',
			'duration_nights' => 'required|numeric',
			'group' => 'required|min:1|max:5',
			'interest_places' => 'required|numeric',
			'departure_location' => 'required|min:4|max:55',
			'departure_time' => 'required|min:3|max:40',
			'return_time' => 'required|min:4|max:40',
			'return_time_ru' => 'required|min:4|max:40',
			'dress_code' => 'required|min:4|max:100',
			'dress_code_ru' => 'required|min:4|max:120',
			'price_includes' => 'required|min:4|max:2050',
			'price_includes_ru' => 'required|min:4|max:2050',
			'price_excludes' => 'required|min:4|max:2050',
			'price_excludes_ru' => 'required|min:4|max:2050',
			'important_info' => 'required|min:20|max:550',
			'important_info_ru' => 'required|min:20|max:625',
			'info_text' => 'required|min:20|max:6400',
			'info_text_ru' => 'required|min:20|max:6400',
		]);

		$max_avatar_size = 3 * 1024 * 1024;

		if(isset($req -> wallpaper_img)) {

			$file = $req -> wallpaper_img;
			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['wallpaper_img' => 'Incorrect Wallpaper image extension.']);
			}

			if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['wallpaper_img' => 'The Wallpaper image is too heavy.']);
			}

			$wlpp = date("YmdHis").rand(0, 99999999).".jpg";

		}

		if(isset($req -> preview_img)) {

			$file2 = $req -> preview_img;
			$type = $file2 -> getMimeType();
			$error = $file2 -> getError();
			$size = $file2 -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['preview_img' => 'Incorrect Preview image extension.']);
			}

			if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['preview_img' => 'The Preview image is too heavy.']);
			}

			$prv = date("YmdHis").rand(0, 99999999).".jpg";

		}
		
		$days_json = [];
		$days_ru_json = [];
		// $day_titles_json = [];
		// $day_titles_ru_json = [];

		
		$i = 1;
		$i2 = 1;
		while($i <= 50) {
			
			eval('$tour_title = @$req -> tour_plan_title_'.$i.';');
			if(!@$tour_title) {
				$i++;
				continue;
			}
			
			$req -> validate([
				'tour_plan_title_'.$i => 'required|min:4|max:30',
				'tour_plan_title_ru_'.$i => 'required|min:4|max:30',
				'tour_plan_data_'.$i => 'required|min:4|max:2450',
				'tour_plan_data_ru_'.$i => 'required|min:4|max:2450',
			]);

			eval('$ttl = $req -> tour_plan_title_'.$i.';');
			eval('$ttl_ru = $req -> tour_plan_title_ru_'.$i.';');
			
			eval('$dt = $req -> tour_plan_data_'.$i.';');
			eval('$dt_ru = $req -> tour_plan_data_ru_'.$i.';');
			
			$days_json['day_'.$i2] = [];
			$days_json['day_'.$i2]['title'] = $ttl;
			$days_json['day_'.$i2]['data'] = $dt;

			$days_ru_json['day_'.$i2] = [];
			$days_ru_json['day_'.$i2]['title'] = $ttl_ru;
			$days_ru_json['day_'.$i2]['data'] = $dt_ru;
			
			$i++;
			$i2++;
		}

		$tour = R::findOne("tours", "id = ?", [$req -> id]);
		
		// $tour = R::findOne("city_tours", "id = ?", [$req -> id]);
		
		$tour -> title = $req -> title;
		$tour -> title_ru = $req -> title_ru;
		$tour -> address = $req -> address;
		if(isset($wlpp)) $tour -> wallpaper = $wlpp;
		$tour -> price = $req -> price;
		$tour -> price_ru = $req -> price_ru;
		if(isset($prv)) $tour -> preview = $prv;
		$tour -> duration = '{"duration_days":"'.$req -> duration_days.'", "duration_nights":"'.$req -> duration_nights.'"}';
		$tour -> interest_places = $req -> interest_places;
		$tour -> group = $req -> group;
		$tour -> info_text = $req -> info_text;
		$tour -> info_text_ru = $req -> info_text_ru;
		$tour -> departure_location = $req -> departure_location;
		$tour -> departure_time = $req -> departure_time;
		$tour -> return_time = $req -> return_time;
		$tour -> return_time_ru = $req -> return_time_ru;
		$tour -> dress_code = $req -> dress_code;
		$tour -> dress_code_ru = $req -> dress_code_ru;
		$tour -> price_includes = $req -> price_includes;
		$tour -> price_includes_ru = $req -> price_includes_ru;
		$tour -> price_excludes = $req -> price_excludes;
		$tour -> price_excludes_ru = $req -> price_excludes_ru;
		$tour -> important_info = $req -> important_info;
		$tour -> important_info_ru = $req -> important_info_ru;
		$tour -> tour_plan_data = json_encode($days_json);
		$tour -> tour_plan_data_ru = json_encode($days_ru_json);
		$tour -> views = 0;
		// $tour ->  = 0;
		
		R::store($tour);
		if(isset($wlpp)) Image::make($file->path())->save(public_path('upl_data/wallpapers/').$wlpp, 100, 'jpg');
		if(isset($prv)) Image::make($file2->path())->save(public_path('upl_data/prevs/').$prv, 100, 'jpg');
		
		return redirect('admin') -> with('success', 'Tour was updated.');
		
	}

	public function delPostBlog(Request $req) {
		if(isset($req -> id) && isset($_SESSION['admin'])) {
			$post = R::findOne("blog", "id = ?", [$req -> id]);
			R::trash($post);
			echo "true";
		} else {
			echo false;
		}
	}

	public function delAdmin(Request $req) {
		if(isset($req -> id) && isset($_SESSION['admin']) && @$_SESSION['admin'] -> level >= 5) {
			$adm = R::findOne("admins", "id = ? AND level < ?", [$req -> id, 5]);
			R::trash($adm);
			echo "true";
		} else {
			echo false;
		}
	}

	public function delTour(Request $req) {
		if(isset($req -> id) && isset($_SESSION['admin'])) {
			$tour = R::findOne("tours", "id = ?", [$req -> id]);
			R::trash($tour);
			echo "true";
		} else {
			echo false;
		}
	}

	public function delGallery(Request $req) {
		if(isset($req -> id) && isset($_SESSION['admin'])) {
			$gallery = R::findOne("gallery", "id = ?", [$req -> id]);
			R::trash($gallery);
			echo "true";
		} else {
			echo false;
		}
	}

	public function delSecGallery(Request $req) {
		if(isset($req -> id) && isset($_SESSION['admin'])) {
			$sec_gallery = R::findOne("gallery_sec", "id = ?", [$req -> id]);
			R::trash($sec_gallery);
			echo "true";
		} else {
			echo false;
		}
	}

	public function delCar(Request $req) {
		if(isset($req -> id) && isset($_SESSION['admin'])) {
			$car = R::findOne("cars", "id = ?", [$req -> id]);
			R::trash($car);
			echo "true";
		} else {
			echo false;
		}
	}

	public function addCar(Request $req) {
		$req -> validate([
			'car_name' => 'required|min:4|max:25',
			'car_name_ru' => 'required|min:4|max:25',
			'car_description' => 'required|min:4|max:60',
			'car_description_ru' => 'required|min:4|max:60',
			'price' => 'required|numeric',
			'price_ru' => 'required|numeric',
		]);

		$max_avatar_size = 3 * 1024 * 1024;

		if(empty($req -> car_img)) {
			return back() -> withErrors(['car_img' => 'Wallpaper image not found.']);
		}

		$file = $req -> car_img;
		$type = $file -> getMimeType();
		$error = $file -> getError();
		$size = $file -> getSize();

		if(empty($req -> car_img)) {
			return back() -> withErrors(['car_img' => 'Preview image not found.']);
		}
		if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
			return back() -> withErrors(['car_img' => 'Incorrect Wallpaper image extension.']);
		}

		if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
			return back() -> withErrors(['car_img' => 'The Wallpaper image is too heavy.']);
		}

		$crs = date("YmdHis").rand(0, 99999999).".jpg";

		Image::make($file->path())->save(public_path('upl_data/imgs/').$crs, 100, 'jpg');


		$cars = R::dispense("cars");

		$cars -> car_name = $req -> car_name;
		$cars -> car_name_ru = $req -> car_name_ru;
		$cars -> car_description = $req -> car_description;
		$cars -> car_description_ru = $req -> car_description_ru;
		$cars -> category = $req -> category;
		$cars -> price = $req -> price;
		$cars -> price_ru = $req -> price_ru;
		$cars -> wallpaper = $crs;

		R::store($cars);

		return redirect('admin') -> with('success', 'Car was created.');

	}

	public function updHomeWall(Request $req) {
		$req -> validate([
			'title_1' => 'required|min:4|max:50',
			'title_1_ru' => 'required|min:4|max:50',
			'sub_title_1' => 'required|min:4|max:50',
			'sub_title_1_ru' => 'required|min:4|max:50',

			'title_2' => 'required|min:4|max:50',
			'title_2_ru' => 'required|min:4|max:50',
			'sub_title_2' => 'required|min:4|max:50',
			'sub_title_2_ru' => 'required|min:4|max:50',

			'title_3' => 'required|min:4|max:50',
			'title_3_ru' => 'required|min:4|max:50',
			'sub_title_3' => 'required|min:4|max:50',
			'sub_title_3_ru' => 'required|min:4|max:50',

		]);

		$max_avatar_size = 3 * 1024 * 1024;

		if(isset($req -> wall_1)) {

			$file = $req -> wall_1;
			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
			return back() -> withErrors(['admin_home_wallpaper' => 'Incorrect Wallpaper image extension.']);
		}

		if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
			return back() -> withErrors(['admin_home_wallpaper' => 'The Wallpaper image is too heavy.']);
		}

			$wlpp = date("YmdHis").rand(0, 99999999).".jpg";

		}
		
		if(isset($req -> wall_2)) {

			$file2 = $req -> wall_2;
			$type = $file2 -> getMimeType();
			$error = $file2 -> getError();
			$size = $file2 -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
			return back() -> withErrors(['admin_home_wallpaper' => 'Incorrect Wallpaper image extension.']);
		}

		if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
			return back() -> withErrors(['admin_home_wallpaper' => 'The Wallpaper image is too heavy.']);
		}

			$wlpp2 = date("YmdHis").rand(0, 99999999).".jpg";

		}

		if(isset($req -> wall_3)) {

			$file3 = $req -> wall_3;
			$type = $file3 -> getMimeType();
			$error = $file3 -> getError();
			$size = $file3 -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
			return back() -> withErrors(['admin_home_wallpaper' => 'Incorrect Wallpaper image extension.']);
		}

		if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
			return back() -> withErrors(['admin_home_wallpaper' => 'The Wallpaper image is too heavy.']);
		}

			$wlpp3 = date("YmdHis").rand(0, 99999999).".jpg";

		}

		$data = R::findOne('wall_slide', 'id = ?', [1]);
		$data2 = R::findOne('wall_slide', 'id = ?', [2]);
		$data3 = R::findOne('wall_slide', 'id = ?', [3]);


		$data -> title = $req -> title_1;
		$data -> title_ru = $req -> title_1_ru;
		$data -> sub_title = $req -> sub_title_1;
		$data -> sub_title_ru = $req -> sub_title_1_ru;
		if(isset($wlpp)) $data -> img = $wlpp;

		$data2 -> title = $req -> title_2;
		$data2 -> title_ru = $req -> title_2_ru;
		$data2 -> sub_title = $req -> sub_title_2;
		$data2 -> sub_title_ru = $req -> sub_title_2_ru;
		if(isset($wlpp2)) $data2 -> img = $wlpp2;

		$data3 -> title = $req -> title_3;
		$data3 -> title_ru = $req -> title_3_ru;
		$data3 -> sub_title = $req -> sub_title_3;
		$data3 -> sub_title_ru = $req -> sub_title_3_ru;
		if(isset($wlpp3)) $data3 -> img = $wlpp3;

		R::store($data);
		R::store($data2);
		R::store($data3);

		if(isset($wlpp)) Image::make($file->path())->save(public_path('upl_data/wallpapers/').$wlpp, 100, 'jpg');
		if(isset($wlpp2)) Image::make($file2->path())->save(public_path('upl_data/wallpapers/').$wlpp2, 100, 'jpg');
		if(isset($wlpp3)) Image::make($file3->path())->save(public_path('upl_data/wallpapers/').$wlpp3, 100, 'jpg');


		return redirect('admin_home_wallpaper') -> with('success', 'Wall was updated.');

	}

	public function addTextPage(Request $req) {
		$req -> validate([
			'title' => 'required|min:4|max:18',
			'title_ru' => 'required|min:4|max:18',
			'header' => 'required|min:4|max:60',
			'header_ru' => 'required|min:4|max:60',
			'text' => 'required|min:4|max:30000',
			'text_ru' => 'required|min:4|max:32000',
		]);

		$max_avatar_size = 3 * 1024 * 1024;

		if(empty($req -> wallpaper_img)) {
			return back() -> withErrors(['wallpaper_img' => 'Wallpaper image not found.']);
		}

		$file = $req -> wallpaper_img;
		$type = $file -> getMimeType();
		$error = $file -> getError();
		$size = $file -> getSize();

		if(empty($req -> wallpaper_img)) {
			return back() -> withErrors(['wallpaper_img' => 'Preview image not found.']);
		}
		if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
			return back() -> withErrors(['wallpaper_img' => 'Incorrect Wallpaper image extension.']);
		}

		if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
			return back() -> withErrors(['wallpaper_img' => 'The Wallpaper image is too heavy.']);
		}

		$wlpp = date("YmdHis").rand(0, 99999999).".jpg";

		Image::make($file->path())->save(public_path('upl_data/wallpapers/').$wlpp, 100, 'jpg');


		$page = R::dispense("text_pages");

		$page -> title = $req -> title;
		$page -> title_ru = $req -> title_ru;
		$page -> header = $req -> header;
		$page -> header_ru = $req -> header_ru;
		$page -> text = $req -> text;
		$page -> text_ru = $req -> text_ru;
		$page -> img = $wlpp;

		R::store($page);

		return redirect('admin') -> with('success', 'Page was created.');

	}

	public function updTextPage(Request $req) {
		$req -> validate([
			'title' => 'required|min:4|max:18',
			'title_ru' => 'required|min:4|max:18',
			'header' => 'required|min:4|max:60',
			'header_ru' => 'required|min:4|max:60',
			'text' => 'required|min:4|max:30000',
			'text_ru' => 'required|min:4|max:32000',
		]);

		$max_avatar_size = 3 * 1024 * 1024;

		if(!isset($req -> id)) {
			return false;
		}

		if(isset($req -> wallpaper_img)) {

			$file = $req -> wallpaper_img;
			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['wallpaper_img' => 'Incorrect Wallpaper image extension.']);
			}

			if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['wallpaper_img' => 'The Wallpaper image is too heavy.']);
			}

			$wlpp = date("YmdHis").rand(0, 99999999).".jpg";

			Image::make($file->path())->save(public_path('upl_data/wallpapers/').$wlpp, 100, 'jpg');
		
		}

		$page = R::findOne("text_pages", "id = ?", [$req -> id]);

		$page -> title = $req -> title;
		$page -> title_ru = $req -> title_ru;
		$page -> header = $req -> header;
		$page -> header_ru = $req -> header_ru;
		$page -> text = $req -> text;
		$page -> text_ru = $req -> text_ru;
		if(isset($wlpp)) $page -> img = $wlpp;

		R::store($page);

		return redirect('admin') -> with('success', 'Page was updated.');

	}

	public function delTextPage(Request $req) {
		if(isset($req -> id) && isset($_SESSION['admin'])) {
			$text_page = R::findOne("text_pages", "id = ?", [$req -> id]);
			R::trash($text_page);
			echo "true";
		} else {
			echo false;
		}
	}

}