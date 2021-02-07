<?php
include_once "operation.php";
include_once "database.php";
 class orders extends database {

   
    public function AddOrder($prono,$qty){
        return parent::RunDML("insert into ordertemp values('".$prono."','".$qty."','".$_SESSION['id']."')");
    }
    public function UpdatyOrder($prono,$qty){
        return parent::RunDML("update ordertemp set qty=qty+'".$qty."' where prono='".$prono."' and userid='".$_SESSION['id']."'");
    }    
    public function Delete(){       
        return parent::RunDML("delete from ordertemp  where prono='".$_GET["prono"]."' and userid='".$_SESSION['id']."'");
    }
    public function GetAll(){
        return parent::GetData("Select * from ordertemp where userid='".$_SESSION['id']."'");
    }
    public function GetCount(){
        return parent::GetData("Select count(*) as count from ordertemp where userid='".$_SESSION['id']."'");
    }
    public function GetOrders(){
        return parent::GetData("Select * from vieworders where userid='".$_SESSION['id']."'");
    }
    public function GetMyProduct(){
        return parent::GetData("Select * from viweconformation where userid='".$_SESSION['id']."' order by orderdate , status");
    }
    public function GetSum(){
        return parent::GetData("Select sum(total) as final from vieworders where userid='".$_SESSION['id']."'");
    }
 } 
?>