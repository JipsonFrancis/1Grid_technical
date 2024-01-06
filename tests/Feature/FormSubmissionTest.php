<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Form;

class FormSubmissionTest extends TestCase
{
    use RefreshDatabase; 


    public function test_form_can_be_submitted()
    {
        $formData = [
            'name' => 'kingsley man',
            'email' => 'sley@example.com',
            'message' => 'This is a test message.'
        ];

        $response = $this->post('/Post', $formData);

        $response->assertRedirect('/submited');
        $response->assertSessionHas('success', 'Form submitted successfully!');

        $this->assertDatabaseHas('forms', [
            'name' => 'kingsley man',
            'email' => 'sley@example.com',
            'message' => 'This is a test message.'
        ]);
    }
}
