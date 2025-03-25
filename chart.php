<?php
  include 'database/db_connect.php';
  $query = "SELECT Value FROM data";
  $result = mysqli_query($conn, $query);

  $values = array();
  while ($row = mysqli_fetch_assoc($result)) {
      $values[] = $row['Value'];
  }
  echo json_encode($values);

  $query = "SELECT Name FROM data";
  $result = mysqli_query($conn, $query);

  $name = array();
  while ($row = mysqli_fetch_assoc($result)) {
      $name[] = $row['Name'];
  }
  echo json_encode($name);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="chart.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <canvas id="myChart"></canvas>
      </div>
      
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      
      <script>
        const ctx = document.getElementById('myChart');
        var passedArray = <?php echo '["' . implode('", "', $name) . '"]' ?>;
        var passedArray2 = <?php echo '["' . implode('", "', $values) . '"]' ?>;
        new Chart(ctx, {
          type: 'line',
          data: {
            labels: passedArray,
            datasets: [{
              label: '# of Votes',
              data: passedArray2,
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>
</body>
</html>