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
           <a href="order.php" class="btn btn-warning">กลับ</a>
           <a href="logout.php" class="btn btn-warning">Logout</a>
            <div class="font-size:26px;">
               </div>
        </div>
     <br><br><br><br><br><br><br><br>
     
     <div class="container">
         
       <h1>ค้างส่งคืน</h1>
         
         <br>
         
         <table class="table table-bordered">
         <thead>
             <tr>
                <th>ลำดับ</th>
                 <th>รหัสหนังสือ</th>
                 <th>ชื่อหนังสือ</th>
                
                 
                 
             </tr>
             </thead>
             
             <thbody>
             
                 <?php
                  
                  $sql = "SELECT * FROM `rentbook` INNER JOIN book ON book.book_id = rentbook.book_id
                  WHERE rentbook.rent_status_id = 1 AND `mem_id` = ".$_GET['id']."" ;

                  $ans = $conn->query($sql)   ; 
                  $count = $ans->num_rows ;
                 
                 $i = 1;
                 
                 while($rows = $ans->fetch_assoc() ){
                    ?>
                 <tr>
                <td><?php echo $i ; ?></td>
                 <td><?php echo $rows['book_code'] ; ?></td>
                 <td><?php echo $rows['book_name'] ; ?></td>
                 
                 
                
                 
             </tr>
                 <?php
                     $i = $i+1 ;
                 }
        
                 
             ?>
             
             </thbody>
         
         </table>
         
         ค้างหนังสือทั้งหมด <?php echo $count ;?> เล่ม
         
     </div>
     
     <script>
      function userconfirm(){
          var go = false;
          if(confirm('ยืนยันการลบ')){
              go = true ;
          }
      return go ;
      }
     
     
     </script>
     
    </body>
</html>