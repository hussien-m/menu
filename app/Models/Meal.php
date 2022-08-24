<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'extra' => 'array'
    ];
    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }

    public function images()
    {
        return $this->hasMany(ImageMeal::class,'meal_id');
    }

    public function setExtraAttribute($add)
    {
        $extra = [];

        foreach ($add as $array_item) {
            if (!is_null($array_item['price'])) {
                $extra[] = $array_item;
            }
        }

        $this->attributes['extra'] = json_encode($extra);
    }
}
