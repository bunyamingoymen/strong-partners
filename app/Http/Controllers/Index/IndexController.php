<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Main\KeyValue;
use App\Models\Main\Page;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $backgroudSettings = KeyValue::Where('key', 'backgroudSettings')->first();
        if ($backgroudSettings) $backgroudSettings_type = $backgroudSettings->value;
        else $backgroudSettings_type = 'video';

        $backgrouds = KeyValue::Where('key', 'backgrouds')->where('value', $backgroudSettings_type)->where('delete', 0)->get();
        //dd(file_exists($backgrouds->first()->optional_5));
        $site_title = KeyValue::Where('key', 'site_title')->first();
        $site_description = KeyValue::Where('key', 'site_description')->first();

        $home_pages = Page::Where('show_home', 1)->get();

        $process_title = KeyValue::Where('key', 'process_title')->first();
        $processes = KeyValue::Where('key', 'processes')->where('delete', 0)->get();

        $service_title = KeyValue::Where('key', 'service_title')->first();
        $services = KeyValue::Where('key', 'services')->where('delete', 0)->get();

        $supplier = Page::Where('type', 3)->where('delete', 0)->get();

        $address = KeyValue::Where('key', 'addresses')->first();
        $phones = KeyValue::Where('key', 'phones')->where('delete', 0)->get();
        $emails = KeyValue::Where('key', 'emails')->where('delete', 0)->get();

        $social_media = KeyValue::Where('key', 'social_media')->where('delete', 0)->get();

        return view('index.index', compact(
            'backgroudSettings_type',
            'backgrouds',

            'site_title',
            'site_description',

            'home_pages',

            'process_title',
            'processes',

            'service_title',
            'services',

            'supplier',

            'address',
            'phones',
            'emails',

            'social_media',
        ));
    }
}
