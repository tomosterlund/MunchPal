<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    /**
     * Ein Test vom API für das Erstellen von Benutzer.
     * Testet:
     * 1) Form Validation
     * 2) Das der Benutzer in der DB ertsellt wird.
     * @return void
     */
    public function testing_user_creation_with_valid_form_data()
    {
        $response = $this
            ->withHeader('Content-Type', 'application/json')
            ->postJson('/api/users', [
                'name' => 'Tom',
                'email' => 'tom.osterlund1@gmail.com',
                'password' => 'klasan1',
                'address' => 'Torfstr 22',
                'zip' => '13353',
                'city' => 'Berlin'
            ]);

        $response
            ->assertStatus(201)
            ->assertExactJson([
                "created" => true
            ]);
    }

    public function testing_user_creation_with_invalid_form_data()
    {
        $response = $this
            ->withHeader('Content-Type', 'application/json')
            ->postJson('/api/users', [
                'name' => '',
                'email' => 'tom.osterlund1@gmail.com',
                'password' => 'klasan1',
                'address' => 'Torfstr 22',
                'zip' => '13353',
                'city' => 'Berlin'
            ]);

        $response
            ->assertStatus(422);
    }
}
