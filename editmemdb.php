<?php
require_once('auth.php') ;

$sql = "SELECT * FROM `member` WHERE `mem_code` = ".$_POST['mem_code']." " ;
$ans = $conn->query($sql) ;
$row = $ans->fetch_assoc() ;

if($_POST['mem_code'] == $rows['mem_code']){
    
  $sql = "UPDATE `member` SET `mem_name` = '".$_POST['mem_name']."', `mem_surname` = '".$_POST['mem_surname']."', `title_id` = '".$_POST['title_id']."', WHERE `member`.`mem_id` = ".$_POST['mem_id']."" ;


if($conn->query($sql) === true) {
    echo "<script>
    
    alert('แก้ไขข้อมูลสำเร็จ') ;
    location.replace('member.php') ;
    
    </script>" ;
}

else{
    echo "<script>
    
    alert('แก้ไขข้อมูลล้มเหลว') ;
    location.replace('member.php') ;
    
    </script>" ;
        }  
    
}

else{
    
    
    if($ans->num_rows>0){
       
        echo "<script>
    
    alert('รหัสสมาชิกนี้ถูกให้แล้ว') ;
    location.replace('member.php') ;
    
    </script>" ;
    }
    
    else{
    
$sql = "UPDATE `member` SET `mem_name` = '".$_POST['mem_name']."', `mem_surname` = '".$_POST['mem_surname']."', `title_id` = '".$_POST['title_id']."', `mem_code` = '".$_POST['mem_code']."' WHERE `member`.`mem_id` = ".$_POST['mem_id']."" ;


if($conn->query($sql) === true) {
    echo "<script>
    
    alert('แก้ไขข้อมูลสำเร็จ') ;
    location.replace('member.php') ;
    
    </script>" ;
}

else{
    echo "<script>
    
    alert('แก้ไขข้อมูลล้มเหลว') ;
    location.replace('member.php') ;
    
    </script>" ;
        }
    }
}
?>