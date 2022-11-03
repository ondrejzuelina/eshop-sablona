<?php
echo "<pre>";
$connection = mysqli_connect("localhost", "root", "", "test");
    if(!$connection){
        die("Connection in to database error").mysqli_connect_error();
    }

$db = mysqli_query($connection, "SELECT * FROM test_table");

while($item = mysqli_fetch_array($db)){
    echo$image_replace = '"' . str_replace('"', "'", $item["imagelist"]) . '"' . ""."<br>";
    $image = json_decode($image_replace,true);
    echo $image[0];
    echo "<br>";
}

echo "</pre>";
?>