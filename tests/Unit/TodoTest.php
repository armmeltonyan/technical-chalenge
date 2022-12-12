<?php

namespace Tests\Unit;

use App\Models\Todo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Testing\Fluent\AssertableJson;

class TodoTest extends TestCase
{
    use RefreshDatabase;
    private $baserUrl = '/api/v1';
    /**
     * A basic unit test example.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

    public function test_getting_todos()
    {
        $response = $this->getJson($this->baserUrl.'/todos');
        $response->assertStatus(200);
    }

    public function test_creating_todos()
    {
        $response = $this->postJson($this->baserUrl.'/todos', ['title' => 'testTitle','description' => 'testDescription']);

        $response->assertStatus(201);
    }

    public function test_getting_uncompleted_todos()
    {
        $response = $this->getJson($this->baserUrl.'/todos/uncompleted');
        $response->assertStatus(200);
    }
    public function test_updating_status_todos()
    {
        $todoId = Todo::where('is_done',false)->value('id');
        $response = $this->putJson($this->baserUrl.'/todos', ['id' => $todoId]);

        $response->assertStatus(200);
    }
}
