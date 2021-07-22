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
           
           <a href="logout.php" class="btn btn-warning">Logout</a>
               </div>
        </div>
     <br><br><br><br><br><br>
     
     
     <div class="container" style="font-size:26px;text-align:left;">
     เพิ่มสมาชิก <legend><br></legend><br>
     </div>
         <div class="container" style="width:70%;font-size:23px;">
            <form action="addmemdb.php" method="post">
             คำนำหน้า
             <select name="title_id">
                <?php
                 $sql = "SELECT * FROM `title`" ;
                 $ans = $conn->query($sql) ;
                 while($rows= $ans->fetch_assoc() ){
                     
                     echo "<option class='form-control' value='".$rows['title_id']."'>".$rows['title_name']."</option> " ;
                 }
                 ?>      
             </select>
             
             <br><br>ชื่อจริง<input type="text" name="mem_name" class="form-control" placeholder="ชื่อจริง" required maxlength="30" minlength="2">
              <br>นามสกุล<input type="text" name="mem_surname" class="form-control" placeholder="นามสกุล" required>   
                <br>รหัสสมาชิก <input type="text" name="mem_code" class="form-control" placeholder="" required>
                 
               <br> <input type="submit" value="เพิ่ม" class="btn btn-success">
                <input type="reset" value="รีเซต" class="btn btn-warning">
                </form>
            </div>  
    
     
    </body>
</html>