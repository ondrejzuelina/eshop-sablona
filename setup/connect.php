<?php

$bussinesName = "MILLENIUM INTERNATIONAL s.r.o.";

global 
$connection;

global
$connection;

function app_db_connect(){
    $localhost_list = array(
        "127.0.0.1",
        "::1"
    );
    
    if(!in_array($_SERVER["REMOTE_ADDR"], $localhost_list)){
        define("DB_SERVER", "");
        define("DB_USER_NAME", "");
        define("DB_PASSWORD", "");
        define("DB_NAME", "");
    }else{
        define("DB_SERVER", "localhost");
        define("DB_USER_NAME", "root");
        define("DB_PASSWORD", "");
        define("DB_NAME", "cc-eshop");
    }


}

app_db_connect();


$connection = mysqli_connect(DB_SERVER, DB_USER_NAME, DB_PASSWORD, DB_NAME);
    if(!$connection){
        die("Connection in to database error");
    }

?>