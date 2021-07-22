<?php
require_once('config.php') ;
    
$sql = "SELECT * FROM `admin` WHERE `admin_username` = '".$_POST['admin_username']."' AND `admin_password` = '".$_POST['admin_password']."'"    ;
$ans = $conn->query($sql) ;

    if($ans->num_rows == 1){
    
        $_SESSION['admin'] = 1 ;
     header('location:main.php');
        
        
    }
    else{
        
        echo "
        <script>
        alert('UsernameหรือPassword ผิด') ;
        location.replace('index.php') ;
        
        </script>
        " ;
    }

?>