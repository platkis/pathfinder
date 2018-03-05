//function execute when submit is clicked
function setLocation(){
    //assigns the lat and the long values of the item by getting the values from the element matching this id
    var lat = document.getElementById('lat');
    var long = document.getElementById('long');

    //set the geolocation to the lat and long retreived from the user
    navigator.geolocation.setLocation(lat,long);
}




