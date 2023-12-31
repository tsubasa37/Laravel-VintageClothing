<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Thread;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'thread_id', 'comment'
    ];

     public function user(){
      return $this->belongsTo(User::class);
    }
     public function threads(){
      return $this->belongsTo(Thread::class);
    }
}
