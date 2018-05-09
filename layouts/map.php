<style>
    #map {
        height: 96%;
      }
</style>
<div id="map">
    
</div>
<script>
  var map;
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      //center: {lat: 46.41611111, lng: -94.27500000},
      center: {lat: 44.82900000, lng: -94.08820000},
      zoom: 20 //15.5
    });
<?php

$sql = "SELECT * FROM vehicles WHERE status='Running'";
$result = $conn->query($sql);
$count = 1;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "var marker" . $count . " = new google.maps.Marker({";
        echo "position: {lat: " . $row['currentLat'] . ", lng: " . $row['currentLong'] . "},";
        echo "map: map,";
        echo "icon: 'http://maps.google.com/mapfiles/ms/icons/" . $row['color'] . "-dot.png'";
        echo "});";
    }
}

?>
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1V1IXtf9k-gcheHfdkkPw3jnglMitPq8&callback=initMap"
    async defer></script>