<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'title' => 'Блог',
            'alias' => 'blog',
            'parent_id'=> 0,
        ]);
        Category::create([
            'title' => 'Компьютеры',
            'alias' => 'computers',
            'parent_id'=> 1,
        ]);
        Category::create([
            'title' => 'Интересное',
            'alias' => 'interesting',
            'parent_id'=> 1,
        ]);
        Category::create([
            'title' => 'Советы',
            'alias' => 'soveti',
            'parent_id'=> 1,
        ]);
    }
}
