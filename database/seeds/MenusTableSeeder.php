<?php

use Illuminate\Database\Seeder;
use App\Menu;
use URL;

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
            'path' => URL::to(''),
            'parent'=> 0,
        ]);
        Menu::create([
            'title' => 'Блог',
            'path' => URL::to('articles'),
            'parent'=> 0,
        ]);
        Menu::create([
            'title' => 'Компьютеры',
            'path' => URL::to('articles/cat/computers'),
            'parent'=> 3,
        ]);
        Menu::create([
            'title' => 'Интересное',
            'path' => URL::to('articles/cat/interesting'),
            'parent'=> 3,
        ]);
        Menu::create([
            'title' => 'Советы',
            'path' => URL::to('articles/cat/soveti'),
            'parent'=> 3,
        ]);
        Menu::create([
            'title' => 'Портфолио',
            'path' => URL::to('portfolios'),
            'parent'=> 0,
        ]);
        Menu::create([
            'title' => 'Контакты',
            'path' => URL::to('contacts'),
            'parent'=> 0,
        ]);
    }

}
