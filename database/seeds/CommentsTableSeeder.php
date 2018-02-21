<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::create([
            'text' => 'This is comment',
            'name' => 'Name',
            'email' => 'email@emal.com',
            'site' => 'http://site.ru',
            'parent_id' => 0,
        ]);
        Comment::create([
            'text' => 'This is comment2',
            'name' => 'Name2',
            'email' => 'email2@emal.com',
            'site' => 'http://site2.ru',
            'parent_id' => 0,
        ]);
    }

}
