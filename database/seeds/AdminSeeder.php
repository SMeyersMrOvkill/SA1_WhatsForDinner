<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Account;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Sam',
            'email' => 'sam@sa1.samuellmeyers.com',
            'password' => Hash::make('secret')
        ]);
        $samuser = User::where('name', 'Sam')->first();
        Account::create([
            'uid' => $samuser->id,
            'handle' => '->' . $samuser->name
        ]);
        $samacct = Account::where('handle', '->' . $samuser->name)->first();
    }
}
