<?php
namespace Music;
define("_INCLUDE_PATH_", "C:\\\\xampp\htdocs\Music\classes\\");
define("_SITE_URL_", "http://home.jjhosting.org/Music");

$db = mysql_connect('127.0.0.1', 'music', 'office');
mysql_select_db('music', $db);

class Loader {
    static public function load($name) {
        $count = 1;
        $goodName = str_replace(__NAMESPACE__. "\\", "", $name, $count);
        $goodName = mb_strtolower($goodName);
        $file = _INCLUDE_PATH_. $goodName. ".php";
        include_once($file);
    }
}

spl_autoload_register(__NAMESPACE__ .'\Loader::load');

$footer = "Made by joeyjones";

?>
