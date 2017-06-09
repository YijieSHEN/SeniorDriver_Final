<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Heatmaps</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #floating-panel {
        background-color: #fff;
        border: 1px solid #999;
        left: 25%;
        padding: 5px;
        position: absolute;
        top: 10px;
        z-index: 5;
      }
    </style>
  </head>


<?php
     echo "<script type='text/javascript'>\n";
     echo "var locations_array_latitude = []" . "\n";
     echo "var locations_array_longitude = []" . "\n";

     foreach ($locations as $value){
        echo "locations_array_latitude.push(". json_encode($value->Latitude). ")\n"; // access attributes
        echo "locations_array_longitude.push(". json_encode($value->Longitude). ")\n"; // access attributes
     }
     echo "</script>\n";
?>



  <body>






<div style="padding-top:100px; padding-left: 5%; padding-right: 5%">
    <div class="container marketing" >

    
      <div class="row">
       
        <div class="span12" style="padding-top: 0px; padding-bottom: 10px; border-radius: 5px;">
              <h3 class="text-center">Danger Spots</h3>
              <br/>
              <div style="width:100%; height:600px;" id="map"></div>
              <br/>
              <p class="text-center"><span style="color:red; font-weight: bold;">Red Area:</span> More than 5 accidents occured</p>
              <p class="text-center"><span style="color:#33cc33; font-weight: bold;">Green Area:</span> Less than 5 accidents occured </p>

        </div>
      
      </div>
    </div>
    <br/>
</div>

    <script>

      // This example requires the Visualization library. Include the libraries=visualization
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=visualization">

      var map, heatmap;

      function initMap() {

        center_lat = parseFloat(locations_array_latitude[0]);
        center_lng = parseFloat(locations_array_longitude[0]);

        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: new google.maps.LatLng(center_lat, center_lng), 
          mapTypeId: 'hybrid'
        });

        heatmap = new google.maps.visualization.HeatmapLayer({
          data: getPoints(),
          map: map
        });

        heatmap.set('radius', heatmap.get('radius') ? null : 20);

        

      }

      //var latLongs = <?php echo json_encode($locations); ?>;

  

      function toggleHeatmap() {
        heatmap.setMap(heatmap.getMap() ? null : map);
      }

      function changeGradient() {
        var gradient = [
          'rgba(0, 255, 255, 0)',
          'rgba(0, 255, 255, 1)',
          'rgba(0, 191, 255, 1)',
          'rgba(0, 127, 255, 1)',
          'rgba(0, 63, 255, 1)',
          'rgba(0, 0, 255, 1)',
          'rgba(0, 0, 223, 1)',
          'rgba(0, 0, 191, 1)',
          'rgba(0, 0, 159, 1)',
          'rgba(0, 0, 127, 1)',
          'rgba(63, 0, 91, 1)',
          'rgba(127, 0, 63, 1)',
          'rgba(191, 0, 31, 1)',
          'rgba(255, 0, 0, 1)'
        ]
        heatmap.set('gradient', heatmap.get('gradient') ? null : gradient);
      }

      function changeRadius() {
        heatmap.set('radius', heatmap.get('radius') ? null : 20);
      }

      function changeOpacity() {
        heatmap.set('opacity', heatmap.get('opacity') ? null : 0.2);
      }

      // Heatmap data: 500 Points
      function getPoints() {
        //console.log(locations_array_latitude);
        //console.log(locations_array_longitude);

        var points = [];
        for (var i=0; i < locations_array_longitude.length; i++) {
            points.push(new google.maps.LatLng(locations_array_latitude[i], locations_array_longitude[i]));
        }

        return points;
      }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvAWJN67IRpqj4l4d0o6O6xcD1D7gUnek&libraries=visualization&callback=initMap">
    </script>
  </body>
</html>