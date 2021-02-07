<?php
include_once "classes/operation.php";
include_once "classes/database.php";

class products extends database implements operation{

    var $prono;
    var $proname;
    var $proprice;
    var $prodetalies;
    var $saleprice;
    

    

    public function getprono(){
        return $this->prono;
    }
    public function getproname(){
        return $this->proname;
    }
   
    public function setprono($value){
        $this->prono=$value;
    }
    public function setproname($value){
        $this->proname=$value;
    }
    public function getproprice(){
        return $this->proprice;
    }
   
    public function setproprice($value){
        $this->proprice=$value;
    }
    public function getprodetalies(){
        return $this->prodetalies;
    }
   
    public function setprodetalies($value){
        $this->prodetalies=$value;
    }
    public function getsaleprice(){
        return $this->saleprice;
    }
   
    public function setprosaleprice($value){
        $this->saleprice=$value;
    }
   

    public function Add(){
        
    }
    public function Update(){
         
    }
     
    public function Delete(){
        
    }
    public function GetAll(){
        return parent::GetData("Select * From products");
    }
    public function GetByprono($prono){
        return parent::GetData("Select * From products where prono= $prono");
    }
    public function Search($key)
    {
        return parent::GetData("Select * From products where proname like '%".$key."%' or prodetalies like '%".$key."%' ");
    }
}
?>







