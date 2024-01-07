<!DOCTYPE html>
<?php

require_once "Entry.php";

class Restock extends ProductEntry{
  /*A class to simulate restocking a product*/

  // function __construct(){
  //   /*Inititate any objects in use*/
  // }
  
  function readfile(){
    /*A function to read the file into an array and find the product*/
    //Read the file into an array
    $file = fopen($this->type.".csv", "r");
    while (!feof($file)){
      $lines[] = fgetcsv($file, 1000, ",");
    }
    //Close the file
    fclose($file);
    //Sift through the array to find the desired term
    $a = 0;
    while ($a < count($lines)){
      if ($lines[$a][0] == $this->name){ 
        $give = array($this->type, $this->name, $lines[$a][3]);
        break;
      }
      $a = $a + 1;
    }
  //Return the desired term
  return $give;
  }

  function executethis(){
    /*A class to execute the function*/
    //Execute the code to find the product
    $give = $this->readfile();
    //Initiate all variables
    $this->type = $give[0];
    $this->name = $give[1];
    $this->days = 0;
    $this->amount = 0;
    $this->enterday = 0;
    $this->left = $give[2];
    $this->rate = $give[2];
    //Execute the needed function in the main class
    $this-> restock();
  }
}

$name = $_GET["productname"];
$type = $_GET["category"];

//Call the function
$test = new Restock($type, $name, 0, 0, 0, 0, 0);
$test->executethis();



?>


<html>
  <body>
  <meta http-equiv="refresh" content="0;  URL=ProductEdit.html"> 
  </body>
</html>