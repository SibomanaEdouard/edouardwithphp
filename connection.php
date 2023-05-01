<?php
$connect=mysqli_connect('localhost','edouard','edouard1234','student_db');
if($connect){
//    echo "connected";
}
else{
    echo "failed".mysqli_connect_error();
}
?>