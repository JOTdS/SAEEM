<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('SAEEM')
                ->clickLink('Register')
                //->pause(3000)
                ->assertSee('E-Mail Address')
                ->type('name', 'Teste')
                ->type('email','teste@teste')
                ->type('password','testeteste')
                ->type('password_confirmation','testeteste')
                ->press('Register')
                //->pause(1000)
                ->assertSee('You are logged in!')
                ->pause(3000)
                ->clickLink('Logout')
                ->assertSee('SAEEM');
                //->pause(5000);
        });
    }
}
