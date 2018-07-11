var map;

jQuery(function ($) {
    var dataTable;

    $(document).ready(function () {
        $("html").css({ "width": "100%", "height": "100%" });
        $("body").css({ "width": "100%", "height": "100%" });

        if (farm_profiles) {
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 6,
                center: {
                    "lat": 43.642567,
                    "lng": -79.387054
                }
            });

            var markers = [];
            $.each(farm_profiles, function () {
                var link = this["profile_link"];
                var infowindow = new google.maps.InfoWindow({
                    content: '<div>' +
                        '<h4>' + this["farm_name"] + '</h4>' +
                        '<div id="bodyContent">' +
                        '<p>' + this["address"] + 
                        '<br>' + this["city"] + " " + this["postal_code"] + '</p>' +
                        '</div>' +
                        '</div>'
                });

                var marker = new google.maps.Marker({
                    position: {
                        "lat": parseFloat(this["latitude"]),
                        "lng": parseFloat(this["longitude"])
                    },
                    map: map,
                    title: this["market_location_name"]
                });

                marker.addListener('click', function () {
                    window.location = link;
                });

                marker.addListener('mouseover', function () {
                    infowindow.open(map, marker);
                });

                marker.addListener('mouseout', function () {
                    infowindow.close();
                });

                markers.push(marker);
            });

            var markerCluster = new MarkerClusterer(map, markers, {
                imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
            });

            $("#map").css({ "width": "100%", "height": "700px", "min-width": "300px", "min-height": "300px" });
            google.maps.event.trigger(map, "resize");
        }

        if (farm_profile) {
            var center = { "lat": parseFloat(farm_profile["latitude"]), "lng": parseFloat(farm_profile["longitude"]) };
    
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: center
            });
    
            var marker = new google.maps.Marker({
                position: center,
                map: map
            });
    
            $("#map").css({ "width": "100%", "height": "100%", "min-width": "400px", "min-height": "400px" });
            google.maps.event.trigger(map, "resize");
        }
    });

});


