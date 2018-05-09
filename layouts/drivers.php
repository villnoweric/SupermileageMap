<?php

echo "<div class='container-fluid'>";
echo "<h2>Drivers</h2>";
echo "<table class='table table-bordered'>";
echo "<thead><tr><th>Name</th><th>Status</th><th></th></tr></thead>";

$sql = "SELECT * FROM drivers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['name'] . "</td><td>" . $row['status'] . "</td><td><a class='btn btn-danger' href='action.php?deletedriver=" . $row['ID'] . "'>Delete</a></td></tr>";
    }
} else {
    echo "<tr><td colspan='3'>No Drivers</td></tr>";
}

echo "</table>";
echo "</div>";