<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

/**
 * Description of main
 *
 * @author joeyjones
 */
class Main {
    private $db;

    function __construct($inDb) {
        $this->db = $inDb;
    }

    public function getSiteName() {
        return "Awesome Music Site";
    }

    public function getStyles() {
        return '<link rel="stylesheet" type="text/css" href="'. _SITE_URL_. '/lib/styles.css" />';
    }

    public function getHeader() {
        return "<h1><a href='". _SITE_URL_. "'>The best music site ever</a></h1>";
    }

    public function getNavbar() {
        $query = "SELECT * FROM `item_categories` ORDER BY `priority` ASC;";
        $result = mysql_query($query, $this->db);
        $navbar = "";
        $count = 0;
        while($current = mysql_fetch_assoc($result)) {
            if($count > 0 && $count %4 == 0) {
                $navbar .= "<br /><br /><br />";
            }
            $navbar .= "<div class='navcontainer'><a href='category/". $current['link']. "'><div class='navitem'>". $current['name']. "</div></a></div>";
            $count++;
        }
        return $navbar;
    }
}
?>
