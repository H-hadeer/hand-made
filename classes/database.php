
<?php
class Database
{
    var $conn;
    function __construct()
    {
        $this->conn=mysqli_connect("mysql5044.site4now.net","a6cda4_hadeer","hadeer@147","db_a6cda4_hadeer");
    }
  //To Insert- Update - delete 
    function RunDML($statment)
    {
        if(!mysqli_query($this->conn,$statment))
            {
                return  mysqli_error($this->conn);
            }
        else
            return "ok";
    }
    //to search
  function GetData($select)
  {
    $result= mysqli_query($this->conn,$select);
    return $result;
  }

  public function GetURL()
  {
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
      $url = "https://";   
    else  
      $url = "http://";   
      // Append the host(domain name, ip) to the URL.   
      $url.= $_SERVER['HTTP_HOST'];   
      // Append the requested resource location to the URL   
      $url.= $_SERVER['REQUEST_URI'];  
      return $url;
  }

}

?>



