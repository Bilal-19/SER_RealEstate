function showMap(lat, long) {
    var coordinate = {
        lat: lat,
        lng: long
    }

    new google.maps.Maps(
        document.getElementById("map"),
        {
            zoom: 10,
            center: coordinate
        }
    )
    document.getElementById("map").innerHTML = "Hello"
}

showMap(0,0)
