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
    protected $fillable = [
        'name',
        'surname',
        'nickname',
        'email',
        'password',
        'image',
        'about',
        'role'
    ];

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

    public function post(){
        return $this->hasMany(Post::class);
    }

    public function getImageUrl(){
        if($this->image){
            return url('storage/' . $this->image);
        }else{
            return "https://api.dicebear.com/8.x/thumbs/svg?seed=Oreo";
        }
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function likes(){
        return $this->belongsToMany(Post::class, 'post_like')->withTimestamps();
    }

    public function likesPost(Post $post){
        return $this->likes()->where('post_id', $post->id)->exists();
    }

    public function isAdmin(){
        return $this->role === 'Admin';
    }

    public function isEditor(){
        return $this->role === 'Redattore';
    }

    public function isAuthor(){
        return $this->role === 'Autore';
    }

    public function scopeSearch($query, $search){
        $query->where('nickname', 'like', "%{$search}%")->orWhere('role', 'like', "%{$search}%");
    }
}
