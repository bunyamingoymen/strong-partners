<?php

use App\Models\Translation;

function trans_db($key, $locale = null)
{
    return "deneme1";
    $locale = $locale ?? app()->getLocale();
    $translation = Translation::where('key', $key)->where('language', $locale)->first();

    return $translation ? $translation->value : $key;
}
