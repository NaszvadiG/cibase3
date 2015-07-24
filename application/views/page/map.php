<style>
#map-canvas {
        height: 400px;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <script>
var map;
function initialize() {
  var mapOptions = {
    zoom: 8,
    center: new google.maps.LatLng(52.09046148643704, -1.946770000000015)
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

 var marker = new google.maps.Marker({
      position: mapOptions.center,
      map: map,
      title: 'Pl HomeImprove'
  });

  var contentString =      
     
          '<p><b>PL HomeImprove</b>' ;

  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });
    var populationOptions = {
      strokeColor: '#2d4052',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#2980b9',
      fillOpacity: 0.35,
      map: map,
      center: mapOptions.center,
      radius:  40233.6
    };
    // Add the circle for this city to the map.
    cityCircle = new google.maps.Circle(populationOptions);

 google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
infowindow.open(map,marker);
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
 
    <div id="map-canvas"></div>

