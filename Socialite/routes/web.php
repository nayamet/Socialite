<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SaveController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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


//google
Route::get('/google/callback',[GoogleController::class, 'handleGoogleCallBack'])->name('google.callback');

//login & registration
Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::get('/registration',[RegistrationController::class, 'registration'])->name('registration');

Route::get('/registration/google',[RegistrationController::class, 'registrationGoogle'])->name('registration.google');
Route::get('/login/google',[LoginController::class, 'loginGoogle'])->name('login.google');

Route::post('/registration/submit',[RegistrationController::class, 'registrationSubmit'])->name('registration.submit');
Route::post('/login/submit',[LoginController::class, 'loginSubmit'])->name('login.submit');

Route::get('/registration/google/submit',[RegistrationController::class, 'registrationGoogleSubmit'])->name('registration.google.submit');
Route::get('/login/google/submit',[LoginController::class, 'loginGoogleSubmit'])->name('login.google.submit');

//general login
Route::group(['middleware' => ['general-auth']], function()
{
    //home
    Route::get('/home',[HomeController::class, 'home'])->name('home');

    //post
    Route::post('/post/create',[PostController::class, 'postCreate'])->name('post.create');
    Route::get('/post/myposts',[PostController::class, 'myPosts'])->name('my.posts');
    Route::get('/post/editposts',[PostController::class, 'postEdit'])->name('post.edit');
    Route::post('/post/editposts/submit',[PostController::class, 'postEditSubmit'])->name('post.edit.submit');
    Route::get('/post/delete',[PostController::class, 'postDelete'])->name('post.delete');

    //logout
    Route::get('/logout',[LogoutController::class, 'logout'])->name('logout');

    //like
    Route::get('/like/create', [LikeController::class, 'likeCreate'])->name('like');

    //save
    Route::get('/save/create', [SaveController::class, 'saveCreate'])->name('save');
    Route::get('/save/show', [SaveController::class, 'saveShow'])->name('save.show');

    //comment
    Route::get('/comment/view', [CommentController::class, 'commentView'])->name('comment.view');
    Route::post('/comment/create',[CommentController::class, 'commentCreate'])->name('comment.create');
    Route::get('/comment/edit', [CommentController::class, 'commentEdit'])->name('comment.edit');
    Route::post('/comment/edit/submit', [CommentController::class, 'commentEditSubmit'])->name('comment.edit.submit');
    Route::get('/comment/delete', [CommentController::class, 'commentDelete'])->name('comment.delete');

    //Profile
    Route::get('/profile',[ProfileController::class,'getProfileData'])->name('profile');
    Route::get('/profile/id',[ProfileController::class,'getProfileById'])->name('profile.id');

    //edit profile
    Route::get('/editProfile',[ProfileController::class,'editProfileData'])->name('editProfile');
    Route::post('/editProfile',[ProfileController::class,'editProfileDataSubmit'])->name('editProfileSubmit');

    //work Profile
    Route::get('/workProfile',[ProfileController::class, 'getWorkProfile'])->name('workProfile')->middleware('general.auth');
    Route::get('/addWorkProfile',[ProfileController::class, 'addWorkProfile'])->name('addWorkProfile')->middleware('general.auth');
    Route::post('/addWorkProfile',[ProfileController::class,'addWorkProfileSubmit'])->name('addWorkProfileSubmit')->middleware('general.auth');
    Route::get('/deleteWorkProfile/{id?}',[ProfileController::class,'deleteWorkProfile'])->name('deleteWorkProfile')->middleware('general.auth');
    Route::get('/editWorkProfile/{id?}',[ProfileController::class,'editWorkProfile'])->name('editWorkProfile')->middleware('general.auth');
    Route::post('/editWorkProfile}',[ProfileController::class,'editWorkProfileSubmit'])->name('editWorkProfileSubmit')->middleware('general.auth');

    //Report generate
    Route::get('/invoice',[ProfileController::class,'invoice'])->name('invoice')->middleware('general.auth');

    //graph 
    Route::get('/graph}',[ProfileController::class,'graph'])->name('graph')->middleware('general.auth');

    //follower
    Route::get('/follower/create',[FollowerController::class,'followerCreate'])->name('follower.create');
    Route::get('/follower/show',[FollowerController::class,'followerShow'])->name('follower.show');
    Route::get('/following/show',[FollowerController::class,'followingShow'])->name('following.show');

    //notification
    Route::get('/notification',[NotificationController::class,'notificationShow'])->name('notification.show');

    //user
    Route::get('/changestatus',[UserController::class,'changeStatus'])->name('user.changeStatus');
});

Route::group(['middleware' => ['admin-auth']], function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'usersInfo'])->name('admin.users');
    Route::get('/admin/comments', [AdminController::class, 'postsInfo'])->name('admin.posts');
    Route::get('/admin/likes', [AdminController::class, 'commentsInfo'])->name('admin.comments');
});



