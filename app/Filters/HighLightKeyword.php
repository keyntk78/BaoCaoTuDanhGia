<?php

namespace App\Filters;

class HighLightKeyword {
    public static function handleHighlight($text, $keywords)
    {
        if (!empty($keywords)) {
            foreach ($keywords as $key) {
                $key = mb_strtolower($key->noiDung);
                $contentFake = mb_strtolower($text);
                if (strpos($contentFake, $key)) {
                    $word = substr($text, strpos($contentFake, $key), strlen($key));
                    $text = str_replace($word, '<strong class="text-danger">' . $word . '</strong>', $text);
                }
            }
        }
        return $text;
    }
    public static function addStrongTag($text, $key)
    {
        if (!empty($key)) {
            $key = mb_strtolower($key);
            $contentFake = mb_strtolower($text);
            if (gettype(strpos($contentFake, $key)) == 'integer') {
                $word = substr($text, strpos($contentFake, $key), strlen($key));
                $text = str_replace($word, '<strong class="text-dark">' . $word . '</strong>', $text);
            }
        }
        return $text;
    }
}
