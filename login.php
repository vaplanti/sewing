<?php session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
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
        <title></title>
    </head>
    <body>
        <div class="topnav">
            <a href="index.php">Αρχική Σελίδα</a>
            <a href="patterns.php">Πατρόν</a>
            <a href="stitches.php">Ραφές</a>
            <a href="measurements.php">Μετρήσεις</a>
            <a href="conversions.php">Μετατροπές</a>
            <?php if (isset($_SESSION['user_name'])) { ?>
            <?php echo $_SESSION['user_name']; ?>
            <a href="logout.php">Έξοδος</a>
            <?php } else { ?>
            <a href="login.php">Είσοδος</a>
            <a href="register.php">Εγγραφή</a>
            <?php } ?>
	
        </div>
        <div class="main">
            <h2> Είσοδος</h2>
            <form  action="login.php" method="post" >
				
					
                Name
                <input type="text" name="username" placeholder="Enter Full Name"  />
		<br/>				
		Password
		<input type="password" name="password" placeholder="Password"  />
                <input type="submit" name="signup" value="Sign Up"  />
            </form>
            
        
        <?php
        $con = mysqli_connect("localhost", "root", "1012");
            if (!$con) {
                exit('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
            }
            mysqli_select_db($con, "userbase");
            session_start();
   
            if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
                $myusername = $_POST['username'];
                $mypassword = $_POST['password']; 
      
                $sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword'";
                $result = $con->query($sql);
                $row = $result->fetch_assoc() ;
                    $user_id= $row['id']."<br>";
                //$active = $row['active'];
      
                $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         
         $_SESSION['user_name'] = $myusername;
         $_SESSION['user_id']= $user_id;
         echo "Καλωσήρθες, ", $_SESSION['user_name'],"!";
         //echo " with id ", $_SESSION['user_id'];
         header("location: index.php");
      }else {
         echo "Λάθος όνομα ή κωδικός";
      }
      
   }
        ?>
        </div>
    </body>
</html>
