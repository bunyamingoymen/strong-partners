<?php

namespace Database\Seeders;

use App\Http\Controllers\MainController;
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

        $mainController = new MainController();

        //Diller
        DB::table('key_values')->insert([
            [
                'code'          => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'           => 'language',
                'value'         => 'Türkçe',
                'optional_1'    => 'tr',
                'optional_2'    => 'main_language',
                'optional_3'    => '',
            ],
            [
                'code'          => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'           => 'language',
                'value'         => 'English',
                'optional_1'    => 'en',
                'optional_2'    => '',
                'optional_3'    => '',
            ]
        ]);

        //Başlık ve tanıtım
        DB::table('key_values')->insert([
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'site_title',
                'value'             => 'Başlık',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'site_description',
                'value'             => 'Açıklama',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ]
        ]);

        //Sosyal Medya
        DB::table('key_values')->insert([
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'social_media',
                'value'             => '',
                'optional_1'        => 'Facebook',
                'optional_2'        => 'mdi mdi-facebook',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'social_media',
                'value'             => '',
                'optional_1'        => 'X (Twitter)',
                'optional_2'        => 'mdi mdi-twitter',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'social_media',
                'value'             => '',
                'optional_1'        => 'Instagram',
                'optional_2'        => 'mdi mdi-instagram',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'social_media',
                'value'             => '',
                'optional_1'        => 'Linkedin',
                'optional_2'        => 'mdi mdi-linkedin',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'social_media',
                'value'             => '',
                'optional_1'        => 'Youtube',
                'optional_2'        => 'mdi mdi-youtube',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'social_media',
                'value'             => '',
                'optional_1'        => 'Pinterest',
                'optional_2'        => 'mdi mdi-pinterest',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'social_media',
                'value'             => '',
                'optional_1'        => 'Whatsapp',
                'optional_2'        => 'mdi mdi-whatsapp',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'social_media',
                'value'             => '',
                'optional_1'        => 'Telegram',
                'optional_2'        => 'mdi mdi-telegram',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'social_media',
                'value'             => '',
                'optional_1'        => 'Discord',
                'optional_2'        => 'mdi mdi-discord',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'social_media',
                'value'             => '',
                'optional_1'        => 'Website',
                'optional_2'        => 'fas fa-globe',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],

        ]);

        //Arkaplanlar
        DB::table('key_values')->insert([
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'backgroudSettings',
                'value'             => 'Başlık',
                'optional_1'        => 'video', //image, silder ya da resim. İsteğe bağlı seçim.
                'optional_5'        => '',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'backgrouds',
                'value'             => 'video', //video, resim ya da silder
                'optional_1'        => '',
                'optional_5'        => '', //dosyanın yolu
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
        ]);

        //meta etiketleri
        DB::table('key_values')->insert([
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'meta',
                'value'             => '',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'meta',
                'value'             => '',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
        ]);

        //admin_meta etiketleri
        DB::table('key_values')->insert([
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'admin_meta',
                'value'             => '',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'admin_meta',
                'value'             => '',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
        ]);

        //faq
        DB::table('key_values')->insert([
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'faq_questions',
                'value'             => 'Soru 1',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'faq_questions',
                'value'             => 'Soru 2',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'faq_answers',
                'value'             => 'Cevap 1',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'faq_answers',
                'value'             => 'Cevap 2',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
        ]);

        //Logo
        DB::table('key_values')->insert([
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'index_logo',
                'value'             => 'Index Logo',
                'optional_5'        => '',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'user_login_logo',
                'value'             => 'User Login Logo',
                'optional_5'        => '', //dosyanın yolu
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'user_logo',
                'value'             => 'User Logo',
                'optional_5'        => '', //dosyanın yolu
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'admin_logo',
                'value'             => 'Admin Logo',
                'optional_5'        => '', //dosyanın yolu
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'admin_login_logo',
                'value'             => 'Admin Login Logo',
                'optional_5'        => '', //dosyanın yolu
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
        ]);

        //Ödeme yöntemleri
        DB::table('key_values')->insert([
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'payment_methods',
                'value'             => 'Money Order',
                'optional_1'        => '1', //seçili mi? değil mi?
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'payment_methods',
                'value'             => 'Credit Cart',
                'optional_1'        => '1', //seçili mi? değil mi?
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'key_values']),
                'key'               => 'payment_methods',
                'value'             => 'Paypal',
                'optional_1'        => '1', //seçili mi? değil mi?
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
        ]);
    }
}
