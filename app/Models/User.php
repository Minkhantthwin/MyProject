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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded=[];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    
    public function comments()
    {
       return $this->hasMany(Comment::class);    
    }

    public function subscribedBlogs()
    {
        return $this->belongsToMany(Blog::class);
    }
    
    public function isSubscribed($blog)
    {
        return auth()->user()->subscribedBlogs && auth()->user()->subscribedBlogs->contains('id',$blog->id);
    }
    
    public function getNameAttribute($value)
    {
       return ucwords($value);//mgmg => Mgmg
    }

    public function setPasswordAttribute($value)
    {
       $this->attributes['password']=bcrypt($value);
    }

  
}
