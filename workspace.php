
    <?php
require('connection.php');
$sql="SELECT * FROM users";
$result=$connect->query($sql);
$users=array();
$rows=mysqli_fetch_assoc($result);




if($result->num_rows>0){
    while($rows=$result->fetch_assoc()){
        $users[]=$rows;
    }

}
session_start();
$id=$user['id'];
$_SESSION['id']=$id;

 ?>
<!DOCTYPE html>
<html>
<head>
    <title>FRIENDS </title>
    <style>

      h1{
        color:blue;
        font-size: 200%;
        
      }  
      table{
        border: 1px;
        width: 90%;
        height: 40vh;
      }
      /* .update{
        color: orange;
        background-color: blue;
        padding: 2%;
        text-decoration: none;
        border-radius: 12px;
        margin-left:23% ;
      }
      .delete{
        color: orange;
        background-color: red;
        padding: 2%;
        text-decoration: none;
        border-radius: 12px;
        margin-left: 10%;
      } */
      a{
        text-decoration: none;
      }
      .csv{
        color: orange;
        background-color: blue;
        padding: 2%;
        text-decoration: none;
        border-radius: 12px;
        margin-left: 23%;
        margin-top: 1%;

      }
      .pdf{
        color: orange;
        background-color: blue;
        padding: 2%;
        text-decoration: none;
        border-radius: 12px;
        margin-left: 14%;
        margin-top: 1%;

      }
    </style>
</head>
<body>
    <h1>FRIENDS AND RELATIVES </h1>
    <table border='1'>
        <tr>
            
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>ACTIONS</th>
            
        </tr>
        <?php foreach ($users as $user): ?>
            
            <tr>
                <td><?php echo $user['firstname']; ?></td>
                <td><?php echo $user['lastname'];?></td>
                <td><?php echo $user['email'];?></td>
                <td><?php echo $user['gender'];?></td>
             
                <td>
                <?php echo "<button class='update'><a href='./update.php?id=".$user['id']."'>UPDATE</a></button>"?>
                  <?php echo "<button class='delete' id='ident' onClick='AddAlert()'><a href='./delete.php?id=".$user['id']."'>DELETE</a></button>"?>
              </td>
               
            </tr>
            
        <?php endforeach; ?>
    </table><br/>

    <button class="csv"><a href="./csvdata.php">CSV</a></button>
    <button class="pdf"><a href="./pdfdata.php">PDF</a></button>
    <Script>
      function AddAlert(){
        alert("Are you sure you want to be deleted permenenly from our system?");
      }
    </Script>
                
</body>
</html>
