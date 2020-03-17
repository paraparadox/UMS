<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
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
        //(`ums_db`.`role_user`, CONSTRAINT `role_user_role_id_foreign`
        //FOREIGN KEY (`role_id`) REFERENCES `ums_db`.`roles` (`id`))
        //(SQL: truncate table `roles`)
        //будем использовать метод delete() вместо truncate()
        //---------
        //Role::truncate();
        DB::table('roles')->delete();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'author']);
        Role::create(['name' => 'user']);

    }
}
