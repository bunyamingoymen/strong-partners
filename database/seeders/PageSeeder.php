<?php

namespace Database\Seeders;

use App\Http\Controllers\MainController;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pages')->truncate();

        $mainController = new MainController();
        DB::table('pages')->insert([
            [
                'code'          => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'         => 'Hakkımızda',
                'url'           => 'about',
                'description'   => 'Hakkımızda',
                'type'          => 2,
                'can_be_deleted' => 0,
            ],
            [
                'code'          => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'         => 'Gizlilik Politikası',
                'url'           => 'privacy_policy',
                'description'   => 'Gizlilik Politikası',
                'type'          => 2,
                'can_be_deleted' => 0,
            ],
            [
                'code'          => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'         => 'Servislerimiz',
                'url'           => 'services',
                'description'   => 'Servislerimiz',
                'type'          => 2,
                'can_be_deleted' => 0,
            ],
            [
                'code'          => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'         => 'Ürünlerimiz',
                'url'           => 'urunlerimiz',
                'description'   => 'Ürünlerimiz',
                'type'          => 2,
                'can_be_deleted' => 0,
            ],
        ]);
    }
}
