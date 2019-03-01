<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{

    /** @test */
    public function an_authnticated_user_can_add_a_task()
    {
        $user = $this->signIn();

        $task = $this->make("App\Task", ['user_id' => $user->id])->toArray();

        $this->post('/tasks', $task);

        $this->assertDatabaseHas('tasks', $task);
    }

    /** @test */
    public function guest_may_not_add_a_task()
    {
        $this->post('/tasks', [])
                ->assertRedirect('/login');
    }

    /** @test */
    public function an_authinticated_user_can_mark_task_as_completed()
    {
        $this->signIn();

        $task = $this->create("App\Task");

        $this->post('tasks/'.$task->id.'/complete');

        $this->assertTrue($task->refresh()->isComplete());
    }

    /** @test */
    public function an_authinticated_user_can_mark_task_as_uncompleted()
    {
        $this->signIn();

        $task = $this->create("App\Task");

        $this->delete('tasks/'.$task->id.'/complete');

        $this->assertFalse($task->refresh()->isComplete());
    }
}
