<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// User section

Route::get('/', function () {
	return view('home');
}) -> name('home');

Route::get('/tourism', function () {
	return view('tourism');
}) -> name('tourism');

Route::get('/gallery', function () {
	return view('gallery');
}) -> name('gallery');

Route::get('/gallery_sub', function () {
	return view('gallery_sub');
}) -> name('gallery_sub');

Route::get('/blog_sub', function () {
	return view('blog_sub');
}) -> name('blog_sub');

Route::get('/blog', function () {
	return view('blog');
}) -> name('blog');

Route::get('/tour', function () {
	return view('tour');
}) -> name('tour');


Route::get('/tour_cities', function () {
	return view('tour_cities');
}) -> name('tour_cities');

Route::get('/contact', function () {
	return view('contact');
}) -> name('contact');

Route::get('/destinations', function () {
	return view('destinations');
}) -> name('destinations');

Route::get('/car', function () {
	return view('car');
}) -> name('car');

Route::get('/text_page', function () {
	return view('text_page');
}) -> name('text_page');

Route::get('/about', function () {
	return view('about');
}) -> name('about');


// Admin section

Route::get('/admin', function () {
	if(isset($_SESSION['admin'])) { 
		return view('admin');
	} else {
		abort(404);
	}
}) -> name('admin');

Route::get('/admin_signin', function () {
	if(isset($_SESSION['admin'])) { 
		abort(404);
	} else {
		return view('admin_signin');
	}
}) -> name('admin_signin');

Route::post(
	'/sign_in_admin_c',
	'App\Http\Controllers\AdminController@signInAdmin'
) -> name('signInAdminC');

if(isset($_SESSION['admin'])) {

	Route::get('/admin_blog', function () {
		return view('admin_blog');
	}) -> name('admin_blog');

	Route::get('/admin_blog_upd', function () {
		return view('admin_blog_upd');
	}) -> name('admin_blog_upd');

	Route::get('/admin_tour', function () {
		return view('admin_tour');
	}) -> name('admin_tour');

	Route::get('/admin_tour_upd', function () {
		return view('admin_tour_upd');
	}) -> name('admin_tour_upd');

	Route::get('/admin_cities_blog', function () {
		return view('admin_cities_blog');
	}) -> name('admin_cities_blog');

	Route::get('/admin_gallery', function () {
		return view('admin_gallery');
	}) -> name('admin_gallery');

	Route::get('/admin_home_wallpaper', function () {
		return view('admin_home_wallpaper');
	}) -> name('admin_home_wallpaper');

	Route::get('/admin_cars', function () {
		return view('admin_cars');
	}) -> name('admin_cars');

	Route::get('/admin_tourism', function () {
		return view('admin_tourism');
	}) -> name('admin_tourism');

	Route::post(
		'/add_post_on_blog_c',
		'App\Http\Controllers\AdminController@addPostOnBlog'
	) -> name('addPostOnBlogC');

	Route::post(
		'/upd_post_on_blog_c',
		'App\Http\Controllers\AdminController@updPostOnBlog'
	) -> name('updPostOnBlogC');

	Route::post(
		'/upd_post_on_tourism_c',
		'App\Http\Controllers\AdminController@updPostOnTourism'
	) -> name('updPostOnTourismC');

	Route::post(
		'/add_section_on_gallery_c',
		'App\Http\Controllers\AdminController@addSectionOnGallery'
	) -> name('add_section_on_gallery_c');

	Route::post(
		'/add_picture_on_gallery_c',
		'App\Http\Controllers\AdminController@addPictureOnGallery'
	) -> name('add_picture_on_gallery_c');

	Route::post(
		'/upd_city_tour_c',
		'App\Http\Controllers\AdminController@updCityTour'
	) -> name('updCityTourC');

	Route::post(
		'/add_tour_c',
		'App\Http\Controllers\AdminController@addTour'
	) -> name('addTourC');

	Route::post(
		'/upd_tour_c',
		'App\Http\Controllers\AdminController@updTour'
	) -> name('updTourC');

	Route::post(
		'add_car_c',
		'App\Http\Controllers\AdminController@addCar'
	) -> name('addCarC');

	Route::post(
		'uod_home_wall_c',
		'App\Http\Controllers\AdminController@updHomeWall'
	) -> name('updHomeWallC');

	
	Route::delete(
		'del_post_blog_c',
		'App\Http\Controllers\AdminController@delPostBlog'
	) -> name('delPostBlogC');

	Route::delete(
		'del_tour_c',
		'App\Http\Controllers\AdminController@delTour'
	) -> name('delTourC');

	Route::delete(
		'del_gallery_c',
		'App\Http\Controllers\AdminController@delGallery'
	) -> name('delGalleryC');

	Route::delete(
		'del_sec_gallery_c',
		'App\Http\Controllers\AdminController@delSecGallery'
	) -> name('delSecGalleryC');

	Route::delete(
		'del_car_c',
		'App\Http\Controllers\AdminController@delCar'
	) -> name('delCarC');
	
	if($_SESSION['admin'] -> level >= 5) {
		Route::get('/admin_creator', function () {
			return view('admin_creator');
		}) -> name('admin_creator');

		Route::post(
			'/add_admin_c',
			'App\Http\Controllers\AdminController@addAdmin'
		) -> name('addAdminC');

		Route::delete(
			'/del_admin_c',
			'App\Http\Controllers\AdminController@delAdmin'
		) -> name('delAdminC');
	}
}

// Route::post(
// 	'/',
// 	'App\Http\Controllers\AdminController@'
// ) -> name('');