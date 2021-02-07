
   <?php
   session_start();
   ob_start();
   include_once "headerbefore.php";?>
   

    <!--================login_part Area =================-->
    <section class="login_part section_padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>New to our Hand Made world?</h2>
                            <p>There are advances being made in skills and hand made product
                                everyday, and a good example of this is the</p>
                            <a href="register.php" class="btn_3">Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Welcome Back ! <br>
                                Please Sign in now</h3>
                            <form class="row contact_form" method="post" >
                                <?php
                                if(isset($_COOKIE["usercookie"])){
                                    $_SESSION["id"]=$_COOKIE["usercookie"];
                                    echo ("<script>window.open('index.php','_self')</script>");

                                }
                                
                                if(isset($_POST["btnlog"]))
                                {    
                                    
                                    
                                   
                                    include_once "classes/users.php";
                                    $user= new users();
                                    $user->setemail($_POST["userlog"]);
                                    $user->setphone($_POST["userlog"]);
                                    $user->setpassword($_POST["password"]);
                                    $sure= $user->login() ;
                                    
                                    if($row=mysqli_fetch_assoc($sure) ){
                                    
                                        $_SESSION["id"]=$row["userID"];
                                       // echo($_SESSION["id"]); 
                                        $_SESSION["name"]=$row["name"];
                                       
                                        if(isset($_POST["check"])){
                                            setcookie("usercookie",$_SESSION["id"],time()+60*60*24*365);
                                            setcookie("usercookiename",$_SESSION["name"],time()+60*60*24*365);
                                        } 
                                            if(isset($_SESSION["curruntpage"]))

                                             header("Location:".$_SESSION["curruntpage"]);
 
                                           // echo ("<script>window.open('".$_SESSION["curruntpage"]."'");
                                        
                                            
                                            else{
                                           header("Location:index.php"); 
                                        }
                                       
                                    }
                                                                                                                                                                              
                                   
                                  else    
                                    echo ("<div class ='alert alert-warning'>this email /phone and password invalid</div>");
                                 }  
                                   
                                ?>

                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="userlog" value=""
                                        placeholder=" Email / Phone">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value=""
                                        placeholder="Password">
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="check">
                                        <label for="f-option">Remember me</label>
                                    </div>
                                   <input type="submit" value="login" name="btnlog" class="btn_3"/>
                                        
                                    
                                    <a class="lost_pass" href="checkuser.php">forget password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->
    <?php 
    include_once "contact.php";
    ?>

<?php 
include_once "footer.php";
?>

   