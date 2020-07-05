<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    \App\User::create([
	    	'role_id' => 1,
	    	'email' => 'chihabajraoui@gmail.com',
	    	'password' => bcrypt('0000'),
	    	'firstname' => 'Chihab',
	    	'lastname' => 'Jraoui',
	    ]);
    }
}
