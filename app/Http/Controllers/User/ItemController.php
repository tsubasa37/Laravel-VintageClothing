<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\PrimaryCategory;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Like;


class ItemController extends Controller
{


    // public function __construct()
    // {
    //     $this->middleware('auth:users');

    //     $this->middleware(function($request, $next){
    //         $id = $request->route()->parameter('item'); //shopのid取得
    //         if(!is_null($id)){ // null判定
    //             $itemId = Product::AvailableItems()->where('products.id',$id)->exists();
    //             if(!$itemId){ // 同じでなかったら
    //                 abort(404); // 404画面表示
    //             }
    //         }
    //         return $next($request);
    //     });
    // }


    public function index(Request $request)
    {
        // dd($request);
        $categories = PrimaryCategory::with('secondary')
        ->get();

        $products = Product::AvailableItems()
        ->selectCategory($request->category ?? '0')
        ->searchKeyword($request->keyword )
        ->sortOrder($request->sort)
        ->paginate($request->pagination ?? '20');



        return view('user.items.index',
        compact('products','categories'));
    }


    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        $quantity = Stock::where('product_id', $product->id)
        ->sum('quantity');

        if($quantity > 9)
        {
            $quantity = 9;
        }

        return view('user.items.show', compact('product','quantity'));
    }


    public function favorite(Request $request)
    {
        // $likedProducts = Product::AvailableItems()->whereHas('likes')->paginate(10);
        $likedProducts = Product::AvailableItems()->whereHas('likes', function ($q) {
            $q->where('likes.user_id', '=', Auth::user()->id);
        })->paginate(10);

        return view('user.items.favorite', compact('likedProducts'));
    }





}
