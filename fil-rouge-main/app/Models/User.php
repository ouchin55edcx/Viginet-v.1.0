<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function expert()
    {
        return $this->hasOne(Expert::class);
    }

    public function Meeting()
    {
        return $this->hasMany(Meeting::class);
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function ask()
    {
        return $this->hasMany(Ask::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function Conmplaint()
    {
        return $this->hasMany(Complaint::class);
    }

    public function savedPosts()
    {
        return $this->belongsToMany(Post::class, 'saves', 'user_id', 'post_id')->withTimestamps();
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }

}
