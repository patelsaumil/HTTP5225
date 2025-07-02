<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daily Health Journal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="container">

  <h1 class="display-4 mt-5 mb-5">Daily Health Journal Entries</h1>

  <?php 
    require('connect.php');
    $query = 'SELECT * FROM health_log ORDER BY log_date DESC';
    $logs = mysqli_query($connect, $query);
  ?>

  <?php foreach($logs as $log): ?>
    <div class="card mb-4">
      <div class="card-body">
        <h5 class="card-title">Date: <?= $log['log_date'] ?></h5>
        <p class="card-text">
          <strong>Sleep:</strong> <?= $log['sleep_hours'] ?> hrs<br>
          <strong>Water:</strong> <?= $log['water_intake_liters'] ?> L<br>
          <strong>Exercise:</strong> <?= $log['exercise_type'] ?><br>
          <strong>Mood:</strong> <?= $log['mood'] ?><br>
          <strong>Notes:</strong> <?= $log['notes'] ?>
        </p>

        <?php if ($log['sleep_hours'] >= 7 && $log['water_intake_liters'] >= 2): ?>
          <p class="text-success fw-bold"> Healthy Day</p>
        <?php else: ?>
          <p class="text-danger fw-bold"> Needs Improvement</p>
        <?php endif; ?>

        
      </div>
    </div>
  <?php endforeach; ?>

</body>
</html>
