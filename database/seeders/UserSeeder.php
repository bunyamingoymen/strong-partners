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
     * php artisan db:seed --class=UserSeeder
     */
    public function run(): void
    {
        DB::table('admin_users')->truncate();
        DB::table('users')->truncate();

        DB::table('admin_users')->insert([
            [
                'code' => '1',
                'name'  => 'Bünyamin Göymen',
                'username'  => 'bgoymen',
                'email' => 'bunyamingoymen@gmail.com',
                'password'  => Hash::make('123'),
            ]
        ]);
    }
}
