<?php 

$connection = mysqli_connect("localhost", "root", "", "test");

$item = mysqli_query($connection,"SELECT * FROM test_table");
    if(!$item){
        die("Print data from table error");
    }

while($result = mysqli_fetch_array($item)){
    $result["imagelist"]."<br><br>";

    $imageDecode = str_replace("'",'"', $result["imagelist"]);
    $image = json_decode($imageDecode, true);
    echo $image[1]."<br>";
}