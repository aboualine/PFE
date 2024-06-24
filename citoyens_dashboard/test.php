<?php
    $servername = "localhost";
    $username = "root";
    $password = "0689102695mohamedaboualinedimaraja";
    $database = "gestdechcomloc";
    $conn = mysqli_connect($servername, $username, $password, $database);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #contmap {
            margin-left: 110px;
            height: 600px;
            width: 1100px;
            overflow: hidden;
        }

        #map {
            height: 100%;
            width: 100%;
            position: relative;
        }

        #map img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            position: relative;
        }

        #map-image{
            z-index: -10;
        }

        .pointer {
            position: absolute;
            transform: translate(-50%, -50%);
        }

        .pointer img {
            width: 20px; 
            height: 20px; 
        }
    </style>
</head>
<body>
    <div id="contmap">
        <div id="divmap">
            <?php
                                
                $sql_points = "SELECT Emplacement, Typee, latitude, longitude FROM PointCollecte";
                $result_points = $conn->query($sql_points);
                            
                $points = array();
                if ($result_points->num_rows > 0) {
                    while ($row = $result_points->fetch_assoc()) {
                        $points[] = $row;
                    }
                }
            ?>

            <div id="map">
                <img src="images/chichaoua trajectoires.png" alt="map image" id="map-image">
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var points = <?php echo json_encode($points); ?>;
            var mapImage = document.getElementById('map-image');

            mapImage.onload = function() {
                var mapWidth = mapImage.offsetWidth;
                var mapHeight = mapImage.offsetHeight;

                points.forEach(function(point) {
                    var pointer = document.createElement('div');
                    pointer.className = 'pointer';
                    pointer.style.top = (point.latitude) + 'px';
                    pointer.style.left = (point.longitude) + 'px';
                    pointer.title = point.Emplacement;

                    var pointerImage = document.createElement('img');
                    pointerImage.src = 'images/green-pointer.png';
                    pointerImage.alt = 'Pointer';
                    pointerImage.style.width = '20px';
                    pointerImage.style.height = '20px';

                    pointer.appendChild(pointerImage);
                    document.getElementById('map').appendChild(pointer);
                });
            };
        });
    </script>
</body>
</html>