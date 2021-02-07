<?php
ob_start();
session_start();
    if(isset($_SESSION["id"]))
        include_once "headerafter.php";
    else
        include_once "headerbefore.php";
?>
<form method="post">
<section class="recomended-sec">
        <div class="container">
            <div class="title">
                <h2>My Products</h2>
                <hr>
            </div>
        <table class="table tabl-border table-striped">
            <tr style="background-color: black;color: white;">

                <th>Order No</th>
                <th>Order Date</th>
                 
                <th>Product No</th>
                <th>Product Name</th>
               
                <th>Category Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
                <th>Status</th>
                <th>Image</th>
                
            </tr>
            <?php     
                include_once "classes/orders.php";
                $order=new orders();
                $rs=$order->GetMyProduct();  
                 
                while($row=mysqli_fetch_assoc($rs))
                {echo("hi");
            ?>
                <tr>
                    
                    <td><?php echo($row["orderno"]); ?> </td>
                    <td><?php echo($row["orderdate"]); ?> </td>
                    <td><?php echo($row["prono"]); ?> </td>
                    <td><?php echo($row["proname"]); ?> </td>
                    <td><?php echo($row["catname"]); ?> </td>
                    <td><?php echo($row["qty"]); ?> </td>
                    <td><?php echo($row["price"]); ?> </td>
                    <td><?php echo($row["total"]); ?> </td>
                    <td><?php echo($row["status"]); ?> </td>
                    <td><img src="image/proimg/<?php echo($row["prono"]); ?>.jpg" alt="img" class="img-fluid" > </td>
                    <td></td>
                </tr>

            <?php   } ?>
            
            
        </table>
        </div>
    </section>
    </form>
<?php
include_once "footer.php";
?>