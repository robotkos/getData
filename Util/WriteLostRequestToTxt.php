<?php
/**
 * Created by PhpStorm.
 * User: sergeyro
 * Date: 22.08.18
 * Time: 11:23
 */

namespace Util;


class WriteLostRequestToTxt
{
    public static function write($path, $text){

        $f = fopen($path . "/reparse.txt", 'a+');
        fwrite($f, date("F j, Y, H:i:s") . " - " . $text . PHP_EOL);
        fclose($f);
    }
    public static function writehtml($path, $text){

        $f = fopen($path, 'a+');
        fwrite($f, $text);
        fclose($f);
    }
}