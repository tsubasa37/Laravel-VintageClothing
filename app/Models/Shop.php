<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        // 'image1',
        // 'image2',
        // 'image3',
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
        return $this->belongsToMany(ShopCategory::class);
    }
}
