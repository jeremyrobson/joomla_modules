var map;

jQuery(function ($) {
    var dataTable;

    $(document).ready(function () {
        $("html").css({ "width": "100%", "height": "100%" });
        $("body").css({ "width": "100%", "height": "100%" });

        if (typeof farm_profiles !== "undefined") {
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 6,
                center: {
                    "lat": 43.642567,
                    "lng": -79.387054
                }
            });

            $.each(farm_profiles, function () {
                var link = this["profile_link"];
                var infowindow = new google.maps.InfoWindow({
                    content: '<div>' +
                        '<div id="siteNotice">' +
                        '</div>' +
                        '<h2>' + this["farm_name"] + '</h2>' +
                        '<div id="bodyContent">' +
                        '<table class="table">' +
                        '<tbody>' +
                        '<tr><th>Address</th><td>' + this["address"] + '</td></tr>' +
                        '<tr><th>City</th><td>' + this["city"] + '</td></tr>' +
                        '<tr><th>Postal Code</th><td>' + this["postal_code"] + '</td></tr>' +
                        '<tr><th>Contact</th><td>' + this["contact"] + '</td></tr>' +
                        '<tr><th>Telephone</th><td>' + this["telephone"] + '</td></tr>' +
                        '<tr><th>Email</th><td>' + this["email"] + '</td></tr>' +
                        '<tr><th>Website</th><td>' + this["website"] + '</td></tr>' +
                        '</tbody>' +
                        '</table>' +
                        //'<a href="' + link + '" class="btn pull-right">View Profile&nbsp;<i class="fa fa-arrow-right"></i></a>' +
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
            });

            $("#map").css({ "width": "100%", "height": "700px", "min-width": "300px", "min-height": "300px" });
            google.maps.event.trigger(map, "resize");
        }

        if (typeof market_view !== "undefined") {
            var center = { "lat": parseFloat(market_latlng["lat"]), "lng": parseFloat(market_latlng["lng"]) };

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


