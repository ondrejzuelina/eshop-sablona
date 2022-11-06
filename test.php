<?php

echo "<pre>";
require_once("setup/connect.php");


$result = mysqli_query($connection, "SELECT * FROM product_item WHERE proid = 1517392");
    if(!$result){
        die("Print data from database error");
    }


foreach($result as $row){
    $test = $row["imagelist"];
    
    $input_data = array($test);

    
}

function printImage($image){
    global $count;
    global $values;

    if(!is_array($image)){
        die("ERROR Input data is not array");
    }

    foreach($image as $key => $value){
        if(is_array($value)){
            printValues($value);
        }else{
            $values[] =  $value;
            $count++;
        }
    }

    return array('total' => $count, 'values' => $values);

}

echo $json = str_replace('"',"'", $test);
$image = json_decode($json, true);
echo $image[0];

echo "</pre>";