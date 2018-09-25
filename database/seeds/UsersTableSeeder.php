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
        //
        factory(App\User::class, 10)->create();
        $user = App\User::first();
        $user->type = config('constants.userType.admin');
        $user->save();
        echo $user->email . ' is the Admin. \r\n';
    }
}
