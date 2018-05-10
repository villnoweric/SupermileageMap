<?php

require('classes.php');

include('layouts/header.php');

echo "<div class='row'><div class='col-md-6'>";

echo '<iframe src="./data.php" style="height: 96%; width: 100%;" frameborder="0"></iframe>';

echo "</div><div class='col-md-6'>";

include('layouts/map.php');

echo "</div></div>";

include('layouts/footer.php');