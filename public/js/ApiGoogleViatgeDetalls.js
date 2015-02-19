$(function () {
    var directionsDisplay;
    var directionsService = new google.maps.DirectionsService();
    var map;
    var oldDirections = [];
    var currentDirections = null;

    initialize();

    function initialize() {
        var myOptions = {
            zoom: 13,
            center: new google.maps.LatLng(41.387196, 2.170058),
            mapTypeId: google.maps.MapTypeId.ROADMAP,scrollwheel: false
            
                    
        }
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

        directionsDisplay = new google.maps.DirectionsRenderer({
            'map': map,
            'preserveViewport': true,
            'draggable': true
        });
        directionsDisplay.setPanel(document.getElementById("directions_panel"));

        google.maps.event.addListener(directionsDisplay, 'directions_changed',
                function () {
                    if (currentDirections) {
                        oldDirections.push(currentDirections);
                        setUndoDisabled(false);
                    }
                    currentDirections = directionsDisplay.getDirections();
                });

        calcRoute();
    }

    function calcRoute() {
        var start = document.getElementById('start').innerHTML;
        var end = document.getElementById('end').innerHTML;


        var request = {
            origin: start,
            destination: end,
            travelMode: google.maps.DirectionsTravelMode.DRIVING
        };
        directionsService.route(request, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
            }
        });
    }

});