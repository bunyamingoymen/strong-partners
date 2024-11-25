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

        $home_show = Page::Where('url', 'home-show')->first();
        $home_show_2 = Page::Where('url', 'home-show-2')->first();

        $home_pages = Page::Where('show_home', 1)->get();

        $supplier = Page::Where('type', 3)->where('delete', 0)->get();

        return view('index.index', compact(
            'backgroudSettings_type',
            'backgrouds',

            'site_title',
            'site_description',

            'home_show',
            'home_show_2',
            'home_pages',

            'supplier'
        ));
    }
}
