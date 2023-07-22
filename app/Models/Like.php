<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
class Like extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','user_id'];

    public function user()
    {   //usersテーブルとのリレーションを定義するuserメソッド
        return $this->belongsTo(User::class);
    }

    public function products()
    {   //reviewsテーブルとのリレーションを定義するreviewメソッド
        return $this->belongsTo(Product::class);
    }

}
