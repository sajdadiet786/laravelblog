<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesPosts extends Model
{
    use HasFactory;
    protected $table='categories_posts';
    protected $fillable=[
        'category_id',
        'post_id',
       
    ];

}
