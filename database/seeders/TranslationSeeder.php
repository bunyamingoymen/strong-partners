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
            'Category' => [
                'tr' => 'Kategori',
                'en' => 'Category',
            ],
            'Active' => [
                'tr' => 'Aktif',
                'en' => 'Active',
            ],
            'Category Name' => [
                'tr' => 'Kategori İsmi',
                'en' => 'Category Name',
            ],
            'Name' => [
                'tr' => 'İsim',
                'en' => 'Name',
            ],
            'Select Category' => [
                'tr' => 'Kategori Seçiniz',
                'en' => 'Select Category',
            ],
            'Stock' => [
                'tr' => 'Stok',
                'en' => 'Stock',
            ],
            'Cargo Time' => [
                'tr' => 'Kargo Süresi',
                'en' => 'Cargo Time',
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
            'Repeat password' => [
                'tr' => 'Şifre Tekrarı',
                'en' => 'Repeat password',
            ],
            'E-Mail' => [
                'tr' => 'E-Mail',
                'en' => 'E-Mail',
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
            'Description' => [
                'tr' => 'Açıklama',
                'en' => 'Description',
            ],
            'Enter Description' => [
                'tr' => 'Açıklama Giriniz',
                'en' => 'Enter Description',
            ],
            'Main Title' => [
                'tr' => 'Ana Başlık',
                'en' => 'Main Title',
            ],
            'Main Description' => [
                'tr' => 'Ana Açıklama',
                'en' => 'Main Description',
            ],
            'Main Sub Title' => [
                'tr' => 'Ana Alt Başlık',
                'en' => 'Main Sub Title',
            ],
            'Enter Main Title' => [
                'tr' => 'Ana Başlık Giriniz',
                'en' => 'Enter Main Title',
            ],
            'Enter Main Sub Title' => [
                'tr' => 'Ana Alt Başlık Giriniz',
                'en' => 'Enter Main Sub Title',
            ],
            'Enter Main Description' => [
                'tr' => 'Ana Açıklama Giriniz',
                'en' => 'Enter Main Description',
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
            'Contact Information' => [
                'tr' => 'İletişim Bilgileri',
                'en' => 'Contact Information',
            ],
            'Address' => [
                'tr' => 'Adres',
                'en' => 'Address',
            ],
            'Enter Address' => [
                'tr' => 'Adres Giriniz',
                'en' => 'Enter Address',
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
            'Category Type' => [
                'tr' => 'Kategori tipi',
                'en' => 'Category Type',
            ],
            'Pages' => [
                'tr' => 'Sayfalar',
                'en' => 'Pages',
            ],
            'Products' => [
                'tr' => 'Ürünler',
                'en' => 'Products',
            ],
            'Order' => [
                'tr' => 'Sipariş',
                'en' => 'Order',
            ],
            'Orders' => [
                'tr' => 'Siparişler',
                'en' => 'Orders',
            ],
            'Other' => [
                'tr' => 'Diğer',
                'en' => 'Other',
            ],
            'Cargo Companies' => [
                'tr' => 'Kargo Firmaları',
                'en' => 'Cargo Companies',
            ],
            'Cargo Company' => [
                'tr' => 'Kargo Firması',
                'en' => 'Cargo Company',
            ],
            'Select Cargo Company' => [
                'tr' => 'Kargo Firması Seçiniz',
                'en' => 'Select Cargo Company',
            ],
            'Cargo Company Name' => [
                'tr' => 'Kargo Firması İsmi',
                'en' => 'Cargo Company Name',
            ],
            'Cargo Company Photo' => [
                'tr' => 'Kargo Firması Fotoğrafı',
                'en' => 'Cargo Company Photo',
            ],
            'IBAN Informaitons' => [
                'tr' => 'IBAN Bilgileri',
                'en' => 'IBAN Informaitons',
            ],
            'IBAN' => [
                'tr' => 'IBAN',
                'en' => 'IBAN',
            ],
            'Sub Title' => [
                'tr' => 'Alt Başlık',
                'en' => 'Sub Title',
            ],
            'Show On Homepage' => [
                'tr' => 'Anasayfada Göster',
                'en' => 'Show On Homepage',
            ],
            'If it is shown on the homepage, the image should be on the right side (If this is not selected, it will be on the left side.)' => [
                'tr' => 'Anasayfa da gösterilirse resim sağ tarafta olsun (Bu seçilemezse sol tarafta olur.)',
                'en' => 'If it is shown on the homepage, the image should be on the right side (If this is not selected, it will be on the left side.)',
            ],
            'Process' => [
                'tr' => 'Süreçler',
                'en' => 'Process',
            ],
            'Services' => [
                'tr' => 'Servisler',
                'en' => 'Services',
            ],
            'Bank Name' => [
                'tr' => 'Banka İsmi',
                'en' => 'Bank Name',
            ],
            'Customer References' => [
                'tr' => 'Müşteri Referansları',
                'en' => 'Customer References',
            ],
            'An error occurred (Key Value)' => [
                'tr' => 'Bir hata meydana geldi (Key Value)',
                'en' => 'An error occurred (Key Value)',
            ],
            'An error occurred while registering the user' => [
                'tr' => 'Kullanıcı kaydedilirken bir hata meydana geldi',
                'en' => 'An error occurred while registering the user',
            ],
            'Please enter a valid email address' => [
                'tr' => 'Lütfen geçerli bir mail adresi giriniz',
                'en' => 'Please enter a valid email address',
            ],
            'Password and Repeat Password do not match' => [
                'tr' => 'Şifre ile Şifre Tekrarı uyuşmamaktadır',
                'en' => 'Password and Repeat Password do not match',
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
            'Enter Icon' => [
                'tr' => 'İkon Giriniz',
                'en' => 'Enter Icon',
            ],
            'Icon' => [
                'tr' => 'İkon',
                'en' => 'Icon',
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

            'Choose files...' => [
                'tr' => 'Dosyaları Seçiniz...',
                'en' => 'Choose files...'
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

            'Home Logo White' => [
                'tr' => 'Beyaz Anasayfa Logosu',
                'en' => 'Home Logo White'
            ],

            'Home Logo Dark' => [
                'tr' => 'Siyah Anasayfa Logosu',
                'en' => 'Home Logo Dark'
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
            'Choose Picture' => [
                'tr' => 'Resim Seçiniz',
                'en' => 'Choose Picture'
            ],
            'Choose Pictures' => [
                'tr' => 'Resimleri Seçiniz',
                'en' => 'Choose Pictures'
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
            ],

            'Blog Create / Edit' => [
                'tr' => 'Blog Oluştur / Güncelle',
                'en' => 'Blog Create / Edit'
            ],

            'Supplier Create / Edit' => [
                'tr' => 'Tedarikçi Oluştur / Güncelle',
                'en' => 'Supplier Create / Edit'
            ],

            'Page Create / Edit' => [
                'tr' => 'Sayfa Oluştur / Güncelle',
                'en' => 'Page Create / Edit'
            ],

            'An error occurred (Page)' => [
                'tr' => 'Bir hata meydana geldi (Page)',
                'en' => 'An error occurred (Page)'
            ],

            'Content' => [
                'tr' => 'İçerik',
                'en' => 'Content'
            ],

            'Image' => [
                'tr' => 'Resim',
                'en' => 'Image'
            ],

            'Icon' => [
                'tr' => 'İkon',
                'en' => 'Icon'
            ],

            'This logo will appear at the top of the tab' => [
                'tr' => 'Bu logo sekmede en üst kısımda gözükecek',
                'en' => 'This logo will appear at the top of the tab'
            ],

            'Logout Successfully' => [
                'tr' => 'Çıkış Başarılı',
                'en' => 'Logout Successfully'
            ],

            'Logout' => [
                'tr' => 'Çıkış Yap',
                'en' => 'Logout'
            ],

            'Profile' => [
                'tr' => 'Profil',
                'en' => 'Profile'
            ],

            'Product' => [
                'tr' => 'Ürün',
                'en' => 'Product'
            ],

            'Blog' => [
                'tr' => 'Blog',
                'en' => 'Blog'
            ],
            'Product Create / Edit' => [
                'tr' => 'Ürün Oluştur / Güncelle',
                'en' => 'Product Create / Edit'
            ],

            'User Create / Edit' => [
                'tr' => 'Kullanıcı Oluştur / Güncelle',
                'en' => 'User Create / Edit'
            ],

            'Price' => [
                'tr' => 'Ücret',
                'en' => 'Price'
            ],

            'Price Type' => [
                'tr' => 'Ücret Tipi',
                'en' => 'Price Type'
            ],

            'Select Price Type' => [
                'tr' => 'Ücret Tipi Seçiniz',
                'en' => 'Select Price Type'
            ],
            'Contact Title' => [
                'tr' => 'İletişim Başlığı',
                'en' => 'Contact Title'
            ],
            'Contact Sub Title' => [
                'tr' => 'İletişim Alt Başlığı',
                'en' => 'Contact Sub Title'
            ],

            'Enter Contact Title' => [
                'tr' => 'İletişim Başlığı Giriniz',
                'en' => 'Enter Contact Title'
            ],
            'Enter Contact Sub Title' => [
                'tr' => 'İletişim Alt Başlığı Giriniz',
                'en' => 'Contact Sub Title'
            ],

            'Phones' => [
                'tr' => 'Telefon Numaraları',
                'en' => 'Phones'
            ],
            'E-mail Addresses' => [
                'tr' => 'E-Mail Adresleri',
                'en' => 'E-mail Addresses'
            ],

            'Phone Number Name' => [
                'tr' => 'Telefon Numarası İsmi',
                'en' => 'Phone Number Name'
            ],

            'Phone Number' => [
                'tr' => 'Telefon Numarası',
                'en' => 'Phone Number'
            ],

            'E-mail Address Name' => [
                'tr' => 'E-Mail Adres Adı',
                'en' => 'E-mail Address Name'
            ],

            'E-mail Address' => [
                'tr' => 'E-Mail Adresi',
                'en' => 'E-mail Address'
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

        $indexTexts = [
            'Home' => [
                'tr' => 'Anasayfa',
                'en' => 'Home',
            ],
            'Products' => [
                'tr' => 'Ürünler',
                'en' => 'Products',
            ],
            'Services' => [
                'tr' => 'Servislerimiz',
                'en' => 'Services',
            ],
            'About' => [
                'tr' => 'Hakkımızda',
                'en' => 'About',
            ],
            'Contact' => [
                'tr' => 'İletişim',
                'en' => 'Contact',
            ],
            'Suppliers' => [
                'tr' => 'Tedarikçiler',
                'en' => 'Suppliers',
            ],

            'About Us' => [
                'tr' => 'Hakkımızda',
                'en' => 'About Us',
            ],

            'Who We Are' => [
                'tr' => 'Biz Kimiz?',
                'en' => 'Who We Are?'
            ],
            'Address' => [
                'tr' => 'Adres',
                'en' => 'Address'
            ],
            'Office Numbers' => [
                'tr' => 'Ofis Numaraları',
                'en' => 'Office Numbers'
            ],
            'Our E-mail' => [
                'tr' => 'E-Mail Adreslerimiz',
                'en' => 'Our E-mail'
            ],

            'Name' => [
                'tr' => 'İsim',
                'en' => 'Name'
            ],
            'E-Mail' => [
                'tr' => 'E-Mail',
                'en' => 'E-Mail'
            ],
            'Subject' => [
                'tr' => 'Konu',
                'en' => 'Subject'
            ],
            'Message' => [
                'tr' => 'Mesaj',
                'en' => 'Message'
            ],

            'Please Enter Your Name' => [
                'tr' => 'Lütfen İsminizi Giriniz',
                'en' => 'Please Enter Your Name'
            ],

            'Please Enter Your E-mail Address' => [
                'tr' => 'Lütfen E-mail Adresinizi Giriniz',
                'en' => 'Please Enter Your E-mail Address'
            ],

            'Please Enter Your Message' => [
                'tr' => 'Lütfen Mesajınızı Giriniz',
                'en' => 'Please Enter Your Message'
            ],

            'Send Message' => [
                'tr' => 'Mesajı Gönder',
                'en' => 'Send Message'
            ],

            'Your message has been sent' => [
                'tr' => 'Mesajınız gönderildi',
                'en' => 'Your message has been sent'
            ]
        ];

        $commonValues = [
            'type' => 1,
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
