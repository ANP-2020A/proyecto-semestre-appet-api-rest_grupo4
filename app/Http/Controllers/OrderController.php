<?php

namespace App\Http\Controllers;

use App\Order;
use App\Http\Resources\Order as OrderResources;
use App\Http\Resources\OrderCollection;
use Illuminate\Http\Request;
use JWTAuth;

class OrderController extends Controller
{
    public function index()
    {

        return new OrderCollection(Order::paginate(10));
    }

    public function show(Order $order)
    {

        return response()->json(new OrderResources($order), 200);
    }

    public function store(Request $request)
    {

        $order = Order::create($request->all());
        return response()->json($order, 201);
    }

    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return response()->json($order, 200);
    }

    public function delete(Order $order)
    {
        $order->delete(); return response()->json(null, 204);
    }
}
