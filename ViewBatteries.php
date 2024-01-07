<!DOCTYPE html>
<!-- Declare the language -->
   <html lang = "en">
    <head>
      <!-- Create some set style classes -->
      <style>
        *{
          box-sizing: border-box;
        }
        
        body{
          font-family: Roboto, veranda, sans-serif;
          margin: 10;
          background-color:#076467;
          height: 1000px;
        }
        
        /*Top Title */
        .header{
          padding: 10px;
          text-align: center;
          background: #14C2ED;
          color: #154360;
          object-fit: contain;
        }
        
        /*Font in header*/
        .header h1{
        font: size: 30px;
        }

        /* Style the tab */
        .tab {
          overflow: hidden;
          border: 1px solid #ccc;
          background-color: #f1f1f1;
          

        }
        
        /* Style the buttons inside the tab */
        .tab button {
          background-color: inherit;
          float: left;
          border: none;
          outline: none;
          cursor: pointer;
          padding: 14px 16px;
          transition: 0.3s;
          font-size: 17px;
        }
        
        /* Change background color of buttons on hover */
        .tab button:hover {
          background-color: #ddd;
        }
        
        /* Create an active/current tablink class */
        .tab button.active {
          background-color: #ccc;
        }
        
        /* Style the tab content */
        .tabcontent {
          padding: 6px 12px;
          border: 1px solid #ccc;
          border-top: none;
        }

        /*Button Style*/ 
        .pressbutton {
          margin:10px;  
          width:200px;
          background-color:#ddd; 
          border:double #154360; 
          color:#154360; 
          font-size:15px; 
          text-align:center; 
          font-weight:bold; 
          min-height:40px; 
          font-size:15px; 
          text-align:center;
          padding: 10px;
        }

        /*Create a second button style*/
        .otherbutton {
          margin:10px;  
          width:100px;
          background-color:#E9F7EF; 
          border:soild #154360; 
          color:#154360; 
          font-size:30px;
          font-weight: bold;
          font-family: Veranda;
          text-align:center; 
          min-height:40px; 
          font-size:15px; 
          text-align:center;
          padding: 10px;
        }

        /*Create a third button style*/
        .pressbuttontwo {
          margin:10px;  
          width:200px;
          background-color:#E9F7EF; 
          border:double #154360; 
          color:#154360; 
          font-size:15px; 
          text-align:center; 
          font-weight:bold; 
          min-height:40px; 
          font-size:15px; 
          text-align:center;
          padding: 10px;
        }

        /*Bottom Footer (branding purposes) */
        .footer {
          position: fixed;
          text-align: center;
          bottom: 0px;
          width: 99%;
          background-color: DarkSalmon;
          color: white;
          
        }
        
      </style>
    </head>

    <body>
        <!-- Create the website header -->
      <div class="header">
        <h1> Batteries: Reduce, Reuse, Recycle </h1>
        <p> Extend the life of every battery</p>
      </div>

      <div class="tab">
        <!--Navigation back to the home page-->
        <a href = "Main.html">
          <button class="tablinks">Home</button> </a>
        <a href = "AddBatteries.html">
          <button class="tablinks"> Add Batteries </button> </a>
        <a href = "ViewBatteries.php">
          <button class="tablinks"> View Batteries </button> </a>
        <a href = "EditApplications.html">
          <button class="tablinks" > Edit Applications </button> </a>
        <a href = "index.html">
          <button class = "tablinks" style = "position:absolute; right:10px"> Log Out </button> </a>
      </div>

      
      <!--Create a path for viewing products -->
      <div id="viewproduct" class="tabcontent" >
        <div style="width:225px; height:450px; position:absolute; left:8px; top:220px; border:1px solid #000; background-color:#F9EBEA">
          
          <p style="position:absolute; top:1px; left:30px; font-size:20px; font-family:Veranda;"> Select a Category:</p>
          <br><br><br>
          <form method="post">        
            <button class="pressbuttontwo" name="NI-MH" type="submit">Nickel Metal Hydride</button>
            <button class="pressbuttontwo" name = "LIB" type = "submit">Lithium-ION</button>
            <button class="pressbuttontwo" name = "Ni-CD" type = "submit">Nickel Cadimium</button>
            <button class="pressbuttontwo" name = "Pb-AC" type = "submit">Lead Acid</button> 
            <button class="pressbuttontwo" name = "Ni-ZN" type = "submit">Nickel Zinc</button>
            <button class="pressbuttontwo" name = "Other" type = "submit">Other</button>
          </form>
       </div>


          
          <?php
            if(array_key_exists('NI-MH', $_POST)) {
            display('NI-MH');
        } else if (array_key_exists('LIB', $_POST)){
              display('LIB');
        }else if (array_key_exists('Ni-CD', $_POST)){
              display('Ni-CD');
        }else if (array_key_exists('Pb-AC', $_POST)){
              display('Pb-AC');
        }else if (array_key_exists('Ni-ZN', $_POST)){
              display('Ni-ZN');
        }else if (array_key_exists('Other', $_POST)){
              display('Other');
            }
             function display($filename){
               echo "<div style=\"width:600px; position:absolute; left:300px; top:250px; min-height:100px; border-color:#ddd; border: double 5px; background-color:#40E0D0\">
         <p style=\"font-weight:bold; position:absolute; top:0px; left:5px;\"> Product Name</p>
         <p style=\"font-weight:bold; position:absolute; top:0px; left:200px;\"> Entry Date</p>
          <p style=\"font-weight:bold; position:absolute; top:0px; left:350px;\"> Capacity (milli-amphere-hour)</p>";
                $fp = fopen ( $filename.".csv" , "r" );
               //$newLine = "</br>";
                echo "</br>";
                while (( $data = fgetcsv ( $fp , 1000 , "," )) !== FALSE ) {
                  $i = 0;
                  foreach($data as $row) { 
                    if ($i == 0){
                      //$date = strtotime($row);
                      echo "<p style=\" padding:1px; position:absolute; left:5px;\" > $row </p>";
                    } else if ($i == 1){
                      $val = date_format(date_create($row), "m/d/Y");
                      echo "<p style=\" padding:1px; position:absolute; left:200px;\" > $row </p>";
                    } else if ($i == 2){
                      //$rows = explode(".", $row);
                      $val = intval($row*100)/100;
                      echo "<p style=\" padding:1px; position:absolute; left:350px;\" > $val </p>";
                    } 

                    $i ++;
                   
                  }
                  echo "</br> ";
                  echo "</br>";
                  }
                fclose ( $fp );
              }
          ?>
        </div>
      </div>

      <div class="footer">
          <p> Author: Ritika Roy </p>
      </div>
    </body>
  </html>