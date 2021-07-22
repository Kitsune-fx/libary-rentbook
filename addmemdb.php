<?php
require_once('auth.php') ;

$sql_check = "SELECT * FROM `member` WHERE `mem_name` = '".$_POST['mem_name']."' AND `mem_surname` = '".$_POST['mem_surname']."' AND `mem_code` = ".$_POST['mem_code']." " ;  
$ans = $conn->query($sql_check);

if($ans->num_rows > 0){
  echo "<script>
    
    alert('ชื่อหรือนามสกุลหรือรหัสมีอยู่ในระบบแล้ว') ;
    location.replace('member.php') ;
    exit() ;
    </script>" ;  
}

else{
$sql = "INSERT INTO `member` (`mem_id`, `mem_name`, `mem_surname`, `title_id`, `mem_code`) VALUES (NULL, '$_POST[mem_name]', '$_POST[mem_surname]', '$_POST[title_id]', '$_POST[mem_code]');"  ; 



if($conn->query($sql) === true) {
    echo "<script>
    
    alert('เพิ่มข้อมูลสำเร็จ') ;
    location.replace('member.php') ;
    
    </script>" ;
}

else{
    echo "<script>
    
    alert('เพิ่มข้อมูลล้มเหลว') ;
    location.replace('member.php') ;
    
    </script>" ;
        }
    }
?>