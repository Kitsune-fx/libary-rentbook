<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html>
 <meta charset="utf-8">
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
        <title>
        ระเช่าหนังสือ
        </title>
    </head>
    
 <body>
    
       <div class="container" style="width:100%;background-color:black;top:0px;position:fixed;height:10%;color:white;margin:auto;padding:1em;text-align:right;">
           <span style="font-size:26px;float:left;">ระบบเช่าหนังสือ </span>
            <div class="font-size:26px;">
               </div>
        </div>
     <br><br><br><br><br><br><br><br>
     
     <div class="container" style="font-size:26px;text-align:center;">
         
        <form action="logincheck.php" method="post" style="width:300px;margin:auto;">
            Username:<input type="text" required name="admin_username" class="form-control">
           <br> Password:<input type="password" required name="admin_password" class="form-control">
            <br><input type="submit" class="btn btn-primary" value="login">
            <input type="reset" class="btn btn-danger" value="reset">
        
         </form>
         
     </div>
     
     
    </body>
</html>