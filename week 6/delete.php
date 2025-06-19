<?php
require('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $id = $_GET['id'];
  $id = intval($id);
  $query = "SELECT * FROM schools WHERE id = $id";
  $result = mysqli_query($connect, $query);
  $school = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];
  $id = intval($id);

  $query = "DELETE FROM schools WHERE id = $id";
  $result = mysqli_query($connect, $query);

  if ($result) {
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
  <title>Delete School</title>
</head>
<body>
  <h1>Delete School</h1>

  <?php if (isset($school)): ?>
    <p>Are you sure you want to delete <strong><?php echo $school['School Name']; ?></strong>?</p>
    <form action="delete.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $school['id']; ?>">
      <input type="submit" name="delete" value="Delete">
    </form>
  <?php else: ?>
    <p>School not found or invalid ID.</p>
  <?php endif; ?>
</body>
</html>
