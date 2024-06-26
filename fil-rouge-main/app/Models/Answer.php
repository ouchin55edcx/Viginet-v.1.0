<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['choiceText','isCorrect','task_id'];


    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
}
