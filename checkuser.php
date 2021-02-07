
   <?php
   session_start();
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
                            if(isset($_POST["btncheckemail"]))
                    {echo("hi");
                        include_once "classes/users.php";
                        $user=new users();
                        $user->setemail($_POST["email"]);
                        $rs=$user->getbyemail();
                        if($row=mysqli_fetch_assoc($rs))
                        { 
                            $code=rand(11111,99999);
                            $_SESSION["name"]=$row["name"];
                            $_SESSION["id"]=$row["userID"];
                            require_once "src/PHPMailer.php";
                            require_once "src/Exception.php";
                            require_once "src/SMTP.php";
                            require_once "vendor/autoload.php";
                            $mail = new  PHPMailer\PHPMailer\PHPMailer();
        
                            $mail->IsSMTP();
                            //$mail->SMTPDebug = 1;
                            $mail->SMTPAuth = true;
                            $mail->SMTPSecure = 'ssl';
                            $mail->Host = "smtp.gmail.com";
                            $mail->Port = 465; // or 587
                            $mail->IsHTML(true);

                            $mail->Username = "yourmobileapp2017@gmail.com";
                            $mail->Password = "ABC@123456a";

                            $mail->setFrom('yourmobileapp2017@gmail.com', 'Hand Made');
                          
                            $mail->addAddress($_POST["email"], "Hand Made");
                            $mail->Subject = 'Forget Password';
                            $id=$_SESSION["id"];
                            $mail->Body = "Dear Mr/Mrs ".$row['name']."<br/> http://localhost/nti/project/pillo/verifcationcode.php.php?id=$id <br/>Your Verfication Code Is ".$code;
                            
                            if(!$mail->send()) {
                              //  echo "Opps! For some technical reasons we couldn't able to sent you an email. We will shortly get back to you with download details.";	
                                echo "Mailer Error: " . $mail->ErrorInfo;
                            }
                            else{
                               
                                $_SESSION["code"]=$code;
                                echo("<div class='alert alert-success'>Verfication Code has been sent , Check Your Email </div>");		 
                            }
                    }
                    else
                    {
                        echo("<div class='alert alert-warning'>Invaild Email / Phone and password</div> <br/> If Email not sent , plaese wait <p id='demo'></p>");
                    }
                }
                                

?>
                            <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="email" name="email" required
                                        placeholder=" Email / Phone">
                                </div>
                                <input type="submit" value="ChecK Email" name="btnchekemail" class="btn_3"/>
                                        
                                    
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
        include_once "footer.php";
        ?>