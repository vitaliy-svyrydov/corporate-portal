<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'VIEW_ADMIN'
        ]);
        Permission::create([
            'name' => 'ADD_ARTICLES'
        ]);
        Permission::create([
            'name' => 'UPDATE_ARTICLES'
        ]);
        Permission::create([
            'name' => 'DELETE_ARTICLES'
        ]);
        Permission::create([
            'name' => 'ADMIN_USERS'
        ]);
        Permission::create([
            'name' => 'VIEW_ARTICLES'
        ]);
        Permission::create([
            'name' => 'EDIT_USERS'
        ]);
        Permission::create([
            'name' => 'VIEW_ADMIN_MENU'
        ]);
        Permission::create([
            'name' => 'EDIT_MENU'
        ]);
    }
}
