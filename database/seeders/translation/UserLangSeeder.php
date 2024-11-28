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
            'Password and Repeat Password do not match' => [
                'tr' => 'Şifre ile Şifre Tekrarı uyuşmamaktadır',
                'en' => 'Password and Repeat Password do not match',
            ],

            'Username or password is incorrect' => [
                'tr' => 'Kullanıcı adı ya da şifre hatalı',
                'en' => 'Username or password is incorrect',
            ],

            'Username' => [
                'tr' => 'Kullanıcı Adı',
                'en' => 'Username ',
            ],

            'Name' => [
                'tr' => 'İsim',
                'en' => 'Name ',
            ],

            'E-Mail' => [
                'tr' => 'E-Mail',
                'en' => 'E-Mail ',
            ],

            'Terms and Conditions' => [
                'tr' => 'Şartlar Ve Koşullar',
                'en' => 'Terms and Conditions ',
            ],

            'Repeat password' => [
                'tr' => 'Şifre Tekrarı',
                'en' => 'Repeat password ',
            ],

            'Please enter a valid email address' => [
                'tr' => 'Lütfen geçerli bir mail adresi giriniz',
                'en' => 'Please enter a valid email address',
            ],
            'Please fill in the required fields' => [
                'tr' => 'Lütfen gerekli alanları doldurunuz',
                'en' => 'Please fill in the required fields',
            ],

            'Empty fields' => [
                'tr' => 'Boş Alanlar',
                'en' => 'Empty fields',
            ],

            'Error!' => [
                'tr' => 'Hata!',
                'en' => 'Error!',
            ],

            'Already have account?' => [
                'tr' => 'Zaten hesabın var mı?',
                'en' => 'Already have account?',
            ],

            'Logout Successfully' => [
                'tr' => 'Çıkış Başarılı',
                'en' => 'Logout Successfully',
            ],

            'Profile' => [
                'tr' => 'Profil',
                'en' => 'Profile',
            ],

            'Image changed successfully' => [
                'tr' => 'Resim Başarılı bir şekilde güncellendi',
                'en' => 'Image changed successfully',
            ],

            'Update' => [
                'tr' => 'Güncelle',
                'en' => 'Update',
            ],

            'Profile updated successfully' => [
                'tr' => 'Profil başarılı bir şekilde güncellendi',
                'en' => 'Profile updated successfully',
            ],

            'Current Password is Wrong' => [
                'tr' => 'Mevcut Şifre yanlış',
                'en' => 'Current Password is Wrong',
            ],

            'Password updated successfully' => [
                'tr' => 'Şifre başarılı bir şekilde güncellendi',
                'en' => 'Password updated successfully',
            ],

            'Addresses updated successfully' => [
                'tr' => 'Adresler başarılı bir şekilde güncellendi',
                'en' => 'Addresses updated successfully',
            ],

            'Example: Home, Work' => [
                'tr' => 'Örn: Ev, İş',
                'en' => 'Example: Home, Work',
            ],

            'Address' => [
                'tr' => 'Adres',
                'en' => 'Address',
            ],

            'Address Title' => [
                'tr' => 'Adres Başlığı',
                'en' => 'Address Title',
            ],

            'City' => [
                'tr' => 'İl',
                'en' => 'City',
            ],

            'County' => [
                'tr' => 'İlçe',
                'en' => 'County',
            ],
            'Post Code' => [
                'tr' => 'Posta Kodu',
                'en' => 'Post Code',
            ],

            'Are you sure' => [
                'tr' => 'Emin misiniz?',
                'en' => 'Are you sure?'
            ],

            'Do you want to delete this data' => [
                'tr' => 'Bu veriyi silmek istiyor musunuz?',
                'en' => 'Do you want to delete this data?'
            ],

            'Approve' => [
                'tr' => 'Onayla',
                'en' => 'Approve'
            ],

            'Cancel' => [
                'tr' => 'Vazgeç',
                'en' => 'Cancel',
            ],

            'Add New Address' => [
                'tr' => 'Yeni Adres Ekle',
                'en' => 'Add New Address',
            ],

            'Address deleted successfully' => [
                'tr' => 'Adres Başarılı bir şekilde silindi',
                'en' => 'Address deleted successfully',
            ],

            'Edit' => [
                'tr' => 'Düzenle',
                'en' => 'Edit',
            ],

            'Delete' => [
                'tr' => 'Sil',
                'en' => 'Delete',
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
