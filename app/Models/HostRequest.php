<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TourPlan;
use App\Models\User;

class HostRequest extends Model
{
    use HasFactory;
    protected $table = 'host_requests';
    protected $guarded = [];
    public function tour()
    {
        return $this->hasOne(TourPlan::class, 'id', 'tours_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}