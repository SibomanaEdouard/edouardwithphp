<?php

include ("connection.php");
//To check if the form was submitted;
if(isset($_POST['submit'])){
 $firstname=$_POST['first'];
 $lastname=$_POST['last'];   
 $email=$_POST['email'];
 $gender=$_POST['gender'];
 //to encripty password
 $password=md5($_POST['password']);
 //to check if the form is not empty
 if(!empty($firstname) || !empty($lastname) || !empty($email) || !empty($gender) || !empty($password)){
$sql="INSERT INTO users(firstname,lastname,email,password,gender)VALUES('$firstname','$lastname','$email','$password','$gender')";
$query=$connect->query($sql);

//to check if the user was created
if($query){
    //to send user to login in form
  header('location:login.html');

}
//Means if the email entered by user is already in database
else{  
 echo "The email you entered is already taken!";
}

 }
else{
    echo "All credentials  are required";
}

}
else{
    echo "Not submitted";
}
?>