<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeyValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('key_values')->truncate();

        DB::table('key_values')->insert([
            [
                'code'          => '1',
                'key'           => 'language',
                'value'         => 'Türkçe',
                'optional_1'    => 'tr',
                'optional_2'    => 'main_language',
                'optional_3'    => '',
            ],
            [
                'code'          => '2',
                'key'           => 'language',
                'value'         => 'English',
                'optional_1'    => 'en',
                'optional_2'    => '',
                'optional_3'    => '',
            ]
        ]);

        DB::table('key_values')->insert([
            [
                'code'              => '3',
                'key'               => 'site_title',
                'value'             => 'Başlık',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
            [
                'code'              => '4',
                'key'               => 'site_description',
                'value'             => 'Açıklama',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ]
        ]);
    }
}
