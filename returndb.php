<?php
require_once('config.php') ;

$date = date("Y-m-d") ;
$sql_date = "UPDATE `rentbook` SET `rent_return_date` = '".$date."' WHERE `rentbook`.`rent_id` = ".$_GET['rid']." ;" ;
 $ans_date = $conn->query($sql_date) ;

$sql = "SELECT * FROM `rentbook` INNER JOIN member ON rentbook.mem_id = member.mem_id INNER JOIN book ON rentbook.book_id = book.book_id INNER JOIN rent_status ON rentbook.rent_status_id = rent_status.rent_status_id WHERE rentbook.book_id = ".$_GET['bid']." " ;
$ans = $conn->query($sql) ;
?>

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
           <a href="return.php?id=<?php echo $_GET['mid'] ;?>" class="btn btn-warning">กลับ</a>
           <a href="logout.php" class="btn btn-warning">Logout</a>
            <div class="font-size:26px;">
               </div>
        </div>
     <br><br><br><br><br><br><br><br>
     
     <div class="container" style="font-size:46px;text-align:center;">
         
         <table class="table table-bordered">
             <theader>
                 <tr>
             <th>ไอดี</th>
             <th>วันที่ยืม</th>
             <th>วันที่คืน</th>
             <th>จำนวนวัน</th>
             <th>เกินกำหนดคืนมา</th>         
             <th>ราคา</th>
             <th>ค่าปรับ</th>
             <th>รวมทั้งสิ้น</th>         
                     </tr>
             </theader>
         
             
             <?php
            $rows = $ans->fetch_assoc() ;
            $date1 = date_create($rows['rent_return_date']) ;
            $date2 = date_create($rows['rent_date']) ;
            
            $diff = date_diff($date1,$date2) ; 
            $z = $diff->format("%a") ;
            
             if($z == 0){
                $z =1 ;
            } 
             else{}
             
             
            ?><tbody>
             <tr>
             <th><?php echo $rows['book_id'];?></th>
             <th><?php echo $rows['rent_date'];?></th>
             <th><?php echo $rows['rent_return_date'];?></th>
             <th><?php echo $z . " วัน" ;?></th>
                 <th><?php if( $z > 7){
                     $x = $z - 7 ; 
                     
        echo $x . " วัน" ; }
                     
                     else {echo 0 ;}
                     ?></th>         
             <th><?php echo $rows['book_price']*$z;?> บาท</th>
             <th><?php 
                 
                 if( $z > 7){
                     $x = $z - 7 ;
                     $y = $x * 5 ;
                     echo $y ;
                 }
                 else{
                     $y = 0 ;
                     echo $y ;
                 }
                 
                 ?>
                 บาท</th> 
                 <th> <?php echo $y + $rows['book_price']*$z . " บาท" ;?> </th>
                     </tr>
             </tbody>
                
                
           
         <?php
                 
         ?>
        </table>
     </div>
     <div style="text-align:right;width:70%;">
     <a href="returnbk.php?mid=<?php echo $rows['mem_id'];?>&bid=<?php echo $rows['book_id'];?>&rid=<?php echo $rows['rent_id'] ;?>" class="btn btn-primary">ดำเนินการต่อ</a>
     </div>
    </body>
</html>