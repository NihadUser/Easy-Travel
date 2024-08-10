<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\TourItem;

class Tour extends Model
{
    use HasFactory;

    protected $table = 'tours';

    protected $guarded = ['id'];
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

    public function transports()
    {
        return $this->hasMany(TourTransport::class, 'tour_id', 'id')
            ->select('tour_transports.*', 't.name')
            ->join('transports as t', 't.id', '=', 'tour_transports.transport_id');
    }

    public function transaction()
    {
        return $this->hasOne(TourTransaction::class, 'tour_id', 'id');
    }
}
