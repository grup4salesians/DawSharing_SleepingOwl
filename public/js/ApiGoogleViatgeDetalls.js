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
            mapTypeId: google.maps.MapTypeId.ROADMAP, scrollwheel: false


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

        if ((!start) && (!end)) {
            var start = document.getElementById('start').value;
            var end = document.getElementById('end').value;
        }

        var request = {
            origin: start,
            destination: end,
            travelMode: google.maps.DirectionsTravelMode.DRIVING
        };
        directionsService.route(request, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                if ($('#distance').length) {
                    document.getElementById("distance").innerHTML = (response.routes[0].legs[0].distance.value) / 1000 + " KM";
                }
                if ($('#duration').length) {
                    document.getElementById("duration").innerHTML = PasarSegundosAFormato(response.routes[0].legs[0].duration.value) + " Horas";
                }
                directionsDisplay.setDirections(response);
            }
        });
    }

    function PasarSegundosAFormato($total_seconds) {
        var d = new Date($total_seconds * 1000);
        var hora = (d.getHours() == 0) ? 23 : d.getHours() - 1;
        var hora = (hora < 9) ? "0" + hora : hora;
        var minuto = (d.getMinutes() < 9) ? "0" + d.getMinutes() : d.getMinutes();
        var segundo = (d.getSeconds() < 9) ? "0" + d.getSeconds() : d.getSeconds();
        var hora = (d.getHours() == 0) ? 23 : d.getHours() - 1;
        var result = hora + ":" + minuto + ":" + segundo;
        return result;
    }

});