<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Vos données en camembert</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<?php
// Données à afficher dans le graphique
$data = array(
    "Apple" => 10,
    "Banana" => 5,
    "Orange" => 8
);
?>

<canvas id="myChart"></canvas>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode(array_keys($data)); ?>,
            datasets: [{
                data: <?php echo json_encode(array_values($data)); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)'
                ]
            }]
        }
    });
</script>
</body>
</html>
