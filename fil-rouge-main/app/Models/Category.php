<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\morphOne;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function image():morphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }
}
    