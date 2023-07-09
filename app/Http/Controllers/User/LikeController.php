<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Product;

class LikeController extends Controller
{
    // public function index(Request $request)
    // {
    //     $Products = Product::withCount('likes')->orderBy('id', 'desc')->paginate(10);
    //     $param = [
    //         'Products' => $Products,
    //     ];
    //     return view('user.items.index', $param);
    // }
    public function like(Request $request)
    {
        $user_id = Auth::user()->id; //1.ログインユーザーのid取得
        $product_id = $request->product_id; //2.投稿idの取得
        $already_liked = Like::where('user_id', $user_id)->where('product_id', $product_id)->first(); //3.

        if (!$already_liked) { //もしこのユーザーがこの投稿にまだいいねしてなかったら
            $like = new Like; //4.Likeクラスのインスタンスを作成
            $like->product_id = $product_id; //Likeインスタンスにproduct_id,user_idをセット
            $like->user_id = $user_id;
            $like->save();
        } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
            Like::where('product_id', $product_id)->where('user_id', $user_id)->delete();
        }
        //5.この投稿の最新の総いいね数を取得
        $product_likes_count = Product::withCount('likes')->findOrFail($product_id)->likes_count;
        $param = [
            'product_likes_count' => $product_likes_count,
        ];
        return response()->json($param); //6.JSONデータをjQueryに返す
    }



}
