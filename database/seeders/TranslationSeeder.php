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
            'Meta Tag' => [
                'tr' => 'Meta Etiketi',
                'en' => 'Meta Tag',
            ],
            'Admin Meta Tags' => [
                'tr' => 'Admin Meta Etiketleri',
                'en' => 'Admin Meta Tags',
            ],
            'Backgrounds' => [
                'tr' => 'Arkaplanlar',
                'en' => 'Backgrounds',
            ],
            'Descriptions' => [
                'tr' => 'Açıklamalar',
                'en' => 'Descriptions',
            ],
            'FAQ' => [
                'tr' => 'SSS',
                'en' => 'FAQ',
            ],
            'FAQ' => [
                'tr' => 'SSS',
                'en' => 'FAQ',
            ],
            'Logos' => [
                'tr' => 'Logolar',
                'en' => 'Logos',
            ],
            'Menus' => [
                'tr' => 'Menüler',
                'en' => 'Menus',
            ],
            'Menus' => [
                'tr' => 'Menüler',
                'en' => 'Menus',
            ],
            'Payment Methods' => [
                'tr' => 'Ödeme Yöntemleri',
                'en' => 'Payment Methods',
            ],
            'Social Media Links' => [
                'tr' => 'Sosyal Medya Linkleri',
                'en' => 'Social Media Links',
            ],
            'Key Value' => [
                'tr' => 'Key Value',
                'en' => 'Key Value',
            ],
            'Members' => [
                'tr' => 'Üyeler',
                'en' => 'Members',
            ],
            'Datas' => [
                'tr' => 'Veriler',
                'en' => 'Datas',
            ],
            'Contact' => [
                'tr' => 'İletişim',
                'en' => 'Contact',
            ],
            'Blog' => [
                'tr' => 'Blog',
                'en' => 'Blog',
            ],
            'Categories' => [
                'tr' => 'Kategoriler',
                'en' => 'Categories',
            ],
            'Pages' => [
                'tr' => 'Sayfalar',
                'en' => 'Pages',
            ],
            'Producs' => [
                'tr' => 'Ürünler',
                'en' => 'Producs',
            ],
            'Other' => [
                'tr' => 'Diğer',
                'en' => 'Other',
            ],
            'Cargo Companies' => [
                'tr' => 'Kargo Firmaları',
                'en' => 'Cargo Companies',
            ],
            'IBAN Informaitons' => [
                'tr' => 'IBAN Bilgileri',
                'en' => 'IBAN Informaitons',
            ],
            'Customer References' => [
                'tr' => 'Müşteri Referansları',
                'en' => 'Customer References',
            ],
            'An error occurred (Key Value)' => [
                'tr' => 'Bir hata meydana geldi (Key Value)',
                'en' => 'An error occurred (Key Value)',
            ],
            'Updated' => [
                'tr' => 'Güncellendi',
                'en' => 'Updated',
            ],
            'Site Title' => [
                'tr' => 'Site Başlığı',
                'en' => 'Site Title',
            ],
            'Enter Title' => [
                'tr' => 'Başlık Giriniz',
                'en' => 'Enter Title',
            ],
            'Introduction' => [
                'tr' => 'Tanıtım Yazısı',
                'en' => 'Introduction',
            ],
            'Enter Introduction' => [
                'tr' => 'Tanıtım Yazısı Giriniz',
                'en' => 'Enter Introduction',
            ],
            'Save' => [
                'tr' => 'Kaydet',
                'en' => 'Save',
            ],
            'Money Order' => [
                'tr' => 'Havale/EFT',
                'en' => 'Money Order',
            ],
            'Credit Cart' => [
                'tr' => 'Kredi Kartı',
                'en' => 'Credit Cart',
            ],
            'Enter Link' => [
                'tr' => 'Link Giriniz',
                'en' => 'Enter Link',
            ],
            'New' => [
                'tr' => 'Yeni',
                'en' => 'New',
            ],
            'This value cannot be deleted' => [
                'tr' => 'Bu değer silinemez',
                'en' => 'This value cannot be deleted',
            ],
            'Deleted' => [
                'tr' => 'Silindi',
                'en' => 'Deleted',
            ],
            'Cancel' => [
                'tr' => 'Vazgeç',
                'en' => 'Cancel',
            ],

            'Choose file...' => [
                'tr' => 'Dosya Seçiniz...',
                'en' => 'Choose file...'
            ],

            'This logo is the logo that will appear on your home page' => [
                'tr' => 'Bu logo ana sayfanızda gözükecek olan logodur',
                'en' => 'This logo is the logo that will appear on your home page'
            ],

            'This logo is the logo that will appear when members log in' => [
                'tr' => 'Bu logo üyeler giriş yaparken gözükecek logodur',
                'en' => 'This logo is the logo that will appear when members log in',
            ],

            'This logo is the logo that will appear when members log in' => [
                'tr' => 'Bu logo üyeler giriş yaparken gözükecek logodur',
                'en' => 'This logo is the logo that will appear when members log in',
            ],

            'This logo is the logo that will appear after members log in' => [
                'tr' => 'Bu logo üyeler giriş yaptıktan sonra gözükecek logodur',
                'en' => 'This logo is the logo that will appear after members log in'
            ],

            'This logo is the logo that appears on the admin page' => [
                'tr' => 'Bu logo admin sayfasında gözüken logodur',
                'en' => 'This logo is the logo that appears on the admin page'
            ],

            'This logo is the logo that the admin user sees when logging in' => [
                'tr' => 'Bu logo admin kullanıcısının giriş yaparken gördüğü logodur',
                'en' => 'This logo is the logo that the admin user sees when logging in'
            ],

            'Home Logo' => [
                'tr' => 'Anasayfa Logosu',
                'en' => 'Home Logo'
            ],

            'Login Logo' => [
                'tr' => 'Giriş Logosu',
                'en' => 'Login Logo'
            ],

            'Member Logo' => [
                'tr' => 'Üye Logosu',
                'en' => 'Member Logo'
            ],

            'Admin Logo' => [
                'tr' => 'Admin Logosu',
                'en' => 'Admin Logo'
            ],

            'Admin Login Logo' => [
                'tr' => 'Admin Giriş Logosu',
                'en' => 'Admin Login Logo'
            ],
            'Video' => [
                'tr' => 'Video',
                'en' => 'Video'
            ],
            'Picture' => [
                'tr' => 'Resim',
                'en' => 'Picture'
            ],
            'Slider' => [
                'tr' => 'Slider',
                'en' => 'Slider'
            ],
            'Your browser does not support the video tag' => [
                'tr' => 'Tarayıcınız video etiketini desteklemiyor',
                'en' => 'Your browser does not support the video tag'
            ],

            'You can only upload .mp4 files' => [
                'tr' => 'Yalnızca .mp4 dosyaları yükleyebilirsiniz',
                'en' => 'You can only upload .mp4 files',
            ],

            'The file size must not exceed 5MB' => [
                'tr' => "Dosya boyutu 5MB'ı aşmamalıdır",
                'en' => 'The file size must not exceed 5MB'
            ],

            'Not found file' => [
                'tr' => "Dosya bulunamadı",
                'en' => 'Not found file'
            ],

            'You do not have access authorization' => [
                'tr' => "Erişim yetkiniz bulunmamaktadır",
                'en' => 'You do not have access authorization'
            ],

            'Language changed successfully' => [
                'tr' => "Dil başarılı bir şekilde değiştirildi",
                'en' => 'Language changed successfully'
            ],

            'An error occurred while changing the language' => [
                'tr' => 'Dil değiştirilirken bir hata meydana geldi',
                'en' => 'An error occurred while changing the language'
            ],

            'Question' => [
                'tr' => 'Soru',
                'en' => 'Question'
            ],

            'Answer' => [
                'tr' => 'Cevap',
                'en' => 'Answer'
            ],

            'Enter Question' => [
                'tr' => 'Soru Giriniz',
                'en' => 'Enter Question'
            ],

            'Enter Answer' => [
                'tr' => 'Cevap Giriniz',
                'en' => 'Enter Answer'
            ],

            'Approve' => [
                'tr' => 'Onayla',
                'en' => 'Approve'
            ],

            'Are you sure' => [
                'tr' => 'Emin misiniz?',
                'en' => 'Are you sure?'
            ],

            'Do you want to delete this data' => [
                'tr' => 'Bu veriyi silmek istiyor musunuz?',
                'en' => 'Do you want to delete this data?'
            ],

            'Created' => [
                'tr' => 'Oluşturuldu',
                'en' => 'Created',
            ],

            'Title' => [
                'tr' => 'Başlık',
                'en' => 'Title'
            ],
            'Actions' => [
                'tr' => 'İşlemler',
                'en' => 'Actions'
            ],

            'Update' => [
                'tr' => 'Güncelle',
                'en' => 'Sil'
            ],

            'Delete' => [
                'tr' => 'Sil',
                'en' => 'Delete'
            ]
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
    }
}
