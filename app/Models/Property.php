<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\Selection;

class Property extends Model
{
    use HasFactory;
    protected $table = 'properties';
    protected $fillable = [
        'name',
        'description',
        'location',
        'stars',
        'image',
        'extras',
        'bath_count',
        'bed_count',
        'sqft_count',
        'price'
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class, 'entity_id')->where('entity_type', 'property');
    }
    public function selections()
    {
        return $this->hasOne(Selection::class, 'entity_id', 'id')->where('entity_type', 'property')->where('user_id', auth()->id());
    }
}