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
           <a href="main.php" class="btn btn-warning">กลับ</a>
           <a href="logout.php" class="btn btn-warning">Logout</a>
            <div class="font-size:26px;">
               </div>
        </div>
     <br><br><br><br><br><br><br><br>
     
     <div class="container">
         
         <h1>เช่าคืนหนังสือ</h1>
        
         <br>
         <form action="order.php" class="container" method="get">
         ค้นหา: <input type="text" name="search"><input type="submit" value="ค้นหา">
            
         </form>
         
         <br>
         
         <table class="table table-bordered">
         <thead>
             <tr>
                <th>ลำดับ</th>
                 <th>รหัสสมาชิก</th>
                 <th>ชื่อ</th>
                 <th>สกุล</th>
                 <th>ยืม</th>
                 <th>คืน</th>
                 <th>ยกเลิก</th>
                 <th>ประวัติเช่าคืนหนังสือ</th>
                 <th>จำนวนค้างส่ง</th>
             </tr>
             </thead>
             
             <thbody>
             
                 <?php
                 
                 if($search == ""){
                 $sql = "SELECT * FROM `member` INNER JOIN title ON title.title_id = member.title_id ORDER BY `member`.`mem_code` ASC" ;
                 $ans = $conn->query($sql) ;
                  }
                 else {
                  $sql = "SELECT * FROM `member` INNER JOIN title ON title.title_id = member.title_id WHERE `mem_name` LIKE '%".$search."%' OR `mem_code` LIKE '%".$search."%'"   ;
                  $ans = $conn->query($sql)   ;  
                 }
                 $i = 1;
                 
                 while($rows = $ans->fetch_assoc() ){
                    ?>
                 <tr>
                <td><?php echo $i ; ?></td>
                 <td><?php echo $rows['mem_code'] ; ?></td>
                 <td><?php echo $rows['title_name'] . $rows['mem_name'] ; ?></td>
                 <td><?php echo $rows['mem_surname'] ; ?></td>
                 <td><a href="rent.php?id=<?php echo $rows['mem_id'] ; ?>" > ยืม </a></td>
                 <td><a href="return.php?id=<?php echo $rows['mem_id'] ; ?>"> คืน </a></td>
             
                
                 <td><a href="cancel.php?id=<?php echo $rows['mem_id'] ; ?>" >ยกเลิก</a></td>
                 <td><a href="history.php?id=<?php echo $rows['mem_id'] ; ?>" >ประวัติ</a></td>  
                 <td><a href="check.php?id=<?php echo $rows['mem_id'] ; ?>" >จำนวนค้างส่งคืน</a></td>          
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