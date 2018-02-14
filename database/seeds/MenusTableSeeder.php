<?php

use Illuminate\Database\Seeder;
use App\Menu;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'title' => 'Главная',
            'path' => 'http://corporate.loc',
            'parent'=> 0,
        ]);
        Menu::create([
            'title' => 'Блог',
            'path' => 'http://corporate.loc/articles',
            'parent'=> 0,
        ]);
        Menu::create([
            'title' => 'Компьютеры',
            'path' => 'http://corporate.loc/articles/cat/computers',
            'parent'=> 3,
        ]);
        Menu::create([
            'title' => 'Интересное',
            'path' => 'http://corporate.loc/articles/cat/interesting',
            'parent'=> 3,
        ]);
        Menu::create([
            'title' => 'Советы',
            'path' => 'http://corporate.loc/articles/cat/soveti',
            'parent'=> 3,
        ]);
        Menu::create([
            'title' => 'Портфолио',
            'path' => 'http://corporate.loc/portfolios',
            'parent'=> 0,
        ]);
        Menu::create([
            'title' => 'Контакты',
            'path' => 'http://corporate.loc/contacts',
            'parent'=> 0,
        ]);
    }
}
