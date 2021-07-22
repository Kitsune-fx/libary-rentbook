<?php
require_once('auth.php') ;
    
$sql = "DELETE FROM `rentbook` WHERE `rentbook`.`rent_id` = ".$_GET['rid'].""  ;  

if($conn->query($sql) === true) {
    $sql = "UPDATE `book` SET `status_id` = '1' WHERE `book`.`book_id` = ".$_GET['bid'].";" ;
    $conn->query($sql) ;
    echo "<script>
    
    alert('ลบข้อมูลสำเร็จ') ;
    location.replace('cancel.php?id=".$_GET['mid']."') ;
    
    
    </script>" ;
}

else{
    echo "<script>
    
    alert('ลบข้อมูลล้มเหลว') ;
    location.replace('cancel.php?id=".$_GET['mid']."') ;
    
    </script>" ;
        }
    
?>  