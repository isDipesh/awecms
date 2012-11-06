function map_initialize(lat, lng)
{
    var latlng = new google.maps.LatLng(lat, lng);
    var myOptions = {
        zoom: 10,
        center: latlng,
        panControl: true,
        zoomControl: true,
        scaleControl: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    marker = new google.maps.Marker({
        map: map,
        draggable:true,
        position: latlng,
        title: 'Drag me'
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
