<?php
require_once('config.php') ;
    
if(isset($_SESSION['admin'])){
   
    if($_SESSION['admin'] == 1){
        
    }
    
    else{
        echo "<script>
    
    alert('กรุณาเข้าสู่ระบบ') ;
    location.replace('index.php') ;
    
    </script>" ;}
    
}
else {
    echo "<script>
    
    alert('กรุณาเข้าสู่ระบบ') ;
    location.replace('index.php') ;
    
    </script>" ;
}

?>