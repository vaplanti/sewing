<?php session_start();

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {
                font-family: "Lato", sans-serif;
  
                background-color: rgb(200, 227, 255);
            }

            .topnav {
                margin-left:100px;
                margin-right:100px;
                background-color: rgb(255, 212, 250);
                overflow: hidden;
            }

            .topnav a {
                float:left;
                padding: 14px 16px;
                text-align:center;
                text-decoration: none;
                font-size: 25px;
                color: #818181;
            }

            .topnav a:hover {
                color: #f1f1f1;
            }

            .main {
                margin-left: 100px;
                margin-right: 100px;
                font-size: 20px; 
                padding: 0px 10px;
            }


        </style>
        <title>stitches</title>
    </head>
    <body>
        <div class="topnav">
            <a href="index.php">Αρχική Σελίδα</a>
            <a href="patterns.php">Πατρόν</a>
            <a href="stitches.php">Ραφές</a>
            <a href="measurements.php">Μετρήσεις</a>
            <a href="conversions.php">Μετατροπές</a>
            <?php if (isset($_SESSION['user_id'])) { ?>
            <?php echo $_SESSION['user_name']; ?>
            <a href="logout.php">Έξοδος</a>
            <?php } else { ?>
            <a href="login.php">Είσοδος</a>
            <a href="register.php">Εγγραφή</a>
            <?php } ?>
	
        </div>
        <div class="main">
  <h2> Ραφές</h2>


  <img src="upload/whipstitch.jpg" >
  <p>Για να κάνετε αυτή τη βελονιά, [....]</p>
  <br>
  <br>

  
  <img src="upload/catchstitch.jpg" >
  <p>Για να κάνετε αυτή τη βελονιά, [....]</p>
  <br>
  <br>


</div>
        <?php
        // put your code here
        ?>
    </body>
</html>
