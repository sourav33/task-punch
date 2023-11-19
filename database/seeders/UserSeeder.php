<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // User::create([
        //     'name' => 'Sourav Kundu',
        //     'email' => 'sourav@kundu.com',
        //     'level' => 3,
        //     'password' => Hash::make('password'),
        // ]);

        $users = [
            [
                'name' => 'Admin',
                'username' => '963852',
                'password' => Hash::make('1234'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
            // add more users as needed
        ];

        User::insert($users);


    }
}
