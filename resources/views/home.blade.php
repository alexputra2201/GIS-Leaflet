<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Gis</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

    <script src="https://unpkg.com/esri-leaflet@3.0.7/dist/esri-leaflet.js"
        integrity="sha512-ciMHuVIB6ijbjTyEdmy1lfLtBwt0tEHZGhKVXDzW7v7hXOe+Fo3UA1zfydjCLZ0/vLacHkwSARXB5DmtNaoL/g=="
        crossorigin=""></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        #map {
            height: 500px;
        }

    </style>
</head>

<body>
    <div id="map"></div>
</body>

<script>
    var map = L.map('map').setView([0.5137908, 101.3711349], 13);

    // L.esri.basemapLayer('Topographic').addTo(map);

    // Hybrid: s, h;
    // Satellite: s;
    // Streets: m;
    // Terrain: p;
    L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map);

    //L.marker([0.5137908, 101.3711349]).addTo(map);

    var MotelIcon = L.icon({
        iconUrl: 'assets/motel-2.png',

        iconSize: [38, 45], // size of the icon
        shadowSize: [50, 64], // size of the shadow
        iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62], // the same for the shadow
        popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
    });

    L.marker([0.5137908, 101.3711349], {
        icon: MotelIcon
    }).addTo(map);


    // A $( document ).ready() block.
    $(document).ready(function() {
        $.getJSON("titik", function(data) {
            $.each(data, function(index) {
                L.marker([parseFloat(data[index].bangunan_long), parseFloat(data[index]
                        .bangunan_lat)], {
                        icon: MotelIcon
                    })
                    .addTo(map);
            });
        });

    });
</script>

</html>
