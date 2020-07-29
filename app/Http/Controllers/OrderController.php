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
        $order=$service->orders()->where('id',$order->id)->firstOrFail();
        return response()->json($order,200);
    }


    public function store(Request $request, Service $service)
    {
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
       //
    }

    public function delete(Comment $comment)
    {
    //
    }
}
