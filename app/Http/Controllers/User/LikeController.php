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
    public function toggleFavorite(Request $request)
    {
        $user = auth()->user();
        $productId = $request->product_id;

        // Check if the user has already favorited the product
        $isLike = Like::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->exists();

        if ($isLike) {
            // Remove the Like
            Like::where('user_id', $user->id)
                ->where('product_id', $productId)
                ->delete();
        } else {
            // Add the Like
            Like::create([
                'user_id' => $user->id,
                'product_id' => $productId,
            ]);
        }

        // Return the updated Like status
        return response()->json(['is_Like' => !$isLike]);
    }


}
