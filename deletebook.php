<?php
require_once('auth.php') ;

$sql = "DELETE FROM `book` WHERE `book`.`book_id` = ".$_GET['id']." ;"   ;


if($conn->query($sql) === true) {
    echo "<script>
    
    alert('ลบข้อมูลสำเร็จ') ;
    location.replace('book.php') ;
    
    </script>" ;
}

else{
    echo "<script>
    
    alert('ลบข้อมูลล้มเหลว') ;
    location.replace('book.php') ;
    
    </script>" ;
        }
    
?>  