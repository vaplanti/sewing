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
        <title>measurements</title>
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
            <h2> Μετρήσεις</h2>
            <p>Για όλες τις μετρήσεις, είναι σημαντικό να χρησιμοποιείτε την κρίση σας. Πάρτε μετρήσεις ανάλογα με το αποτέλεσμα που θέλετε.
            Για παράδειγμα, αν μετράτε το στήθος σας για μία μπλούζα, φροντίστε να φοράτε το είδος σουτιέν που θα φορούσατε με την μπλούζα.
            <br>
            Πολλές ιστοσελίδες όπου μπορείτε να παραγγείλετε ρούχα εξηγούν πώς να πάρετε μετρήσεις για το καλύτερο αποτέλεσμα. 
            Αν δεν είστε βέβαιοι για κάτι, μη φοβηθείτε να ρωτήσετε.
            </p>
  

            <h5>Στήθος</h5>
            <p>Για να πάρετε μέτρηση στο στήθος, τοποθετήστε το ένα άκρο της μεζούρας στο φαρδύτερο μέρος του στήθους σας. 
            Περάστε το άλλο άκρο γύρω από το ώμα σας, περνώντας κάτω από τις μασχάλες, και ξανά μπροστά. Προσέξτε η μεζούρα να μην πιέζει το στήθος,
            αλλά να μην είναι και χαλαρή. 
            <br>

            </p>
  
            <h5>Μέση</h5>
            <p>Για να πάρετε μέτρηση στη μέση, γρννσοωνεσ</p>

            <h5>Γλουτοί</h5>
            <p>Για να πάρετε μέτρηση στoυς γλουτούς, σταθείτε με τα πόδια ενωμένα και περάστε την μεζούρα γύρω από το φαρδύτερο σημείο των γλουτών.</p>


            <h5>Λαιμός</h5>
            <p>Για να πάρετε μέτρηση στη μέση, γρννσοωνεσ</p>
  
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
