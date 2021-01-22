<?php session_start();
    $con = mysqli_connect("localhost", "root", "1012");
    if (!$con) {
        exit('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
    }
        //set the default client character set 
        mysqli_set_charset($con, 'utf-8');
            
        mysqli_select_db($con, "userbase");
        $sql = "SELECT id, author, image FROM uploads";
        $result = $con->query($sql);

    
    // put your code here      
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
             <h2> Πατρόν</h2>
            <br/>
            Για να υποβάλετε καινούριο πατρόν, πατήστε <a href="upload.php">εδώ</a>
            <br/>
            <?php
            if ($result->num_rows > 0) {
                    // output data of each row
                
                    while($row = $result->fetch_assoc()){  
                        ?>
                        <br/>
                        
                        <?php 
                        $id=$row["id"];
                        $image=$row["image"];
                         $image_show="/upload/$image";
                        echo $id. ". Υποβλήθηκε από: " . $row["author"]. "<br>"; 
                        echo "<img src=". $image_show."/>";?>
                        <br/>
                        Σχόλια <br/>
                        <?php  
                        $sql2 = "SELECT comment, author FROM comments WHERE imageid= '$id'";
                        $result2 = $con->query($sql2);

                        if ($result2->num_rows > 0) {
                    // output data of each row
                
                            while($row2 = $result2->fetch_assoc()){  
                            ?>
                            <br/>
                            <?php echo $row2["author"]. ":"; 
                            echo $row2["comment"]. "<br/>"?>
                            <br/>
                            <br/>
                            <br/>
                            
                            <?php
                        } 
                        } else {
                            echo "<br/> 0 σχόλια";
                        }?>
                        
                         <form action="patterns.php" method="post" enctype="multipart/form-data">
                            Νέο σχόλιο <br/>
                            Όνομα Χρήστη:<input type="text" name="username"/>
                            <br/>
                            Κείμενο: <input type="text" name="comment"/>
                        
                            <button type="submit" name='<?php $id ?>' >Υποβολή</button>
                    
                         </form> 
                        <br/><?php
                        if (isset($_POST['$id'])) { 
                            
                            echo "woo". $id;
                            $author=$_POST["username"];
                            $comment=$_POST["comment"];
                   
                            
                            $sql3 = "INSERT INTO comments (comment,author,imageid) VALUES ('" . $comment . "', '" . $author . "','" .$id."')";
                            mysqli_query($con, $sql3);
            } 
                        
                    } 
                    
                } else {
                echo "0 αποτελέσματα";
                }
                $con->close();?>
        </div>
    </body>
</html>
