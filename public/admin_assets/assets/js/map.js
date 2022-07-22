function initMap() {

    var latitude = parseFloat(document.getElementById("latitude_span").value) || 31.2001;
    var longitude = parseFloat(document.getElementById("longitude_span").value) || 29.9187;
    var myLatLng = { lat: latitude, lng: longitude };



    var map = new google.maps.Map(document.getElementById('map'), {

        center: myLatLng,

        zoom: 13

    });



    var marker = new google.maps.Marker({

        position: myLatLng,

        map: map,


        draggable: true

    });



    google.maps.event.addListener(marker, 'dragend', function(marker) {

        var latLng = marker.latLng;
        latitudeField = document.getElementById("latitude_span");
        longitudeField = document.getElementById("longitude_span");
        latitudeField.value = latLng.lat();
        longitudeField.value = latLng.lng();

    });

}