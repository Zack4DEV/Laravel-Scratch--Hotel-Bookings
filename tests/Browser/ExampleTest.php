<?php

namesapce Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;


class ExampleTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/home')
                    ->assertSee('Welcome !');
        });

    }
}
