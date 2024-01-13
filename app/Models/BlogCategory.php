<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $table = 'blog_category';
    public $timestamps = false;
    use HasFactory;

    public function blog(){
        return $this->hasMany(Blog::class,'category_id');
    }

}
