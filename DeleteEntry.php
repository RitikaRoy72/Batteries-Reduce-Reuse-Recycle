<!DOCTYPE html>
<?php

//Delete a product on request of user
class RemoveProduct {
  /*A class to eliminate any product no longer in use*/
  function __construct($type, $product){
    /*Initiate any objects in use*/
    $this->type = $type;
    $this->product = $product;
  
  }

  function eliminate(){
      /*A class to eliminate the product*/
      //Load the csv file into an array
      $file = fopen($this->type.".csv", "r");
      while (!feof($file)){
        $lines[] = fgetcsv($file, 1000, ",");
      }
      fclose($file);

      //Search the array for the product
      //Remove the product once it has been founc
      $a = 0;
      while ($a<count($lines)){
        if ($lines[$a][0] == $this->product){
           unset($lines[$a]);
           break;
        }
        $a++;
      }
    //Delete the csv file
      unlink($this->type.".csv");

    //Write the new array to the new csv file
    //Ensure this file has the same name as the previous
    $write = fopen($this->type.".csv", "a");
    $count = 0;
    foreach ($lines as $ii){
      if ($count < count($lines)-1){
        fputcsv($write, $ii);
      }
      $count ++;
    }
  }
  
}

//$type = readline("Product type");
//$product = readline("Product");
$type = $_GET["category"];
$product = $_GET["productname"];
$try = new RemoveProduct($type, $product);
$try -> eliminate();

?>


<html>
  <body>
  <meta http-equiv="refresh" content="0;  URL=EditApplications.html"> 
  </body>
</html>