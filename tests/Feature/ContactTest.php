<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Contact;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_is_accessible(): void
    {
        $response = $this->get('/contact');
        $response->assertOk();
    }

    public function test_contact_can_be_submitted(): void
    {
        $response = $this->post('/contact', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Hello',
        ]);

        $response->assertRedirect('/contact');
        $this->assertDatabaseHas('contacts', ['name' => 'John Doe']);
    }
}
