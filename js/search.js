//get location function
function getLocation() {
    navigator.geolocation.getCurrentPosition(showPosition);
}

function drawMap() {

    var locations = [
        ['Rail Trail', 43.235375, -79.827632, "../html/railtrail.html"],
        ['Bruce Trail', 43.23425, -80,"../html/brucetrail.html"]
    ];   

    //initialize map with zoom and center options
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 8,
        center: new google.maps.LatLng(43, -79)
    });
    
    //draw the markers and the infowindows
    drawMarkers(map,locations);
}

function drawMarkers(map,locations){
    var marker, i;
    //loop through all the locations
    for (i = 0; i < locations.length; i++){
        //set the location name, lat, long, and page link
        var name = locations[i][0];
        var lat = locations[i][1];
        var long = locations[i][2];
        var link = locations[i][3]; 

        //draw the marker using the lat and long
        var marker = new google.maps.Marker({  
            map: map, title: name , position: new google.maps.LatLng(lat, long)
        });

        //content of the infowindow
        var markerInfo = "<font color='black'><b>" + name + "</b> Location: " + lat + ", " + long + "<a href= " + link + ">Click for Details</a></font>";
        
        //initialize info windows
        var infowindow = new google.maps.InfoWindow();

        //add a click listener to the markers to display infowindow
        google.maps.event.addListener(marker,'click', (function(marker,markerInfo,infowindow){ 
            return function() {
                //set the infowindow content to the one specified above
                infowindow.setContent(markerInfo);
                //open the infowindow when clicked
                infowindow.open(map,marker);
            };
        })(marker,markerInfo,infowindow));
    }
}
