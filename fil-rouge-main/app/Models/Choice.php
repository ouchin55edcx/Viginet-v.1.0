<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;

    protected $fillable = ['choice_text','is_correct','task_id'];


    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
}
