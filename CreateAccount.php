<!DOCTYPE html>
<?php

class NewAccount {
  /*A class to allow users to create a new account product*/

  function __construct($username, $password, $first, $last, $email){
     /*Inititate any objects in use*/
    $this -> username = $username;
    $this -> password = $password;
    $this -> first = $first;
    $this -> last = $last;
    $this -> email = $email;
   }

  
  function write(){
    /*A function to enter all of the data*/
    $writefile = array([$this->username, $this->password, $this->first, $this->last, $this->email]);
    //Open and write the file
    $file = fopen("users.csv", "a");
    foreach($writefile as $i){
      fputcsv($file, $i);
    }
    //Close the file
    fclose($file);
    return true;
  }


}

$data = $_POST["data"];
$username = $_POST["username"];
$password = $_POST["password"];
$first = $_POST["first"];
$last = $_POST["last"];
$email = $_POST["email"];


//Call the function
$test = new NewAccount($username, $password, $first, $last, $email);
$test->write();


?>
<html>
  <body>
  <meta http-equiv="refresh" content="0;  URL=Main.html"> 
  </body>
</html>


