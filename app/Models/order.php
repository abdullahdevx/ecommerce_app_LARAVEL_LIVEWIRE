<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\orderItem;


class order extends Model
{
    use HasFactory;
    public function orderItemsRelation()
    {
        return $this->hasMany(orderItem::class);
    }
}
