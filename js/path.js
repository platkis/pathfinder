function drawMap() {
    //set coordinates, hardcoded for now
    var latitude = 43.235375;
    var longitude = -79.827632;

    //initialize map with zoom and center options
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        center: {lat: latitude , lng: longitude}
    });

    //draw marker in map at position, lat and lng
    var marker = new google.maps.Marker({
        map: map,
        position: {lat: latitude , lng: longitude}
    });
}