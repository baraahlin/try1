<?php 



//initilize variables 
$power = 0;
$results = [];
//calculate 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //get the data from the form
    $voltage = $_POST['voltage'];
    $current = $_POST['current'];
    $rate = $_POST['rate'];

    //calculate the power
    $power = $voltage * $current;

    //calculate the energy and total
    for ($hour = 1; $hour <= 10; $hour++) {
        $energy = ($power * $hour) /1000;
        $total = $energy * ($rate / 100);
        $results[] = [
            'id' => $hour,
            'hour' => $hour,
            'energy' => $energy,
            'total' => $total
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Energy Calculator: Results</title>
    <meta name="author" content="Baraah Ali">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
        }
    </style>
</head>
<
    <div class="container mt-5">
        <h1 class="text-center">Electricity Calculator</h1>
        <form method="POST" action="calculator.php">
            <div class="form-group">
                <label for="voltage">Voltage:</label>
                <input type="number" id="voltage" name="voltage" class="form-control" step="0.01" required>
                <p>Voltage (V)</p>
            </div>
            <div class="form-group">
                <label for="current">Current:</label>
                <input type="number" id="current" name="current" step="0.01" class="form-control" required>
                <p>Current (A)</p>
            </div>
            <div class="form-group">
                <label for="rate">Current Rate:</label>
                <input type="number" id="rate" name="rate" step="0.01" class="form-control" required>
                <p>sen/kWh</p>
            </div>
            <div class="col text-center">
            <button type="submit" class="btn btn-primary btn-default" id="display_target">Calculate</button>
            </div>
        </form>
    </div>
    <div id="display" class="container mt-5">
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <div class="card mt-5" id="display">
            <div class="card-body">
                <h5 class="card-title" style="color:blue">POWER: <?php echo number_format($power/1000, 5); ?> kWh</h5>
                <h5 class="card-title" style="color:blue">RATE: <?php echo number_format($rate / 100,3); ?> RM</h5>
            </div>
        </div>
        <?php endif; ?>
        </div>
        <div class="container mt-5 mb-2">
        <table class="table table-bordered table-hover display">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Hour</th>
                    <th>Energy (kWh)</th>
                    <th>Total (RM)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $result): ?>
                <tr>
                    <td><strong><?php echo $result['id']; ?></strong></td>
                    <td><?php echo $result['hour']; ?></td>
                    <td><?php echo number_format($result['energy'], 5); ?></td>
                    <td><?php echo number_format($result['total'], 2); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<script>
    const targetDiv = document.getElementById("display");
    const btn = document.getElementById("display_target");
    btn.onclick = function () {
    if (targetDiv.style.display !== "none") {
        targetDiv.style.display = "none";
    } else {
        targetDiv.style.display = "block";
    }
    };
</script>
