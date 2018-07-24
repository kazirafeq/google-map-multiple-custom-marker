<!DOCTYPE html>
<html>
<head>
	<title>Map With Custom Marker</title>
</head>
<body>
	<script>
function initMap() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };

    var iconBase = 'http://localhost/html/custom-marker-map/images/'; // Please add the absolute path  of the image folder
               
    // Display a map on the web page
    // map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);

    map = new google.maps.Map(document.getElementById("mapCanvas"));
    map.setTilt(50);
        
    // Multiple markers location, latitude, and longitude
    var markers = [
        ['Derstler', 39.243599, -94.236754],            	//add the each place location, latitude and longitude
        ['Weaver Overhead', 39.7592165,-94.8912243],
        ['Cameron', 39.7417148,-94.2676745],
        ['Odessa', 39.002288, -93.793868],
        ['North', 39.179756, -94.511412],
        ['Oak Grove', 39.015627, -94.110411],
        ['Oak test', 39.0915837,-94.8559112],
        ['North Kansas', 39.1393676,-94.5765616],
        ['Merriam' , 38.9932222,-94.7058554],
        ['Kansas City, MO 64145' , 38.917394, -94.519652],
        ['Harrisonville' , 38.67336, -94.3350727],
        ['Clinton' , 38.3723707, -93.8020575],
        ['Mound City, KS 66056' , 38.260469, -94.9393207],
        ['Silver Lake, KS 66539' , 39.0129707, -95.8481168],
        ['Clintonss' , 38.9734676, -95.3209673],
    ];
                        
    // Info window content
    var infoWindowContent = [
        ['<div class="info_content">' +
        '<p>Derstler Lumber Co., Inc.<br>900 Walton Way<br>Richmond, MO 64085</p>' + '</div>'],
        ['<div class="info_content">' +        
        '<p>Weaver Overhead Door<br>2324 Locust St.<br>St. Joseph, MO 64501</p>' +
        '</div>'],
        ['<div class="info_content">' +        
        '<p>Cameron Door<br>207 E 8th<br>Cameron, MO 64429</p>' +
        '</div>'],
        ['<div class="info_content">' +        
        '<p>Advantage Overhead Door of Odessa, LLC<br>226 W Mason - PO Box 433<br>Odessa, MO 64076</p>' +
        '</div>'],
        ['<div class="info_content">' +
        '<p>Renner Supply Company<br>3530 N Kimball Dr<br>Kansas City, MO 64161</p>' +
        '</div>'],
        ['<div class="info_content">' +
        '<p>Don`s Door Repair<br>816 SE 16th St.<br>Oak Grove, MO 64075</p>' +
        '</div>'],
        ['<div class="info_content">' +
        '<p>Anytime Garage Doors<br>Kansas City, MO 64151</p>' +
        '</div>'],
        ['<div class="info_content">' +
        '<p>Doors Inc. - DBA: Windsor Overhead Door<br>1229 Iron St.<br>North Kansas City, MO 64116</p>' +
        '</div>'],
        ['<div class="info_content">' +
        '<a href="#dealer-1">Scroll to list</a>' +
        '<p>Miller Overhead Door Co.<br>9203 W 58th Terr.<br>Merriam, KS 66203</p>' +
        '</div>'],
        ['<div class="info_content">' +
        '<p>Radio Controlled Garage Door & Gate<br>13615 Wyandotte<br>Kansas City, MO 64145</p>' +
        '</div>'],
        ['<div class="info_content">' +
        '<p>Cass County Overhead Door<br>PO Box 162<br>Harrisonville, MO 64701</p>' +
        '</div>'],
        ['<div class="info_content">' +
        '<p>W & S Door Co.<br>312 S. Washington<br>Clinton, MO 64735</p>' +
        '</div>'],
        ['<div class="info_content">' +
        '<p>Avery Lumber, Inc.<br>411 Main St.<br>Mound City, KS 66056</p>' +
        '</div>'],
        ['<div class="info_content">' +
        '<p>Mark`s Overhead Door Service<br>7321 NW 39th<br>Silver Lake, KS 66539</p>' +
        '</div>'],
        ['<div class="info_content">' +
        '<p>A&A Lock and Key Overhead Door<br>2064 N. 900 Rd.<br>Eudora, KS 66025</p>' +
        '</div>'],

    ];
        
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Place each marker on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2], markers[i][3]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            icon: iconBase + 'map-icon.png', // in here add your icon image, mine is map-icon.png
            title: markers[i][0]
        });
        
        // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            } 
        })(marker, i));

        // Center the map to fit all markers on the screen
        map.fitBounds(bounds);
    }

    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(8);
        google.maps.event.removeListener(boundsListener);
    });
    
}
// Load initialize function
google.maps.event.addDomListener(window, 'load', initMap);
</script>


<div id="mapCanvas" style="width: 100%;height: 100vh;"></div>




<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
         
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhc7jY_vZe46HQSF2vYfJtuRr9uhZ9Z7o&callback=initMap"
  type="text/javascript"></script>

<!-- Replace the API key with your API Key , Mine is AIzaSyAhc7jY_vZe46HQSF2vYfJtuRr9uhZ9Z7o -->

</body>
</html>