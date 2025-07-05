<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_service_creation(): void
    {
        $user = User::factory()->create();
        $token = $user->createToken('test-token')->plainTextToken;

        $headers =  [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$token,
        ];
        $response = $this->withHeaders($headers)->post('/api/services', [
            'name' => 'Test',
            'price' => 450,
            'user_id'=>1
        ]);

        $response->assertStatus(200);
    }
}
