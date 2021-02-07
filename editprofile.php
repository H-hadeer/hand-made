
  <?php
  session_start();
  if(isset($_SESSION["id"])){
  include_once "headerafter.php";
}
else
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
                           
                       </div>
                   </div>
               </div>
               <div class="col-lg-6 col-md-6">
                   <div class="login_part_form">
                       <div class="login_part_form_iner">
                           <h3>Edit Profile</h3>
                           <form class="row contact_form" method="post" novalidate="novalidate" enctype="multipart/form-data">
                           <?php
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
                            $msg=$user->update();
                            if($msg == "ok"){
                                
                                $filename = "image/userimg/".$_SESSION['id'].".jpg";
                                 
                      
                                 if (file_exists($filename)) {
                                   echo '<img src='.$filename.'  style="width:200px;height:200px;border-radius:50%"/>';
                                             
                                 } else {
                                   echo '<img src="image/userimg/default.jpg" style="width:200px;height:200px;border-radius:50%"/>';
                                 }
                                $_SESSION["name"]=$_POST["name"];
                            echo("<script> window.open('myprofile.php', '_self')</script>");	
                            }
                            else if(strpos($msg,"users.Email"))
                                echo("<div class='alert alert-warning'>Sorry This Email Is Used</div>");
                            else if(strpos($msg,"users.Phone"))
                                echo("<div class='alert alert-warning'>Sorry This Phone Is Used</div>");
                            else
                                echo("<div class='alert alert-danger'>$msg </div>");
                            }
                            else
                            echo("<div class='alert alert-warning'>This password is weak , Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character </div>");
                        }
                    ?>
    
            <?php
                                if(isset($_SESSION["id"]))
                                {
                                    include_once "classes/users.php";
                                    $user=new users();
                                    $rs=$user->GetUser();
                                    if($rows=mysqli_fetch_assoc($rs))
                                {
                         ?>
                              <div class="col-md-12 form-group p_star">
                                   <input type="text" class="form-control" id="name" name="name" value="<?php echo ($rows["name"]);?>"
                                        Required >
                               </div>
                               <div class="col-md-12 form-group p_star">
                                   <input type="text" class="form-control" id="phone" name="phone" 
                                   value="<?php echo ($rows["phone"]);?>">
                               </div>
                               <div class="col-md-12 form-group p_star">  
                                   <input type="email" class="form-control" id="email" name="email" value="<?php echo ($rows["email"]);?>">
                               </div>
                               <div class="col-md-12 form-group p_star">
                                   <input type="password" class="form-control" id="password" name="password" value="<?php echo ($rows["password"]);?>">
                               </div>
                               <div class="col-md-12 form-group p_star">
                                   <input type="text" class="form-control" id="address" name="address" value="<?php echo ($rows["address"]);?>">
                               </div>
                               <div class="col-md-12 form-group p_star">
                               
                                   <input type="file" class="form-control" id="file" name="file" class="form-control"/>
                               </div>
                               <div class="col-md-12 form-group">
                                    
                                   <input type="submit" name="btnregs" value ="Update Profile" class="btn_3">
                                  
                                 
                                  
                               </div>
                           </form>     
                                  
                       </div>
                                     <?php
                                            }
                                            else{
                                                echo ("<script>window.open('index.php','_self')</script>");
                                            }            
                                            }
                                        ?>
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

