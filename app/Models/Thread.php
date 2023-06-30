<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;

class Thread extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'content', 'title'
    ];

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function comments(){
      return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
