<?php
/**
 * Created by PhpStorm.
 * User: sergeyro
 * Date: 27.06.17
 * Time: 9:38
 */

namespace Util;


class StringUtil
{
    public static function removeNl(string $string)
    {
        return trim(preg_replace('/\r\n|\r|\n/u', '', $string));
    }

    public static function removeDblNl(string $string)
    {
        $string = preg_replace_callback('/\r\n/im', function ($matches) {
            return PHP_EOL;
        }, $string);
        $string = preg_replace_callback('/\n+\s*/im', function ($matches) {
            return PHP_EOL;
        }, $string);

        return $string;
    }

    public static function removeTags(string $string)
    {
        return preg_replace('/<.*?>/im', ' ', $string);
    }

    public static function removeHtmlComments(string $string)
    {
        return preg_replace('/<!--.*?-->/s', ' ', $string);
    }

    public static function removeULTable(string $string)
    {
        return preg_replace('/\<ul.*?\<\/ul\>/s', ' ', $string);
    }

    public static function removeTrTdTable(string $string)
    {
        return preg_replace('/\<table\>.*?\<\/table\>/s', ' ', $string);
    }

    public static function removeDoubleWhitespaces(string $string)
    {
        return preg_replace('/\s+/im', ' ', $string);
    }

    public static function simple_unicode_decode($str) {
    $str=str_ireplace("u0001","?",$str);
    $str=str_ireplace("u0002","?",$str);
    $str=str_ireplace("u0003","?",$str);
    $str=str_ireplace("u0004","?",$str);
    $str=str_ireplace("u0005","?",$str);
    $str=str_ireplace("u0006","?",$str);
    $str=str_ireplace("u0007","•",$str);
    $str=str_ireplace("u0008","?",$str);
    $str=str_ireplace("u0009","?",$str);
    $str=str_ireplace("u000A","?",$str);
    $str=str_ireplace("u000B","?",$str);
    $str=str_ireplace("u000C","?",$str);
    $str=str_ireplace("u000D","?",$str);
    $str=str_ireplace("u000E","?",$str);
    $str=str_ireplace("u000F","¤",$str);
    $str=str_ireplace("u0010","?",$str);
    $str=str_ireplace("u0011","?",$str);
    $str=str_ireplace("u0012","?",$str);
    $str=str_ireplace("u0013","?",$str);
    $str=str_ireplace("u0014","¶",$str);
    $str=str_ireplace("u0015","§",$str);
    $str=str_ireplace("u0016","?",$str);
    $str=str_ireplace("u0017","?",$str);
    $str=str_ireplace("u0018","?",$str);
    $str=str_ireplace("u0019","?",$str);
    $str=str_ireplace("u001A","?",$str);
    $str=str_ireplace("u001B","?",$str);
    $str=str_ireplace("u001C","?",$str);
    $str=str_ireplace("u001D","?",$str);
    $str=str_ireplace("u001E","?",$str);
    $str=str_ireplace("u001F","?",$str);
    $str=str_ireplace("u0020"," ",$str);
    $str=str_ireplace("u0021","!",$str);
    $str=str_ireplace("u0022","\"",$str);
    $str=str_ireplace("u0023","#",$str);
    $str=str_ireplace("u0024","$",$str);
    $str=str_ireplace("u0025","%",$str);
    $str=str_ireplace("u0026","&",$str);
    $str=str_ireplace("u0027","'",$str);
    $str=str_ireplace("u0028","(",$str);
    $str=str_ireplace("u0029",")",$str);
    $str=str_ireplace("u002A","*",$str);
    $str=str_ireplace("u002B","+",$str);
    $str=str_ireplace("u002C",",",$str);
    $str=str_ireplace("u002D","-",$str);
    $str=str_ireplace("u002E",".",$str);
    $str=str_ireplace("u2026","…",$str);
    $str=str_ireplace("u002F","/",$str);
    $str=str_ireplace("u0030","0",$str);
    $str=str_ireplace("u0031","1",$str);
    $str=str_ireplace("u0032","2",$str);
    $str=str_ireplace("u0033","3",$str);
    $str=str_ireplace("u0034","4",$str);
    $str=str_ireplace("u0035","5",$str);
    $str=str_ireplace("u0036","6",$str);
    $str=str_ireplace("u0037","7",$str);
    $str=str_ireplace("u0038","8",$str);
    $str=str_ireplace("u0039","9",$str);
    $str=str_ireplace("u003A",":",$str);
    $str=str_ireplace("u003B",";",$str);
    $str=str_ireplace("u003C","<",$str);
    $str=str_ireplace("u003D","=",$str);
    $str=str_ireplace("u003E",">",$str);
    $str=str_ireplace("u2264","=",$str);
    $str=str_ireplace("u2265","=",$str);
    $str=str_ireplace("u003F","?",$str);
    $str=str_ireplace("u0040","@",$str);
    $str=str_ireplace("u0041","A",$str);
    $str=str_ireplace("u0042","B",$str);
    $str=str_ireplace("u0043","C",$str);
    $str=str_ireplace("u0044","D",$str);
    $str=str_ireplace("u0045","E",$str);
    $str=str_ireplace("u0046","F",$str);
    $str=str_ireplace("u0047","G",$str);
    $str=str_ireplace("u0048","H",$str);
    $str=str_ireplace("u0049","I",$str);
    $str=str_ireplace("u004A","J",$str);
    $str=str_ireplace("u004B","K",$str);
    $str=str_ireplace("u004C","L",$str);
    $str=str_ireplace("u004D","M",$str);
    $str=str_ireplace("u004E","N",$str);
    $str=str_ireplace("u004F","O",$str);
    $str=str_ireplace("u0050","P",$str);
    $str=str_ireplace("u0051","Q",$str);
    $str=str_ireplace("u0052","R",$str);
    $str=str_ireplace("u0053","S",$str);
    $str=str_ireplace("u0054","T",$str);
    $str=str_ireplace("u0055","U",$str);
    $str=str_ireplace("u0056","V",$str);
    $str=str_ireplace("u0057","W",$str);
    $str=str_ireplace("u0058","X",$str);
    $str=str_ireplace("u0059","Y",$str);
    $str=str_ireplace("u005A","Z",$str);
    $str=str_ireplace("u005B","[",$str);
    $str=str_ireplace("u005C","\\",$str);
    $str=str_ireplace("u005D","]",$str);
    $str=str_ireplace("u005E","^",$str);
    $str=str_ireplace("u005F","_",$str);
    $str=str_ireplace("u0060","`",$str);
    $str=str_ireplace("u0061","a",$str);
    $str=str_ireplace("u0062","b",$str);
    $str=str_ireplace("u0063","c",$str);
    $str=str_ireplace("u0064","d",$str);
    $str=str_ireplace("u0065","e",$str);
    $str=str_ireplace("u0066","f",$str);
    $str=str_ireplace("u0067","g",$str);
    $str=str_ireplace("u0068","h",$str);
    $str=str_ireplace("u0069","i",$str);
    $str=str_ireplace("u006A","j",$str);
    $str=str_ireplace("u006B","k",$str);
    $str=str_ireplace("u006C","l",$str);
    $str=str_ireplace("u006D","m",$str);
    $str=str_ireplace("u006E","n",$str);
    $str=str_ireplace("u006F","o",$str);
    $str=str_ireplace("u0070","p",$str);
    $str=str_ireplace("u0071","q",$str);
    $str=str_ireplace("u0072","r",$str);
    $str=str_ireplace("u0073","s",$str);
    $str=str_ireplace("u0074","t",$str);
    $str=str_ireplace("u0075","u",$str);
    $str=str_ireplace("u0076","v",$str);
    $str=str_ireplace("u0077","w",$str);
    $str=str_ireplace("u0078","x",$str);
    $str=str_ireplace("u0079","y",$str);
    $str=str_ireplace("u007A","z",$str);
    $str=str_ireplace("u007B","{",$str);
    $str=str_ireplace("u007C","|",$str);
    $str=str_ireplace("u007D","}",$str);
    $str=str_ireplace("u02DC","˜",$str);
    $str=str_ireplace("u007E","~",$str);
    $str=str_ireplace("u007F","",$str);
    $str=str_ireplace("u00A2","¢",$str);
    $str=str_ireplace("u00A3","£",$str);
    $str=str_ireplace("u00A4","¤",$str);
    $str=str_ireplace("u20AC","€",$str);
    $str=str_ireplace("u00A5","¥",$str);
    $str=str_ireplace("u0026quot;","\"",$str);
    $str=str_ireplace("u0026gt;",">",$str);
    $str=str_ireplace("u0026lt;",">",$str);
    return $str;
}
}