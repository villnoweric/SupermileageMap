<?php

echo "<div class='container-fluid'>";
echo "<h2>Runs</h2>";
echo "<table class='table table-bordered'>";
echo "<thead><tr><th>Car</th><th>Driver</th><th>Durration</th><th>Avg Speed</th><th>Status</th><th></th></tr></thead>";

$count = count($runs);

foreach (array_reverse($runs) as $key => $run){
    echo "<tr><td>" . $run->car . "</td><td>" . $run->driver . "</td><td>" . $run->getDurration() . "</td><td></td><td>" . $run->status . "</td><td><a class='btn btn-danger' href='action.php?deleterun=" . (($count - 1) - $key) . "'>Delete</a></td></tr>";
}

echo "<form class='form-inline' action='action.php' method='post'>";
echo "<tr>
    <td>
        <select name='car' class='form-control'>";
        
        foreach ($cars as $key=> $car){
            echo "<option vlaue='" . $car->name . "'>" . $car->name . "</option>";
        }
        
echo "  </select>
    </td>
    <td>
        <select name='driver' class='form-control'>";
        
        foreach ($drivers as $key=> $driver){
            echo "<option vlaue='" . $driver->name . "'>" . $driver->name . "</option>";
        }
        
echo "  </select>
    </td>
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