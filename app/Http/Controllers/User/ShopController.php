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

        $prefecture = $request->input('prefecture');
        $storeName = $request->input('storeName');

        $query = Shop::query();

        if (!is_null($prefecture) && $prefecture !== '') {
            $query->where('prefecture', $prefecture);
        }

        if (!is_null($storeName) && $storeName !== '') {
            $query->where('name', 'LIKE', '%' . $storeName . '%');
        }

        $shops = $query->paginate(20);
        $categories = ShopCategory::all();


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
