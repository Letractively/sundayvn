<?php
defined('_JEXEC') or die;

$filter_zone = JRequest::getInt("filter_zone");
$filter_type = JRequest::getInt("filter_type");
$filter_address = JRequest::getString("filter_address");
$filter_service = JRequest::getInt("filter_service");
?>

<script src="<?php echo JURI::root(); ?>components/com_googlemaplocator/helpers/jquery.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&sensor=false&libraries=places"></script>
<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js"></script>
<script>
    jQuery.noConflict();
    /*jQuery(document).ready(function($) {
        
        // First load.
        $("#filter_zone").val(<?php echo $filter_zone; ?>);
        $("#filter_type").val(<?php echo $filter_type; ?>);
        $("#filter_address").val("<?php echo $filter_address; ?>");
        $("#filter_service").val(<?php echo $filter_service; ?>);
        
        var zone = $("#filter_zone").val();
        var type = $("#filter_type").val();
        var service = $("#filter_service").val();
        var address = $("#filter_address").val();
        
        var strPath = "<?php echo JURI::root(); ?>index.php?option=com_googlemaplocator&controller=location&task=googlemap&tmpl=component";
        
        $.post(
            strPath,
            {
                filter_zone: zone,
                filter_type: type,
                filter_service: service,
                filter_address: address
            },
            function(data) {
                $("#map_canvas").html(data);                  
            }
        );

        // Click on submit.
        $("#btnSearch").click(function() {
            var zone = $("#filter_zone").val();
            var type = $("#filter_type").val();
            var service = $("#filter_service").val();
            var address = $("#filter_address").val();
            
            $.post(
                strPath,
                {
                    filter_zone: zone,
                    filter_type: type,
                    filter_service: service,
                    filter_address: address
                },
                function(data) {
                    $("#map_canvas").html(data);            
                }
            );
        });
    });
	*/
</script>
 <script>
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(-33.8688, 151.2195),
          zoom: 13,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById('map_canvas'),
          mapOptions);

        var input = document.getElementById('searchTextField');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
          map: map
        });

       google.maps.event.addListener(autocomplete, 'place_changed', function() {
  var place = autocomplete.getPlace();
  if (!place.geometry) {
    // Inform the user that a place was not found and return.
    return;
  }

  // If the place has a geometry, then present it on a map.
  if (place.geometry.viewport) {
    // Use the viewport if it is provided.
    map.fitBounds(place.geometry.viewport);
  } else {
    // Otherwise use the location and set a chosen zoom level.
    map.setCenter(place.geometry.location);
    map.setZoom(17);
  }
  var image = new google.maps.MarkerImage(
      place.icon, new google.maps.Size(71, 71),
      new google.maps.Point(0, 0), new google.maps.Point(17, 34),
      new google.maps.Size(35, 35));
  marker.setIcon(image);
  marker.setPosition(place.geometry.location);

  infowindow.setContent(place.name);
  infowindow.open(map, marker);
});

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          google.maps.event.addDomListener(radioButton, 'click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<div class="map" id="locator">
	  <input id="searchTextField" type="text" size="50" />
	    <input type="radio" name="type" id="changetype-all" checked="checked" />
      <label for="changetype-all">All</label>

      <input type="radio" name="type" id="changetype-establishment">
      <label for="changetype-establishment">Establishments</label>

      <input type="radio" name="type" id="changetype-geocode">
      <label for="changetype-geocode">Geocodes</label>
    <div id="map_canvas" style="width: 100%; height: 20em;"></div>
</div>