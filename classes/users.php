

<?php
include_once "classes/operation.php";
include_once "classes/database.php";

   class users extends database implements operation {
       var $useriD;
       var $name;
       var $email;
       var $phone;
       var $password;
       //var $intersts;
       var $address;
  
     
       public function getuseriD() {
           return $this->useriD;
       }
       public function setuseriD($value) {
         $this->useriD =$value;
    }
       public function getname() {
        return $this->name;
    }
    public function setname($value) {
        $this->name =$value;
   }
    public function getphone() {
        return $this->phone;
    } 
    public function setphone($value) {
        $this->phone =$value;
   }
    public function getemail() {
        return $this->email;
    } 
    public function setemail($value) {
        $this->email =$value;
   }
    public function getpassword() {
        return $this->password;
    } 
    public function setpassword($value) {
        $this->password =$value;
   }
   /* public function getintersts() {
        return $this->intersts;
    }
     public function setintersts($value) {
        $this->intersts =$value;
   }*/
    public function getaddress() {
        return $this->address;
    }
     public function setaddress($value) {
        $this->address =$value;
   }

  
    public function add() {
    $msg = parent:: RunDML("INSERT INTO `users` values(Default,'" .$this->getname()."','". $this->getemail()."','".$this->getphone()."','".$this->getpassword()."','".$this->getaddress(). "')");
    return $msg;
    }
    public function update(){
        $msg = parent:: RunDML("update `users` set name='".$this->getname()."',email='". $this->getemail()."',phone='".$this->getphone()."',password='".$this->getpassword()."',address='".$this->getaddress(). "'where userid='". $_SESSION["id"]."'");
        return $msg;
    }
    public function UpdatePW(){
        $msg=parent::RunDML("update `users` set  password='".$this->getpassword()."' where userid='".$_GET["id"]."'");
        return $msg;
    }
    public function delete(){
        $msg = parent:: RunDML("delete from `users` where useriD='". $_SESSION["id"]."'");
        return $msg;

    }
    public function getall(){

    }
       
    public function getMax(){
        
        return parent::getData("select max(userid) as max from users"); 
        
      }
   
      
    public function getuser(){
        return parent ::GetData("select * from users where userid='".$_SESSION["id"]."'");
    }
     public function getbyemail(){
        return parent ::GetData("select * from users where email='".$_this->getemail()."'");
    }
    public function login(){
        return parent ::GetData("select * from users where (phone='".$this->getphone()."'or email='".$this->getemail()."')and password='".$this->getpassword(). "'" );
    }












}
?>
