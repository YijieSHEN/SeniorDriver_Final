<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Location Share</title>
  <script src="https://www.gstatic.com/firebasejs/live/3.1/firebase.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvAWJN67IRpqj4l4d0o6O6xcD1D7gUnek"></script>
  <style>
    body,#map {
                height: 100%;
                width: 100%;
                margin: 0px;
                padding: 0px
              }
  </style>
</head>

<body>

<div style="padding-top:100px; padding-left: 5%; padding-right: 5%">
    <div class="container marketing" >

    
      <div class="row">
       
        <div class="span12" style="padding-top: 10px; padding-bottom: 10px; border-radius: 5px;">
               <!--pre id="mapObj"></pre-->
            <div id='map' style='height: 600px;'></div>

        </div>
        
      </div>
    </div>
    <br/>
</div>


 
<?php
     echo "<script type='text/javascript'>\n";
     echo "var uid_input = " . json_encode($use_id) . "\n";
     echo "var mapid_input = " . json_encode($map_id) . "\n";
    
     echo "</script>\n";
?>
  
<script>
    var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 15,
              mapTypeId: google.maps.MapTypeId.ROADMAP
            });
    
    /*const config = {
        apiKey: "AIzaSyAVpQUmXulm_OlKhItt6olv-BGshQsYHgU",
        authDomain: "locationshare-52ba8.firebaseapp.com",
        databaseURL: "https://locationshare-52ba8.firebaseio.com",
        projectId: "locationshare-52ba8",
        storageBucket: "locationshare-52ba8.appspot.com",
        messagingSenderId: "800158940643"
      };*/

      var config = {
    apiKey: "AIzaSyC3wzVgrJWtmkzYeiG2UYJ8_Ujwzi4XpU8",
    authDomain: "seniortracker.firebaseapp.com",
    databaseURL: "https://seniortracker.firebaseio.com",
    projectId: "seniortracker",
    storageBucket: "seniortracker.appspot.com",
    messagingSenderId: "579809827039"
  };


      firebase.initializeApp(config);
      //var uid_input = 'uid: 4F44B5B4-622B-40A3-80A8-C0FAFFC4F692';
      //var mapid_input = 'mapId: 712DD1C1-D018-447E-91B0-A8F3EBC0E7B5';

      const preObject = document.getElementById('mapObj');      // Create references
      const mapObject = firebase.database().ref().child(uid_input).child(mapid_input);
            
      var pointList = [];
      var marker = null;
          /*mapObject.on('value', snap => {
            preObject.innerText = JSON.stringify(snap.val(),null,3);
          });*/

          mapObject.on('value', snap => {
            var locObj = snap.val();
            var keys = Object.keys(locObj);
            console.log(keys);
          
          for (var i = 0; i < keys.length; i++) {
            var k = keys[i];
            var latitude = locObj[k].latitude;
            var longitude = locObj[k].longitude;
            var timestamp = locObj[k].timestamp;

            //preObject.innerText += "(" + latitude + "," +longitude + ") \n";
            
           }
                    
         });

          mapObject.on('child_added', snap =>{
            var locObj = snap.val();
            var latitude = locObj.latitude;
            var longitude = locObj.longitude;
            autoupdate(parseFloat(latitude),parseFloat(longitude));
          });

    function autoupdate(latitude,longitude){
           var newPoint = new google.maps.LatLng(parseFloat(latitude),parseFloat(longitude));
            // var line = "{lat: " + lat + ", lng: " + lon + "},";
            var line = {
              lat: parseFloat(latitude),
              lng: parseFloat(longitude)
            };
            pointList.push(line);

              if (marker) {
    // Marker already created - Move it
                  marker.setPosition(newPoint);

                  var drivePath = new google.maps.Polyline({
                    path: pointList,
                    geodesic: true,
                    strokeColor: 'red',
                    strokeOpacity: 0.5,
                    strokeWeight: 5
                  });
                  drivePath.setMap(map);
                } else {
                    marker = new google.maps.Marker({
                    position: newPoint,
                    map: map,
                    icon: {
                      url: "https://maps.gstatic.com/intl/en_us/mapfiles/markers2/measle.png",
                      size: new google.maps.Size(7, 7),
                      anchor: new google.maps.Point(5, 5)
                    }
                  });
                }
                map.setCenter(newPoint);
                // });
                
    };

            //firstpolyline.addTo(map);


</script>
</body>
</html>