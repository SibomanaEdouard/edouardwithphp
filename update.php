
<?php

//requiring connections
require("connection.php");

//getting id from url
$id=$_GET['id'];

//to retrieve data from database
$sql1="SELECT * FROM users WHERE id='$id'";
$result1=$connect->query($sql1);
if($result1->num_rows>0){
    $row1=mysqli_fetch_assoc($result1);
$firstname1=$row1['firstname'];
$lastname1=$row1['lastname'];
$email1=$row1['email'];
$password1=$row1['password'];
$gender=$rows['gender'];
}
else{
    echo "Not";
}


if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $password=md5($_POST['password']);
    $gender=$_POST['gender'];
   
   
   if(!empty($email) || !empty($firstname) || !empty($lastname) || !empty($password)){

$sql="UPDATE users SET password='$password',firstname = '$firstname',email='$email', lastname='$lastname',gender='$gender' WHERE id='$id' ";
$result=$connect->query($sql);
if($result){
    header('location:workspace.php');
    echo "fine";
}
else{
    echo "Please check your email and try again ! ";
}

   }
   else{
    echo "Please all credentials are required !";
   }

}
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>PACE </title>
     <style>
         *{
             color:blue;
             text-decoration: none;
          
         }

         h1{
             position: absolute;
             left: 40%;
             top:5%;
             color:blue;
           
         }
         .wordspace{
             position: absolute;
             top:58%;
             left: 40%;
             color:blue;

         }
         a{
             color:aqua;
             font-size:xx-large ;
             text-transform: uppercase;
         }
         a :hover{
          color: blue;

         }

         form{
             position: fixed;
             top: 18%;
         left:40%;

         }
         form label{
             font-size: large;
             text-transform: uppercase;
           
         }
         form input{
             margin-top: 3%;
             padding: 2%;
             width: 120%;
         }
         form button{
             color:black;
             background-color: blue;
             padding: 5%;
             border-radius: 8%;
         }
         #rad{
             position: absolute;
             top:52%;
             right:-82%;
        }
         #rad1{
             position: absolute;
             top:72%;
             right:-82%;  
         }
     </style>
 </head>
 <body>
    <h1>WELCOME IN PACE</h1> 
   
   <form action="" method="post">
     <label for="email">Email</label><br>
     <input type="email" name="email" id="email"  value="<?php echo $email1?>"required><br>
<label for="firstname">Firstname</label><br>
     <input type="text" name="firstname" id="firstname" value="<?php echo $firstname1?>" required><br>
     <label for="lastname">Lastname</label><br>
     <input type="text" name="lastname" id="lastname" value="<?php echo $lastname1?>" required><br>
     <label for="password">Password</label><br>
     <input type="password" name="password" id="password" required>
     <input type="checkbox" name="rad" id="rad"><br>
     <label for="gender">GENDER</label><br>
     <input type="radio" name='gender' id='gender' value="male" required/>MALE<br/>
     <input type="radio" name='gender' id='gender' value="female" required />FEMALE<br/>
     <button type="submit" name="submit">UPDATE</button>
   </form>
    <h1 class="wordspace">Do you have account ? <a href="./workspace.php">BACK TO WORK SPACE</a></h1>
    <script>
    const password=document.getElementById('password');
    const rad=document.getElementById('rad');
    rad.addEventListener('change',function(){
        if(rad.checked){
            password.type='text';
        }
        else{
            password.type='password';
        }

    })
    const password1=document.getElementById('password1');
    const rad1=document.getElementById('rad1');
    rad1.addEventListener('change',function(){
        if(rad1.checked){
            password1.type='text';
        }
        else{
            password1.type='password';
        }

    })
   </script>
 </body>
</html>