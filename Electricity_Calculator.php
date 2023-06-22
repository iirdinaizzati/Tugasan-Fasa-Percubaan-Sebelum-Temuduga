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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $voltage = $_POST["voltage"];
      $current = $_POST["current"];
      $rate = $_POST["rate"];

      // Calculate power in watts
      $power = $voltage * $current;

      // Calculate energy in kilowatt-hours
      $energy = $power * 1 * 1000;

      // Calculate total charge
      $totalCharge = $energy * ($rate / 100);

      echo "<h3>Results:</h3>";
      echo "Power: $power Watts<br>";
      echo "Energy: $energy kWh<br>";
      echo "Total Charge (RM): $totalCharge<br>";
    }
    ?>
  </div>
</body>
</html>
