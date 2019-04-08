<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = factory(User::class)->times(5)->make();
		User::insert($users->makeVisible(['password','remember_token'])->toArray());
		
		$user = User::find(1);
		$user->name = 'Tester';
		$user->password = bcrypt('zfy149zhl');
		$user->email = '376300797@qq.com';
		$user->position = 'Human Resources Director';
		$user->department = 'Human Resources';
		$user->tel = '18015413296';
		$user->is_admin = true;
		$user->save();
    }
}