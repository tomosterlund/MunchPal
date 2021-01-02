<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'restaurant_id' => 'required',
            'total_price' => 'required|numeric',
            'items' => 'required|string',
            'address' => 'required|string|max:255|min:3',
            'zip' => 'required|min:3|max:20',
            'city' => 'required|string|max:255|min:1',
            'instructions' => 'string|max:455',
        ]);

        $order = new Order;
        $order->user_id = $request->user_id;
        $order->restaurant_id = $request->restaurant_id;
        $order->total_price = $request->total_price;
        $order->items = $request->items;
        $order->delivered = false;
        $order->address = $request->address;
        $order->zip = $request->zip;
        $order->city = $request->city;
        $order->instructions = $request->instructions ?? null;
        $order->save();

        return response()->json([
            "orderSent" => true
        ], 201);
    }

    /**
     * Eine Bestellung zeigen
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return Order::find($order);
    }

    /**
     * Funktion um die Lieferung zu bestätigen.
     *
     * @param $oid == ID der Bestellung
     * @return JSON response mit 204 status: { deliveryConfirmed: true }
     */
    public function update($oid)
    {
        $order = Order::find($oid);

        $order->delivered = true;
        $order->save();

        return response(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    /**
     * Eine Funktion um alle Bestellungen eines Restaurants zu zeigen
     * 
     * @param $rid == ID des Restaurants
     * @return array mit alle Bestellungen des Restaurants
     */
    public function show_all_orders_for_restaurant($rid)
    {
        return Order::where('restaurant_id', '=', $rid)->get();
    }
}
