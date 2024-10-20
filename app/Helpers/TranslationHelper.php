<?php

use App\Models\Translation;

function lang_db($key, $type = 0, $locale = null)
{
    $locale = $locale ?? app()->getLocale();
    $translation = Translation::where('key', $key)->where('language', $locale)->where('type', $type)->first();

    return $translation ? $translation->value : $key;
}
