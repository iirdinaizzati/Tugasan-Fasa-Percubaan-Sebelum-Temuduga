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
    function calculateElectricityRates($voltage, $current, $rate) {
      // Calculate power in watts
      $power = $voltage * $current;

      // Calculate energy in kilowatt-hours per hour
      $energyPerHour = $power * 1 / 1000;

      // Calculate energy in kilowatt-hours per day (24 hours)
      $energyPerDay = $energyPerHour * 24;

      // Calculate total charge per day
      $totalChargePerDay = $energyPerDay * ($rate / 100);

      return array(
        'power' => $power,
        'energyPerHour' => $energyPerHour,
        'energyPerDay' => $energyPerDay,
        'totalChargePerDay' => $totalChargePerDay
      );
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $voltage = $_POST["voltage"];
      $current = $_POST["current"];
      $rate = $_POST["rate"];

      $results = calculateElectricityRates($voltage, $current, $rate);

      echo "<h3>Results:</h3>";
      echo "Power: " . $results['power'] . " Watts<br>";
      echo "Energy per Hour: " . $results['energyPerHour'] . " kWh<br>";
      echo "Energy per Day: " . $results['energyPerDay'] . " kWh<br>";
      echo "Total Charge per Day (RM): " . $results['totalChargePerDay'] . "<br>";
    }
    ?>
  </div>
</body>
</html>
