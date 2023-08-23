<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Models\category;
use App\Models\Post;
use App\Models\User;
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

Route::get('/home', function () {
    return view('home',[
        "title" => "Home",

    ]);
});

Route::get('/about', function () {
    return  view('about', [
            
            "name" => "Gozali Akmal",
            "email" => "Gozali@gmail.com",
            "image" => "gozali.jpg",
            "title" => "About",
           
    ]);
});

Route::get('/posts', [PostController::class,'index']); //apabila halaman posts diakses maka jalankan class postcontoller dengan method index
Route::get('/posts/{post:slug}',[PostController::class,'show']); //apabila halaman posts diakses maka jalankan class postcontoller dengan method show

Route::get('/',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);

Route::get('/dashboard',function(){
    
    $title = '';
    if(request('category')){
        $category = category::firstWhere('slug',request('category'));
        $title = ' in ' . $category->name;
    }

    if(request('author')){
        $author = User::firstWhere('username',request('author'));
        $title = ' by ' . $author->name;
    }
return view('dashboard.index',[
    "title" => "All Posts" . $title,
    
    "posts" => Post::latest()->filter(request(['search','category','author']))->paginate(7)->withQueryString() 
]);

})->middleware('auth');

Route::get('/dashboard/posts/checkSlug',[DashboardPostController::class,'checkSlug']);

Route::resource('/dashboard/posts',DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/admin/categories',AdminCategoryController::class)->except('show')->middleware('admin');


Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store']);




Route::get('/dashboard/categories',function(){
    return view('dashboard.categories',[
        'title' => "Posts Category",
        'categories' => category::all()
    ]);
});


Route::get('/categories',function(){
    return view('categories',[
        'title' => "Posts Category",
        
        'categories' => category::all()
    ]);
});



