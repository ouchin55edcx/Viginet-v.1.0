<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'certificate',
        'experience',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }



}
