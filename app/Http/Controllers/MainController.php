<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{

    public function assetFile($folder, $filename)
    {
        // Referer kontrolü: Yalnızca Laravel sayfalarından gelen istekler kabul edilir
        $referer = request()->headers->get('referer');
        $host = request()->getHost();

        // Eğer referer başlığı yoksa veya farklı bir yerden geliyorsa 403 döndür
        if (!$referer || !str_contains($referer, $host))
            return abort(403, 'Unauthorized access');


        $filePath = 'app/private/assets/' . $folder . '/' . $filename;

        if (file_exists(storage_path($filePath))) {

            if (str_ends_with($filename, '.css')) return response()->file(storage_path($filePath), ['Content-Type' => 'text/css',]);

            elseif (str_ends_with($filename, '.js')) return response()->file(storage_path($filePath), ['Content-Type' => 'application/javascript',]);

            else return response()->file(storage_path($filePath), []);
        }

        return abort(404);
    }
}
