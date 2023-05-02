<?php
include('connection.php');
//getting id from the url

$id=$_GET['id'];

$sql="DELETE FROM users WHERE id='$id'";
$result=$connect->query($sql);
if($result){
   header("location:form.html");
}
else{
  echo "Something went wrong please try again!";
}
?>