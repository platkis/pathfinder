function getLocation() {
    //get current position using geolocation api
    navigator.geolocation.getCurrentPosition(sendPosition);
    return true;
}

function sendPosition(position) {
    $("form input[name='latitude']").val(position.coords.latitude);
    $("form input[name='longitude']").val(position.coords.longitude);
}

$("#cb_location").change( function(){
    getLocation();
    console.log("test");
});