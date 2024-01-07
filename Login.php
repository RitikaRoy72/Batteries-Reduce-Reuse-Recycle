<!DOCTYPE html>
<?php
//require_once "CheckFinish.php";

//class Login extends CheckFinish{
  /*A class to simulate restocking a product*/
class Login{
  function __construct($username, $password, $filearray){
     /*Inititate any objects in use*/
    $this -> username = $username;
    $this -> password = $password;
    $this -> filearray = $filearray;
   }
  
  function readfile(){
    /*A function to read the file into an array*/
    //Read the file into an array
    //$fileo = fopen("users.csv", "a");
    $file = fopen("users.csv", "r");
    while (!feof($file)){
      $lines[] = fgetcsv($file, 1000, ",");
    }
    //Close the file
    fclose($file);
    $this -> filearray = $lines;
  }

  function login(){
    /* A function to login in for a returning member*/
    //Sift through the array to find the desired term
    $this->readfile();
    //var_dump($this->filearray);
    //print( " "+$this->username);
    $a = 0;
    while ($a < count($this->filearray)){
      //echo $a;
      //echo($this->password);
      if ($this->filearray[$a][0] == $this->username){ 
        //echo " okay1";
        if ($this->filearray[$a][1] == $this->password){
          //echo " okay2";
          return true;
          break; 
        } else if ($a == count($this->filearray)-1){
          return false;
          break;
        }
      } else if ($a == count($this->filearray)-1){
        return false;
        break;
      }
      $a = $a + 1;
    }
    
  }

  function executer(){
    $this->readfile();
    $this->login();
    //$this->execute();
  }
}

$username = $_POST["username"];
$password = $_POST["password"];

$test = new Login($username, $password, 0);
$value = $test->login();

?>

<html>
  <body style="background-color:#FCF3CF">
    <a href="index.html"> <button id = "background1" style = "width:500px; height:200px; object-fit:contain; position:relative; left:200px; top:220px; border:1px solid#000; background-color:#C6C6C6; display:none; color:red" > 
      Incorrect Username or Password 
      Click to return
    </button></a>
    <script>
      inval = "<?php echo $value; ?>";
      checkinput(inval);
      function checkinput(inval){
        if (inval == true) {
            document.getElementById('background1').style.display = "none";
          window.location.href = "Main.html";
        } else {
        document.getElementById('background1').style.display = "block", 10000;
          setTimeout(function(){window.location.href="index.html"}, 50000);
        }
      }
    </script>
  </body>
</html>