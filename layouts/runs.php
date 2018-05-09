<?php

echo "<div class='container-fluid'>";
echo "<h2>Runs</h2>";
echo "<table class='table table-bordered'>";
echo "<thead><tr><th>Car</th><th>Driver</th><th>Avg. Speed</th><th>Distance</th><th>Time</th><th>Status</th><th></th></tr></thead>";

$sql = "SELECT * FROM runs ORDER BY ID DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['vehicle'] . "</td><td>" . $row['driver'] . "</td><td>" . $row['avgSpeed'] . "</td><td>" . number_format($row['distance'],4) . "</td><td>" . gmdate("H:i:s", $row['count']) . "</td><td>" . $row['status'] . "</td><td><a class='btn btn-danger' href='action.php?deleterun=" . $row['ID'] . "'>Delete</a></td></tr>";
    }
} else {
    echo "<tr><td colspan='7'>No Runs</td></tr>";
}

echo "<form class='form-inline' action='action.php' method='post'>";
echo "<tr>
    <td>
        <select name='car' class='form-control'>";
        
        $sql = "SELECT * FROM vehicles";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
            }
        } else {
            echo "<option disabled>No Vehicles</option>";
        }
        
echo "  </select>
    </td>
    <td>
        <select name='driver' class='form-control'>";
        
        $sql = "SELECT * FROM drivers";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
            }
        } else {
            echo "<option disabled>No Drivers</option>";
        }
        
echo "  </select>
    </td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>
        <input class='btn' type='submit' value='Add'>
    </td>
</tr>";
echo "</form>";

echo "</table>";
echo "</div>";