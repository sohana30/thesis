<?php
use App\Role;
use App\User;
use App\Permission;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moderator = Role::where('slug','moderator')->first();
        $admin = Role::where('slug', 'admin')->first();
        $deletePost = Permission::where('slug','delete-post')->first();
        $manageUsers = Permission::where('slug','manage-users')->first();

        $user1 = new User();
        $user1->name = 'Sohana';
        $user1->email = 'soha@gmail.com';
        $user1->password = bcrypt('secret');
        $user1->save();
        $user1->roles()->attach($admin);
        $user1->permissions()->attach( $manageUsers);

        $user2 = new User();
        $user2->name = 'Marco';
        $user2->email = 'marco@gmail.com';
        $user2->password = bcrypt('secret');
        $user2->save();
        $user2->roles()->attach($moderator);
        $user2->permissions()->attach($deletePost);
    }
}