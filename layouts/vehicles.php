<?php

echo "<div class='container-fluid'>";
echo "<h2>Vehicles</h2>";
echo "<table class='table table-bordered'>";
echo "<thead><tr><th>Name</th><th>Position</th><th>Fuel Class</th><th>Status</th><th></th></tr></thead>";

foreach ($cars as $key => $car){
    echo "<tr><td>" . $car->getName() . "</td><td>" . $car->getCurrentPosition() .  "</td><td>" . $car->getFuelClass() . "</td><td>" . $car->status . "</td><td><a class='btn btn-danger' href='action.php?delete=" . $key . "'>Delete</a></td></tr>";
}

echo "<form class='form-inline' action='action.php' method='post'>";
echo "<tr>
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