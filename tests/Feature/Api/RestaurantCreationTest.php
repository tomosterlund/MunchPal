<?php

namespace Tests\Feature;

use App\Models\Restaurant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RestaurantCreationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_restaurant_is_created_with_name()
    {
        $restaurant = Restaurant::factory()->make();
        $name = $restaurant->name;

        $this->assertNotEmpty($name);
    }

    public function test_restaurant_is_created_with_valid_form()
    {
        $restaurant = Restaurant::factory()->make();
        $address = $restaurant->address;
        $zip = $restaurant->zip;
        $city = $restaurant->city;
        $email = $restaurant->email;
        $password = $restaurant->password;
        $tag_one = $restaurant->tag_one;

        $this->assertIsString($city);
        $this->assertIsString($zip);
        $this->assertIsString($address);
        $this->assertIsString($email);
        $this->assertIsString($password);
        $this->assertIsString($tag_one);

        $this->assertNotEmpty($city);
        $this->assertNotEmpty($zip);
        $this->assertNotEmpty($address);
        $this->assertNotEmpty($email);
        $this->assertNotEmpty($password);
        $this->assertNotEmpty($tag_one);
    }

    public function test_restaurant_not_created_with_invalid_data()
    {
        $restaurant = Restaurant::factory()->make();

        $response = $this
            ->withHeader('Content-Type', 'application/json')
            ->postJson('/api/restaurants', [
                'name' => $restaurant->name,
                'tag_one' => 'Italian',
                'tag_two' => 'Pizza',
                'address' => $restaurant->address,
                'zip' => $restaurant->zip,
                'city' => $restaurant->city,
                'email' => $restaurant->email, //invalid email
                'password' => 'sdfergfer'
            ]);


        $response->assertStatus(422);
    }
}
