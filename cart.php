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
                <h2>Shopping Cart Confirmation</h2>
                <hr>
            </div>
        <table class="table tabl-border table-striped">
            <tr style="background-color: black;color: white;">
                <th>NO</th>
                <th>Product No</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Image</th>
                <th>Delete</th>
                <th>Action</th>
            </tr>
            <?php     
                include_once "classes/orders.php";
                $order=new orders();
                $rs=$order->GetOrders();  
                $x=1;   
                while($row=mysqli_fetch_assoc($rs))
                {
            ?>
                <tr>
                    <td><?php echo($x); ?> </td>
                    <td><?php echo($row["prono"]); ?> </td>
                    <td><?php echo($row["proname"]); ?> </td>
                    <td><?php echo($row["proprice"]); ?> </td>
                    <td><?php echo($row["qty"]); ?> </td>
                    <td><?php echo($row["total"]); ?> </td>
                    <td><img src="image/proimg/<?php echo($row["prono"]); ?>.jpg" alt="img" class="img-fluid" > </td>
                    <td><a href="classes/deletepro.php?prono=<?php echo($row["prono"]); ?> " type="submit" value="X" class="btn btn-danger" >X</a> </td>
                    <td></td>
                </tr>

            <?php $x++; } ?>
            <tr style="background-color: ;color:black ;">
            <th colspan="5">
                Final Total Is : 
            </th>
            <th colspan="4">
            <?php
                include_once "classes/orders.php";
                $order=new orders();
                $rs=$order->GetSum();
                $total;
                if($row=mysqli_fetch_assoc($rs))
                {
                    echo($row["final"]); 
                    $total=$row["final"];
                }
                else echo("0"); 
            ?>
            </th>
             
            </tr>
            <tr >
           
            <td colspan="9">
            <input type="submit" value="Confirm Order" class="btn btn-primary" name="btnconfirm" />
            <?php
                if(isset($_POST["btnconfirm"]))
                {
                    include_once "classes/database.php";
                    $db=new database();
                   $msg= $db->RunDML("insert into orders values (Default,Default,'".$total."','Pending','".$_SESSION["id"]."')");
                   if($msg=="ok")
                   {
                       $rs=$db->GetData("Select max(orderno) as Maximum from orders where userid='".$_SESSION["id"]."'");
                       $max;
                       if($row=mysqli_fetch_assoc($rs))
                       {
                            $max=$row["Maximum"];
                            $_SESSION["max"]=$max;
                            
                       }
                       include_once "classes/orders.php";
                       $order=new orders();
                       $rs=$order->GetOrders();  
                       while($row=mysqli_fetch_assoc($rs))
                       {
                        $msg=  $db->RunDML("insert into sales values ('".$row["prono"]."','".$max."','".$row["qty"]."','".$row["proprice"]."','".$row["total"]."')");
                       }
                       if($msg=="ok")
                       { 
                            $db->RunDML("delete from ordertemp where userid='".$_SESSION["id"]."'");
                            header("Location:confirmation.php");
                       }
                      
                       else{
                        echo($msg);
                    }
                   
                    }
                       
                   } 
                   
                  ?>

                
            </td>
            </tr>
        </table>
        </div>
    </section>
    </form>
<?php
include_once "footer.php";
?>