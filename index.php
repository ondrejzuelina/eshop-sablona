<?php

session_start();
require_once("setup/connect.php");

function ____app_sql_query($data) {
    return $data;
    }
    
$REMOTE_HOSTNAME = "";
$LOCAL_HOSTNAME = "http://localhost/eshop-sablona/";

$REMOTE_STORAGE_SERVER = "";
// $LOCAL_STORAGE_SERVER = "http://localhost/app-data-management/";
$LOCAL_STORAGE_SERVER = "../";


$localhost_list = array(
    "127.0.0.1",
    "::1"
);

if(!in_array($_SERVER["REMOTE_ADDR"], $localhost_list))
{

    define("APP_PATH", "../eshop-sablona/");
    define("APP_RES_PATH", "{$REMOTE_HOSTNAME}");
    define("APP_INCLUDE_PATH", "");
    define("APP_STORAGE_PATH", "{$REMOTE_STORAGE_SERVER}");

}

else {

    define("APP_PATH", "../eshop-sablona/");
    define("APP_RES_PATH", "{$LOCAL_HOSTNAME}");
    define("APP_INCLUDE_PATH", "");
    define("APP_STORAGE_PATH", "{$LOCAL_STORAGE_SERVER}");

}
    
    
    
// ____app_form_data_user____pagination
function ____app_form_data_user____pagination() {
    
    global
    $connection,
    $app_pagination,
    $sql_search_query;
    
    $app_pagination = array(
    "total_rows" => null,
    "total_rows_per_page" => null,
    "offset" => null,
    "page_number" => null,
    "total_number_of_pages" => null,
    "previous_page" => null,
    "next_page" => null
    );
    
    
    define("APP_PAGINATION_URL", "index/page/");	
    
    // set
    $app_pagination["page_number"] = 1;
    // end set
    
    // set rows
    if(isset($_SESSION["total_rows_per_page"])) {
    $app_pagination["total_rows_per_page"] = $_SESSION["total_rows_per_page"];	
    }
    
    else {
    $app_pagination["total_rows_per_page"] = 20;
    }
    // end rows
    
    
$sql_query = ____app_sql_query("
    SELECT COUNT(*) AS total_rows FROM 
    product_item
    $sql_search_query
    ");
    // end sql_query
    
    // prepare
    $stmt = $connection->prepare($sql_query);
    $stmt->execute();
    $response = $stmt->get_result();
    $row = $response->fetch_array();
    $app_pagination["total_rows"] = $row["total_rows"];
    
    //echo ceil($app_pagination["total_rows"] / $app_pagination["total_rows_per_page"]);
    //echo "<br>";
    
    //echo $app_pagination["total_rows"];
    
    if(ceil($app_pagination["total_rows"] / $app_pagination["total_rows_per_page"]) == 0) {
    $app_pagination["total_number_of_pages"] = 1;	
    }
    
    else {
    $app_pagination["total_number_of_pages"] = ceil($app_pagination["total_rows"] / $app_pagination["total_rows_per_page"]);
    }
    
    // end prepare
    
    
    // get condition
    if(isset($_GET["page_number"])) {
    
    if(is_numeric($_GET["page_number"]) && !($_GET["page_number"] > $app_pagination["total_number_of_pages"]) && !($_GET["page_number"] < 0) && !($_GET["page_number"] == 0) ) {
    $app_pagination["page_number"] = $_GET["page_number"];
    }
    
    else {
    header("Location: " . APP_RES_PATH . "index");
    }
    
    }	
    // end get condition
    
    
    // set
    $app_pagination["offset"] = ($app_pagination["page_number"]-1) * $app_pagination["total_rows_per_page"];
    
    
    if( ($app_pagination["page_number"] - 1) == 0) {
    $app_pagination["previous_page"] = 1; 
    }
    
    else {
    $app_pagination["previous_page"] = $app_pagination["page_number"] - 1;
    }
    
    
    if( ($app_pagination["page_number"] + 1) >= $app_pagination["total_number_of_pages"]) {
    $app_pagination["next_page"] = $app_pagination["total_number_of_pages"]; 
    }
    
    else {
    $app_pagination["next_page"] = $app_pagination["page_number"] + 1;	
    }
    
    // end set
    
    }
    // end ____app_form_data_user____pagination
    
    
    ____app_form_data_user____pagination();



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <!-- Navigation-->
        <?php require_once("layouts/nav-menu.php"); ?>
        <!-- Header-->
        <!-- Carousel -->
            <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/acer_2022-10_omv_hpcz_2022-11-02-12-07-25.jpg" alt="Los Angeles" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="images/dell_2022-11_vypredaj_hpcz_2022-11-02-14-03-57.jpg" alt="Chicago" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="images/HPe FlexOffers BANNER1_2022-10-24-14-17-42.jpg" alt="New York" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="images/MS - Windows Server b cz_2022-11-02-14-18-08.jpg" alt="New York" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="images/Samsung - Gamingov?? sez??na za????n?? cz banner_2022-11-02-11-12-59.jpg" alt="New York" class="d-block w-100">
            </div>
            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            </button>
            </div>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php
                    $sql_search_query = "WHERE categorycode = 115"; 
                    $sql_query = ____app_sql_query("
                    SELECT * FROM  
                    product_item
                    $sql_search_query
                    ORDER BY 
                    id
                    ASC
                    LIMIT
        
                    $app_pagination[offset], $app_pagination[total_rows_per_page]
        
                    ");
                        
                        if($stmt = $connection->prepare($sql_query)) {
                        $stmt->execute();
                        $response = $stmt->get_result();
                        
                        $index_id = 1;
                        
                        if($response->num_rows > 0) {
                        while($row = $response->fetch_array()) {
                        
                        $response_data = array(
                        "index_id" => $index_id++,
                        "id" => $row["proid"],	
                        "title" => substr($row["name"],0,50)."...",
                        "quantity" => $row["onstocktext"]." Ks",
                        "price" => number_format($row["enduserprice"],2,".",",")." K??",
                        );
        
                        $data = $row["imagelist"];
                        $image_replace = str_replace("'",'"', $data);
                        $image = json_decode($image_replace, true);
                    ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <a href="view_item.php?id=<?php echo $response_data["id"]; ?>"><img class="card-img-top user-image" src="<?php echo $image[0]; ?>" alt="<?php echo $response_data["title"]; ?>" /></a>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder title-name"><?php echo $response_data["title"]; ?></h5>
                                    <!-- Product price-->
                                    <?php echo $response_data["price"]; ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="view_item.php?id=<?php echo $response_data["id"]; ?>">View options</a></div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }}}
                    ?>
                </div>
            </div>
            <container class="app_pagination_page">
                <ul class="pagination">

                    <?php if( ($app_pagination["page_number"] >= 2) ): ?>
                    <li class="page-item"><a href="<?php echo APP_RES_PATH; ?><?php echo APP_PAGINATION_URL ?><?php echo $app_pagination["previous_page"]; ?>">previous</a>	</li>	
                    <?php endif; ?>	


                    <?php if( !($app_pagination["page_number"] == 1) && isset($_GET["page_number"]) ): ?>
                    <li class="page-item"><a href="<?php echo APP_RES_PATH; ?><?php echo APP_PAGINATION_URL ?>1">1</a></li>		
                    <?php endif; ?>

                    <?php if( !($app_pagination["page_number"] <= 4) ): ?>
                    <li class="page-item"><a>...</a></li>	
                    <?php endif; ?>


                    <?php if( ( ($app_pagination["page_number"] - 2) > 0) && !(($app_pagination["page_number"] - 2) == 1) ): ?>
                    <a href="<?php echo APP_RES_PATH; ?><?php echo APP_PAGINATION_URL ?><?php echo $app_pagination["page_number"]- 2; ?>"><?php echo $app_pagination["page_number"] - 2; ?></a></li>	
                    <?php endif ?>

                    <?php if( (($app_pagination["page_number"] - 1) > 0) && !(($app_pagination["page_number"] - 1) == 1) ): ?>
                    <li class="page-item"><a href="<?php echo APP_RES_PATH; ?><?php echo APP_PAGINATION_URL ?><?php echo $app_pagination["page_number"] - 1; ?>"><?php echo $app_pagination["page_number"] - 1; ?></a></li>	
                    <?php endif ?>


                    <li class="page-item"><a class="app_pagination_subset_item____active" href="<?php echo APP_RES_PATH; ?><?php echo APP_PAGINATION_URL ?><?php echo $app_pagination["page_number"]; ?>"><?php echo $app_pagination["page_number"]; ?></a></li>


                    <?php if( !($app_pagination["page_number"] >= $app_pagination["total_number_of_pages"] - 1) ): ?>

                    <?php if( !( ($app_pagination["page_number"] + 1) >= ($app_pagination["total_number_of_pages"] - 1)) ): ?>
                    <li class="page-item"><a href="<?php echo APP_RES_PATH; ?><?php echo APP_PAGINATION_URL ?><?php echo $app_pagination["page_number"] + 1; ?>"><?php echo $app_pagination["page_number"] + 1; ?></a></li>	
                    <?php endif; ?>

                    <?php if( !( ($app_pagination["page_number"] + 2) >= ($app_pagination["total_number_of_pages"] - 1)) ): ?>
                    <li class="page-item"><a href="<?php echo APP_RES_PATH; ?><?php echo APP_PAGINATION_URL ?><?php echo $app_pagination["page_number"] + 2; ?>"><?php echo $app_pagination["page_number"] + 2; ?></a></li>	
                    <?php endif; ?>

                    <?php if( !( ($app_pagination["page_number"] + 3) >= ($app_pagination["total_number_of_pages"] - 1)) ): ?>
                    <li class="page-item"><a href="<?php echo APP_RES_PATH; ?><?php echo APP_PAGINATION_URL ?><?php echo $app_pagination["page_number"] + 3; ?>"><?php echo $app_pagination["page_number"] + 3; ?></a></li>	
                    <?php endif; ?>

                    <?php if( !( ($app_pagination["page_number"] + 4) >= ($app_pagination["total_number_of_pages"] - 1)) ): ?>
                    <li class="page-item"><a href="<?php echo APP_RES_PATH; ?><?php echo APP_PAGINATION_URL ?><?php echo $app_pagination["page_number"] + 4; ?>"><?php echo $app_pagination["page_number"] + 4; ?></a></li>	
                    <?php endif; ?>

                    <?php if( ( ($app_pagination["page_number"] + 1) == ($app_pagination["total_number_of_pages"] - 1)) ): ?>
                    <li class="page-item"><a href="<?php echo APP_RES_PATH; ?><?php echo APP_PAGINATION_URL ?><?php echo $app_pagination["page_number"] + 1; ?>"><?php echo $app_pagination["page_number"] + 1; ?></a></li>	
                    <?php endif; ?>


                    <?php endif; ?>


                    <?php if( !($app_pagination["page_number"] >= $app_pagination["total_number_of_pages"] - 2) ): ?>
                    <li class="page-item"><a>...</a></li>	
                    <?php endif; ?>


                    <?php if( !($app_pagination["page_number"] == $app_pagination["total_number_of_pages"]) ): ?>		
                    <li><a href="<?php echo APP_RES_PATH; ?><?php echo APP_PAGINATION_URL ?><?php echo $app_pagination["total_number_of_pages"] ?>"><?php echo $app_pagination["total_number_of_pages"]; ?></a></li>	
                    <?php endif; ?>


                    <?php if( !($app_pagination["page_number"] >= $app_pagination["total_number_of_pages"] - 1) ): ?>
                    <li class="page-item"><a href="<?php echo APP_RES_PATH; ?><?php echo APP_PAGINATION_URL ?><?php echo $app_pagination["next_page"] ?>" class="page-item">next</a></li>
                    <?php endif; ?>
                
                </ul>

            </container>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
