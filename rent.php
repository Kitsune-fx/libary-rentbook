<?php
require_once('auth.php') ;

$sql_mem = 

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
         
       <h1>ยืมหนังสือ</h1>
        
         <br>
         <form action="rent.php" class="container" method="get">
         ค้นหา: <input type="text" placeholder="รหัส/ชื่อ" name="search"><input type="submit" value="ค้นหา">
              <input type="hidden" name="id" value="<?php echo $_GET['id'] ; ?>">
         </form>
         
         <br>
         
         <table class="table table-bordered">
         <thead>
             <tr>
                <th>ลำดับ</th>
                 <th>รหัสหนังสือ</th>
                 <th>ชื่อหนังสือ</th>
                 <th>ประเภทหนังสือ</th>
                 <th>ราคาเช่าต่อวัน</th>
                 <th>สถานะ</th>
                 <th>ยืม</th>
             </tr>
             </thead>
             
             <thbody>
             
                 <?php
                 
                 if($search == ""){
                 $sql = "SELECT * FROM `book` INNER JOIN bookcatergory ON bookcatergory.book_cat_id = book.book_cat_id INNER JOIN status ON status.status_id = book.status_id WHERE book.status_id = 1 ORDER BY `book`.`book_code` ASC " ;
                 $ans = $conn->query($sql) ;
                  }
                 else {
                  $sql = "SELECT * FROM `book` INNER JOIN bookcatergory ON bookcatergory.book_cat_id = book.book_cat_id INNER JOIN status ON status.status_id = book.status_id WHERE (  `book_name` LIKE '%".$search."%' OR `book_code` LIKE '%".$search."%' ) AND book.status_id = 1 ORDER BY `book`.`book_code` ASC"   ;
                  $ans = $conn->query($sql)   ;  
                 }
                 $i = 1;
                 
                 while($rows = $ans->fetch_assoc() ){
                    ?>
                 <tr>
                <td><?php echo $i ; ?></td>
                 <td><?php echo $rows['book_code'] ; ?></td>
                 <td><?php echo $rows['book_name'] ; ?></td>
                 <td><?php echo $rows['book_cat_name'] ; ?></td>    
                 <td><?php echo $rows['book_price'] ; ?>/วัน</td>
                 <td><?php echo $rows['status_name'] ; ?></td>
                 <td><a href="rentdb.php?bid=<?php echo $rows['book_id'] ; ?>&mid=<?php echo $_GET['id']; ?>" > ยืม </a></td>
                 
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