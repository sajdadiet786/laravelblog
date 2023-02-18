<?php

namespace App\Models;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use Sluggable;
    use HasFactory;
    protected $guarded = [];
    protected $table='posts';
    protected $fillable=[
        'category_id',
        'name',
        'slug',
        'description',
        // 'title',
        // 'meta_description',
        // 'meta_keyword',
        // 'navbar_status',
        'status',
        'created_by',

    ];
    public function category(){
                return $this->belongsTo(Category::class,'category_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'created_by','id');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function categories(){
        // return $this->belongsToMany(Category::class,'categories_posts','post_id','category_id');
        return $this->belongsToMany(Category::class,'categories_posts','post_id','category_id');
    }
    public function comments(){
        return  $this->hasMany(Comment::class,'post_id','id');
    }
    public function approvecomments(){
        return  $this->hasMany(Comment::class,'post_id','id')->where('status','approve');
    }
    // $post = $post->create()
    // $post->categories()->sync($request->categories)
}   
