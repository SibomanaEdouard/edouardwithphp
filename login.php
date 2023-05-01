<?php

//this is to include connection from database
require('connection.php');
//this is to check if the form was submitted
if(isset($_POST['submit'])){
  
  //This is how to take the data submitted by user

  $email=$_POST['email'];
  $password=md5($_POST['password']);

  //to check if the fields are not empty

  if(!empty($mail) || !empty($password)){
   $sql="SELECT * FROM users WHERE email='$email'";

   //to check if the email you entered is found in the database

   $result=mysqli_query($connect,$sql);
   //to fetch data from database
   $rows=mysqli_fetch_assoc($result);
   if($rows > 0){
    $storedpassword=$rows['password'];

if($storedpassword==$password){
  header('location:workspace.php');
}
else{
    echo "Invalid email or password ! Please check credentials and Try again!";
}

   }
   else{
    echo "Invali email or password! Please check your credentials and try again";
   }
  }
else{
    echo "All credentials are required";
}

 }
else{
    echo " Sorry ! something went wrong please Try again later";
}
?>