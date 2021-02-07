
  <?php
  session_start();
 
    include_once "headerbefore.php";
  ?>
   

   <!--================register_part Area =================-->
   <section class="login_part section_padding ">
       <div class="container">
           <div class="row align-items-center">
               <div class="col-lg-6 col-md-6">
                   <div class="login_part_text text-center">
                       <div class="login_part_text_iner">
                           <h2>Welcom in our Hand Made world</h2>
                           
                           <a href="login.php" class="btn_3">login</a>
                       </div>
                   </div>
               </div>
               <div class="col-lg-6 col-md-6">
                   <div class="login_part_form">
                       <div class="login_part_form_iner">
                           <h3>Please Register now</h3>
                           <form class="row contact_form"  method="post" novalidate="novalidate">
                           <?php
                           if(isset($_COOKIE['useriD'])){
						
                            $_SESSION["id"]=$_COOKIE["useriD"];
                            $_SESSION["name"]=$_COOKIE["name"];
                            echo("<script> window.open('index.php', '_self')</script>");		 
                           //header("Location:index.php");
                               
                        }
                           if (isset($_POST["btnregs"])){
                              
                             include_once "classes/users.php";
                             $user= new users();
                            $user->setname($_POST["name"]);
                            $user->setpassword($_POST["password"]);
                            $user->setemail($_POST["email"]);
                            $user->setphone($_POST["phone"]);
                            $user->setaddress($_POST["address"]);
                            $regular="/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/";
                            if(preg_match($regular,$_POST["password"])){
                            $msg=$user-> add();
                            if($msg == "ok"){
                                $max=$user->getMax();
							if($row = mysqli_fetch_assoc($max)){
							$max_id = $row['max'];
							
        
							$_SESSION["id"]=$max_id ;
							$_SESSION["name"]=$_POST['name'];

                               
                                echo ("<div class ='alert alert-success'> Your account has been created</div>");
                                echo ("<script>window.open('index.php','_self')  </script>");
                            }
                        }
                              else if(strpos($msg,'users.email'))  
                              echo ("<div class ='alert alert-warning'>this email is used</div>");
                             else if (strpos($msg,'users.phone'))
                              echo ("<div class ='alert alert-warning'>this phpne is used</div>"); 
                              else
                              echo ("<div class ='alert alert-denger'>". $msg."</div>");}
                             else
                            echo ("<div class ='alert alert-denger'> password must be strong</div>");}
                        
                     
                           ?>
                               <div class="col-md-12 form-group p_star">
                                   <input type="text" class="form-control" id="name" name="name" value=""
                                       placeholder="Username" Required >
                               </div>
                               <div class="col-md-12 form-group p_star">
                                   <input type="text" class="form-control" id="phone" name="phone" value=""
                                       placeholder="Userphone">
                               </div>
                               <div class="col-md-12 form-group p_star">  
                                   <input type="email" class="form-control" id="email" name="email" value=""
                                       placeholder="Useremail">
                               </div>
                               <div class="col-md-12 form-group p_star">
                                   <input type="password" class="form-control" id="password" name="password" value=""
                                       placeholder="Password">
                               </div>
                               <div class="col-md-12 form-group p_star">
                                   <input type="text" class="form-control" id="address" name="address" value=""
                                       placeholder="user address"/>
                               </div>
                               <div class="col-md-12 form-group">
                                    
                                   <input type="submit" name="btnregs" value ="Register Now" class="btn_3">
                                      
                                  
                                  
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

