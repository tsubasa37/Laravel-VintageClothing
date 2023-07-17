<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use InterventionImage;
use App\Services\ImageService;

class UserController extends Controller
{
    public function index(){
        $likedProducts = [];

        // 新しい順にゲットするように変更
        $products = Product::AvailableItems()->paginate(8);
        if(Auth::check()){
            $userId = Auth::user()->id;
            $likedProducts = Product::AvailableItems()->whereHas('likes', function ($q) use ($userId) {
                $q->where('likes.user_id', '=', $userId);
            })->get();
        }

        return view('user.index', compact('products','likedProducts'));
    }

    public function edit()
    {
        $user = User::findOrFail(Auth::id());
        // dd($user);
        return view('user.profile.index',
        compact('user'));
    }


    public function update(Request $request, string $id)
    {
        $user = User::findOrFail(Auth::id());

        $imageFile = $request->image; //一時保存
        if(!is_null($imageFile) && $imageFile->isValid() ){
            // Storage::delete('public/gazou/'.$user->image);
            $fileNameToStore = ImageService::upload($imageFile, 'gazou');
        }
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if( !is_null($imageFile) && $imageFile->isValid()){
            $user->image = $fileNameToStore;
        }
        $user->save();

        return redirect()
        ->route('user.profile.index')
        ->with(['message'=>'マイページを更新しました。',
        'status' => 'info']);
    }

}


