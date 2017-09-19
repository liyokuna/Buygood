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
        DB::table('users')->insert([
            'name' => 'admin_lio',
			'lastname' =>str_random(10),
			'type'=>'admin',
            'email' => admin_lio.'@test.test',
            'password' => bcrypt('secret'),
        ]);
    }
}
