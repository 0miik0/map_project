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
        height: 100vh;
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
        
        data.features.forEach(function(obvody) {
            
            let coords = obvody.geometry.coordinates;
            let polygon = L.polygon(coords, {
                color: 'blue',
                weight: 2,
                opacity: 1,
                fillOpacity: 0.5
            }).addTo(map);
        })
        
    
    </script>
</body>


</html>