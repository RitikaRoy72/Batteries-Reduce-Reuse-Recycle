<?php
  class WriteName {
    /*A class to store the name of a product*/

    function __construct($name){
      /*Init all objects in use*/
      $this -> name = $name;
    }

    function writeToFile(){
      /*Write the name to a csv file*/
      unlink("name.csv");
      $file = fopen("name.csv", "a");
      fwrite($file, $this->name);
      fclose($file);
    }
    
  }
$name = $_GET["name"];
//$call = new WriteName("hello1");
$call = new WriteName($name);
$call -> writeToFile();
?>

<html>
  <body>
  <meta http-equiv="refresh" content="0;  URL=Main.html"> 
  </body>
</html>


