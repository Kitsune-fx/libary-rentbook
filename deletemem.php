<?php
require_once('auth.php') ;

$sql = "DELETE FROM `member` WHERE `member`.`mem_id` = ".$_GET['id']." ;"   ;


if($conn->query($sql) === true) {
    echo "<script>
    
    alert('ลบข้อมูลสำเร็จ') ;
    location.replace('member.php') ;
    
    </script>" ;
}

else{
    echo "<script>
    
    alert('ลบข้อมูลล้มเหลว') ;
    location.replace('member.php') ;
    
    </script>" ;
        }
    
?>