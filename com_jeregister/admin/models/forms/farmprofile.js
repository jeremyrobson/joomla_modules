var map;

jQuery(function ($) {
    var dataTable;

    $(document).ready(function () {
        $("html").css({ "width": "100%", "height": "100%" });
        $("body").css({ "width": "100%", "height": "100%" });

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
    });

});

