<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_category_id',
        'user_id',
        'blog_title',
        'blog_image',
        'blog_tags',
        'blog_description'
    ];


        public function category()
        {
            return $this->belongsTo(BlogCategory::class,'blog_category_id','id');
        }
         public function user()
        {
            return $this->belongsTo(User::class,'user_id','id');
        }
}
