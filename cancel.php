<?php
require_once('auth.php') ;

$search = "" ;

if(isset($_GET['search'])){
    $search = $_GET['search'] ;
}

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
         
       
         <h1>ยกเลิกรายการ</h1>
        
         <br>
         
         
         <br>
         
         <table class="table table-bordered">
         <thead>
             <tr>
                <th>ลำดับ</th>
                 <th>รหัสหนังสือ</th>
                 <th>ชื่อหนังสือ</th>
                 <th>วันที่ยืม</th>
                 <th>ราคาเช่าต่อวัน</th>
                 <th>สถานะ</th>
                 <th>คืน</th>
             </tr>
             </thead>
             
             <thbody>
             
                 <?php
                 
                 if($search == ""){
                 $sql = "SELECT * FROM `rentbook` INNER JOIN member ON rentbook.mem_id = member.mem_id INNER JOIN book ON rentbook.book_id = book.book_id INNER JOIN rent_status ON rentbook.rent_status_id = rent_status.rent_status_id WHERE member.mem_id = ".$_GET['id']." AND rentbook.rent_status_id = 1 ORDER BY `rent_status`.`rent_status_id` ASC " ;
                 $ans = $conn->query($sql) ;
                  }
                 else {
                  $sql = "SELECT * FROM `rentbook` INNER JOIN member ON rentbook.mem_id = member.mem_id INNER JOIN book ON rentbook.book_id = book.book_id INNER JOIN rent_status ON rentbook.rent_status_id = rent_status.rent_status_id WHERE (`book_name` LIKE '%".$search."%' OR `book_code` LIKE '%".$search."%') AND member.mem_id = ".$_GET['id']." AND rentbook.rent_status_id = 1 ORDER BY `rent_status`.`rent_status_id` ASC"   ;
                  $ans = $conn->query($sql)   ;  
                 }
                 $i = 1;
                 
                 while($rows = $ans->fetch_assoc() ){
                    ?>
                 <tr>
                <td><?php echo $i ; ?></td>
                 <td><?php echo $rows['book_code'] ; ?></td>
                 <td><?php echo $rows['book_name'] ; ?></td>
                 <td><?php echo $rows['rent_date'] ; ?></td>    
                 <td><?php echo $rows['book_price'] ; ?>/วัน</td>
                 <td><?php echo $rows['rent_status_name'] ; ?></td>
                 <td><a onclick="return userconfirm()" href="canceldb.php?bid=<?php echo $rows['book_id'] ; ?>&mid=<?php echo $_GET['id']; ?>&rid=<?php echo $rows['rent_id'] ?>" > ยกเลิก </a></td>
                 
             </tr>
                 <?php
                     $i = $i+1 ;
                 }
        
                 
             ?>
             
             </thbody>
         
         </table>
         
         
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