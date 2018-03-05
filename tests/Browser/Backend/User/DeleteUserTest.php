<?php

namespace Tests\Browser\Backend\User;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class DeleteUserTest extends DuskTestCase
{
    public function testDeleteUser()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit(route('admin.users.index'))
                    ->press('user_id_'.User::orderby('id', 'desc')->first()->id)
                    ->assertSeeIn('.success-box', 'Пользователь удален')
            ;
        });
    }
}
