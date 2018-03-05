<?php

namespace Tests\Browser\Backend\User;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class CreateUpdateUserTest extends DuskTestCase
{
    public function testSubmitEmptyForm()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit(route('admin.users.create'))
                ->type('name', '')
                ->type('login', '')
                ->type('email', '')
                ->type('password', '')
                ->type('password_confirmation', '')
                ->select('role_id', 1)
                ->press('Сохранить')
                ->assertSeeIn('.error-box', 'The name field is required.')
            ;
        });
    }
    public function testCorrectCreateUser()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit(route('admin.users.create'))
                ->type('name', 'TestingUser')
                ->type('login', 'TestingUser')
                ->type('email', 'TestingUser@use.com')
                ->type('password', 'TestingUser')
                ->type('password_confirmation', 'TestingUser')
                ->select('role_id', 1)
                ->press('Сохранить')
                ->assertSeeIn('.success-box', 'Пользователь добавлен')
            ;
        });
    }
    public function testUpdateUser()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/admin/users/'.User::orderby('id', 'desc')->first()->id.'/edit')
                ->type('name', 'UpdateUser')
                ->type('login', 'UpdateUser')
                ->type('email', 'UpdateUser@use.com')
                ->type('password', 'UpdateUser')
                ->type('password_confirmation', 'UpdateUser')
                ->select('role_id', 1)
                ->press('Сохранить')
                ->assertSeeIn('.success-box', 'Пользователь изменен')
            ;
        });
    }
}
