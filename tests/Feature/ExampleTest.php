<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\products;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {

        // Create user with hashed password
        $user = User::factory()->create();
        $token = $user->createToken('test-token')->plainTextToken;

        // Create product associated with the user
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json'
        ])->post('/api/products', [
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 100,
            'user_id' => $user->id
        ]);

        $response->assertStatus(200);
    }

    public function test_insert_product_without_name()
    {
        // Create user with hashed password
        $user = User::factory()->create();
        $token = $user->createToken('test-token')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json'
        ])->post('/api/products', [
            'description' => 'Test Description',
            'price' => 100,
            'user_id' => $user->id
        ]);
        $response->assertJsonValidationErrors(['name']);
    }
}
