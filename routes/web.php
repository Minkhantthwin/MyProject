<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Models\Customer;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index',[BlogController::class,'index']);
Route::get('/blogs/{blog:slug}',[BlogController::class, 'show']);
Route::post('/blogs/{blog:slug}/subscription', [BlogController::class, 'subscriptionHandler']);

Route::get('/admin/blogs/create', [BlogController::class, 'create'])->middleware('admin');

Route::post('/blogs/{blog:slug}/comments', [CommentController::class,'store']);

Route::get('/register', [AuthController::class, 'create'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');

Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'post_login'])->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');






// Route::get('/categories/{category:slug}', function(Category $category){

//     return view('index',
//     ['blogs'=> $category->blogs,
//     'categories'=>Category::all(),
//     'currentCategory'=>$category

// ]);

// });

// Route::get('/users/{user:username}', function(User $user){

//     return view('index',
//     ['blogs'=> $user->blogs,
    
// ]);

// });

Route::get('/customer', function () {
    return view('customer' ,
    ['customers'=>Customer::all()
]);

});

// Route::get('/blogs/{blog}', function ($id) {

//     return view('blog', [
//         'blog'=>Blog::findOrFail($id)
//     ]);
    
// });

