<?php

namespace Tests\Browser\Backend\Auth;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class LoginTest extends DuskTestCase
{
    public function testViewAdminPageWithoutPermission()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(new User)
                    ->visit('/admin')
                    ->assertTitle('Вход на сайт');
        });
    }

    public function testCorrectLogin()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('/admin')
                    ->type('email', 'admin@admin.com')
                    ->type('password', 'qwerty1234')
                    ->press('Отправить')
                    ->assertTitle('Панель администратора');
        });
    }
    public function testUnCorrectLogin()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/logout');
            $browser->visit('/admin')
                    ->type('email','wrong')
                    ->type('password','wrong')
                    ->press('Отправить')
                    ->assertTitle('Вход на сайт');
        });
    }
}
