<?php

require_once("simple-html-dom.php");
$output = "notebooky_ultrabooky";

$app_file = array(
    "input" => "data/xml/".$output.".xml",
    "output" => "data/sql/".$output.".csv"
);

$app_data_list_buffer = array();
$data_header = array("id","image");
$app_data_list_header = array("proid","imagelist");
$app_data_list__inc = -1;
$app_data_list__item_children_inc = -1;

$app_xml_parser = file_get_html($app_file["input"]);

foreach($app_xml_parser->find("ProductComplete") as $item){
    array_push($app_data_list_buffer, array(
        $item->children(0)->innertext,
        $item->children(49)->children(0)->innertext,
    ));
  
}

ob_start();
// $app_sql_data["table_name"] = "test_table";
// $app_sql_data['column'] = implode(", ", $app_data_list_header);

// $handle = fopen($app_file["output"], "w");

// $app_sql_data["create_table_header"] = "CREATE TABLE IF NOT EXISTS `{$app_sql_data['table_name']}` (" . PHP_EOL;
// fwrite($handle, $app_sql_data["create_table_header"]);

// $app_sql_data["create_table_id"] = "`id` bigint(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT," . PHP_EOL;
// fwrite($handle, $app_sql_data["create_table_id"]);


// $app_data_list_header__inc = -1;
// foreach($app_data_list_header as $item) {

// 	$app_data_list_header__inc++;

// 	$test = count($app_data_list_header) - 1;

// 	if(!($app_data_list_header__inc == $test)) {
// 		$app_sql_data["create_table_column"] = "`" . $item . "`" . " TEXT NOT NULL DEFAULT ''" . "," . PHP_EOL;
// 		fwrite($handle, $app_sql_data["create_table_column"]);
// 	}

// 	else {
// 		$app_sql_data["create_table_column"] = "`" . $item . "`" . " TEXT NOT NULL DEFAULT ''" . PHP_EOL;	
// 		fwrite($handle, $app_sql_data["create_table_column"]);
// 	}

// }


// $app_sql_data["create_table_footer"] = ") ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;" . PHP_EOL . PHP_EOL;
// fwrite($handle, $app_sql_data["create_table_footer"]);



// $app_sql_data["insert_into"] = "INSERT INTO {$app_sql_data['table_name']} ({$app_sql_data['column']}) VALUES" . PHP_EOL;
// fwrite($handle, $app_sql_data["insert_into"]);


// for($i = 0; $i <= $app_data_list__inc; $i++) {

// 	$app_sql_row = "(";
// 	$inc = 0;
	
// 	foreach($app_data_list_buffer[$i] as $item) {
// 		$inc++;

// 		if(!($app_data_list__item_children_inc == $inc)) {
// 			//$app_sql_row .= '"' . str_replace('"', "'", $item) . '"' . ",";
// 			$app_sql_row .= '"' . htmlspecialchars($item, ENT_QUOTES, "UTF-8") . '"' . ",";

// 		}

// 		else {
//     		//$app_sql_row .= '"' . str_replace('"', "'", $item) . '"' . "";
//     		$app_sql_row .= '"' . htmlspecialchars($item, ENT_QUOTES, "UTF-8") . '"' . "";
// 		}


// 	}

    
//     if( !($i == count($app_data_list_buffer) - 1) ) {
//     	$app_sql_row .= "),";
//     }

//     else {
//     	$app_sql_row .= ");";
//     }

// $app_sql_data["insert_into_row"] = $app_sql_row . PHP_EOL;
// fwrite($handle, $app_sql_data["insert_into_row"]);


// }

// fclose($handle);

// echo ">>> Data written to the file successfully";

// echo "<pre>";
// print_r($app_data_list_buffer);
// echo "</pre>"; 

$file = fopen("test.csv", "w+");
fputcsv($file, $data_header);

foreach($app_data_list_buffer as $item){
    fputcsv($file, $item);
}

fclose($file);


echo ">>> Data written to the file successfully";
