<?php
    session_start();
    include_once "classes/users.php";
    $user=new users();
    $user->delete();
    $dir="userimg/";
    $img=$_SESSION['id'];
    $fdir= $dir.$img.".jpg";
    unlink($fdir);
    session_destroy();
    setcookie("usercookie",$_SESSION["id"],time()-1);
    header("Location:index.php");
?>