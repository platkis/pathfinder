//get location function
function getLocation() {
    //get location
    navigator.geolocation.getCurrentPosition();

    //display message in locationMsg div
    var message = document.getElementById("locationMsg");
    locationMsg.innerHTML = "Location being tracked!";
}