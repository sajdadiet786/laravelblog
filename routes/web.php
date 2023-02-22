<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\LoginController;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Controllers\Controller\FrontendController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',[App\Http\Controllers\Frontend\FrontendController::class,'index']);
Route::get('/tutorial/{category_slug}',[App\Http\Controllers\Frontend\FrontendController::class,'ViewCategoryPost'])->name('tutorial.category_slug');
Route::get('/post/{slug}',[App\Http\Controllers\Frontend\FrontendController::class,'ViewPost'])->name('post.detail');
Route::get('search',[App\Http\Controllers\Frontend\FrontendController::class,'search'])->name('search');
Route::get('comments',[App\Http\Controllers\Frontend\CommentController::class,'index']);
Route::post('comments/{comment}/approve',[App\Http\Controllers\Frontend\CommentController::class,'approve'])->name('comment.approve');

Route::post('comments',[App\Http\Controllers\Frontend\CommentController::class,'store'])->name('comments');
Route::post('/delete-comment',[App\Http\Controllers\Frontend\CommentController::class,'destroy'])->name('delete.comment');
Route::post('/approve',[App\Models\Post::class,'approvecomments']);
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    Route::get('/dashboard',[App\Http\Controllers\Admin\DashboardController::class,'index']);
    Route::get('/category',[App\Http\Controllers\Admin\CategoryController::class,'index']);
    Route::get('/add-category',[App\Http\Controllers\Admin\CategoryController::class,'create']);
    Route::post('/add-category',[App\Http\Controllers\Admin\CategoryController::class,'store']);
    Route::get('/edit-category/{category_id}',[App\Http\Controllers\Admin\CategoryController::class,'edit'])->name('category.edit');
    Route::post('/update-category/{category_id}',[App\Http\Controllers\Admin\CategoryController::class,'update'])->name('category.update');
    // Route::get('/delete-category/{category_id}',[App\Http\Controllers\Admin\CategoryController::class,'destroy'])->name('category.delete');
    Route::post('delete-category',[App\Http\Controllers\Admin\CategoryController::class,'destroy'])->name('category.delete');
    Route::get('post',[App\Http\Controllers\Admin\PostController::class,'index']);
    Route::get('add-post',[App\Http\Controllers\Admin\PostController::class,'create']);
    Route::post('add-post',[App\Http\Controllers\Admin\PostController::class,'store']);
    Route::get('/edit-post/{post_id}',[App\Http\Controllers\Admin\PostController::class,'edit'])->name('post.edit');
    Route::post('/update-post/{post_id}',[App\Http\Controllers\Admin\PostController::class,'update'])->name('post.update');
    Route::get('/delete-post/{post_id}',[App\Http\Controllers\Admin\PostController::class,'destroy'])->name('post.delete');
    Route::get('users',[App\Http\Controllers\Admin\UserController::class,'index']);
    Route::get('users/{user_id}',[App\Http\Controllers\Admin\UserController::class,'edit'])->name('user.edit');
    Route::post('update-user/{user_id}',[App\Http\Controllers\Admin\UserController::class,'update'])->name('user.update');

Route::get('check_slug', function () {
    $slug = SlugService::createSlug(App\Models\Category::class, 'slug', request('name'));
    return response()->json(['slug' => $slug]);
    // Route::post('categories',[App\Http\Controllers\Admin\PostController::class,'getCategory'])->name('get.category');
});
});

 
// Route::get('/auth/redirect', function () {
//     return Socialite::driver('google')->redirect();
// });
 
// Route::get('/auth/callback', function () {
//     $user = Socialite::driver('google')->user();
 
//     // $user->token
// });

Route::get('/auth/github/redirect', [LoginController::class,'githubredirect'])->name('redirect');
Route::get('/auth/github/callback', [LoginController::class,'githubcallback'])->name('callback');


Route::get('/auth/google/redirect', [LoginController::class,'googleredirect'])->name('googleredirect');
Route::get('/auth/google/callback', [LoginController::class,'googlecallback'])->name('callback');
