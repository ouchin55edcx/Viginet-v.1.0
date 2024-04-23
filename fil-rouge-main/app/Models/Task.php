<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'question', 'lesson_id'];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function answer()
    {
        return $this->hasMany(Answer::class, 'task_id');
    }

    public function image()
    {
        return $this->hasOne(Image::class, 'imageable_id');
    }


    public function clients()
    {
        return $this->belongsToMany(Client::class, 'answer_task')
            ->withPivot('isComplete')
            ->withTimestamps();
    }




}
