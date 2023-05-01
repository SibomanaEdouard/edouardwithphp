<?php

require("connection.php");
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $password=md5($_POST['password']);
    $password1=md5($_POST['password1']);
   
   if(!empty($email) || !empty($firstname) || !empty($lastname) || !empty($password) || !empty($password1)){
if($password==$password1){
$sql="UPDATE users SET password='$password',firstname = '$firstname', lastname='$lastname' WHERE email='$email'";
$result=$connect->query($sql);
if($result){
    header('location:workspace.php');
}
else{
    echo "Please check your email and try again ! ";
}
}
else{
    echo " The passwords must be similar ! ";
}
   }
   else{
    echo "Please all credentials are required !";
   }
}
else{
    echo "Dear customer ! Something went wrong please Try again later!";
}
?>