<?php

class DatabaseSeeder extends Seeder {

	  public function run()
    {
        DB::table('users')->delete();

        $user = new User();
        $user->email = 'iandresabad@yahoo.com';
        $user->password = Hash::make('letMeIn');
        $user->save();
    }
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
	}

}