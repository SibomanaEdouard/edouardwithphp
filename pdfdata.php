
<?php
include("connection.php");
$sql="SELECT * FROM users";
$result=$connect->query($sql);
$data=mysqli_fetch_all($result,MYSQLI_ASSOC);
?>

<table id="users" border="1">
    <thead>
        <tr>
            <th>FIRSTNAME</th>
            <th>LASTNAME</th>
            <th>EMAIL</th>
            <th>GENDER</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $rows): ?>
            <tr>
                <td><?php echo $rows['firstname']?></td>
                <td><?php echo $rows['lastname']?></td>
                <td><?php echo $rows['email']?></td>
                <td><?php echo $rows['gender']?></td>
               
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
 <script>
    const doc = new jsPDF();
    const table = document.getElementById('users');
    html2canvas(table).then(function(canvas){
        console.log(canvas)
        var imageData = canvas.toDataURL('image/png');
        doc.addImage(imageData, 'PNG', 10, 10);
        doc.save('users.pdf');
    });
</script> 

