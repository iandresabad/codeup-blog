<?php

class UserTableSeeder extends Seeder {

  public function run()
    {
        DB::table('users')->delete();

        $user = new User();
        $user->email = 'iandresabad@yahoo.com';
        $user->password ='letMeIn';
        $user->save();
    }

}