<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'kurnia16',
                'name' => 'Kurniawati Agustina',
                'email' => 'kurnia@gmail.com',
                'password' => Hash::make('1234')
            ], [
                'username' => 'patria12',
                'name' => 'Paria Anggara',
                'email' => 'angga@gmail.com',
                'password' => Hash::make('1234')
            ]
        ]);
    }
}
