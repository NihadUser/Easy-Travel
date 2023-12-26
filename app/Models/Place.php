<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\Selection;

class Place extends Model
{
    use HasFactory;
    protected $table = 'places';
    protected $fillable = [
        'name',
        'image',
        'about',
        'safety',
        'fun',
        'internet',
        'price',
        'location'
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class, 'entity_id')->where('entity_type', 'place');
    }
    public function selections()
    {
        return $this->hasOne(Selection::class, 'entity_id', 'id')->where('entity_type', 'place')->where('user_id', auth()->id());
    }
}