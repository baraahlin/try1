<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Electricity Calculator - Results</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Electricity Calculator - Results</h1>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $voltage = $_POST['voltage'];
            $current = $_POST['current'];
            $rate = $_POST['rate'];

            $power = $voltage * $current; // Power in Watts
            $energy_per_hour = $power / 1000; // Energy in kWh
            $energy_per_day = $energy_per_hour * 24; // Energy in kWh per day
            $total_per_hour = $energy_per_hour * ($rate / 100); // Total charge per hour
            $total_per_day = $total_per_hour * 24; // Total charge per day

            echo "<div class='mt-4'>";
            echo "<h3>Results:</h3>";
            echo "<p><strong>Power (W):</strong> {$power}</p>";
            echo "<p><strong>Energy per Hour (kWh):</strong> {$energy_per_hour}</p>";
            echo "<p><strong>Energy per Day (kWh):</strong> {$energy_per_day}</p>";
            echo "<p><strong>Total Charge per Hour ($):</strong> {$total_per_hour}</p>";
            echo "<p><strong>Total Charge per Day ($):</strong> {$total_per_day}</p>";
            echo "</div>";
        }
        ?>

        <a href="index.html" class="btn btn-primary mt-3">Back</a>
    </div>
</body>
</html>
