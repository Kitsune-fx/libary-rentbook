<?php
require_once('auth.php') ;

$date = date("Y-m-d") ;
    
$sql_mem = "SELECT * FROM `member` WHERE `mem_id` = ".$_GET['mid']." ";  
$ans_mem = $conn->query($sql_mem) ;
$rows_mem = $ans_mem->fetch_assoc() ;

$sql_bk = "SELECT * FROM `book` WHERE `book_id` = ".$_GET['bid']." " ;
$ans_bk = $conn->query($sql_bk) ;
$rows_bk = $ans_bk->fetch_assoc() ;
    
$sql_s = "INSERT INTO `rentbook` (`rent_id`, `mem_id`, `book_id`, `rent_date`, `rent_return_date`, `rent_total`, `rent_pennalty`, `rent_status_id`) VALUES (NULL, '".$rows_mem['mem_id']."', '".$rows_bk['book_id']."', '".$date."', '0', '0', '0', '1');" ;

if($conn->query($sql_s) == true){
    
    echo "<script>
    
    alert('บันทึกข้อมูลสำเร็จ') ;
    location.replace('rent.php?id=".$rows_mem['mem_id']."') ;
    
    </script>" ; 
    
    $sql_e = "UPDATE `book` SET `status_id` = '2' WHERE `book`.`book_id` = ".$_GET['bid'].";" ;
    $ans_e = $conn->query($sql_e) ;
    
}

else{
    
    echo "<script>
    
    alert('บันทึกข้อมูลล้มเหลว') ;
    location.replace('rent.php?id=".$rows_mem['mem_id']."') ;
    
    </script>" ; 
}
   
?>