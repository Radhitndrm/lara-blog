<?php

namespace App\Models;

use Clockwork\Storage\Search;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Post extends Model
{
    use HasFactory, Sluggable;
    //protected $fillable = ['title','excerpt','body']; //berfungsi untuk memberitahu apa saja yang boleh diisi di tinker, selebihnya tidak boleh

    protected $guarded = ['id']; //apapun yang ada didalam guarded tidak boleh diisi, selebihnya boleh
    protected $with = ['category','author'];
    //membuat relasi model post dengan model category

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false,function($query,$search){
            return $query->where('title','like','%'. $search .'%')
        ->orWhere('body','like','%'.$search.'%');
    });

        $query->when($filters['category']?? false,function($query,$category){
            return $query->whereHas('category',function($query)use($category){
                $query->where('slug',$category);
            });
        });

        $query->when($filters['author']?? false,function($query,$author){
            return $query->whereHas('author',function($query)use($author){
                $query->where('username',$author);
            });
        });
       
    }
    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' =>  'title'
            ]
        ];
    }
}
