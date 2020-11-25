<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\ResourceController;


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




//Frontend Routes
Route::get('/', [FrontendController::class, 'home_page'])->name('frontend.home'); //home page
Route::get('/all/news', [FrontendController::class, 'all_news'])->name('frontend.all_news'); //all news
Route::get('/news/view/{news}', [FrontendController::class, 'single_news'])->name('frontend.single_news'); //single news
Route::get('/all/posts', [FrontendController::class, 'all_posts'])->name('frontend.all_posts'); //all posts
Route::get('/post/view/{post}', [FrontendController::class, 'single_post'])->name('frontend.single_post'); //single post
Route::get('/all/events', [FrontendController::class, 'all_events'])->name('frontend.all_events'); //all events
Route::get('/events/view/{event}', [FrontendController::class, 'single_event'])->name('frontend.single_event'); //single event
Route::get('/all/resources', [FrontendController::class, 'all_resources'])->name('frontend.all_resources'); //all resources
Route::get('/resources/books/{book}', [FrontendController::class, 'single_book'])->name('frontend.single_book'); //single book
Route::get('/download/book/{id}', [FrontendController::class, 'download_book'])->name('download.book');
Route::get('/resources/video/{video}', [FrontendController::class, 'single_video'])->name('frontend.single_video');






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Backend Routes
Route::get('/register/user', [UserController::class, 'register_page'])->name('user.register_page');
Route::post('/register/user', [UserController::class, 'register'])->name('user.register');
Route::get('/users/all', [UserController::class, 'all_users'])->name('user.all');
Route::post('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');


//Posts Routes
Route::get('/posts/new', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/all', [PostController::class, 'all_post'])->name('posts.all_post');
Route::get('/posts/manage', [PostController::class, 'manage_post'])->name('posts.manage_post');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::put('/posts/{post}/edit', [PostController::class, 'update'])->name('posts.update');
Route::post('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


//News Routes
Route::get('/news/new', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/all', [NewsController::class, 'all_news'])->name('news.all_news');
Route::get('/news/manage', [NewsController::class, 'manage_news'])->name('news.manage_news');
Route::post('/news/store', [NewsController::class, 'store'])->name('news.store');
Route::put('/news/{news}', [NewsController::class, 'update'])->name('news.update');
Route::post('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');



//Event Routes
Route::get('/event', [EventController::class, 'index'])->name('event.index');
Route::get('/event/manage', [EventController::class, 'manage_event'])->name('event.manage_event');
Route::post('/event', [EventController::class, 'store'])->name('event.store');
Route::put('/event/{event}', [EventController::class, 'update'])->name('event.update');
Route::post('/event/{event}', [EventController::class, 'destroy'])->name('event.destroy');


//Resource routes
Route::get('/resources/new', [ResourceController::class, 'index'])->name('resource.index');
Route::get('/resources/all', [ResourceController::class, 'all_resources'])->name('resource.all_resources');
Route::post('/resources/add', [ResourceController::class, 'store'])->name('resource.store');
Route::post('/resources/{resource}', [ResourceController::class, 'destroy'])->name('resource.destroy');
Route::put('/resources/{resource}', [ResourceController::class, 'update'])->name('resource.update');
