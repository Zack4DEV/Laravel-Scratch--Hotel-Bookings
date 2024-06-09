<?php

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\Concerns\InteractsWithAuthentication;

class ExampleTest extends TestCase
        {
            /**
             * A User test example.
             *
             * @return void
             */
            public function test_that_user()
            {
        $user = User::factory()->create();
        $this->actingAs($user->role(is(config('user.prefix'))));
        $response = $this->get('/home');
        $response->assertStatus(200);

    }
}
