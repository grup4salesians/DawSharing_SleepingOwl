$(function () {
    var lat = 41.394158, lng = 2.127907
    var directionsService = new google.maps.DirectionsService();
    var directionsDisplay = new google.maps.DirectionsRenderer();

    var mapOptions = {scrollwheel: false, center: new google.maps.LatLng(lat, lng), zoom: 14, mapTypeId: google.maps.MapTypeId.ROADMAP,
        panControl: true, panControlOptions: {position: google.maps.ControlPosition.TOP_RIGHT},
        zoomControl: true, zoomControlOptions: {style: google.maps.ZoomControlStyle.LARGE, position: google.maps.ControlPosition.TOP_left}
    }
    var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

    var NomNode = "";

    NomNode = document.getElementById('searchTextField').nodeName;

    if (NomNode === "SPAN") {
        var DireccionInicial = document.getElementById('searchTextField').innerHTML;
        var DireccionFinal = document.getElementById('searchTextFieldFin').innerHTML;
    }
    else if (NomNode === "INPUT") {
        var DireccionInicial = document.getElementById('searchTextField');
        var DireccionFinal = document.getElementById('searchTextFieldFin');

    }

    var AutoCompleteDireccionInicial = new google.maps.places.Autocomplete(DireccionInicial, {types: ["geocode"]});
    var AutoCompleteDireccionFinal = new google.maps.places.Autocomplete(DireccionFinal, {types: ["geocode"]});

    AutoCompleteDireccionInicial.bindTo('bounds', map);
    AutoCompleteDireccionFinal.bindTo('bounds', map);

    if (NomNode === "SPAN") {
        if ((DireccionInicial != "") && (DireccionFinal != "")) {
            EjectutarRutas(DireccionInicial,DireccionFinal);
        }
    }
    else if (NomNode === "INPUT") {
        if (($(DireccionInicial).val() != "") && ($(DireccionFinal).val() != "")) {
            EjectutarRutas($(DireccionInicial).val(),$(DireccionFinal).val());
        }
    }
    google.maps.event.addListener(AutoCompleteDireccionInicial, 'place_changed', function () {
        try {
            EjectutarRutas($(DireccionInicial).val(),$(DireccionFinal).val());
        }
        catch (err) {
        }

    });
    google.maps.event.addListener(AutoCompleteDireccionFinal, 'place_changed', function () {
        try {
            EjectutarRutas($(DireccionInicial).val(),$(DireccionFinal).val());
        }
        catch (err) {
        }

    });

    function EjectutarRutas(start,end) {
        var infowindow = new google.maps.InfoWindow();

        infowindow.close();

        directionsDisplay.setMap(map);
        /*directionsDisplay.setPanel(document.getElementById("directionsPanel"));*/	/**** Hace que aparezca por donde va la ruta, la distancia y cuanto tarda *****/

       // var start = $(DireccionInicial).val();
       // var end = $(DireccionFinal).val();

        Route(start, end);
    }

    function Route(start, end) {

        var request = {origin: start, destination: end, travelMode: google.maps.TravelMode.DRIVING};
        directionsService.route(request, function (result, status) {
            if (status === google.maps.DirectionsStatus.OK) {
                if ($('#distance').length) {
                    document.getElementById("distance").innerHTML = (result.routes[0].legs[0].distance.value) / 1000 + " KM";
                }
                if ($('#duration').length) {
                    document.getElementById("duration").innerHTML = PasarSegundosAFormato(result.routes[0].legs[0].duration.value) + " Horas";
                }
                directionsDisplay.setDirections(result);
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