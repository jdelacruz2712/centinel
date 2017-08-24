<?php

use Illuminate\Database\Seeder;
use Centinel\User;
use Centinel\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin  = Role::where('name', 'admin')->first();
        $user = new User();
        $user->name = 'Jeancarlos';
        $user->first_last_name = 'De La Cruz';
        $user->second_last_name = 'Criollo';
        $user->username = 'jdelacruz';
        $user->email = 'jdelacruz@sapia.com.pe';
        $user->password = bcrypt('jdelacruz');
        $user->status_id = '1';
        $user->save();
        $user->roles()->attach($role_admin);
        $user2 = new User();
        $user2->name = 'Edward';
        $user2->first_last_name = 'Calle';
        $user2->second_last_name = 'Jarez';
        $user2->username = 'ecalle';
        $user2->email = 'ecalle@sapia.com.pe';
        $user2->password = bcrypt('ecalle');
        $user2->status_id = '1';
        $user2->save();
        $user2->roles()->attach($role_admin);
    }
}
