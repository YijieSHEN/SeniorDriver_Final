 <script>

        function initMap() {
            var input = document.getElementById('postcode');
             var options = {
                componentRestrictions: { country: 'au' }
            };

            var autocomplete = new google.maps.places.Autocomplete(input,options);
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            for (var i = 0; i < place.address_components.length; i++) {
              for (var j = 0; j < place.address_components[i].types.length; j++) {
                if (place.address_components[i].types[j] == 'postal_code') {
                  document.getElementById('postcode').value = place.address_components[i].short_name;
                }
              }
            }
          })
        }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvAWJN67IRpqj4l4d0o6O6xcD1D7gUnek&libraries=places&callback=initMap" async defer></script>

<div style="padding-top:100px; padding-left: 5%; padding-right: 5%;">
    <div class="container marketing" >

    
      <div class="row">
        <div class="span4" style="padding-top: 10px; padding-bottom: 10px; border-radius: 5px;">
        </div>
        <div class="span4" style="padding-top: 10px; padding-bottom: 10px; border-radius: 5px; background-color: #F5F5F5;">
             <h3>Danger Spots</h3>
      <form name="postcodeForm" action="map_post" onsubmit="return postcode_validate()" method="post" class="form-horizontal" role="form">
          <div class="form-group">
              <label class="centerText">Please enter Victoria postcode or suburb to check heatmap</label>
              </br>
              <div class="col-md-8 text-center">
              <input id="postcode" type="text" class="form-control" name="postcode" onkeyup="keyupFunction()" placeholder="3000" autofocus>
              </div>
              </div>
              <br/>
              <div class="text-center"><button class="btn btn-success" type="submit" value="Submit">Search</button><br/></div>
              <br/>
              <span id="errorField"> </span></br>    
          </div>
      </form>

        </div>
        <div class="span4" style="padding-top: 10px; padding-bottom: 10px; border-radius: 5px;">      
        </div>
      </div>
    </div>
    <br/>
</div>

