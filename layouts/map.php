<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1V1IXtf9k-gcheHfdkkPw3jnglMitPq8"></script>
<style>
    #map {
        height: 96%;
      }
</style>
<div id="map">
    
</div>
<script>
  var map;
  var markerData = {};
  var markers = {};
  
  <?php

  $sql = "SELECT * FROM vehicles";
  $result = $conn->query($sql);
  $count = 0;
  
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          if($row['status']=="Running"){
            $bool = 'true';
          }else{
            $bool = 'false';
          }
          
          echo "markerData['" . $row['ID'] . "'] = [];\n";
          echo "markerData['" . $row['ID'] . "'][0] = " . $row['currentLat'] . ";\n";
          echo "markerData['" . $row['ID'] . "'][1] = " . $row['currentLong'] . ";\n";
          echo "markerData['" . $row['ID'] . "'][2] = '" . $row['color'] . "';\n";
          echo "markerData['" . $row['ID'] . "'][3] = " . $bool . ";\n";
      }
  }
  
  ?>
  
  
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      //center: {lat: 46.41611111, lng: -94.27500000},
      center: {lat: 44.82900000, lng: -94.08820000},
      zoom: 18.5, //15.5
      disableDefaultUI: true,
      //gestureHandling: 'none',
      mapTypeId: 'satellite'
    });
    
  }
  initMap();
  
  $.each(markerData, function(key, val){
    markers[key] = new google.maps.Marker({
      position: {lat: val[0], lng: val[1]},
      map: map,
      visible: val[3],
      icon: 'http://maps.google.com/mapfiles/ms/icons/' + val[2] + '-dot.png'
    })
  });
  
  
  function fetchdata(){
  
  $.getJSON('./api/mapData.php', function( data ){
    $.each( data, function(key, val){
      markerData[key][0] = val['lat'];
      markerData[key][1] = val['long'];
      markerData[key][3] = val['vis'];
      //initMap();
    })
  });
  
  $.each(markerData, function(key, val){
      markers[key].setPosition({lat: val[0], lng: val[1]});
      markers[key].setVisible(val[3]);
  });
    
  }
  
  $(document).ready(function(){
   setInterval(fetchdata,1000);
  });
  
</script>