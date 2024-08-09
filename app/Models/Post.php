<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'user_id',
        'category_id'
    ];

    public function getImageUrl(){
        if($this->image){
            return url('storage/' . $this->image);
        }
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->belongsToMany(User::class, 'post_like')->withTimestamps();
    }

    public function scopeSearch($query, $search){
        $query->where('title', 'like', '%' . $search . '%');
    }
}
