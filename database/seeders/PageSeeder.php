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

        DB::table('pages')->insert([
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'sub_title'         => 'What We Do',
                'title'             => 'We Are Digital',
                'url'               => 'home-show',
                'description'       => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam semper ex ac velit varius semper. Mauris at dolor nec ante ultricies aliquam ac vitae diam. Quisque sodales vehicula elementum. Phasellus tempus tellus vitae ullamcorper hendrerit.',
                'image'             => 'defaultFiles/page/home_1.jpeg',
                'type'              => 2,
                'show'              => 0,
                'can_be_deleted'    => 0,
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'sub_title'         => 'About Us',
                'title'             => 'We Are Partners',
                'url'               => 'home-show-2',
                'description'       => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam semper ex ac velit varius semper. Mauris at dolor nec ante ultricies aliquam ac vitae diam. Quisque sodales vehicula elementum. Phasellus tempus tellus vitae ullamcorper hendrerit.',
                'image'             => 'defaultFiles/page/home_2.jpg',
                'type'              => 2,
                'show'              => 0,
                'can_be_deleted'    => 0,
            ],
        ]);

        DB::table('pages')->insert([
            [
                'code'          => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'         => 'A',
                'url'           => 'a',
                'description'   => 'a',
                'image'         => 'defaultFiles/page/supplier_1.png',
                'type'          => 3,
                'can_be_deleted' => 0,
            ],
            [
                'code'          => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'         => 'B',
                'url'           => 'b',
                'description'   => 'b',
                'image'         => 'defaultFiles/page/supplier_2.png',
                'type'          => 3,
                'can_be_deleted' => 0,
            ],
            [
                'code'          => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'         => 'C',
                'url'           => 'c',
                'description'   => 'c',
                'image'         => 'defaultFiles/page/supplier_3.png',
                'type'          => 3,
                'can_be_deleted' => 0,
            ],
            [
                'code'          => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'         => 'D',
                'url'           => 'd',
                'description'   => 'd',
                'image'         => 'defaultFiles/page/supplier_4.png',
                'type'          => 3,
                'can_be_deleted' => 0,
            ],
            [
                'code'          => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'         => 'E',
                'url'           => 'e',
                'description'   => 'e',
                'image'         => 'defaultFiles/page/supplier_5.png',
                'type'          => 3,
                'can_be_deleted' => 0,
            ],
            [
                'code'          => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'         => 'F',
                'url'           => 'f',
                'description'   => 'f',
                'image'         => 'defaultFiles/page/supplier_6.png',
                'type'          => 3,
                'can_be_deleted' => 0,
            ],
            [
                'code'          => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'         => 'G',
                'url'           => 'g',
                'description'   => 'g',
                'image'         => 'defaultFiles/page/supplier_7.png',
                'type'          => 3,
                'can_be_deleted' => 0,
            ],
            [
                'code'          => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'         => 'H',
                'url'           => 'h',
                'description'   => 'h',
                'image'         => 'defaultFiles/page/supplier_8.png',
                'type'          => 3,
                'can_be_deleted' => 0,
            ],
            [
                'code'          => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'         => 'I',
                'url'           => 'i',
                'description'   => 'i',
                'image'         => 'defaultFiles/page/supplier_9.png',
                'type'          => 3,
                'can_be_deleted' => 0,
            ],
            [
                'code'          => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'         => 'J',
                'url'           => 'j',
                'description'   => 'j',
                'image'         => 'defaultFiles/page/supplier_10.png',
                'type'          => 3,
                'can_be_deleted' => 0,
            ],

        ]);
    }
}
