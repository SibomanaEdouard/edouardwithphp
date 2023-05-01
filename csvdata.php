<?php
include("connection.php");

$sql="SELECT * FROM users";


//to retrieve from database';
$result=$connect->query($sql);
if($result){


    $filename = "data.csv";
$fp = fopen('php://output', 'w');

// Step 4: Populate the CSV file
while ($data = mysqli_fetch_assoc($result)) {
    fputcsv($fp, $data);
    echo "The file is exported successfully";
    
}

// Step 5: Output the CSV file
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="'.$filename.'"');
readfile($filename);

    
}
else{
    echo "something went wrong! Please try again latter";
}


;
?>