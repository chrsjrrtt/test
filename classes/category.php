<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of category
 *
 * @author joeyjones
 */
class Category {
    private $db;
    private $name;
    private $link;
    private $id;

    public function __construct($inDb, $inLink) {
        $this->db = $inDb;
        $this->link = $inLink;
        $query = "SELECT * FROM item_categories WHERE link='". $inLink. "';";
        $result = mysql_query($query, $this->db);
        $data = mysql_fetch_assoc($result);
        if(mysql_num_rows($result) == 1) {
            $this->name = $data['name'];
            $this->id = $data['category_id'];
        }
    }

    public function getName() {
        return $this->name;
    }

    public function getShowing($page, $perPage) {
        $start = $perPage * ($page - 1) + 1;
        $end = $start + $perPage - 1;
        $query = "SELECT COUNT(*) AS count FROM `items` WHERE `category_id`=". $this->id. ";";
        $result = mysql_query($query, $this->db);
        $data = mysql_fetch_assoc($result);
        $total = $data['count'];
        if($total == 0) {
            $start = 0;
            $end = 0;
        }elseif($end > $total) {
            $end = $total;
        }
        $showing = "Showing results ". number_format($start). " to ". number_format($end). " of ". number_format($total);
        return $showing;
    }

    public function getItems($page, $perPage, $sort) {
        $query = "SELECT * FROM `items` `i` WHERE `i`.`category_id`=". $this->id;
        $query = $this->addSort($query, $sort);
        $query = $this->addLimit($query, $page, $perPage);
        $result = mysql_query($query, $this->db);

        $items = "";
        $count = 0;
        while($data = mysql_fetch_assoc($result)) {
            if($count % 5 == 0) {
                if($count > 0) {
                    $items .= "</div>\n";
                }
                $items .= "<div class='itemsHolder'>";
            }
            $items .= "<div class='itemContainer'><div class='item'><a href='". \_SITE_URL_. "/item/". $data['item_id']. "' title='". $data['name']. "'>";
            //$items .= "<img src='img/items/". $data['image_id']. "' />";
            $items .= "<div class='imageContainer'><img src='". \_SITE_URL_. "/img/items/music.jpg' /></div>";
            $items .= $data['name']. "</a>";
            $query = "SELECT `t`.`value` as 'value', `c`.`name` FROM `item_tags` as t, `category_tags` as c WHERE `t`.`item_id`=". $data['item_id']. " AND `t`.`category_tag_id`=`c`.`id` ORDER BY `c`.`priority`;";
            $result2 = mysql_query($query, $this->db);
            while($data2 = mysql_fetch_assoc($result2)) {
                $items .= "<br />". $data2['name']. ": ". $data2['value'];
            }
            $items .= "<br />$". $data['price']. "</div></div>";
            $count++;
        }
        return $items;
    }

    private function addSort($query, $sort) {

        return $query;
    }

    private function addLimit($query, $page, $perPage) {
        $start = $perPage * ($page - 1);
        $query .= " Limit ". $start. ", ". $perPage;
        return $query;
    }

}
?>
