<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\ShopCategory;
use Illuminate\Support\Facades\Storage;
use InterventionImage;
use App\Http\Requests\UploadImageRequest;
use App\Services\ImageService;
use App\Services\shopImageService;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owners');

        $this->middleware(function($request, $next){
            $id = $request->route()->parameter('shop'); //shopのid取得
            if(!is_null($id)){ // null判定
                $shopsOwnerId = Shop::findOrFail($id)->owner->id;
                $shopId = (int)$shopsOwnerId; // キャスト 文字列→数値に型変換
                $ownerId = Auth::id();
                if($shopId !== $ownerId){ // 同じでなかったら
                    abort(404); // 404画面表示
                }
            }
            return $next($request);
        });
    }

    public function index()
    {
        // $ownerId = Auth::id();
        $shops = Shop::where('owner_id', Auth::id())->get();

        return view('owner.shops.index',
        compact('shops'));
    }

    public function edit(string $id)
    {
        $shop = Shop::findOrFail($id);
        // $shopCategories = ShopCategory::all();
        return view('owner.shops.edit', compact('shop'));

    }

    public function update(UploadImageRequest $request, string $id)
    {
        $shop = Shop::findOrFail($id);
        // dd($shop->image1);
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'information' => ['required', 'string', 'max:1000'],
            'phone' => ['required','numeric','digits_between:10,11','regex:/^[0-9]+$/'],
            'prefecture' => ['required', 'string', 'max:50'],
            'City' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:50'],
            'businessHours' => ['required', 'string', 'max:50'],
            'is_selling' => ['required'],
        ]);

        // dd( $request->image2 );
        $imageFile1 = $request->image1; //一時保存
        $imageFile2 = $request->image2; //一時保存
        $imageFile3 = $request->image3; //一時保存
        if(!is_null($imageFile1) && $imageFile1->isValid() ){
            Storage::delete('public/shops/'.$shop->image1);
            $image1 = shopImageService::upload1($imageFile1, 'shops');
        }
        if(!is_null($imageFile2) && $imageFile2->isValid() ){
            Storage::delete('public/shops/'.$shop->image2);
            $image2 = shopImageService::upload2($imageFile2, 'shops');
        }
        if(!is_null($imageFile3) && $imageFile3->isValid() ){
            Storage::delete('public/shops/'.$shop->image3);
            $image3 = shopImageService::upload3($imageFile3, 'shops');
        }
        // dd($image3);
        // }

        $shop = Shop::findOrFail($id);
        $shop->name = $request->name;
        $shop->information = $request->information;
        $shop->phone = $request->phone;
        $shop->station = $request->station;
        $shop->prefecture = $request->prefecture;
        $shop->City = $request->City;
        $shop->address = $request->address;
        $shop->businessHours = $request->businessHours;
        $shop->regularHoliday = $request->regularHoliday;
        $shop->home_page = $request->home_page;
        $shop->twitter = $request->twitter;
        $shop->Instagram = $request->Instagram;
        $shop->Facebook = $request->Facebook;
        $shop->is_selling = $request->is_selling;

        if( !is_null($imageFile1) && $imageFile1->isValid()){
            $shop->image1 = $image1;
        }
        if( !is_null($imageFile2) && $imageFile2->isValid()){
            $shop->image2 = $image2;
        }
        if( !is_null($imageFile3) && $imageFile3->isValid()){
            $shop->image3 = $image3;
        }
        $shop->save();

        return redirect()->route('owner.shops.index')
        ->with(['message'=>'店舗情報を更新しました。',
        'status' => 'info']);
    }
}
