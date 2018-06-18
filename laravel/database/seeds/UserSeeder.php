<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();

        $user->fill([
            'name'     => 'User',
            'email'    => 'user@email.com',
            'password' => bcrypt('secret')
        ]);

        $user->save();
    }
}
