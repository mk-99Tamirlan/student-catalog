<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentCatalogTest extends TestCase
{
    use RefreshDatabase;

    private function validData(array $changes = []): array
    {
        return array_merge([
            'full_name' => 'Айдана Серикова',
            'group_name' => 'ПО-24-1',
            'email' => 'aidana@example.com',
        ], $changes);
    }

    public function test_root_redirects_to_students(): void
    {
        $this->get('/')->assertRedirect('/students');
    }

    public function test_empty_catalog_shows_message(): void
    {
        $this->get('/students')->assertOk()->assertSee('Студентов пока нет');
    }

    public function test_create_form_opens(): void
    {
        $this->get('/students/create')->assertOk()->assertSee('Сохранить');
    }

    public function test_student_can_be_created_and_seen_in_list(): void
    {
        $this->post('/students', $this->validData())
            ->assertRedirect(route('students.index'))
            ->assertSessionHas('success');
        $this->assertDatabaseHas('students', ['email' => 'aidana@example.com']);
        $this->get('/students')->assertOk()->assertSee('Айдана Серикова');
    }

    public function test_required_fields_are_validated(): void
    {
        foreach (['full_name', 'group_name', 'email'] as $field) {
            $data = $this->validData();
            unset($data[$field]);
            $this->post('/students', $data)->assertSessionHasErrors($field);
        }
        $this->assertDatabaseCount('students', 0);
    }

    public function test_invalid_email_is_rejected(): void
    {
        $this->post('/students', $this->validData(['email' => 'invalid-email']))
            ->assertSessionHasErrors('email');
        $this->assertDatabaseCount('students', 0);
    }

    public function test_duplicate_email_is_rejected(): void
    {
        Student::create($this->validData());
        $this->post('/students', $this->validData(['full_name' => 'Другой студент']))
            ->assertSessionHasErrors('email');
        $this->assertDatabaseCount('students', 1);
    }

    public function test_students_survive_new_http_requests(): void
    {
        Student::create($this->validData());
        $this->get('/students')->assertSee('Айдана Серикова');
        $this->get('/students')->assertSee('Айдана Серикова');
        $this->assertDatabaseCount('students', 1);
    }

    public function test_group_name_at_100_characters_is_accepted(): void
    {
        $group = str_repeat('A', 100);
        $this->post('/students', $this->validData(['group_name' => $group]))
            ->assertRedirect(route('students.index'));
        $this->assertDatabaseHas('students', ['group_name' => $group]);
    }

    public function test_group_name_at_101_characters_is_rejected(): void
    {
        $this->post('/students', $this->validData(['group_name' => str_repeat('A', 101)]))
            ->assertSessionHasErrors('group_name');
        $this->assertDatabaseCount('students', 0);
    }

    public function test_form_contains_csrf_and_old_values_on_error(): void
    {
        $this->from('/students/create')
            ->post('/students', $this->validData(['email' => 'broken-email']))
            ->assertRedirect('/students/create')
            ->assertSessionHasErrors('email');

        $this->get('/students/create')
            ->assertOk()
            ->assertSee('name="_token"', false)
            ->assertSee('value="Айдана Серикова"', false)
            ->assertSee('value="ПО-24-1"', false)
            ->assertSee('broken-email');
    }
}
