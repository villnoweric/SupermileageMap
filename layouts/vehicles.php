<?php

echo "<div class='container-fluid'>";
echo "<h2>Vehicles</h2>";
echo "<table class='table table-bordered'>";
echo "<thead><tr><th>Color</th><th>Name</th><th>Position</th><th>Fuel Class</th><th>Status</th><th></th></tr></thead>";

$sql = "SELECT * FROM vehicles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td bgcolor='" . $row['color'] . "'></td><td>" . $row['name'] . "</td><td>" . $row['currentLat'] . ", " . $row['currentLong'] .  "</td><td>" . $row['fuelType'] . "</td><td>" . $row['status'] . "</td><td><a class='btn btn-danger' href='action.php?delete=" . $row['ID'] . "'>Delete</a></td></tr>";
    }
} else {
    echo "<tr><td colspan='6'>No Vehicles</td></tr>";
}

echo "<form class='form-inline' action='action.php' method='post'>";
echo "<tr>
    <td>
        <input class='form-control' name='color' type='text'>
    </td>
    <td>
        <input class='form-control' name='name' type='text'>
    </td>
    <td></td>
    <td>
        <select name='fuelClass' class='form-control'>
            <option value='Stock'>Stock</option>
            <option value='Modified'>Modified</option>
            <option value='E-85'>E-85</option>
            <option value='Electric'>Electric</option>
        </select>
    </td>
    <td></td>
    <td>
        <input class='btn' type='submit' value='Add'>
    </td>
</tr>";
echo "</form>";
echo "</table>";
echo "</div>";