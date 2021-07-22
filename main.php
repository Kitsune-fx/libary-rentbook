<?php
require_once('auth.php') ;
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
           <a href="logout.php" class="btn btn-warning">Logout</a>
            <div class="font-size:26px;">
               </div>
        </div>
     <br><br><br><br><br><br><br><br>
     
     <div class="container" style="font-size:46px;text-align:center;">
         
        <a href="member.php" class="btn btn-primary" style="font-size:26px;">จัดการข้อมูลสมาชิก</a><br>
        <a href="book.php" class="btn btn-success" style="font-size:26px;">จัดการข้อมูลหนังสือ</a><br>
        <a href="order.php" class="btn btn-warning" style="font-size:26px;">เช่าคืนหนังสือ</a><br> 
     </div>
     
     
    </body>
</html>