
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>My Google Map</title>
  <style type="text/css">
	.container {
		height: 450px;
	}
	#map {
    width: 100%;
		height: 100%;
		border: 1px solid blue;
	}
  </style>
</head>
<body>
<div class="container">
  <center><h1>Using MySQL and PHP with Google Maps Javascript API</h1></center>
  <div id="map"></div>
<script>

    function loadMap(){
      
      //function initMap()
      // Map options needed to create the map
      var mapOptions = {
        zoom : 12,
        center : {lat : 45.404171,lng : -71.892914}
      }

      // Create the map 
      var map = new google.maps.Map(document.getElementById('map'), mapOptions); 
      var infoWindow = new google.maps.InfoWindow();

      // function loadJsonDoc()
      var ajax = new XMLHttpRequest();
      ajax.open("GET", "data.php", true);
      ajax.send();

      ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            console.log(data) //for debugging
          
          //function addMarker(data)
          for(var a = 0; a < data.length; a++) {
            shop = data[a]
            latlng = new google.maps.LatLng(shop.latitude, shop.longitude);

            var marker = new google.maps.Marker({
              position: latlng,
              map: map,
              title: shop.shopName
            });

            bindInfoWindow(marker, map, infoWindow, shop.noTel, shop.shopName);

          }
        }
      }
      function bindInfoWindow(marker, map, infoWindow, noTel, shopName) {
        marker.addListener('click', function() {
            infoWindow.setContent('<b>' + 'Shop name: ' + '</b>' + shopName + '<br />' + '<b>' + 'No. telephone: ' + '</b>' + noTel);
            infoWindow.open(map, this);
        });
      }
    }
</script> 
</div>
</body>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDb0liwO0xdibcQc8ymK3u74veYwhDAp-Y&callback=loadMap" async defer></script>

</html>


