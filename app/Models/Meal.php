<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }

    public function images()
    {
        return $this->hasMany(ImageMeal::class,'meal_id');
    }
}
