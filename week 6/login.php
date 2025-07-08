<?php
include('connect.php');

if(isset($_POST['login'])){
    $query = 'SELECT * FROM users
    WHERE email = "'. $_POST['email'].'" . 
    AND
    password = "'. $_POST['password'].'"';
    $result = mysqli_query($connect, $query);

if(mysqli_num_rows($result)){
    $record = mysqli_fetch_assoc($result);
    $_SESSION['id'] = $record['id'];
    $_SESSION['name'] = $record['name'];

    header('location: index.php');

    die();
}else{
    header('location: index.php');
    die();
    
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <form action="login.php" method="POST">
        <input type="text" name="email">
        <input type="password" name="password">
        <input type="submit" value="Login">
    </form> 
</body>
</html>