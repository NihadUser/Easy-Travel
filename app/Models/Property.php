<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Comment, Selection, PropertyFile};

class Property extends Model
{
    use HasFactory;
    protected $table = 'properties';
    protected $fillable = [
        'name',
        'description',
        'location',
        'stars',
        'extras',
        'bath_count',
        'bed_count',
        'sqft_count',
        'price',
        'extras'
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class, 'entity_id', 'id')->where('entity_type', 'property');
    }
    public function selections()
    {
        return $this->hasOne(Selection::class, 'entity_id', 'id')->where('entity_type', 'property')->where('user_id', auth()->id());
    }


    public function supplies()
    {
        return $this->hasMany(PropertySupply::class, 'property_id', 'id')
            ->select('property_supplies.*', 'supplies.name as supplyName')
            ->join('supplies', 'supplies.id', 'property_supplies.supply_id');
    }

    public function image()
    {
        return $this->hasOne(PropertyFile::class, 'property_id', 'id')->where('show_home', 1);
    }
}
