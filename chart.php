<?php
  $data = array(12, 19, -3, 5, 2, 3, 10);
  $labels = array('Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange','Purple');
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
        var passedArray = <?php echo '["' . implode('", "', $labels) . '"]' ?>;
        var passedArray2 = <?php echo '["' . implode('", "', $data) . '"]' ?>;
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