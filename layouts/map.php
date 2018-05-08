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
      center: {lat: 46.41611111, lng: -94.27500000},
      zoom: 15.5
    });
    var marker = new google.maps.Marker({
          position: {lat: 46.41611111, lng: -94.27500000},
          map: map
        });
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1V1IXtf9k-gcheHfdkkPw3jnglMitPq8&callback=initMap"
    async defer></script>