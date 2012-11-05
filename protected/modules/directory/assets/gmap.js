// Map Initialize function
function map_initialize(lat, lng)
{
    // Make an instance of Geocoder
    geocoder = new google.maps.Geocoder();
    // Set static latitude, longitude value
    var latlng = new google.maps.LatLng(lat, lng);
    // Set map options
    var myOptions = {
        zoom: 16,
        center: latlng,
        panControl: true,
        zoomControl: true,
        scaleControl: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    // Create map object with options
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    // Create and set the marker
    marker = new google.maps.Marker({
        map: map,
        draggable:true,
        position: latlng
    });
    // Register Custom "dragend" Event
    google.maps.event.addListener(marker, 'dragend', function() {
        // Get the Current position, where the pointer was dropped
        var point = marker.getPosition();
        // Center the map at given point
        map.panTo(point);
        // Update the textbox
        document.getElementById('Business_latitude').value=point.lat();
        document.getElementById('Business_longitude').value=point.lng();
    });
}
