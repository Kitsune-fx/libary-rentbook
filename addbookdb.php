<?php
require_once('auth.php') ;

$sql_check = "SELECT * FROM `book` WHERE `book_code` = '".$_POST['book_code']."' " ;  
$ans = $conn->query($sql_check);

if($ans->num_rows > 0){
  echo "<script>
    
    alert('รหัสหนังสือมีอยู่ในระบบแล้ว') ;
    location.replace('book.php') ;
    exit() ;
    </script>" ;  
}

else{
$sql = "INSERT INTO `book` (`book_id`, `book_code`, `book_name`, `book_price`, `book_cat_id` , status_id) VALUES (NULL, '".$_POST['book_code']."', '".$_POST['book_name']."', '".$_POST['book_price']."', '".$_POST['book_cat_id']."' , 
1);"  ; 



if($conn->query($sql) === true) {
    echo "<script>
    
    alert('เพิ่มข้อมูลสำเร็จ') ;
    location.replace('book.php') ;
    
    </script>" ;
}

else{
    echo "<script>
    
    alert('เพิ่มข้อมูลล้มเหลว') ;
    location.replace('book.php') ;
    
    </script>" ;
        }
    }
?>