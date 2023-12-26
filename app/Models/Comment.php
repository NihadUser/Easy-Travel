<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Place;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $guarded = [];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function places()
    {
        return $this->belongsTo(Place::class, 'entity_id');
    }
}