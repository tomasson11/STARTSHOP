<?php
include("../php/bd.php"); 
$con=conectar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<div style="width: 80%"> 
    <canvas id="canvas" height="600" width="600"></canvas>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        
    const ctx = document.getElementById('canvas').getContext('2d');
    const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
          <?php
          $sqli = "SELECT * FROM articulo";
          $result = mysqli_query($con,$sqli);
          while ($registros = mysqli_fetch_array($result)){
          ?>
            '<?php echo $registros["nombre"]?>',
          <?php
          }
          ?>  
        ],
        datasets: [{
            label: '# of Votes',
            data: [
              34, 56, 19, 11, 56,        
          ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
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