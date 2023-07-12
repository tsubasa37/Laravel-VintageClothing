<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShopCategory;
use App\Models\Product;
use App\Models\Shop;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $criteria = $request->input('criteria');
        // dd($criteria);
        if(!is_null($criteria))
        {
            $shop = Shop::whereIn('prefecture', $criteria)->get();
            dd($shop);
        }
        $categories = ShopCategory::all();
        $shops = Shop::searchKeyword($request->storeName)->get();



        // dd($threads);
        return view('user.shops.index', compact('shops','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $shop = Shop::find($id);
        // dd($products);
        $shopCategories = $shop->shopCategory;
        // dd($categories);

        // $shopCategories = ShopCategory::where('shop_categories.id','=',$categories)->get();
        // dd($shopCategories);
        // $products = Product::all()->where('products.shop_id','=',$id);
        // dd($products);


        return view('user.shops.show', compact('shop','shopCategories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
