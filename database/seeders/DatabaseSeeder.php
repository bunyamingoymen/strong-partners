<?php

namespace Database\Seeders;

use App\Http\Controllers\MainController;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $mainController = new MainController();

        $this->call(TranslationSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(KeyValueSeeder::class);

        DB::table('pages')->insert([
            [
                'code'          => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'         => 'Blog 1',
                'url'           => 'blog_1',
                'description'   => 'blog 1 açıklama',
                'type'          => 1
            ],
            [
                'code'          => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'         => 'Blog 2',
                'url'           => 'blog_2',
                'description'   => 'blog 2 açıklama',
                'type'          => 1
            ],
            [
                'code'          => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'         => 'Blog 3',
                'url'           => 'blog_3',
                'description'   => 'blog 3 açıklama',
                'type'          => 1
            ],
            [
                'code'          => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'         => 'Sayfa 1',
                'url'           => 'sayfa_1',
                'description'   => 'sayfa 1 açıklama',
                'type'          => 2
            ],
            [
                'code'          => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'         => 'Tedarikçi 1',
                'url'           => 'tedarikci_1',
                'description'   => 'Tedarikçi 1 açıklama',
                'type'          => 3
            ],
            [
                'code'          => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'         => 'Tedarikçi 2',
                'url'           => 'tedarikci_2',
                'description'   => 'Tedarikçi 2 açıklama',
                'type'          => 3
            ],
        ]);
    }
}
