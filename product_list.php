<?php
  ob_start();
  session_start();
  if(isset($_SESSION["id"])){
  include_once "headerafter.php";
}
else
    include_once "headerbefore.php";
  ?>

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>product list</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->
    
    <!-- product list part start-->
    <section class="product_list section_padding">
    <form method="post">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="product_sidebar"> 
                       
                        <div class="single_sedebar">
                            
                                <input type="text" name="#" placeholder="Search keyword" name="txtsearch">
                                <i class="ti-search"></i>
                    <?php
                                    if(isset($_POST["txtsearch"]))
                                    {
                                        $se=$_POST["txtsearch"];
                                        header("Location:product_list.php?key=$se");
                                    }
                            ?>                      
                            <!--  <span class="ti-close" id="close_search" title="Close Search"></span>-->

                           
                        </div>
                        <div class="single_sedebar">
                            <div class="select_option">
                           
                            <div class="select_option_list">Category <i class="right fas fa-caret-down"></i> </div>

                            <div class="select_option_dropdown">             
                              <?php
                                               
                                       include_once "classes/categories.php";
                                       $cat=new categories();
                                       $rs=$cat->GetAll();
                                       while($row=mysqli_fetch_assoc($rs) ){
                                          // echo "in";
                                           $_SESSION["catname"]=$row["catname"]; 
                                           
                                      
                                               ?>

            <p>  <a class="dropdown-item" href="categorypage.php?catno=<?php echo($row["cat.no"]); ?>"> <?php echo( $_SESSION["catname"]);?></a></p>
                                   
                                    <?php
                                    }
                                    ?> 
                                    </div>
                               
                               
                                </div>
                        </div>
                                
                    </div>
                    </div>
                <div class="col-md-8">
                    <div class="product_list">
                        <div class="row">
                             
                                         <?php
                                          include_once "classes/products.php";
                                          $cat=new products();
                                           // include_once "classes/products.php";
                                            //$pro=new products();
                                            if(isset($_GET["key"]))
                                            $rs=$cat->Search($_GET["key"]);
                                            else 
                                            $rs=$cat->GetAll();
                                             while($row=mysqli_fetch_assoc($rs))
                                                 {
                                              ?>
                                <div class="col-lg-6 col-sm-6"> 
                                 <div class="single_product_item">
                               
                                      <img src="image/proimg/<?php echo($row["prono"]); ?>.jpg" alt="img" class="img-fluid" >
                                    <h4  style="color: #cc6ec4"> <a href="single-product.php?prono=<?php echo($row["prono"]);?>&&?proname=<?php echo($row["proname"]);?>" style=" color: #6b4d69">  <?php echo($row["proname"]); ?> </a> </h4> 
                                     <p style="color: #cc6ec4">LE<?php echo($row["proprice"]); ?>/</p>
                                     <?php $no=$row["prono"]; if(isset($_SESSION["id"])) echo('<input type="submit" class="btn-sm btn-warning" style="background-color:#B08EAD" value="Buy Now" name="btncart'.$row["prono"].'"/>'); else echo('<a href="login.php">Buy Now</a>'); ?></h6>

                                </div> 
                                <?php
                            if(isset($_POST["btncart".$row["prono"]])) 
                            {
                                
                                include_once "classes/orders.php";
                                $order=new orders();
                                echo($_SESSION["id"]);
                               $q= $order->AddOrder($row["prono"],1);
                               if($q!="ok"){
                                 $order->UpdatyOrder($row["prono"],1);
                               }
                                echo("<div class='alert alert-success'>Item in cart </div>");
                            }
                        ?>
                            </div>
                              <?php
                              
                            }
                              ?>                
                        </div>
                      </div>
                                            
                    <div class="load_more_btn text-center">
                            <a href="#" class="btn_3">Load More</a> 
                    </div>
                   
                </div>
             </div>   
             </div>
          </div>
          </form>
    </section>
    <!-- product list part end-->
    
    <!-- client review part here -->
    <section class="client_review">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="client_review_slider owl-carousel">
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="img/client.png" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="img/client_1.png" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="img/client_2.png" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- client review part end -->

    <!-- feature part here -->
    <section class="feature_part section_padding">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="feature_part_tittle">
                        <h3>Credibly innovate granular
                        internal or organic sources
                        whereas standards.</h3>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="feature_part_content">
                        <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources. Credibly innovate granular internal or “organic” sources whereas high standards in web-readiness.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_1.svg" alt="#">
                        <h4>Credit Card Support</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_2.svg" alt="#">
                        <h4>Online Order</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_3.svg" alt="#">
                        <h4>Free Delivery</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_4.svg" alt="#">
                        <h4>Product with Gift</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature part end -->

    <?php 
    include_once "contact.php";
    ?>
    <?php
    include_once "footer.php";
    ?>
