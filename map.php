<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.css' rel='stylesheet' />
    <link rel="stylesheet" href="css/map.css">
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css" />
    <script src="js/main.js" defer></script>
    <title>Google Maps Clone</title>
</head>

<body>
    <div id='map'></div>
    <script defer>
        mapboxgl.accessToken = 'pk.eyJ1IjoibXJ1bnBvcHVsYXIiLCJhIjoiY2tqM3Z2ZDl2MGZqZTJ5bnFhZGpqeXAzNCJ9.QVAsJcFePMcB8Wy4L97U-g';

        navigator.geolocation.getCurrentPosition(successLocation, errorLocation, {
            enableHighAccuracy: true
        })

        function successLocation(position) {
            setupMap([position.coords.longitude, position.coords.latitude])
        }

        function errorLocation() {
            setupMap([-0, 0])
        }

        function setupMap(center) {
            const map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: center,
                zoom: 15
            });

            nav = new mapboxgl.NavigationControl()
            map.addControl(nav, 'bottom-right');

            var directions = new MapboxDirections({
                accessToken: mapboxgl.accessToken
            })

            map.addControl(directions, 'top-left')
        }
    </script>
</body>

</html>