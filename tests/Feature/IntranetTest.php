<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IntranetTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_access_intranet_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/intranet');

        $response->assertStatus(200);
    }
}
