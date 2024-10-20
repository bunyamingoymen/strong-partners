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
        if (!$referer || !str_contains($referer, $host)); //return abort(403, 'Unauthorized access');


        $filePath = 'app/private/assets/' . $folder . '/' . $filename;

        if (file_exists(storage_path($filePath))) {

            if (str_ends_with($filename, '.css')) $mimeType = 'text/css';
            elseif (str_ends_with($filename, '.js')) $mimeType = 'application/javascript';
            elseif (str_ends_with($filename, '.jpg') || str_ends_with($filename, '.jpeg')) $mimeType = 'image/jpeg';
            elseif (str_ends_with($filename, '.png')) $mimeType = 'image/png';
            elseif (str_ends_with($filename, '.gif')) $mimeType = 'image/gif';
            elseif (str_ends_with($filename, '.svg')) $mimeType = 'image/svg+xml';
            elseif (str_ends_with($filename, '.webp')) $mimeType = 'image/webp';
            elseif (str_ends_with($filename, '.ico')) $mimeType = 'image/x-icon';
            else $mimeType = mime_content_type(storage_path($filePath));

            return response()->file(storage_path($filePath), ['Content-Type' => $mimeType]);
        }

        return abort(404);
    }
}
