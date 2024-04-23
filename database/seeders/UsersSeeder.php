<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(array (
            0 =>
            array (
                'name' => 'Ozorio Silva Neto',
                'email' => 'ozorio.silva.neto@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('User@123'),
                'remember_token' => Str::random(10),
                'active' => 1,
                'role_id' => 1
            ),
            1 =>
            array (
                'name' => 'Rudimar',
                'email' => 'rudimar@saudehappy.com.br',
                'email_verified_at' => now(),
                'password' => Hash::make('User@123'),
                'remember_token' => Str::random(10),
                'active' => 1,
                'role_id' => 1
            )

        ));

    }
}
