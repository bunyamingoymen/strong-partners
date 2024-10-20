<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('translations')->truncate();

        DB::table('translations')->insert([
            [
                'key'  => 'Page Not Found',
                'language'  => 'tr',
                'value' => 'Sayfa Bulunamadı',
                'type'  => 0,
            ],
            [
                'key'  => 'You must log in first',
                'language'  => 'tr',
                'value' => 'İlk önce giriş yapmanız gerekmektedir',
                'type'  => 0,
            ],
            [
                'key'  => 'Previously logged in',
                'language'  => 'tr',
                'value' => 'Daha önce giriş yapılmış',
                'type'  => 0,
            ],
        ]);

        DB::table('translations')->insert([
            [
                'key'  => 'Page Not Found',
                'language'  => 'en',
                'value' => 'Page Not Found',
                'type'  => 0,
            ],
            [
                'key'  => 'You must log in first',
                'language'  => 'en',
                'value' => 'You must log in first',
                'type'  => 0,
            ],
            [
                'key'  => 'Previously logged in',
                'language'  => 'en',
                'value' => 'Previously logged in',
                'type'  => 0,
            ],
        ]);
    }
}
