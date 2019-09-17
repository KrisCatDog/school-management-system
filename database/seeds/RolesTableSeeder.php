<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'Admin'],
            ['name' => 'Student'],
            ['name' => 'Teacher'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
