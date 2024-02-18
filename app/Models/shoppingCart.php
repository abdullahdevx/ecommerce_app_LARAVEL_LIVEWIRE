<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;


class shoppingCart extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {

    return $this->belongsTo(Product::class, 'product_id');
    }

//     public function productRelation()
//     {
//         return $this->hasMany(shoppingCart::class);
//     }
}
