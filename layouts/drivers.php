<?php

echo "<div class='container-fluid'>";
echo "<h2>Drivers</h2>";
echo "<table class='table table-bordered'>";
echo "<thead><tr><th>Name</th><th>Device ID</th><th>Status</th><th></th></tr></thead>";

foreach ($drivers as $key => $driver){
    echo "<tr><td>" . $driver->name . "</td><td>" . $driver->deviceID . "</td><td>Test</td><td></td></tr>";
}

echo "</table>";
echo "</div>";