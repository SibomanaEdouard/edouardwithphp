<?php
include('connection.php');
if(isset($_POST['submit'])){
  
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    
    if(!empty($email) || !empty($password)){
      

    $sql="DELETE FROM users WHERE email='$email'";
    $result=$connect->query($sql);
    if($result){
header('location:form.php');
echo "FIne";
    }
    else{
        echo " Wrong email or password ";
    }
    }
    else{
        echo "All credentials are required !";
    }
}
else{
    echo "Some thing went wrong ! ";
}
?>