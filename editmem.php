<?php
require_once('auth.php');
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
           
                <a href="member.php" class="btn btn-warning">กลับ</a>
           <a href="logout.php" class="btn btn-warning">Logout</a>
               </div>
        </div>
     <br><br><br><br><br><br>
     
     
     <div class="container" style="font-size:26px;text-align:left;">
     แก้ไขข้อมูลสมาชิก <legend><br></legend><br>
     </div>
         <div class="container" style="width:70%;font-size:23px;">
            <form action="editmemdb.php" method="post">
             คำนำหน้า
             <select name="title_id">
                 <?php
                 $sql_mem = "SELECT * FROM `member` WHERE `mem_id` = ".$_GET['id']."" ;
                 $ans_mem = $conn->query($sql_mem) ;
                 $rows_mem = $ans_mem->fetch_assoc() ;
                
                 $sql = "SELECT * FROM `title`" ;
                 $ans = $conn->query($sql) ;
                 while($rows= $ans->fetch_assoc() ){
                     
                     if($rows['title_id'] == $rows_mem['title_id']){
                      echo "<option class='form-control' selected value='".$rows['title_id']."'>".$rows['title_name']."</option> " ;   
                     }
                     else{
                     echo "<option class='form-control' value='".$rows['title_id']."'>".$rows['title_name']."</option> " ;
                         }
                 }
                 ?>      
             </select>
             
             <br><br>ชื่อจริง<input type="text" name="mem_name" value="<?php echo $rows_mem['mem_name'] ;?>" class="form-control" placeholder="ชื่อจริง"  maxlength="30" minlength="2" required>
              <br>นามสกุล<input type="text" name="mem_surname" value="<?php echo $rows_mem['mem_surname'] ;?>" class="form-control" placeholder="นามสกุล" required>   
                <br>รหัสสมาชิก <input type="text" value="<?php echo $rows_mem['mem_code'] ;?>" name="mem_code" class="form-control" placeholder="" required>
                 <input type="hidden" name="mem_id" value="<?php echo $rows_mem['mem_id'] ;?>">
               <br> <input type="submit" value="แก้ไข" class="btn btn-success">
                <input type="reset" value="รีเซต" class="btn btn-warning">
                </form>
            </div>  
    
     
    </body>
</html>