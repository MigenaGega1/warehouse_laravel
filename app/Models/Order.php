<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Client;
use App\Models\User;
use App\Models\OrderProduct;

class Order extends Model
{
    use HasFactory;

    public $table = 'orders';
    public function products()
    {
        return $this->belongsToMany(Product::class,'order_products')->withPivot(['quantity']);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
