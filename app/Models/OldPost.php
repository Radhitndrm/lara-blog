<?php

namespace App\Models;

//model berfungsi sebagai representasi data

class Post 
{
    //contoh data yang akan diambil, ada 2 data
    private static  $blog_posts = [
        [
            "title" => "buku pertama",
            "slug" => "buku-pertama",
            "author" => "jamalll",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum asperiores laboriosam saepe odit. Odio consectetur numquam quidem laudantium dolor vero et expedita quod totam ipsum, sint saepe, maiores facilis labore explicabo molestias cupiditate iste, beatae cumque cum. Molestias illum aut cum quam debitis veniam magnam maxime maiores dignissimos quis quos mollitia, ipsam alias, soluta repellat voluptates numquam velit aspernatur. Accusantium, voluptatum est. Laborum accusantium reprehenderit, ea maiores ab reiciendis modi deleniti impedit excepturi similique cupiditate porro, itaque vitae! Ad, quos!"
        ],
        [
            "title" => "buku kedua",
            "slug" => "buku-kedua",
            "author" => "kepinnn",
            "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et voluptates harum quas porro? Non enim alias officia vitae, dolorum voluptas praesentium eligendi itaque? Iure ex inventore quod exercitationem obcaecati. Rerum aut doloribus soluta eligendi ullam totam, iure blanditiis reiciendis labore perferendis minus, illo expedita consequatur quidem ducimus non quaerat? Facere voluptatum autem laborum asperiores vel labore repellat suscipit culpa reprehenderit eum, veniam inventore obcaecati amet, mollitia quos debitis. A, unde!'"
        ]
    ];

    //method untuk memanggil semua data (menggunakan collect)
    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        //variable post yang berisi semua data(mengambil isi dari function all())
        $posts = static::all();
      
        //mengembalikan/menampilkan data pertama dengan kondisi judul slug harus sama dengan slug
        return $posts->firstWhere('slug',$slug );
    }
}
