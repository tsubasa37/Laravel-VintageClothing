<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;

class ShopCategory extends Model
{
    use HasFactory;

    public function shops()
    {
        return $this->belongsToMany(Shop::class,'selection_categories');
    }
}
