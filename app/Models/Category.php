<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Category extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded = [];
    protected $table='categories';
    protected $fillable=[
        'id',
        'name',
        'slug',
        'description',
        'image',
        'title',
        // 'meta_title',
        // 'meta_description',
        // 'meta_keyword',
        'navbar_status',
        'status',
        'created_by',

    ];

    public $directory = "/uploads/category/";


    public function getImageAttribute($value){
        if($value){
            return asset($this->directory.$value);
        }
        else{
            return null;
        }
    }
    public function  posts1(){
        return $this->hasMany(Post::class,'category_id','id');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function posts(){
        return $this->belongsToMany(Post::class,'categories_posts','category_id','post_id');
    }
    


}
