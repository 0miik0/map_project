<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa</title>
    <link rel="stylesheet" href="node_modules/leaflet/dist/leaflet.css">
    <script src="node_modules/leaflet/dist/leaflet.js"></script>
</head>
<style>
    #map {
        height: 550px;
    }
</style>
<body>
    <div id="map"></div>

    <script>
        let data = JSON.parse(`<?= $file ?>`);

        let map = L.map('map').setView([20, 0], 2);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        //var marker = L.marker([51.5, -0.09]).addTo(map);
        
        data.features.forEach(function(earthquake) {
            let coords = earthquake.geometry.coordinates;
            let magnitude = earthquake.properties.mag;
            let place = earthquake.properties.place;

            let marker = L.circleMarker([coords[1], coords[0]], {
                radius: magnitude * 2,
                fillColor: "red",
                color: "darkred",
                weight: 1,
                opacity: 1,
                fillOpacity: 0.8
            }).addTo(map);

            marker.bindPopup("<b>Location:</b> " + place + "<br><b>Magnitude:</b> " + magnitude);
        });
    </script>
</body>


</html>