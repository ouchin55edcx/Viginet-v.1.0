<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ask extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'user_id'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function askAnswer()
    {
        return $this->hasMany(AskAnswer::class, 'ask_id');
    }
}
