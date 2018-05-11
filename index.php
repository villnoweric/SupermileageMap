<?php

require('classes.php');

include('layouts/header.php');

include('layouts/nav.php');

if($_GET['page']==""){

echo "<div style='float:left; width:50%;'>";

echo '<iframe src="./data.php" style="height: Calc(100% - 51px); width: 100%;" frameborder="0"></iframe>';

echo "</div><div style='float:right; width:50%;'>";

include('layouts/map.php');

echo "</div>";

}elseif($_GET['page']=="map"){
    include('layouts/map.php');
}elseif($_GET['page']=="data"){
    echo '<iframe src="./data.php" style="height: Calc(100% - 51px); width: 100%;" frameborder="0"></iframe>';
}

include('layouts/footer.php');