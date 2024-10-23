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
                'code'              => '1',
                'key'               => 'site_title',
                'value'             => 'Başlık',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
            [
                'code'              => '2',
                'key'               => 'site_description',
                'value'             => 'Açıklama',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ]
        ]);
    }
}
