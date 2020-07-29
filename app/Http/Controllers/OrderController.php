<?php

namespace App\Http\Controllers;

use App\Order;
use App\Service;
use App\Http\Resources\Order as OrderResources;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Service $service)
    {
        return response()->json(OrderResources::collection($service->orders),200);
    }


    public function show(Service $service, Order $order )
    {
        $this->authorize('view', $order);
        $order=$service->orders()->where('id',$order->id)->firstOrFail();
        return response()->json($order,200);
    }


    public function store(Request $request, Service $service)
    {
        $this->authorize('create', Order::class);
        $validatedData = $request->validate([
            'orderDate'=> 'required',
            'attentionDate'=>'required',
            'description'=> 'required',
            'news'=>'required',
        ]);
        $order=$service->orders()->save(new Order($request->all()));
        return response()->json($order,200);
    }


    public function update(Request $request, Order $order)
    {
        $this->authorize('update',$order);
        /*$validatedData = $request->validate([
            'orderDate'=> 'required',
            'attentionDate'=>'required',
            'description'=> 'required',
            'news'=>'required',
        ]);*/

        $order->update($request->all());
        return response()->json($order, 200);
    }

    public function delete(Service $service, Order $order)
    {
        $this->authorize('delete',$order);
        $order->delete();
        return response()->json(null, 204);
    }
}
