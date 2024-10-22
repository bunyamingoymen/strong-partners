<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Run this seeder code: php artisan db:seed --class=TranslationSeeder
     */
    public function run(): void
    {
        DB::table('translations')->truncate();
        DB::table('key_values')->where('key', 'language')->delete();

        $adminTexts = [
            'Page Not Found' => [
                'tr' => 'Sayfa Bulunamadı',
                'en' => 'Page Not Found',
            ],
            'You must log in first' => [
                'tr' => 'İlk önce giriş yapmanız gerekmektedir',
                'en' => 'You must log in first',
            ],
            'Previously logged in' => [
                'tr' => 'Daha önce giriş yapılmış',
                'en' => 'Previously logged in',
            ],
            'Sign in to continue' => [
                'tr' => 'Daha önce giriş yapılmış',
                'en' => 'Sign in to continue',
            ],
            'Username' => [
                'tr' => 'Kullanıcı Adı',
                'en' => 'Username',
            ],
            'Password' => [
                'tr' => 'Şifre',
                'en' => 'Password',
            ],
            'Enter username or email' => [
                'tr' => 'Kullanıcı adı yada email adresi giriniz',
                'en' => 'Enter username or email',
            ],
            'Enter password' => [
                'tr' => 'Şifre giriniz',
                'en' => 'Enter password',
            ],
            'Log In' => [
                'tr' => 'Giriş Yap',
                'en' => 'Log In',
            ],
            'Successfully logged in' => [
                'tr' => 'Başarılı bir şekilde giriş yapıldı',
                'en' => 'Successfully logged in',
            ],
            'Username or password is incorrect' => [
                'tr' => 'Kullanıcı adı ya da şifre hatalı',
                'en' => 'Username or password is incorrect',
            ],
            'User updated successfully' => [
                'tr' => 'Kullanıcı başarılı bir şekilde güncellendi',
                'en' => 'User updated successfully',
            ],
            'User added successfully' => [
                'tr' => 'Kullanıcı başarılı bir şekilde eklendi',
                'en' => 'User added successfully',
            ],
            'An error occurred while updating users' => [
                'tr' => 'Kullanıcılar güncellenirken bir hata meydana geldi',
                'en' => 'An error occurred while updating users',
            ],
            'Post is not supported' => [
                'tr' => 'Post desteklenmemektedir',
                'en' => 'Post is not supported',
            ],
            'Home' => [
                'tr' => 'Anasayfa',
                'en' => 'Home',
            ],
            'Users' => [
                'tr' => 'Kullanıcılar',
                'en' => 'Users',
            ],
            'User Create' => [
                'tr' => 'Kullanıcı Oluştur',
                'en' => 'User Create',
            ],
            'Menu' => [
                'tr' => 'Menü',
                'en' => 'Menu',
            ],
            'Management' => [
                'tr' => 'Yönetim',
                'en' => 'Management',
            ],
            'Settings' => [
                'tr' => 'Ayarlar',
                'en' => 'Settings',
            ],
            'Meta Tags' => [
                'tr' => 'Meta Etiketleri',
                'en' => 'Meta Tags',
            ],
            'Admin Meta Tags' => [
                'tr' => 'Admin Meta Etiketleri',
                'en' => 'Admin Meta Tags',
            ],
        ];

        // Ortak alanlar
        $commonValues = [
            'type' => 0,
        ];

        // Final verileri
        $finalData = [];

        // Her bir metin (key) ve dillerdeki karşılıkları döngü ile oluştur
        foreach ($adminTexts as $key => $languages) {
            foreach ($languages as $lang => $value) {
                $finalData[] = array_merge($commonValues, [
                    'key' => $key,
                    'language' => $lang,
                    'value' => $value
                ]);
            }
        }

        // Veritabanına ekleme
        DB::table('translations')->insert($finalData);

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
    }
}
