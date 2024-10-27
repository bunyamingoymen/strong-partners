<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Main\KeyValue;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $backgroudSettings = KeyValue::Where('key', 'backgroudSettings')->first();
        if ($backgroudSettings) $backgroudSettings_type = $backgroudSettings->value;
        else $backgroudSettings_type = 'video';

        $backgrouds = KeyValue::Where('key', 'backgrouds')->where('value', $backgroudSettings_type)->where('delete', 0)->get();

        $site_title = KeyValue::Where('key', 'site_title')->first();
        $site_description = KeyValue::Where('key', 'site_description')->first();

        return view('index.index', compact('backgroudSettings_type', 'backgrouds', 'site_title', 'site_description'));
    }
}
