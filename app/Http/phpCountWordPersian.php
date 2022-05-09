<?php
namespace App\Http;

class phpCountWordPersian
{
    public static function string($string, $format = 0, $charlist = '[]')
    {
        $string=trim($string);
        if(empty($string))
            $words = array();
        else
            $words = preg_split('~[^\p{L}\p{N}\']+~u',$string);
        switch ($format) {
            case 0:
                return count($words);
            case 1:
            case 2:
                return $words;
            default:
                return $words;
        }
    }
}
