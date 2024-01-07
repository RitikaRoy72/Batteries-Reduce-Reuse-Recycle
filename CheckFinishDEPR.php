<?php 
  class CheckFinish{

    function __construct(){
      //Constructor
      
    }

    function readToiletries(){
      $file = fopen("toiletries.csv", "r");
      while (!feof($file)){
        $lines[] = fgetcsv($file, 1000, ",");
      }
      fclose($file);
      for ($n = 0; $n<count($lines); $n++){
        $leftdays = ($lines[$n][2] - $lines[$n][1]) * 100;
        if ($leftdays < 4){
   //      function myfunction_onload(){
   //        $.ajax({
   //          url: "app.py",
   //          context: document.body
   //        })
   //       }
           
          $function = escapeshellcmd('notification.py');
          $output = shell_exec($function);
          echo $output;
          
        }
      }
    }

    function readKitchen(){
      $file = fopen("Kitchen.csv", "r");
      while (!feof($file)){
        $lines[] = fgetcsv($file, 1000, ",");
      }
      fclose($file);
      for ($n = 0; $n<count($lines); $n++){
        $leftdays = ($lines[$n][2] - $lines[$n][1]) * 100;
        if ($leftdays < 4){
          $function = escapeshellcmd('notification.py');
          $output = shell_exec($function);
          echo $output;
        }
      }
    }

    function readCleaning(){
      $file = fopen("Cleaning.csv", "r");
      while (!feof($file)){
        $lines[] = fgetcsv($file, 1000, ",");
      }
      fclose($file);
      for ($n = 0; $n<count($lines); $n++){
        $leftdays = ($lines[$n][2] - $lines[$n][1]) * 100;
        if ($leftdays < 4){
          //send notification
          $function = escapeshellcmd('notification.py');
          $output = shell_exec($function);
          echo $output;
        }
      }
    }

    function readSupplies(){
      $file = fopen("Supplies.csv", "r");
      while (!feof($file)){
        $lines[] = fgetcsv($file, 1000, ",");
      }
      fclose($file);
      for ($n = 0; $n<count($lines); $n++){
        $leftdays = ($lines[$n][2] - $lines[$n][1]) * 100;
        if ($leftdays < 4){
          //send notification
          $function = escapeshellcmd('notification.py');
          $output = shell_exec($function);
          echo $output;
        }
      }
    }

    function readPersonalCare(){
      $file = fopen("PersonalCare.csv", "r");
      while (!feof($file)){
        $lines[] = fgetcsv($file, 1000, ",");
      }
      fclose($file);
      for ($n = 0; $n<count($lines); $n++){
        $leftdays = ($lines[$n][2] - $lines[$n][1]) * 100;
        if ($leftdays < 4){
          //send notification
          $function = escapeshellcmd('notification.py');
          $output = shell_exec($function);
          echo $output;
        }
      }
    }

    function readOther(){
      $file = fopen("Other.csv", "r");
      while (!feof($file)){
        $lines[] = fgetcsv($file, 1000, ",");
      }
      fclose($file);
      for ($n = 0; $n<count($lines); $n++){
        $leftdays = ($lines[$n][2] - $lines[$n][1]) * 100;
        if ($leftdays < 4){
          //send notification
          $function = escapeshellcmd('notification.py');
          $output = shell_exec($function);
          echo $output;
        }
      }
    }

    function execute(){
      $this->readToiletries();
      $this->readKitchen();
      $this->readCleaning();
      $this->readSupplies();
      $this->readPersonalCare();
      $this->readOther();
    }
  
  
  }
$call = new CheckFinish;
$call -> execute();
?>

<!-- <html>
  <meta http-equiv="refresh" content="0;  URL=Main.html"> 
  </body>
</html> -->
