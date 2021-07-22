<?php
require_once('auth.php') ;

$sql_rent = "UPDATE `rentbook` SET `rent_status_id` = '2' WHERE `rentbook`.`rent_id` = ".$_GET['rid']."; "    ;
if($conn->query($sql_rent) == true){
    
    $sql_ch = "UPDATE `book` SET `status_id` = '1' WHERE `book`.`book_id` = ".$_GET['bid'].";" ;
    $conn->query($sql_ch) ;
    echo "<script>
    
    alert('บันทึกสำเร็จ') ;
    location.replace('return.php?id=".$_GET['mid']."') ;
    
    </script>" ; 

}
?>