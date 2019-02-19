<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = factory(User::class)->times(50)->make();
		User::insert($users->makeVisible(['password','remember_token'])->toArray());
		
		$user = User::find(1);
		$user->name = 'Tester';
		$user->password = bcrypt('zfy149zhl');
		$user->email = '376300797@qq.com';
		$user->is_admin = true;
		$user->save();
    }
}