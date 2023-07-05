<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\PrimaryCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Product;
use App\Models\Owner;
use App\Models\Shop;
use App\Models\Stock;
use App\Services\shopImageService;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:owners');

        $this->middleware(function($request, $next){
            $id = $request->route()->parameter('product'); //shopのid取得
            if(!is_null($id)){ // null判定
                $productsOwnerId = Product ::findOrFail($id)->shop->owner->id;
                $productId = (int)$productsOwnerId; // キャスト 文字列→数値に型変換
                if($productId !== Auth::id()){ // 同じでなかったら
                    abort(404); // 404画面表示
                }
            }
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ownerInfo = Owner::with('shop.product') ->where('id', Auth::id())->get();

        return view('owner.products.index',compact('ownerInfo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shops = Shop::where('owner_id', Auth::id())->select('id', 'name')->get();

        // $images = Image::where('owner_id', Auth::id())
        // ->select('id','title','filename')
        // ->orderby('updated_at', 'desc')
        // ->get();

        $categories = PrimaryCategory::with('secondary')
        ->get();

        return view('owner.products.create',
        compact('shops','images', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        try{
            DB::transaction(function () use($request) {
            // dd( $request->image2 );
            $imageFile1 = $request->image1; //一時保存
            $imageFile2 = $request->image2; //一時保存
            $imageFile3 = $request->image3; //一時保存

            if(!is_null($imageFile1)  && $imageFile1->isValid()){
                //   Storage::delete('public/shops/'.$shop->image1);
                $image1 = shopImageService::upload1($imageFile1, 'products');
            }else{
                $image1 = '';
            }
            
            if(!is_null($imageFile2)  && $imageFile1->isValid()){
                //   Storage::delete('public/shops/'.$shop->image2);
                $image2 = shopImageService::upload2($imageFile2, 'products');
            }else{
                $image2 = '';
            }

            if(!is_null($imageFile3)  && $imageFile1->isValid()){
                //   Storage::delete('public/shops/'.$shop->image3);
                $image3 = shopImageService::upload3($imageFile3, 'products');
            }else {
                $image3 = '';
            }

                $product = Product::create([
                    'name' => $request->name,
                    'information' => $request->information,
                    'price' => $request->price,
                    'sort_order' => $request->sort_order,
                    'shop_id' => $request->shop_id,
                    'secondary_category_id' => $request->category,
                    'image1' => $image1,
                    'image2' => $image2,
                    'image3' => $image3,
                    'is_selling' => $request->is_selling,
                ]);

                Stock::create([
                    'product_id' => $product->id,
                    'type' => 1,
                    'quantity' =>  $request->quantity
                ]);
            }, 2);
        }catch(Throwable $e){
            Log::error($e);
            throw $e;
        }

        return redirect()
        ->route('owner.products.index')
        ->with(['message'=>'商品登録をしました。',
        'status' => 'info']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $quantity = Stock::where('product_id', $product->id)
        ->sum('quantity');

        $shops = Shop::where('owner_id', Auth::id())->select('id', 'name')->get();

        $images = Image::where('owner_id', Auth::id())
        ->select('id','title','filename')
        ->orderby('updated_at', 'desc')
        ->get();

        $categories = PrimaryCategory::with('secondary')
        ->get();

        return view('owner.products.edit', compact('product', 'quantity','shops', 'images', 'categories'));
    }


    public function update(ProductRequest $request, string $id)
    {
        $request->validate([
            'current_quantity' => ['required', 'integer'],
        ]);

        $product = Product::findOrFail($id);
        $quantity = Stock::where('product_id', $product->id)
        ->sum('quantity');

        if($request->current_quantity !== $quantity) {
            $id = $request->route()->parameter('product');
            return redirect()->route('owner.products.edit',['product' => $id])
            ->with(['message'=>'在庫数が変更されています。',
            'status' => 'alert']);
        } else {
            try{
                DB::transaction(function () use($request,$product) {

                    $imageFile1 = $request->image1; //一時保存
                    $imageFile2 = $request->image2; //一時保存
                    $imageFile3 = $request->image3; //一時保存
                    if(!is_null($imageFile1) && $imageFile1->isValid() ){
                        Storage::delete('public/products/'.$product->image1);
                        $image1 = shopImageService::upload1($imageFile1, 'products');
                    }
                    if(!is_null($imageFile2) && $imageFile2->isValid() ){
                        Storage::delete('public/products/'.$product->image2);
                        $image2 = shopImageService::upload2($imageFile2, 'products');
                    }
                    if(!is_null($imageFile3) && $imageFile3->isValid() ){
                        Storage::delete('public/products/'.$product->image3);
                        $image3 = shopImageService::upload3($imageFile3, 'products');
                    }


                    $product->name = $request->name;
                    $product->information = $request->information;
                    $product->price = $request->price;
                    $product->sort_order = $request->sort_order;
                    $product->shop_id = $request->shop_id;
                    $product->secondary_category_id = $request->category;
                    // $product->image1 = $request->image1;
                    // $product->image2 = $request->image2;
                    // $product->image3 = $request->image3;
                    $product->is_selling = $request->is_selling;

                    if( !is_null($imageFile1) && $imageFile1->isValid()){
                        $product->image1 = $image1;
                    }
                    if( !is_null($imageFile2) && $imageFile2->isValid()){
                        $product->image2 = $image2;
                    }
                    if( !is_null($imageFile3) && $imageFile3->isValid()){
                        $product->image3 = $image3;
                    }
                    $product->save();

                    if($request->type === \Constant::PRODUCT_LIST['add']){
                        $newQuantity = $request->quantity;
                    }
                    if($request->type === \Constant::PRODUCT_LIST['reduce']){
                        $newQuantity = $request->quantity * -1;
                    }
                    Stock::create([
                        'product_id' => $product->id,
                        'type' => $request->type,
                        'quantity' =>  $newQuantity,
                    ]);
                }, 2);
            }catch(Throwable $e){
                Log::error($e);
                throw $e;
            }

            return redirect()
            ->route('owner.products.index')
            ->with(['message'=>'商品情報を更新しました。',
            'status' => 'info']);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::findOrFail($id)->delete();

        return redirect()
        ->route('owner.products.index')
        ->with(['message'=>'商品を削除しました。',
        'status' => 'alert']);
    }
}
