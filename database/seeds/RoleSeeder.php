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
        //
        $admin = new Role([
            'name'=>'admin',
        ]);
        $operator = new Role([
           'name'=>'operator',
        ]);
        $admin->save();
        $operator->save();
    }
}
