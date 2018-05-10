<?php

require('classes.php');

include('layouts/header.php');

echo "<div class='row'><div class='col-md-12'>";

include('layouts/vehicles.php');

include('layouts/drivers.php');

include('layouts/runs.php');

echo "</div></div>";

include('layouts/footer.php');