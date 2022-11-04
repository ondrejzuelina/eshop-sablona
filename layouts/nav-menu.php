<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <!-- <a class="navbar-brand" href="#!">Start Bootstrap</a> -->
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button> -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="index.php?categoryid=11" role="button" data-bs-toggle="dropdown" aria-expanded="false">PC a Notebooky</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            $result = mysqli_query($connection, "SELECT * FROM categorylist WHERE ParentCategoryCode = 11");
                                if(!$result){
                                    die("Print data from database error");
                                }
                            while($row = mysqli_fetch_array($result)){
                            ?>
                            <li><a class="dropdown-item" href="view_category.php?action=<?php echo $row["CategoryCode"]; ?>"><?php echo $row["CategoryName"]; ?></a></li>
                            <?php
                            }
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="index.php?categoryid=121" role="button" data-bs-toggle="dropdown" aria-expanded="false">Multifunkce a tiskárny</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            $result = mysqli_query($connection, "SELECT * FROM categorylist WHERE ParentCategoryCode = 121");
                                if(!$result){
                                    die("Print data from database error");
                                }
                            while($row = mysqli_fetch_array($result)){
                            ?>
                            <li><a class="dropdown-item" href="view_category.php?action=<?php echo $row["CategoryCode"]; ?>"><?php echo $row["CategoryName"]; ?></a></li>
                            <?php
                            }
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="index.php?categoryid=6" role="button" data-bs-toggle="dropdown" aria-expanded="false">Periferie</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            $result = mysqli_query($connection, "SELECT * FROM categorylist WHERE ParentCategoryCode = 6");
                                if(!$result){
                                    die("Print data from database error");
                                }
                            while($row = mysqli_fetch_array($result)){
                            ?>
                            <li><a class="dropdown-item" href="view_category.php?action=<?php echo $row["CategoryCode"]; ?>"><?php echo $row["CategoryName"]; ?></a></li>
                            <?php
                            }
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="index.php?categoryid=3" role="button" data-bs-toggle="dropdown" aria-expanded="false">Komponenty</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            $result = mysqli_query($connection, "SELECT * FROM categorylist WHERE ParentCategoryCode = 3");
                                if(!$result){
                                    die("Print data from database error");
                                }
                            while($row = mysqli_fetch_array($result)){
                            ?>
                            <li><a class="dropdown-item" href="view_category.php?action=<?php echo $row["CategoryCode"]; ?>"><?php echo $row["CategoryName"]; ?></a></li>
                            <?php
                            }
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="index.php?categoryid=7" role="button" data-bs-toggle="dropdown" aria-expanded="false">Servery a zálohování</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            $result = mysqli_query($connection, "SELECT * FROM categorylist WHERE ParentCategoryCode = 7");
                                if(!$result){
                                    die("Print data from database error");
                                }
                            while($row = mysqli_fetch_array($result)){
                            ?>
                            <li><a class="dropdown-item" href="view_category.php?action=<?php echo $row["CategoryCode"]; ?>"><?php echo $row["CategoryName"]; ?></a></li>
                            <?php
                            }
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="index.php?categoryid=8" role="button" data-bs-toggle="dropdown" aria-expanded="false">Síťové prvky</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            $result = mysqli_query($connection, "SELECT * FROM categorylist WHERE ParentCategoryCode = 8");
                                if(!$result){
                                    die("Print data from database error");
                                }
                            while($row = mysqli_fetch_array($result)){
                            ?>
                            <li><a class="dropdown-item" href="view_category.php?action=<?php echo $row["CategoryCode"]; ?>"><?php echo $row["CategoryName"]; ?></a></li>
                            <?php
                            }
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="index.php?categoryid=9" role="button" data-bs-toggle="dropdown" aria-expanded="false">Software</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            $result = mysqli_query($connection, "SELECT * FROM categorylist WHERE ParentCategoryCode = 9");
                                if(!$result){
                                    die("Print data from database error");
                                }
                            while($row = mysqli_fetch_array($result)){
                            ?>
                            <li><a class="dropdown-item" href="view_category.php?action=<?php echo $row["CategoryCode"]; ?>"><?php echo $row["CategoryName"]; ?></a></li>
                            <?php
                            }
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="index.php?categoryid=9" role="button" data-bs-toggle="dropdown" aria-expanded="false">Telefony a tablety</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            $result = mysqli_query($connection, "SELECT * FROM categorylist WHERE ParentCategoryCode = 18");
                                if(!$result){
                                    die("Print data from database error");
                                }
                            while($row = mysqli_fetch_array($result)){
                            ?>
                            <li><a class="dropdown-item" href="view_category.php?action=<?php echo $row["CategoryCode"]; ?>"><?php echo $row["CategoryName"]; ?></a></li>
                            <?php
                            }
                            ?>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>