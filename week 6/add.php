<?php
include ('functions.php');
secure();
?>


<?php
if(isset($_POST['AddSchool'])){
    //print_r($_POST);
    //Array ( [BoardName] => sam school [SchoolName] => sam public school [Email] => sasa@gmail.com [AddSchool] => submit )
    $BoardName = $_POST['BoardName'];
    $SchoolName = $_POST['SchoolName'];
    $Email = $_POST['Email'];

    require('connect.php');
    $query = "INSERT INTO schools (`Board name` , `School name` , `Email` )
    VALUES ('$BoardName', '$SchoolName', '$Email')";

    $school = mysqli_query($connect, $query);

   // print_r($school);

   if($school){
    header("Location: index.php");
    exit;
   }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add School</title>
</head>
<body>
  <h1>Add a new School</h1>
  <form action="add.php" method="POST">
    <input type="text" name="BoardName" placeholder="Board name">
    <input type="text" name="SchoolName" placeholder="School name">
    <input type="text" name="Email" placeholder="Email">
    <input type="submit" value="submit" name="AddSchool">
  </form>
</body>
</html>