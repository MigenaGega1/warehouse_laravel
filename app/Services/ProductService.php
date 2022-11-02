<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProductService
{
    private ProductRepository $productRepository;
    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function createProduct(Request $request): Product
    {
        foreach ($request->fields as $key => $value) {
          $product=  Product::create($value);
        }
       return $product;
    }

    public function updateProduct(Request $request ,Product $product)
    {
        $productupdate = Product::where('id','=',$product->id)
        ->update([

            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);

    }
}
