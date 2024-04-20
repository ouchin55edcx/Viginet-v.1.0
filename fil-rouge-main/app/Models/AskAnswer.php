<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AskAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ask_id',
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ask()
    {
        return $this->belongsTo(Question::class);
    }
}
