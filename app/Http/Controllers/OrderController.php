<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Client;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Services\OrderService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $orders = Order::with('products')->paginate(10);
            $ordersOperator=Order::with('products')->where('user_id','=',auth()->id())->paginate(10);
            return view('orders.index',compact('orders','ordersOperator'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients=Client::all();
        $products=Product::all();
        return view('orders.createorder',compact('clients','products'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request ,OrderService $orderService)
    {


        if($request->validated()){

            $orderService->createOrder($request);

            return redirect('/orders')
                            ->with('success','Order created successfully.');
            }



    }
    public function cancel(Order $order)

{
    if (! Gate::allows('cancel-order', $order)) {
        abort(403,'Unauthorized Action');
    }
    Order::where('id','=',$order->id)->update(['status'=>'canceled'
]);
    return redirect('/orders')->with('success','Order is canceled');



}









    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        if (! Gate::allows('update-order', $order)) {
            abort(403,'Unauthorized Action');
        }

        $products = Product::all();
        $clients=Client::all();

        $order->load('products');
        

        return view('orders.edit', compact('products', 'order','clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, OrderService $orderService,Order $order)
    {
       if($request->validated()){

        $orderService->updateOrder($request,$order);
       return redirect('/orders')->with('success','Order is updated succcesfully');
}


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
