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
        <title>upload</title>
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
             <h2> Υποβολή Καινούριου Πατρόν</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Όνομα Χρήστη:
            <input type="text" name="username"/>
            <br/>
            Πατρόν:
            <input type="file" name="image" />
            <br/>
            <br/>
            <button type="submit" name="upload">Upload</button>
        </form>
        <?php
            $con=mysqli_connect("localhost","root","1012") or die("Could not Connect My Sql");
            mysqli_set_charset($con, 'utf-8');
            
            mysqli_select_db($con, "userbase");
            
            if (isset($_POST['upload'])) { 
                $author=$_POST["username"];
                $filename = $_FILES["image"]["name"]; 
                $tempname = $_FILES["image"]["tmp_name"];     
                $folder = "upload/".$filename; 
                $sql = "INSERT INTO uploads (image,author) VALUES ('".$filename."',".$author."')";
                if(mysqli_query($con, "INSERT INTO uploads(image, author) VALUES('" . $filename . "', '" . $author . "')")) {
                    echo  "Επιτυχής εγγραφή! </a>";
                } else {
                    echo  "Κάτι δεν πήγε καλά. Δοκιμάστε ξανά αργότερα.";
                }
                if (move_uploaded_file($tempname, $folder))  { 
                    echo "Επιτυχής υποβολή εικόνας"; 
                }else{ 
                    echo "Κάτι δεν πήγε καλά"; 
                } 
            } 
            
        ?>
            
        
        </div>
    </body>
</html>



</body>
</html>