<?php

require_once("setup/connect.php");


$result = mysqli_query($connection, "SELECT * FROM product_item WHERE proid = 1483516");
    if(!$result){
        die("Print data from database error");
    }


foreach($result as $row){
    $imageList = $row["imagelist"];
    $title = $row["name"];
}

function printImage($image){
    global $count;
    global $values;

    if(!is_array($image)){
        die("ERROR Input data is not array");
    }

    foreach($image as $key => $value){
        if(is_array($value)){
            print_r($value);
        }else{
            $values[] =  $value;
            $count++;
        }
    }

    return array('total' => $count, 'values' => $values);

}


$image_replace = str_replace("'",'"', $imageList);
$image = json_decode($image_replace, true);


$result = printImage($image);

?>
<h1><?php echo $result["total"]; ?></h1>
<div>
    <img src="<?php echo $image[0]; ?>" alt="<?php echo $title; ?>">
</div>
<div style="display: flex; width: 40%;">
<?php
for($i = 0; $i < $result["total"]; $i++){
?>
<img style="width: 100%;" src="<?php echo $result["values"][$i]; ?>" alt="<?php echo $title." obrazek".$i; ?>">

<?php
}
?>
</div><br><br>