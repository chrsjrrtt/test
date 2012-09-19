<?php
namespace Music;
include "lib/config.php";
$main = new \Main($db);
$category = new \Category($db, $_GET['categoryid']);
$perPage = $_GET['perpage'];
$page = $_GET['page'];
$sort = $_GET['sort'];
if(empty($perPage) or !is_numeric($perPAge)) {
    $perPage = 25;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php print $main->getSiteName(). ": ". $category->getName() ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php echo $main->getStyles() ?>
    </head>
    <body>
        <div id="wrap">
            <div id="header">
                <?php
                print $main->getHeader();
                ?>
            </div>
            <div id="main">
                <div id="top">
                    <p>
                        <?php
                        print $category->getShowing($page, $perPage);
                        ?>
                    </p>
                </div>
                <div id="items">
                    <?php
                    print $category->getItems($page, $perPage, $sort);
                    ?>
                </div>
            </div>
            <div id="footer">

            </div>
        </div>
    </body>
</html>