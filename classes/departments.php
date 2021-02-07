<?php
include_once "operation.php";
include_once "Database.php";
class departments extends Database implements operation{

    var $depid;
    var $depname;
    var $depdet;

    public function getuserdepid(){
        return $this->depid;
    }
    public function getuserdepname(){
        return $this->depname;
    }
    public function getdepdet(){
        return $this->deptdetails;
    }

    public function setdepid($value){
        $this->depid=$value;
    }
    public function setdepname($value){
        $this->depname=$value;
    }
    public function setdepdet($value){
        $this->depdet=$value;
    }

    public function Add(){
        
    }
    public function Update(){
         
    }
     
    public function Delete(){
        
    }
    public function GetAll(){
        return parent::GetData("Select * From departments");
    }

}
?>