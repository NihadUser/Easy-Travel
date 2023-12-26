<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;

class BlogCategory extends Model
{
    use HasFactory;
    protected $table = 'blog_categories';
    protected $guarded = [];
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id', 'id');
    }
}