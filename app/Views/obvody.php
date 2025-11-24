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
        
        L.geoJSON(data, {
      style: () => ({
        color: '#3399ff',
        weight: 1,
        fillColor: '#66ccff',
        fillOpacity: 0.6
      }),
      onEachFeature: (f, l) =>
        l.bindPopup(f.properties.NAZEV_VO || 'Obvod')
    }).addTo(map);
        
    
    </script>
</body>


</html>