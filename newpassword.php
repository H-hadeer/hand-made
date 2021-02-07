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
            
                    if(isset($_POST["btnupdate"]))
                    {  
                        if($_POST["password"]==$_POST["password"])    
                        {
                            include_once "classes/users.php";
                            $us=new users();
                            $us->setpassword($_POST["password"]);
                            $us->UpdatePW();
                            echo("<div class='alert alert-success'>Password has been updated <a href='Login.php'>Login Now </a></div>");		 
                        }
                        else{          
                            echo("<div class='alert alert-danger'>Password not match</div>");		 
                        }
                         
                    }
                ?>
                    

                            <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="name" name="name" required value='<?php echo($_SESSION["name"]); ?>'
                                        placeholder=" Enter Full Name"><br/>
                                    <input type="text" class="form-control" id="password" name="password" required 
                                        placeholder=" Enter New Password"><br/>
                                        <input type="text" class="form-control" id="password" name="password" required 
                                        placeholder=" Confrim New Password"><br/>
                                </div>
                                <input type="submit" value="Update Password" name="btnupdate" class="btn_3"/><br/>
                    
                    
                   
                    </div>
                </form>
            </div>
            </center>
        </div>
    </section>


<?php
        include_once "Footer.php";
?>