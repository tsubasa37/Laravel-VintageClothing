<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Owner;
use App\Models\Product;
use App\Models\ShopCategory;


class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'name',
        'information',
        'phone',
        'prefecture',
        'City',
        'address',
        'businessHours',
        'image1',
        'image2',
        'image3',
        'station',
        'regularHoliday',
        'home_page',
        'twitter',
        'Instagram',
        'Facebook',
        'is_selling',
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function shopCategory()
    {
        return $this->belongsToMany(ShopCategory::class,'selection_categories')->withTimestamps();
    }

    // public function scopeAvailableItems($query)
    // {
    //     // DB::table('shops')
    //     $query
    //         ->join('selection_categories','selection_categories.shop_id', '=','shops.id')
    //         ->select('shops.id','shops.owner_id','shops.name','shops.image1 as filename',
    //         'selection_categories.shop_category_id as shopCategory','shops.prefecture as prefecture',
    //         'shops.City as city','shops.address as address');
    // }


    public function scopeSearchKeyword($query,$storeName)
    {
        if(!is_null($storeName)){
            $spaceConvert = mb_convert_kana($storeName,'s'); //全角スペースを半角に
            $storeNames = preg_split('/[\s]+/', $spaceConvert,-1,PREG_SPLIT_NO_EMPTY); //空白で区切る
            foreach($storeNames as $word){
                $query->where('shops.name','like','%'.$word.'%');
            }
            return $query;
        } else {
            return;
        }
    }

    public function scopeSelectPrefecture($query, $categoryId)
    {
        if($categoryId !== '0')
        {
            return $query->where('secondary_category_id', $categoryId);
        } else {
            return;
        }


}
