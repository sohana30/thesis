<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name = 'admin';
        $admin->slug = 'admin';
        $admin->save();

        $moderator = new Role();
        $moderator->name = 'moderator';
        $moderator->slug = 'moderator';
        $moderator->save();
    }
}