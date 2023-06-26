<!DOCTYPE html>
<html>
<head>
  <title>Electricity Calculator</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Electricity Calculator</h1>
    <form method="post">
      <div class="form-group">
        <label for="voltage">Voltage (V):</label>
        <input type="number" class="form-control" id="voltage" name="voltage" step=".01" required>
      </div>
      <div class="form-group">
        <label for="current">Current (A):</label>
        <input type="number" class="form-control" id="current" name="current" step=".01" required>
      </div>
      <div class="form-group">
        <label for="rate">Current Rate:</label>
        <input type="number" class="form-control" id="rate" name="rate" step=".01" required>
      </div>
      <button type="submit" class="btn btn-primary">Calculate</button>
    </form>
    <hr>

    <?php
    function calculateElectricityRates($voltage, $current, $rate, $hour) {
      // Calculate power in watts
      $power = $voltage * $current;

      // Calculate energy per hour in kilowatt-hours
      $energyPerHour = $power * $hour / 1000;

      // Calculate total charge per hour
      $totalChargePerHour = $energyPerHour * ($rate / 100);

      return array(
        'power' => $power,
        'energyPerHour' => $energyPerHour,
        'totalChargePerHour' => $totalChargePerHour
      );
    }



    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $voltage = $_POST["voltage"];
      $current = $_POST["current"];
      $rate = $_POST["rate"];
    }


    echo "<h3>Results:</h3>";
    echo "Power: " . ($voltage * $current) . " Watts (" . ($voltage * $current) / 1000 . " kW)<br>";
    echo "Rate: " . ($rate / 100) . " RM<br>";

    echo "<br>";

    echo "<h3>Hourly Calculation:</h3>";
    echo "<table class='table'>";
    echo "<thead><tr><th>Hour</th><th>Energy per Hour (kWh)</th><th>Total Charge per Hour (RM)</th></tr></thead>";
    echo "<tbody>";
    for ($hour = 1; $hour <= 24; $hour++) {
      $results = calculateElectricityRates($voltage, $current, $rate, $hour);
      $energyPerHour = $results['energyPerHour'];
      $totalChargePerHour = $results['totalChargePerHour'];
      echo "<tr><td>$hour</td><td>$energyPerHour</td><td>$totalChargePerHour</td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
    ?>

  </div>
</body>
</html>
