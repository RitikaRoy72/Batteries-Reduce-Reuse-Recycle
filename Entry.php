<!DOCTYPE html>

<?php
/*A function to storethe information about products. */

class ProductEntry {
  function __construct($type, $name){
    $this -> type = $type; //battery type
    $this -> name = $name; //product
    $this -> days = 0;
    $this -> amount = 0; //capacity
    $this -> temp = 0;
    $this -> enterday = 0;
    //$this -> currentday = 0;
    //$this -> left = 0;
    //$this -> rate = 0;
  }

  function write(){
    /*A function to write the information to a file */
    //Create an array with the new information
    $writefile = array([$this->name, $this->enterday, $this->amount]);
    //Open and write the file
    $file = fopen($this->type.".csv", "a");
    foreach($writefile as $i){
      fputcsv($file, $i);
    }
    //Close the file
    fclose($file);
  }

  function getname(){
    /*A function to get the name from a csv file*/
    $file = fopen("name.csv", "r");
    while (!feof($file)){
      $lines[] = fgetcsv($file, 100, ",");
    }
    fclose($file);
    $this -> name = $lines[0][0];
  }

  function dateDifference(){
    $datetime1 = date_create();
    
    $secs = $this->enterday - $datetime1;// == <seconds between the two times>
    $this-> days = $secs / 86400;
    
  }
  function findleft(){
    /*A function to determine how much of a product is left*/
    //Find out how many days until the product runs out if new entry
    //T - temperature
    //C - cycles
    $this->amount=-104.67*$this->days - 1329.37*$this-> temp + 0.39*$this->days*$this->days + 2.97*$this->days*$this->temp + 18.55*$this->temp* $this->temp +0.002*$this->days*$this->days*$this->days + 0.004*$this->temp*$this->days*$this->days + 0.025*$this->temp*$this->temp*$this->days - 0.08*$this->temp*$this->temp*$this->temp +33433.6;
  }
  
  function date(){
    //WORK ON THISSSSSS
    /* A function to determine and write the date of entry in a form that can be manipulated. */
    //A class in the event that a product takes more than a year to finish
   //Set the date date_default_timezone_set('EST');
    $date = date_create();
    $this -> enterday = $date -> format("Y/m/d");
    $month = $date -> format("m");
    if ($month >= 0 && $month <= 3) $this -> temp = 60;
    else if ($month >=3 && $month < 6) $this -> temp = 70;
    else if ($month >= 6 && $month < 9) $this -> temp = 80;
    else if($month >= 9 && $month<12) $this->temp = 60;
    
  }
      
  function checkduplicate(){
   /*Check if a product appears twice in the records*/
    //Read the file into an array
    $file = fopen($this->type.".csv", "r");
    while (!feof($file)){
     $lines[] = fgetcsv($file, 100, ",");
    }
    //Close the reading file
    fclose($file);
    //Sift through the array
    //Eliminate elements that have the same name
    $a = 0;
    $count = count($lines);
    while ($a < $count){
      $data1 = $lines[$a][0];
      $aa = $a + 1;
      while ($aa < ($count-1)){
        $data2 = $lines[$aa][0];
        if ($data1 == $data2){
          //$lines = array_diff($lines,[$a]);
          unset($lines[$a]);
        }
        $aa ++;
      }
      $a ++;
    }
    //Delete the old file
    unlink($this->type.".csv");
    //Write the array into a new file with the same name
    $rewrite = fopen($this->type.".csv", "a");
    $count = 0;
    foreach ($lines as $ii){
      if ($count < count($lines)-1){
        fputcsv($rewrite, $ii);
      }
      $count ++;
    }
  }  
  
  function enter(){
    /*A function to call entry operations in respective order*/
    $this -> getname();
    $this->findleft();
    $this->date();
    $this->write();
    $this->checkduplicate();
  }

  function restock(){
    /*A function to caal restock operation in order*/
    $this->date();
    $this->write();
    $this->checkduplicate();
  }
} 

$power = $_GET["productPower"];
$capacity = $_GET["batteryCapacity"];
$rate = $_GET["userate"];
$type = $_GET["category"];

// $enterday = 0;
// $left = 0;
// $name = 0;
// $rate = 0;
$restocker = new ProductEntry($type, $name);
$restocker -> enter();

?>

<html>
  <body>
  <meta http-equiv="refresh" content="0;  URL=AddBatteries.html"> 
  </body>
</html>


