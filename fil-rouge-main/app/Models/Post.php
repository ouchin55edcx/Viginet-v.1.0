<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable =['title', 'content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likedByClients()
    {
        return $this->belongsToMany(Client::class, 'likes', 'post_id', 'client_id');
    }

    public function savedByUsers()
    {
        return $this->belongsToMany(User::class, 'saves', 'post_id', 'user_id')->withTimestamps();
    }
}
