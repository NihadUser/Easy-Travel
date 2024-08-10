<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPlace extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'place_id',
        'tour_id',
    ];
}
