<?php

namespace Tests\Feature;

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * Testet das Erstellen von Bestellungen, mit korrekte Daten vom Klient
     */
    public function test_order_with_valid_values()
    {
        $order = Order::factory()->make();

        $response = $this
            ->withHeader('Content-Type', 'application/json')
            ->postJson('/api/orders', [
                'user_id' => $order->user_id,
                'restaurant_id' => $order->restaurant_id,
                'total_price' => $order->total_price,
                'items' => $order->items,
                'delivered' => $order->delivered,
                'address' => $order->address,
                'zip' => $order->zip,
                'city' => $order->city,
                'instructions' => $order->instructions,
            ]);

        $response->assertStatus(201);
    }

    /**
     * Testet das Erstellen von Bestellungen mit inkorrekte Daten vom Klient
     */
    public function test_order_with_invalid_values()
    {
        $order = Order::factory()->make();

        $response = $this
            ->withHeader('Content-Type', 'application/json')
            ->postJson('/api/orders', [
                'user_id' => $order->user_id,
                'restaurant_id' => $order->restaurant_id,
                'total_price' => $order->total_price,
                'items' => $order->items,
                'delivered' => $order->delivered,
                'address' => 567,
                'zip' => $order->zip,
                'city' => $order->city,
                'instructions' => $order->instructions,
            ]);

        $response->assertStatus(422);
    }

    /**
     * Testet das zeigen von eine Bestellung
     */
    public function test_show_order()
    {
        $response = $this
            ->get('/api/orders/1');
        
        $response->assertStatus(200);
    }

    /**
     * Testet die Bestätigung von Lieferungen.
     */
    public function test_order_delivery_status_update()
    {
        $response = $this
            ->put('/api/orders/3');
        
        $response->assertStatus(204);
    }

    /**
     * Testet das Zeigen von alle Bestellungen eines Restaurants
     */
    public function test_showing_all_restaurant_orders()
    {
        $response = $this
            ->get('/api/show-all-orders/2');

        $response->assertStatus(200);
    }
}
