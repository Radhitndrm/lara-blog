<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

//contoller berguna untuk menjalankan proses, awalnya proses dijalankan di file route, sekarang dipisah menjadi class
class PostController extends Controller
{
    
    //method index berfungsi menampilkan semua data, dan akan dipanggil apabila halaman posts diakses
    public function index(){    
       
        $title = '';
        if(request('category')){
            $category = category::firstWhere('slug',request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('author')){
            $author = User::firstWhere('username',request('author'));
            $title = ' by ' . $author->name;
        }
    return view('posts',[
        "title" => "All Posts" . $title,
        
        "posts" => Post::latest()->filter(request(['search','category','author']))->paginate(7)->withQueryString() 
    ]);
    }

    //method show akan berjalan apabila sebuah halaman post dengan slug tertentu diakses, akan menampilkan isi data sesuai isi slug
    public function show(Post $post){
        return view('post',[
            "title" => "Single post",
            
            "post" => $post
        ]);
      
    }
}
