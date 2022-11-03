<?php

require_once("simple-html-dom.php");

$dataFile = "notebooky_ultrabooky";

$app_file = array(
"input" => "data/xml/".$dataFile.".xml",
"output" => "data/sql/".$dataFile.".sql"
);

$app_file_buffer = array();
$app_data_list_buffer = array();
$app_data_list_header = array();


$app_xml_parser = file_get_html($app_file["input"]);

$app_data_list__inc = -1;
$app_data_list__item_children_inc = -1;

$app_data_list__response_inc = -1;
$app_data_list__image_list_inc = -1;
$app_data_list__image_list_b_inc = -1;


$app_data_list__image_list_pattern = array();
$app_data_list__image_list_match = array();

$app_data_list__navigator_data_list_pattern = array();
$app_data_list__image_list_match = array();


$app_data_list__logistic_data_list_pattern = array();
$app_data_list__logistic_data_list_match = array();


//echo $app_xml_parser->find('imageList',3)->innertext;


// ____app_data_list__children_count
while(1) {
	$app_data_list__item_children_inc++;

	if(!isset($app_xml_parser->find('ProductComplete',0)->children($app_data_list__item_children_inc)->tag)) {
		break;
	}

	else {
    array_push($app_data_list_header, $app_xml_parser->find('ProductComplete',0)->children($app_data_list__item_children_inc)->tag);
	}

}

// end ____app_data_list__children_count


// ____app_data_list__item_count
foreach($app_xml_parser->find('ProductComplete') as $item) {
	$app_data_list__inc++;
}

for($i = 0; $i <= $app_data_list__inc; $i++) {
	array_push($app_data_list_buffer, array());
}
// end ____app_data_list__children_count



/*
// ____app_data_list__image_list_children_count
foreach($app_xml_parser->find('ProductComplete') as $item) {
$app_data_list__image_list_inc++;

array_push($app_data_list__image_list_pattern, $app_data_list__image_list_inc);
array_push($app_data_list__image_list_match, $app_data_list__image_list_inc);

$app_data_list__image_list_children = -1;

	while(1) {
		$app_data_list__image_list_children++;
		if(!isset($app_xml_parser->find("ImageList", $app_data_list__image_list_inc )->children($app_data_list__image_list_children)->tag)) {
			break;	
		}

	}

$app_data_list__image_list_pattern[$app_data_list__image_list_inc] = $app_data_list__image_list_children;

}


foreach($app_xml_parser->find('ImageList') as $item) {
$app_data_list__image_list_b_inc++;

$app_data_list__image_list_children = array();

for($i = 0; $i <= $app_data_list__image_list_pattern[$app_data_list__image_list_b_inc]; $i++) {
	array_push($app_data_list__image_list_children, trim(strip_tags($item->children($i)->innertext)));
}	

array_pop($app_data_list__image_list_children);
$app_data_list__image_list_match[$app_data_list__image_list_b_inc] = json_encode($app_data_list__image_list_children, JSON_FORCE_OBJECT);
$app_data_list__image_list_children = array();

}


// end ____app_data_list__image_list_children_count

//print_r($app_data_list__image_list_match);
*/


// ____app_data_list__data_push
foreach($app_xml_parser->find('ProductComplete') as $item) {
$app_data_list__response_inc++;
	for($j = 0; $j <= $app_data_list__item_children_inc; $j++) {

		if(isset($item->children($j)->innertext)) {
			$app_data_list_buffer[$app_data_list__response_inc][$j] = $item->children($j)->innertext;
		}

		if($j == 49) {
	        
			$app_data_output = array();
			$test = $item->children($j)->innertext;

			$app_token_pattern = '/(<url[^>]*>(.*?)<\/url>)/';
			$app_token_match_inc = preg_match_all($app_token_pattern, $test, $app_token_match);

			for($i = 0; $i < $app_token_match_inc; $i++) {
            	array_push($app_data_output, trim(strip_tags($app_token_match[0][$i])));
			}
            
			$app_data_list_buffer[$app_data_list__response_inc][$j] = json_encode($app_data_output, JSON_FORCE_OBJECT);
			
			// echo"<pre>";
			// print_r($app_data_list_buffer);
			// echo "</pre>";
		}

		if($j == 50) {
			
		}	
		if($j == 51) {
			
		}

	}


}
// // ____app_data_list__data_push


print_r($app_data_list_buffer);
$file = fopen($app_file["output"], "w+");
fputcsv($file, $app_data_list_header);
foreach($app_data_list_buffer as $item){
	fputcsv($file, $item);
}

fclose($file);

ob_start();
$app_sql_data["table_name"] = "test_table";
$app_sql_data['column'] = implode(", ", $app_data_list_header);

$handle = fopen($app_file["output"], "w");

$app_sql_data["create_table_header"] = "CREATE TABLE IF NOT EXISTS `{$app_sql_data['table_name']}` (" . PHP_EOL;
fwrite($handle, $app_sql_data["create_table_header"]);

$app_sql_data["create_table_id"] = "`id` bigint(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT," . PHP_EOL;
fwrite($handle, $app_sql_data["create_table_id"]);


$app_data_list_header__inc = -1;
foreach($app_data_list_header as $item) {

	$app_data_list_header__inc++;

	$test = count($app_data_list_header) - 1;

	if(!($app_data_list_header__inc == $test)) {
		$app_sql_data["create_table_column"] = "`" . $item . "`" . " TEXT NOT NULL DEFAULT ''" . "," . PHP_EOL;
		fwrite($handle, $app_sql_data["create_table_column"]);
	}

	else {
		$app_sql_data["create_table_column"] = "`" . $item . "`" . " TEXT NOT NULL DEFAULT ''" . PHP_EOL;	
		fwrite($handle, $app_sql_data["create_table_column"]);
	}

}


$app_sql_data["create_table_footer"] = ") ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;" . PHP_EOL . PHP_EOL;
fwrite($handle, $app_sql_data["create_table_footer"]);



$app_sql_data["insert_into"] = "INSERT INTO {$app_sql_data['table_name']} ({$app_sql_data['column']}) VALUES" . PHP_EOL;
fwrite($handle, $app_sql_data["insert_into"]);


for($i = 0; $i <= $app_data_list__inc; $i++) {

	$app_sql_row = "(";
	$inc = 0;
	
	foreach($app_data_list_buffer[$i] as $item) {
		$inc++;

		if(!($app_data_list__item_children_inc == $inc)) {
			$app_sql_row .= '"' . str_replace('"', "'", $item) . '"' . ",";
			$app_sql_row .= '"' . htmlspecialchars($item, ENT_QUOTES, "UTF-8") . '"' . ",";

		}

		else {
    		$app_sql_row .= '"' . str_replace('"', "'", $item) . '"' . "";
    		$app_sql_row .= '"' . htmlspecialchars($item, ENT_QUOTES, "UTF-8") . '"' . "";
		}


	}

    
    if( !($i == count($app_data_list_buffer) - 1) ) {
    	$app_sql_row .= "),";
    }

    else {
    	$app_sql_row .= ");";
    }

$app_sql_data["insert_into_row"] = $app_sql_row . PHP_EOL;
fwrite($handle, $app_sql_data["insert_into_row"]);


}

fclose($handle);

echo ">>> Data written to the file successfully";


?>