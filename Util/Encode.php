<?php
/**
 * Created by PhpStorm.
 * User: sergeyro
 * Date: 17.08.17
 * Time: 10:25
 */

namespace Util;


class Encode
{
    public static function strongEncode ($string) {
        $replace = str_replace('&#146;',"'", str_replace('&#148;','"', str_replace('&#145;',"'", str_replace('&#150;','-',html_entity_decode(mb_convert_encoding($string,'HTML-ENTITIES','UTF-8'))))));
        $replace = str_replace('&#147;','"', $replace);
        $replace = str_replace('&#128;&#153;',"'", $replace);
        $replace = str_replace('&#130;&#132;',"'", $replace);
        return $replace;
    }
}