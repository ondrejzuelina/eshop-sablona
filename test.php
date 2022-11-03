<?php
echo "<pre>";
require_once("setup/connect.php");

$db = mysqli_query($connection, "SELECT * FROM product_item");

while($item = mysqli_fetch_array($db)){
    print_r($item["imagelist"]);
    echo "<br>";
}

echo "</pre>";
?>