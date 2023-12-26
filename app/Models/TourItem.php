<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Place;
use App\Models\User;


class TourItem extends Model
{
    use HasFactory;
    protected $table = 'tour_items';
    protected $guarded = [];
    public function places()
    {
        return $this->hasOne(Place::class, 'id', 'entity_id');
    }

    public function guides()
    {
        return $this->hasOne(User::class, 'id', 'entity_id')->where('role', 'guide');
    }
    protected $with = ['places', 'guides'];

}