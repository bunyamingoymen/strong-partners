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
            [
                'key'  => 'Sign in to continue',
                'language'  => 'tr',
                'value' => 'Devam Edebilmek için giriş yapınız',
                'type'  => 0,
            ],
            [
                'key'  => 'Username',
                'language'  => 'tr',
                'value' => 'Kullanıcı Adı',
                'type'  => 0,
            ],
            [
                'key'  => 'Password',
                'language'  => 'tr',
                'value' => 'Şifre',
                'type'  => 0,
            ],
            [
                'key'  => 'Enter username or email',
                'language'  => 'tr',
                'value' => 'Kullanıcı adı yada email adresi giriniz',
                'type'  => 0,
            ],
            [
                'key'  => 'Enter password',
                'language'  => 'tr',
                'value' => 'Şifre giriniz',
                'type'  => 0,
            ],
            [
                'key'  => 'Log In',
                'language'  => 'tr',
                'value' => 'Giriş Yap',
                'type'  => 0,
            ],
            [
                'key'  => 'Successfully logged in',
                'language'  => 'tr',
                'value' => 'Başarılı bir şekilde giriş yapıldı',
                'type'  => 0,
            ],
            [
                'key'  => 'Username or password is incorrect',
                'language'  => 'tr',
                'value' => 'Kullanıcı adı ya da şifre hatalı',
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
            [
                'key'  => 'Sign in to continue',
                'language'  => 'en',
                'value' => 'Sign in to continue',
                'type'  => 0,
            ],
            [
                'key'  => 'Username',
                'language'  => 'en',
                'value' => 'Username',
                'type'  => 0,
            ],
            [
                'key'  => 'Password',
                'language'  => 'en',
                'value' => 'Password',
                'type'  => 0,
            ],
            [
                'key'  => 'Enter username or email',
                'language'  => 'en',
                'value' => 'Enter username or email',
                'type'  => 0,
            ],
            [
                'key'  => 'Enter password',
                'language'  => 'en',
                'value' => 'Enter password',
                'type'  => 0,
            ],
            [
                'key'  => 'Log In',
                'language'  => 'en',
                'value' => 'Login',
                'type'  => 0,
            ],
            [
                'key'  => 'Successfully logged in',
                'language'  => 'en',
                'value' => 'Successfully logged in',
                'type'  => 0,
            ],
            [
                'key'  => 'Username or password is incorrect',
                'language'  => 'en',
                'value' => 'Username or password is incorrect',
                'type'  => 0,
            ],
        ]);
    }
}
