<?php

namespace Database\Seeders;

use App\Http\Controllers\MainController;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TempSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mainController = new MainController();

        //Kategori, cargo_company
        DB::table('key_values')->insert([
            [
                'code'              => '1categories',
                'key'               => 'categories',
                'value'             => 'Kategori 1',
                'can_be_deleted'    => 1,
                'delete'            => 0
            ],
            [
                'code'              => '2cargo_companies',
                'key'               => 'cargo_companies',
                'value'             => 'Kargo Firması 1',
                'can_be_deleted'    => 0,
                'delete'            => 0
            ],
        ]);

        DB::table('products')->insert([
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 1',
                'short_name'         => 'deneme_ürün_1',
                'description'             => 'Ürün 1',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 2',
                'short_name'         => 'deneme_ürün_2',
                'description'             => 'Ürün 2',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 3',
                'short_name'         => 'deneme_ürün_3',
                'description'             => 'Ürün 3',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 4',
                'short_name'         => 'deneme_ürün_4',
                'description'             => 'Ürün 4',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 5',
                'short_name'         => 'deneme_ürün_5',
                'description'             => 'Ürün 5',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 6',
                'short_name'         => 'deneme_ürün_6',
                'description'             => 'Ürün 6',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 7',
                'short_name'         => 'deneme_ürün_7',
                'description'             => 'Ürün 7',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 8',
                'short_name'         => 'deneme_ürün_8',
                'description'             => 'Ürün 8',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 9',
                'short_name'         => 'deneme_ürün_9',
                'description'             => 'Ürün 9',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 10',
                'short_name'         => 'deneme_ürün_10',
                'description'             => 'Ürün 10',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 11',
                'short_name'         => 'deneme_ürün_11',
                'description'             => 'Ürün 11',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 12',
                'short_name'         => 'deneme_ürün_12',
                'description'             => 'Ürün 12',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 13',
                'short_name'         => 'deneme_ürün_13',
                'description'             => 'Ürün 13',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 14',
                'short_name'         => 'deneme_ürün_14',
                'description'             => 'Ürün 14',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 15',
                'short_name'         => 'deneme_ürün_15',
                'description'             => 'Ürün 15',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 16',
                'short_name'         => 'deneme_ürün_16',
                'description'             => 'Ürün 16',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 17',
                'short_name'         => 'deneme_ürün_17',
                'description'             => 'Ürün 17',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 18',
                'short_name'         => 'deneme_ürün_18',
                'description'             => 'Ürün 18',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 19',
                'short_name'         => 'deneme_ürün_19',
                'description'             => 'Ürün 19',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 20',
                'short_name'         => 'deneme_ürün_20',
                'description'             => 'Ürün 20',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 21',
                'short_name'         => 'deneme_ürün_21',
                'description'             => 'Ürün 21',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 22',
                'short_name'         => 'deneme_ürün_22',
                'description'             => 'Ürün 22',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 23',
                'short_name'         => 'deneme_ürün_23',
                'description'             => 'Ürün 23',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 24',
                'short_name'         => 'deneme_ürün_24',
                'description'             => 'Ürün 24',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 25',
                'short_name'         => 'deneme_ürün_25',
                'description'             => 'Ürün 25',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 26',
                'short_name'         => 'deneme_ürün_26',
                'description'             => 'Ürün 26',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 27',
                'short_name'         => 'deneme_ürün_27',
                'description'             => 'Ürün 27',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 28',
                'short_name'         => 'deneme_ürün_28',
                'description'             => 'Ürün 28',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 29',
                'short_name'         => 'deneme_ürün_29',
                'description'             => 'Ürün 29',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 30',
                'short_name'         => 'deneme_ürün_30',
                'description'             => 'Ürün 30',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 31',
                'short_name'         => 'deneme_ürün_31',
                'description'             => 'Ürün 31',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 32',
                'short_name'         => 'deneme_ürün_32',
                'description'             => 'Ürün 32',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 33',
                'short_name'         => 'deneme_ürün_33',
                'description'             => 'Ürün 33',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 34',
                'short_name'         => 'deneme_ürün_34',
                'description'             => 'Ürün 34',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 35',
                'short_name'         => 'deneme_ürün_35',
                'description'             => 'Ürün 35',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 36',
                'short_name'         => 'deneme_ürün_36',
                'description'             => 'Ürün 36',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 37',
                'short_name'         => 'deneme_ürün_37',
                'description'             => 'Ürün 37',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 38',
                'short_name'         => 'deneme_ürün_38',
                'description'             => 'Ürün 38',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 39',
                'short_name'         => 'deneme_ürün_39',
                'description'             => 'Ürün 39',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 40',
                'short_name'         => 'deneme_ürün_40',
                'description'             => 'Ürün 40',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 41',
                'short_name'         => 'deneme_ürün_41',
                'description'             => 'Ürün 41',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 42',
                'short_name'         => 'deneme_ürün_42',
                'description'             => 'Ürün 42',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 43',
                'short_name'         => 'deneme_ürün_43',
                'description'             => 'Ürün 43',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 44',
                'short_name'         => 'deneme_ürün_44',
                'description'             => 'Ürün 44',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
            [
                'code'              => $mainController->generateUniqueCode(['table' => 'pages']),
                'title'              => 'deneme ürün 45',
                'short_name'         => 'deneme_ürün_45',
                'description'             => 'Ürün 45',
                'category'    => '1categories',
                'price_without_vat'     => '10',
                'priceType_without_vat' => 'TRY',
                'price'            => '20',
                'priceType' => 'TRY',
                'cargo_company' => '2cargo_companies',
                'cargo_price' => '35',
                'cargo_priceType' => 'TRY',
                'stock' => '5',
                'time' => '12',
            ],
        ]);
    }
}
