<?php
defined('_JEXEC') or die;

$filter_zone = JRequest::getInt("filter_zone");
$filter_type = JRequest::getInt("filter_type");
$filter_address = JRequest::getString("filter_address");
$filter_service = JRequest::getInt("filter_service");
$geoData =  (unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=222.253.149.154')));
JRequest::setVar('geoData',$geoData);
?>

<script src="<?php echo JURI::root(); ?>components/com_googlemaplocator/helpers/jquery.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&sensor=false&libraries=places"></script>
<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js"></script>
<script>
    jQuery.noConflict();
  
	
</script>
 <script>
   	
      function initialize() {
        var mapOptions = 
		{
          center: new google.maps.LatLng(<?php echo $geoData['geoplugin_latitude'] ?>, <?php echo $geoData['geoplugin_longitude'] ?>),
          zoom: 13,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById('map_canvas'),
          mapOptions);

        var input = document.getElementById('filter_address');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.bindTo('bounds', map);



       google.maps.event.addListener(autocomplete, 'place_changed', function() 
	   {
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
});

//get locations
<?php 
$result = JModel::getInstance('Location','GoogleMapLocatorModel')->listAllArr();
foreach ($result as $itemL)
{
	?>
	
var myLatlng = new google.maps.LatLng(<?php echo $itemL['loc_x'] ?>,<?php echo $itemL['loc_y'] ?>);

	  var   marker<?php echo $itemL['id'] ?> = new google.maps.Marker({
            position: myLatlng,
            map: map,
       
        });
	      marker<?php echo $itemL['id']; ?>.setVisible(true);
	  
	  
	       var contentString = '<div id="content" style="width:50px">'+

            '<h1 id="firstHeading" class="firstHeading"><?php echo $itemL['name'] ?></h1>'+
            '<div id="bodyContent">'+
            '<p><?php echo $itemL['description'] ?></p>'+
            '</div>'+
            '</div>';

        var infowindow<?php echo $itemL['id'] ?> = new google.maps.InfoWindow({
            content: contentString
        });

//	    google.maps.event.addListener(myArr[i][0] , 'click', function() {
//          myArr[i][1].open(map,myArr[i][0]);
//        });     
 google.maps.event.addListener(marker<?php echo $itemL['id'] ?>, 'click', function() {
        infowindow<?php echo $itemL['id'] ?>.open(map,marker<?php echo $itemL['id'] ?>);
        });  



<?php
}
?>
//getlocation -end
 
	
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
	
    <div id="map_canvas" style="width: 100%; height: 20em;"></div>
</div>