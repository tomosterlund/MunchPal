<?php

namespace Tests\Feature;

use App\Models\MenuItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateMenuItem extends TestCase
{

    // use RefreshDatabase;

    /**
     * Testet das Erstellen vom Menu Items
     */
    public function test_creation_of_menu_item_with_valid_input()
    {
        $response = $this
            ->withHeader('Content-Type', 'application/json')
            ->postJson('/api/menu-items', [
                'name' => 'Pizza',
                'description' => 'really tasty stuff',
                'price' => '12.89',
                'restaurant_id' => 1,
                'type' => 'food',
            ]);

        $response->assertStatus(201);
    }

    /**
     * Testet das Erstellen von Menu Item, mit ungültige Daten.
     */
    public function test_creation_of_menu_item_with_invalid_input()
    {
        $response = $this
            ->withHeader('Content-Type', 'application/json')
            ->postJson('/api/menu-items', [
                'name' => '',
                'description' => 'really tasty stuff',
                'price' => '18.89',
                'restaurant_id' => 1,
                'type' => 'food',
            ]);

        $response->assertStatus(422);
    }

    /**
     * Testet das bearbeiten von einem Menu Item
     */
    public function test_updating_menu_item()
    {
        // $this->withoutExceptionHandling();

        MenuItem::factory()->count(1)->create();

        $response = $this
            ->withHeader('Content-Type', 'application/json')
            ->putJson('/api/menu-items/1', [
                'name' => 'Blabla',
                'description' => 'really tasty stuff',
                'price' => '18.89',
                'type' => 'food',
            ]);
        
        $response->assertStatus(200);
    }
}
