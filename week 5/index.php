<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php
$connect = mysqli_connect('localhost', 'root', '', 'csv_db 10');

$query = "SELECT * FROM colors";
$colors = mysqli_query($connect, $query);


foreach ($colors as $color) {
    echo '<div style="background:' . $color['Hex'] . '">';
    echo '<h1>' . $color['Name'] . '</h1>';
    echo '</div>';
}
?>

</body>
</html>