<?php
include_once "classes/operation.php";
include_once "classes/database.php";

class categories extends database implements operation{

    var $catno;
    var $catname;
    var $productprice;
    var $depcat;
    

    public function getcatno(){
        return $this->catno;
    }
    public function getcatname(){
        return $this->catname;
    }
   
    public function setcatno($value){
        $this->catno=$value;
    }
    public function setcatname($value){
        $this->catname=$value;
    }
    public function getproductprice(){
        return $this->productprice;
    }
   
    public function setproductprice($value){
        $this->productprice=$value;
    }
    public function getdepcat(){
        return $this->depcat;
    }
   
    public function setdepcat($value){
        $this->depcat=$value;
    }
    public function Add(){
        
    }
    public function Update(){
         
    }
     
    public function Delete(){
        
    }
    public function GetAll(){
        return parent::GetData("Select * From categories limit 6");
    }
    public function GetBycatname($catname){
            return parent::GetData("Select * From categories where catname='".$_GET["catname"]."'");
        }
}
?>






