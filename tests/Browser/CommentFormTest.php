<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CommentFormTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testViewComments()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/articles/article-3')
                    ->assertSee('Trackbacks and pingbacks');
        });
    }
    public function testWrongName()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/articles/article-3')
                ->type('name','VeryVeryLongName')
                ->type('email','admin@admin.com')
                ->type('site', 'http://mysite.com')
                ->type('text','Some text')
                ->press('Post Comment')
                ->pause('1000')
                ->assertSeeIn('.wrap_result', 'Ошибка: The name may not be greater than 15 characters.')
            ;
        });
    }
    public function testWrongEmail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/articles/article-3')
                ->type('name','Name')
                ->type('email','wrong')
                ->type('site', 'http://mysite.com')
                ->type('text','Some text')
                ->press('Post Comment')
                ->pause('1000')
                ->assertSeeIn('.wrap_result', 'Ошибка: The email must be a valid email address.')
            ;
        });
    }
    public function testWrongSite()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/articles/article-3')
                ->type('name','Name')
                ->type('email','admin@admin.com')
                ->type('site', 'http://mysiteVeryLong.com')
                ->type('text','Some text')
                ->press('Post Comment')
                ->pause('1000')
                ->assertSeeIn('.wrap_result', 'Ошибка: The site may not be greater than 20 characters.')
            ;
        });
    }
    public function testEmptyForm()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/articles/article-3')
                ->type('name','')
                ->type('email','')
                ->type('site', '')
                ->type('text','')
                ->press('Post Comment')
                ->pause('1000')
                ->assertSeeIn('.wrap_result', 'Ошибка: The text must be a string.')
            ;
        });
    }
    public function testCorrectForm()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/articles/article-3')
                ->type('name','Name')
                ->type('email','admin@admin.com')
                ->type('site', 'http://mysite.com')
                ->type('text','Some text')
                ->press('Post Comment')
                ->pause('1000')
                ->assertSeeIn('.wrap_result', 'Сохранено!')
            ;
        });
    }

}
