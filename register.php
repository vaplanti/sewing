<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
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
        <title>register</title>
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
            <h2> Εγγραφή</h2>
            <form  action="register.php" method="post" >
				
					
                Όνομα
                <input type="text" name="username" placeholder="Enter Full Name"  />
		<br/>				
		Κωδικός
		<input type="password" name="password" placeholder="Password"  />
                <input type="submit" name="signup" value="Sign Up"  />
            </form>
            
        </div>
        <?php
            $con = mysqli_connect("localhost", "root", "1012");
            if (!$con) {
                exit('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
            }
            mysqli_select_db($con, "userbase");
            //if(isset($_SESSION['user_id'])) {
            //    header("Location: index.php");
            //}
            //$error = false;
            $username="";
            $password="";
            if(isset($_POST['username']))
            {
                $username=$_POST['username'];
            }
            if(isset($_POST['password']))
            {
                $password=$_POST['password']; 
            }
	
            if(($password =="")OR($username=="")){
                //echo "γράψτε κάτι ρε παιδιά";
            }else{
                if(mysqli_query($con, "INSERT INTO users(username, password) VALUES('" . $username . "', '" . $password . "')")) {
                    echo  "Επιτυχής εγγραφή! <a href='login.php'>Πατήστε εδώ για είσοδο.</a>";
                } else {
                    echo  "Κάτι δεν πήγε καλά. Δοκιμάστε ξανά αργότερα.";
                }
            }
        ?>
        
    </body>
</html>
