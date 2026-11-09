<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ValidationEdgeCasesTest extends TestCase
{
    use RefreshDatabase;

    public function test_valid_email_and_group_limits_allow_insert(): void
    {
        $this->post('/students', [
            'full_name' => str_repeat('A', 255),
            'group_name' => str_repeat('B', 100),
            'email' => 'valid@example.com',
        ])->assertRedirect('/students');
        $this->assertDatabaseCount('students', 1);
    }

    public function test_overlong_full_name_is_rejected(): void
    {
        $this->post('/students', [
            'full_name' => str_repeat('A', 256),
            'group_name' => 'ПО-24-1',
            'email' => 'valid@example.com',
        ])->assertSessionHasErrors('full_name');
        $this->assertDatabaseCount('students', 0);
    }

    public function test_overlong_group_is_rejected(): void
    {
        $this->post('/students', [
            'full_name' => 'Айдана',
            'group_name' => str_repeat('B', 101),
            'email' => 'valid@example.com',
        ])->assertSessionHasErrors('group_name');
        $this->assertDatabaseCount('students', 0);
    }

    public function test_record_is_visible_from_database_after_separate_request(): void
    {
        Student::create([
            'full_name' => 'Айдана Серикова',
            'group_name' => 'ПО-24-1',
            'email' => 'aidana@example.com',
        ]);
        $this->get('/students')->assertOk()->assertSee('aidana@example.com');
    }
}
