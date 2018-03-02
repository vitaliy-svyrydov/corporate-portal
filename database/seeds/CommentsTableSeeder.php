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
        Comment::create([
            'text' => 'This is comment for comment',
            'name' => 'Marta',
            'email' => 'Marta@emal.com',
            'site' => 'http://Marta.ru',
            'parent_id' => 1,
        ]);
        Comment::create([
            'text' => 'This is comment2 for comment',
            'name' => 'Ben',
            'email' => 'Ben@emal.com',
            'site' => 'http://Ben.ru',
            'parent_id' => 3,
        ]);
        Comment::create([
            'text' => 'This is comment3 for comment',
            'name' => 'Bob',
            'email' => 'Bob@emal.com',
            'site' => 'http://Bob.ru',
            'parent_id' => 5,
        ]);
        Comment::create([
            'text' => 'This is comment',
            'name' => 'Name',
            'email' => 'email@emal.com',
            'site' => 'http://site.ru',
            'parent_id' => 3,
            'article_id' => 2
        ]);
    }
}
