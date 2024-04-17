<?php

namespace Tests\User;

use PHPUnit\Framework\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class ExampleTest extends TestCase
{
    /**
     * A User test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user = User::factory()->role(is(config('user.prefix'))->create();
        $this->actingAs($user);
        $response = $this->get('/home');
        $response->assertStatus(200);

    }
}
