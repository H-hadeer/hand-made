    <!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>pillloMart</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
  
  <!--::header part start::-->
  <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
      <!--web name ??--> <a class="navbar-brand" href="index.php"> <h1 style="color: #aa89a7;">Hand Made</h1> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.html">about</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="categories.php" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Categories</a>
                                       <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">  
                                       <?php
                                               
                                       include_once "classes/categories.php";
                                       $cat=new categories();
                                       $rs=$cat->GetAll();
                                       while($row=mysqli_fetch_assoc($rs) ){
                                          // echo "in";
                                           $_SESSION["catname"]=$row["catname"]; 
                                           
                                      
                                               ?>
                                   
                                        <a class="dropdown-item" href="categorypage.php"> <?php echo( $_SESSION["catname"]);?></a>
                                   
                                    <?php
                                    }
                                    ?> 
                                    </div>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="product_list.php">  All Product</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="register.php">Register </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php">login</a>
                                </li>
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex align-items-center">
                            <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                             <a href="login.php">
                                <i class="flaticon-shopping-cart-black-shape"></i>
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner" method="post">
                    <input type="submit " class="form-control" id="search_input" name="txtsearch" placeholder="Search Here">
                    <!--<button type="" class="btn" ></button>-->
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                    <?php
                                    if(isset($_POST["txtsearch"]))
                                    {
                                        $se=$_POST["txtsearch"];
                                        header("Location:product_list.php?key=$se");
                                    }
                            ?>
                </form>
            </div>
        </div>
    </header>
    <!-- Header part end-->