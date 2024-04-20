<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone_number',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'likes', 'client_id', 'post_id');
    }


}
