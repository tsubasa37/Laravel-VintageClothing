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
      return $this->hasMany(Comment::class,'thread_id','id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function scopeSearchKeyword($query,$keyword)
    {
        if(!is_null($keyword)){
            $spaceConvert = mb_convert_kana($keyword,'s'); //全角スペースを半角に
            $keywords = preg_split('/[\s]+/', $spaceConvert,-1,PREG_SPLIT_NO_EMPTY); //空白で区切る
            foreach($keywords as $word){
                $query->where('threads.title','like','%'.$word.'%');
            }
            return $query;
        } else {
            return;
        }
    }
}
