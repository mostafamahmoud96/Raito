function initMap() {

    var latitude = parseFloat(document.getElementById("latitude_span_show").value) || 31.2001;
    var longitude = parseFloat(document.getElementById("longitude_span_show").value) || 29.9187;
    var myLatLng = { lat: latitude, lng: longitude };



    var map = new google.maps.Map(document.getElementById('map_show'), {

        center: myLatLng,

        zoom: 13

    });



    var marker = new google.maps.Marker({

        position: myLatLng,

        map: map,


        draggable: false

    });





}