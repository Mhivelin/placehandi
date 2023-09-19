<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Handicaplace</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <h1>Places handicapé la Rochelle</h1>
    <div id="map"></div>
    <script>
    // création de la map
    var map = L.map('map').setView([46.16, -1.12], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // ouverture du fichier json
    let datas =
        <?php echo file_get_contents("data.json"); ?>;

    // ajout des markers
    datas.forEach(element => {
        var marker = L.marker([element.fields.geo_point_2d[1], element.fields.geo_point_2d[0]]).addTo(map);
        marker.bindPopup(element.fields.obs + " " + element.fields.adresse).openPopup();
    });
    </script>



</body>

</html>