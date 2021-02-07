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
    <section class="breadcrumb_part single_product_breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

  <!--================Single Product Area =================-->
 <form method="post">
  <div class="product_image_area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
        <?php
           include_once "classes/products.php";
           ob_start();
           $pro=new products();
           $rs=$pro->GetByprono($_GET["prono"]);
           if($row=mysqli_fetch_assoc($rs))
           {
           
      
            ?>
          <div class="product_img_slide owl-carousel">
            <div class="single_product_img">
            <img src="image/proimg/<?php echo($row["prono"]); ?>.jpg" alt="img" class="img-fluid" >
            </div>
            <div class="single_product_img">
            <img src="image/proimg/<?php echo($row["prono"]); ?>.jpg" alt="img" class="img-fluid" >
            </div>
            <div class="single_product_img">
            <img src="image/proimg/<?php echo($row["prono"]); ?>.jpg" alt="img" class="img-fluid" >
            </div>
          </div>
         <?php
         }
         ?>
        </div>
        <div class="col-lg-8">
          <div class="single_product_text text-center">
          <?php
           include_once "classes/products.php";
           $pro=new products();
           $rs=$pro-> GetByprono($_GET["prono"]);
           if($row=mysqli_fetch_assoc($rs))
           {
               ?>
            <h3><?php echo($row["proname"]); ?></h3>
                <p><?php echo($row["prodetalies"]); ?>  </p>

            <div class="card_area">
                <div class="product_count_area">
                <div style="display:<?php if(!isset($_SESSION["id"])) echo "none" ?>;"><p>Quantity</p>
                    <div class="product_count d-inline-block">
                        <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                        <input class="product_count_item input-number" type="number" value="1" min="0" max="10" name="txtqty">
                        <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                    </div>
           </div>
                    <br>
                  <p style="color: #795376">Price Befor Discpount: LE <?php echo($row["proprice"]);?>  </p>
                  <br><br>
                 
                           <p style="color: #795376">Final Price: LE</p>
                        <p> <?php echo($row["proprice"]-($row["proprice"]*$row["saleprice"])); ?></p>
                         <br>
                         <br>
                        
                        <p style="color: #795376">Save LE <?php echo(($row["proprice"]*$row["saleprice"])); ?> (<?php echo($row["saleprice"]*100); ?>%)</p>
                        <br>
                        <br>
                </div>
             
                  <input  type="submit" class="btn_3" name="btncart" value="add to cart">  
              
              <?php
                            if(isset($_POST["btncart"]))
                            {
                                if(isset($_SESSION["id"]))
                                {
                                  include_once "classes/orders.php";
                                  $order=new orders();
                                 $q= $order->AddOrder($row["prono"],$_POST["txtqty"]);
                                 if($q!="ok")
                                   $order->UpdatyOrder($row["prono"],$_POST["txtqty"]);
                                  echo("<div class='alert alert-success'>Item in cart </div>");
                                  header("Location:cart.php");
 
                                }
                                else
                                {
                                  include_once "classes/products.php";
                                    $cat=new products();
                                    $_SESSION["curruntpage"]=$cat->GetURL();
                                    header("Location:Login.php");
                                }
                            }
                        ?>
            </div>  
          </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
        </form>
  <!--================End Single Product Area =================-->
   
  <?php 
    include_once "contact.php";
    ?>
    <?php
    include_once "footer.php";
    ?>