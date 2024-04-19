<?php

namespace Tests\Browser;

use Tests\TestCase;



class ExampleTest extends TestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_that_vue()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/home')
                    ->assertSee('Welcome !');
        });

    }
}
