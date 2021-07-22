<?php
require_once('auth.php') ;

$sql = "SELECT * FROM `book` WHERE `book_id` = ".$_POST['book_id']." " ;
$ans = $conn->query($sql) ;
$rows = $ans->fetch_assoc() ;


if($rows['book_code'] == $_POST['book_code']) {
   $sql = "UPDATE `book` SET `book_name` = '".$_POST['book_name']."', `book_price` = '".$_POST['book_price']."', `book_cat_id` = '".$_POST['book_cat_id']."', `status_id` = '".$_POST['status_id']."' WHERE `book`.`book_id` = ".$_POST['book_id'].";" ; 
    
    if($conn->query($sql) === true) {
    echo "<script>
    
    alert('แก้ไขข้อมูลสำเร็จ') ;
    location.replace('book.php') ;
    
    </script>" ;
}

else{
    echo "<script>
    
    alert('แก้ไขข้อมูลล้มเหลว') ;
    location.replace('book.php') ;
    
    </script>" ;
        }
    }
    
else {



$sql = "SELECT * FROM `book` WHERE `book_code` = ".$_POST['book_code']." " ;
$ans = $conn->query($sql) ;



if($ans->num_rows > 0){
 
    echo "<script>
    
    alert('แก้ไขข้อมูลล้มเหลวรหัสหนังสือนี้ถูกให้แล้ว') ;
    location.replace('book.php') ;
    
    </script>" ;
        }  

else{

    
$sql = "UPDATE `book` SET `book_code` = '".$_POST['book_code']."', `book_name` = '".$_POST['book_name']."', `book_price` = '".$_POST['book_price']."', `book_cat_id` = '".$_POST['book_cat_id']."', `status_id` = '".$_POST['status_id']."' WHERE `book`.`book_id` = ".$_POST['book_id'].";" ;


if($conn->query($sql) === true) {
    echo "<script>
    
    alert('แก้ไขข้อมูลสำเร็จ') ;
    location.replace('book.php') ;
    
    </script>" ;
}

else{
    echo "<script>
    
    alert('แก้ไขข้อมูลล้มเหลว') ;
    location.replace('book.php') ;
    
    </script>" ;
        }
    }
}
?>