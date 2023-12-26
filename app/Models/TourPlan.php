<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\TourItem;

class TourPlan extends Model
{
    use HasFactory;
    protected $table = 'tour_plans';
    protected $guarded = [];
    public function hotels()
    {
        return $this->hasMany(TourItem::class, 'tour_id')->where('entity_type', 'place');
    }
    public function guides()
    {
        return $this->hasMany(TourItem::class, 'tour_id')->where('entity_type', 'guide');
    }
    public function host()
    {
        return $this->hasOne(User::class, 'id', 'host_id');
    }
}