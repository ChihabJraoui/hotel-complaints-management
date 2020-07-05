<?php

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
		\App\Role::create([
			'level' => 1,
			'role' => 'Administrator',
		]);

		\App\Role::create([
			'level' => 2,
			'role' => 'Guest Manager',
		]);

		\App\Role::create([
			'level' => 3,
			'role' => 'Head Of Departement',
		]);

		\App\Role::create([
			'level' => 4,
			'role' => 'Employee',
		]);
    }
}
