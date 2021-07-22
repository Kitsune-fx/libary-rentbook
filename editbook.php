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
    แก้ไขหนังสือ <legend><br></legend><br>
     </div>
         <div class="container" style="width:70%;font-size:23px;">
            <form action="editbookdb.php" method="post">
             ประเภท
             <select name="book_cat_id">
                <?php
                 $sql_bk = "SELECT * FROM `book` WHERE `book_id` = ".$_GET['id']."" ;
                 $ans_bk = $conn->query($sql_bk) ;
                 $rows_bk = $ans_bk->fetch_assoc() ;
                 
                 
                 $sql = "SELECT * FROM `bookcatergory`" ;
                 $ans = $conn->query($sql) ;
                 while($rows= $ans->fetch_assoc() ){
                     
                     if($rows['book_cat_id'] == $rows_bk['book_cat_id']){
                       echo "<option class='form-control' selected value='".$rows['book_cat_id']."'>".$rows['book_cat_name']."</option> " ;  
                     }
                     
                     else{
                     echo "<option class='form-control' value='".$rows['book_cat_id']."'>".$rows['book_cat_name']."</option> " ;
                 }
                 }
                 ?>      
             </select>
             
             <br><br>ชื่อหนังสือ<input type="text" name="book_name" class="form-control"  value="<?php echo $rows_bk['book_name'] ;?>" maxlength="30" minlength="2">
              <br>ราคาเช่าต่อวัน<input type="text" name="book_price" class="form-control"  value="<?php echo $rows_bk['book_price'] ;?>">   
                <br>รหัสหนังสือ <input type="text" name="book_code" class="form-control"  value="<?php echo $rows_bk['book_code'] ;?>">
                <input type="hidden" value="<?php echo $rows_bk['book_id'] ;?>" name="book_id">
               
               <br> สถานะ:  <select name="status_id">
                <?php
                 
                 $sql_s = "SELECT * FROM `status`" ;
                 $ans_s = $conn->query($sql_s) ;
                 while($rows_s= $ans_s->fetch_assoc() ){
                     
                     if($rows_bk['status_id'] == $rows_s['status_id']){
                       echo "<option class='form-control' selected value='".$rows_s['status_id']."'>".$rows_s['status_name']."</option> " ;  
                     }
                     
                     else{
                     echo "<option class='form-control' value='".$rows_s['status_id']."'>".$rows_s['status_name']."</option> " ;  
                 }
                 }
                 ?>      
             </select> 
                <br>
                
               <br> <input type="submit" value="แก้ไข" class="btn btn-success">
                <input type="reset" value="รีเซต" class="btn btn-warning">
                </form>
            </div>  
    
     
    </body>
</html>