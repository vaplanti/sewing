<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
   session_start();
   unset($_SESSION["user_name"]);
   unset($_SESSION["user_id"]);
   
   header('Refresh: 2; URL = login.php');
?>
        
    </body>
</html>
