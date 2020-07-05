<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    \App\Admin::create([
		    'username' => 'admin',
		    'email' => 'chihabajraoui@gmail.com',
		    'password' => bcrypt('0000'),
		    'firstname' => 'Chihab',
		    'lastname' => 'Jraoui',
	    ]);
    }
}
