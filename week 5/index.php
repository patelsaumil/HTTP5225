<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
          $connect = mysqli_connect(
        'localhost',
        'root',
        '',
        'csv_db 10');

        if(!$connect){
            die("connection failed:" . mysqli_connect_error());
        }
    ?>
</body>
</html>