<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manageUser = new Permission();
        $manageUser->name = 'manage users';
        $manageUser->slug = 'manage-users';
        $manageUser->save();

        $createPost = new Permission();
        $createPost->name = 'Delete Post';
        $createPost->slug = 'delete-posts';
        $createPost->save();
    }
}
