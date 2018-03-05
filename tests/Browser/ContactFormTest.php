<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ContactFormTest extends DuskTestCase
{
    public function testViewContacts()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/contacts')
                    ->assertTitle('Контакты');
        });
    }
    public function testWrongName()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/contacts')
                ->type('email','admin@admin.com')
                ->type('name','VeryVeryLongName')
                ->type('text','Some text')
                ->press('Send Message')
                ->assertSee('Поле name слишком длинное')
            ;
        });
    }
    public function testWrongEmail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/contacts')
                    ->type('email','wrong')
                    ->type('name','Name')
                    ->type('text','Some text')
                    ->press('Send Message')
                    ->assertSee('Поле email должно содержать правильный email адрес');
            ;
        });
    }public function testWrongText()
    {
    $this->browse(function (Browser $browser) {
        $browser->visit('/contacts')
            ->type('email','admin@admin.com')
            ->type('name','Name')
            ->type('text','')
            ->press('Send Message')
            ->assertSee('Поле text Обязательно к заполнению');
        ;
    });
    }
    public function testEmptyForm()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/contacts')
                ->type('email','')
                ->type('name','')
                ->type('text','')
                ->press('Send Message')
                ->assertSee('Поле name Обязательно к заполнению', 'Поле email Обязательно к заполнению', 'Поле text Обязательно к заполнению')
            ;
        });
    }
    public function testCorrectForm()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/contacts')
                ->type('email','admin@admin.com')
                ->type('name','Name')
                ->type('text','Some text')
                ->press('Send Message')
                ->assertSee('Email is send')
            ;
        });
    }
}
