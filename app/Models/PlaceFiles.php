<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceFiles extends Model
{
    use HasFactory;
    protected $table = 'place_files';
    protected $fillable = [
        'image',
        'place_id',
        'show_home'
    ];
}
