<?php
    session_start();
    if(isset($_SESSION["id"]))
        include_once "HeaderAfter.php";
    else
        include_once "HeaderBefore.php";
?>


<div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="index.php">Home</a>
            <span class="breadcrumb-item active">Verfication Code</span>
        </div>
    </div>
    <section class="static about-sec" >
        <div class="container">
            <center>
            <h2>Forget Password / Check Verfication Code</h2>
            <br/> <br/>
           
            <div class="form py-4" style="border-style: groove;width: 65%;">
                <form method="post">
                <?php
            
                    if(isset($_POST["btncheckemail"]))
                    {      
                        if($_SESSION["code"]==$_POST["email"])
                        {
                            $id=$_SESSION["id"];
                            echo("<script> window.open('newpassword.php?id=$id', '_self')</script>");	
                        }
                        else{          
                            echo("<div class='alert alert-danger'>invaild Verfication Code , Try Again</div>");		 
                        }
                         
                    }
                ?>
                    

                            <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="email" name="email" required 
                                        placeholder=" Enter Verification Code">
                                </div>
                                <input type="submit" value="Check Verfication Code" name="btnchekemail" class="btn_3"/>
                    
                    
                   
                    </div>
                </form>
            </div>
            </center>
        </div>
    </section>


<?php
        include_once "Footer.php";
?>