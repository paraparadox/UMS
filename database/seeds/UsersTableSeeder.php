<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Чтобы избежать ошибки
        //SQLSTATE[42000]: Syntax error or access violation: 1701
        //Cannot truncate a table referenced in a foreign key constraint
        //(`ums_db`.`role_user`, CONSTRAINT `role_user_user_id_foreign`
        //FOREIGN KEY (`user_id`) REFERENCES `ums_db`.`users` (`id`))
        //(SQL: truncate table `users`)
        //будем использовать метод delete() вместо truncate()
        //---------
        //User::truncate();
        //DB::table('role_user')->truncate();
        DB::table('role_user')->delete();
        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@a.com',
            'password' => Hash::make('password'),
        ]);

        $author = User::create([
            'name' => 'Author User',
            'email' => 'author@a.com',
            'password' => Hash::make('password'),
        ]);

        $user = User::create([
            'name' => 'Generic User',
            'email' => 'user@a.com',
            'password' => Hash::make('password'),
        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);

    }
}
