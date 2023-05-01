<?php
// Set headers to indicate that we are outputting a PDF
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="my_document.pdf"');

// Connect to database
include("connection.php");
// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from database
$sql = "SELECT * FROM users";
$result = mysqli_query($connnect, $sql);

// Create new PDF document
$pdf = pdf_new();
pdf_open_file($pdf);

// Add new page
pdf_begin_page($pdf, 595, 842);
$font = pdf_findfont($pdf, 'Helvetica-Bold', 'host', 0);
pdf_setfont($pdf, $font, 18);

// Loop through data and add to PDF
$y = 750;
while ($row = mysqli_fetch_assoc($result)) {
    pdf_show_xy($pdf, $row['name'], 50, $y);
    pdf_show_xy($pdf, $row['email'], 200, $y);
    $y -= 20;
}

pdf_end_page($pdf);

// Close PDF document and output to browser
pdf_close($pdf);
echo pdf_get_buffer($pdf);

// Close database connection
mysqli_close($connect);


// 





?>
