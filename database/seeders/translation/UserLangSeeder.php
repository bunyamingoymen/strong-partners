<?php

namespace Database\Seeders\translation;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserLangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $indexTexts = [
            'Password' => [
                'tr' => 'Şifre',
                'en' => 'Password',
            ],
            'Remember me' => [
                'tr' => 'Beni Hatırla',
                'en' => 'Remember me',
            ],
            'Forgot your password?' => [
                'tr' => 'Şifremi unuttum?',
                'en' => 'Forgot your password?',
            ],
            'Log In' => [
                'tr' => 'Giriş Yap',
                'en' => 'Log In',
            ],
            "Don't have an account?" => [
                'tr' => 'Bir hesabın yok mu?',
                'en' => "Don't have an account?",
            ],
            'Sign Up' => [
                'tr' => 'Üye Ol',
                'en' => 'Sign Up',
            ],

            'Username or E-mail Address' => [
                'tr' => 'Kullanıcı adı veya E-mail Adresi',
                'en' => 'Username or E-mail Address',
            ],
            'Welcome!' => [
                'tr' => 'Hoşgeldiniz!',
                'en' => 'Welcome!',
            ],
            'Logout' => [
                'tr' => 'Çıkış Yap',
                'en' => 'Logout',
            ],
            'Dashboard' => [
                'tr' => 'Anasayfa',
                'en' => 'Dashboard',
            ],
            'Products' => [
                'tr' => 'Ürünler',
                'en' => 'Products',
            ],
            'Card' => [
                'tr' => 'Sepet',
                'en' => 'Card',
            ],
            'Orders' => [
                'tr' => 'Siparişler',
                'en' => 'Orders',
            ],
            'Add to cart' => [
                'tr' => 'Sepete Ekle',
                'en' => 'Add to cart',
            ],
            'Detail' => [
                'tr' => 'Detay',
                'en' => 'Detail',
            ],
            'Category' => [
                'tr' => 'Kategori',
                'en' => 'Category',
            ],
            'Price' => [
                'tr' => 'Fiyat',
                'en' => 'Price',
            ],
            'Stock Status' => [
                'tr' => 'Stok Durumu',
                'en' => 'Stock Status',
            ],
            'Pieces Left' => [
                'tr' => 'Adet Kaldı',
                'en' => 'Pieces Left',
            ],
            'Cargo Company' => [
                'tr' => 'Kargo Firması',
                'en' => 'Cargo Company',
            ],
            'Estimated Delivery' => [
                'tr' => 'Tahmini Teslimat',
                'en' => 'Estimated Delivery',
            ],
            'Workday(s)' => [
                'tr' => 'İş Günü',
                'en' => 'Workday(s)',
            ],
            'Product Description' => [
                'tr' => 'Ürün Açıklaması',
                'en' => 'Product Description',
            ],
        ];

        $commonValues = [
            'type' => 2,
        ];

        // Her bir metin (key) ve dillerdeki karşılıkları döngü ile oluştur
        foreach ($indexTexts as $key => $languages) {
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
    }
}
