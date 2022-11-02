<?php

namespace App\Services;


use App\Repositories\OrderRepository;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderService
{
    private OrderRepository $orderRepository;
    public function __construct(OrderRepository $orderRepository) {
        $this->orderRepository = $orderRepository;
    }

    public function createOrder(Request $request): Order
    {
          $order = Order::create([
            'user_id'=>auth()->id(),
            'client_id' => $request->client_id,
            'amount' => $request->total,
            'status' => 'pending',
            'created_at' => Carbon::now()->toDateTimeString(),

         ]);
        if($order){
            $products = $request->input('products', []);
            $quantity = $request->input('quantities', []);
            for ($product = 0; $product < count($products); $product++) {
            $productOrder = Product::where("id", "=", $request->products[$product])->first();
            $productOrder=OrderProduct::create([
                'order_id'=>$order->id,
                'product_id'=>$request->products[$product],
                'quantity'=>$request->quantities[$product],
                'amount'=> $productOrder->price  *  $request->quantities[$product],
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }
            $order->products->each(function ($product) {
            $product->update(['stock' => ($product->stock - $product->pivot->quantity)]);
                });
    }
    return $order;
    }






    public function updateOrder(Request $request ,Order $order)
    {
        $orderUpdate = Order::where('id','=',$order->id)
        ->update([
            'user_id'=>auth()->id(),
            'client_id' => $request->client_id,
            'amount' => 0,
            'status' => $request->status,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
            $products = $request->input('products', []);
            $quantity = $request->input('quantities', []);
            $order->products()->detach();
            for ($product = 0; $product < count($products); $product++) {
            $productOrder = Product::where("id", "=", $request->products[$product])->first();
            $productOrder=OrderProduct::where('order_id','=',$order->id)
            ->updateOrCreate([
                'order_id'=>$order->id,
                'product_id'=>$request->products[$product],
                'quantity'=>$request->quantities[$product],
                 'amount'=> $productOrder->price  *  $request->quantities[$product],
                'updated_at' => Carbon::now()->toDateTimeString(),


            ]);
        }


            $order->products->each(function ($product) {
            $product->update(['stock' => ($product->stock - $product->pivot->quantity)]);
                });
    }
}
