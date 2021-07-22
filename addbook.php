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
           <a href="book.php" class="btn btn-warning">กลับ</a>
           <a href="logout.php" class="btn btn-warning">Logout</a>
               </div>
        </div>
     <br><br><br><br><br><br>
     
     
     <div class="container" style="font-size:26px;text-align:left;">
     เพิ่มหนังสือ <legend><br></legend><br>
     </div>
         <div class="container" style="width:70%;font-size:23px;">
            <form action="addbookdb.php" method="post">
             ประเภท
             <select name="book_cat_id">
                <?php
                 $sql = "SELECT * FROM `bookcatergory`" ;
                 $ans = $conn->query($sql) ;
                 while($rows= $ans->fetch_assoc() ){
                     
                     echo "<option class='form-control' value='".$rows['book_cat_id']."'>".$rows['book_cat_name']."</option> " ;
                 }
                 ?>      
             </select>
             
             <br><br>ชื่อหนังสือ<input type="text" name="book_name" class="form-control"  required maxlength="30" minlength="2">
              <br>ราคาเช่าต่อวัน<input type="text" name="book_price" class="form-control"  required>   
                <br>รหัสหนังสือ <input type="text" name="book_code" class="form-control"  required>
                 
               <br> <input type="submit" value="เพิ่ม" class="btn btn-success">
                <input type="reset" value="รีเซต" class="btn btn-warning">
                </form>
            </div>  
    
     
    </body>
</html>