<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SliderTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(FiltersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(PortfoliosTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
    }
}
