<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    protected $fillable = ['title','description','category_id'];
    use HasFactory;

    public function blog_category(){
        return $this->belongsTo(BlogCategory::class,'category_id');
    }
}
