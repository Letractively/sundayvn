<?php
defined('_JEXEC') or die;

$filter_zone = JRequest::getInt("filter_zone");
$filter_type = JRequest::getInt("filter_type");
$filter_address = JRequest::getString("filter_address");
$filter_service = JRequest::getInt("filter_service");
$geoData =  (unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR'])));
//$geoData =  (unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=222.253.149.154')));
JRequest::setVar('geoData',$geoData);
?>

<script src="<?php echo JURI::root(); ?>components/com_googlemaplocator/helpers/jquery.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&sensor=false&libraries=places"></script>
<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js"></script>

	<script src="http://www.merkwelt.com/people/stan/geo_js/js/geo.js?id=1" type="text/javascript" charset="utf-8"></script>


<script>
    jQuery.noConflict();
  
	
</script>
 <script>
   	var myLatNumber = <?php if( empty($_GET['cur_lat_num']))echo $geoData['geoplugin_latitude'] ;else echo $_GET['cur_lat_num']; ?>;
   	var myLongNumber = <?php if( empty($_GET['cur_long_num']))echo $geoData['geoplugin_longitude'];else echo $_GET['cur_long_num']; ?>;
	  var directionsService = new google.maps.DirectionsService();
  var directionsDisplay = new google.maps.DirectionsRenderer();
    var myLocationMarker;
	   var map;
      function initialize() {
        var mapOptions = 
		{
          center: new google.maps.LatLng(myLatNumber, myLongNumber),
          zoom: 13,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
		    navigationControl: true,
	      navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
        };
         map = new google.maps.Map(document.getElementById('map_canvas'),
          mapOptions);
		  <?php  if ( empty($_GET['cur_long_num']) or empty($_GET['cur_lat_num']) ) {?>
	if(geo_position_js.init()){
			geo_position_js.getCurrentPosition(success_callback,error_callback,{enableHighAccuracy:true});
		}
		else{
			alert("Functionality not available");
		}

		function success_callback(p)
		{
			//alert('lat='+p.coords.latitude.toFixed(4)+';lon='+p.coords.longitude.toFixed(4));
			myLatNumber = p.coords.latitude.toFixed(4);
			myLongNumber = p.coords.longitude.toFixed(4);
		
			  var image = '<?php echo JURI::root() ?>user.png';
        var myLatLng = new google.maps.LatLng(myLatNumber, myLongNumber);
         myLocationMarker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            icon: image
			
        });
		
		    map.setCenter(myLatLng);
		}
			function error_callback(p)
		{
			alert('error='+p.code);
		}
		<?php } 
		else
		{ ?>
			  var image = '<?php echo JURI::root() ?>user.png';
        var myLatLng = new google.maps.LatLng(myLatNumber, myLongNumber);
         myLocationMarker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            icon: image
			        });
		<?php  } ?>
	
      
        var inputOB = document.getElementById('filter_address');
        var autocomplete = new google.maps.places.Autocomplete(inputOB);

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
  /*var image = new google.maps.MarkerImage(
      place.icon, new google.maps.Size(71, 71),
      new google.maps.Point(0, 0), new google.maps.Point(17, 34),
      new google.maps.Size(35, 35));
	    marker.setPosition(place.geometry.location);  
	*/
	myLocationMarker.setPosition(place.geometry.location);
	myLatNumber = place.geometry.location.lat();

	myLongNumber = place.geometry.location.lng();
	jQuery('#cur_lat_num').val(myLatNumber);
	jQuery('#cur_long_num').val(myLongNumber);
	document.frmSearch.submit();
});

//get locations
<?php 

$result = JModel::getInstance('Location','GoogleMapLocatorModel')->listAll();
foreach ($result as $itemL)
{
	?>
	
var myLatlng = new google.maps.LatLng(<?php echo $itemL['loc_x'] ?>,<?php echo $itemL['loc_y'] ?>);

	  var   marker<?php echo $itemL['id'] ?> = new google.maps.Marker({
            position: myLatlng,
            map: map,
       
        });
	      marker<?php echo $itemL['id']; ?>.setVisible(true);
	  
	  
	       var contentString = '<p><b><?php echo $itemL['name'] ?></b><br />'+
		   '<?php echo strip_tags( $itemL['description'] )?></p>';

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

      
      }
function getdirection()
{
var latNumber = jQuery(this).attr('lat');
var longNumber = jQuery(this).attr('long');
	  directionsDisplay.setMap(map);
		  var myLatlng = new google.maps.LatLng(myLatNumber, myLongNumber);
   var start = myLatlng;
		  var myLatlng = new google.maps.LatLng(latNumber, longNumber);
        var end =myLatlng;
        var request = {
            origin:start,
            destination:end,
            travelMode: google.maps.DirectionsTravelMode.DRIVING
        };
        directionsService.route(request, function(response, status) {
          if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
          }
        });
      
}
jQuery(document).ready(function(){
jQuery('.showdirect').click(getdirection);
});
      google.maps.event.addDomListener(window, 'load', initialize);
   

    </script>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<div class="map" id="locator">
	
    <div id="map_canvas" style="width: 100%;"></div>
	<div id="current"></div>

</div>
	<div id="location_list">
		
		<style>
		.location-info-block
		{
		
			padding:0px 10px;

			height:100%;
		}
		</style>
		<table style="width:100%" border="0" id='tableform_filter_form'>
		<form name="form_filter_form" method="POST" action="" id="form_filter_form">
	
			<tr>
		<?php
			$filter_array_serv = $this->filter_array_serv;
		foreach ($this->servicesList as $serviceI)
		{
			if(empty($serviceI->img_url))
		{
			$img_url = JURI::root().'images/NO-IMAGE-AVAILABLE.jpg';
		}
		else
		{
			$img_url = JURI::root().$serviceI->img_url;
		}
			?>
			<td align="center">
		<label style="cursor:pointer;" for ="service_item_<?php echo $serviceI->id; ?>">
		<img class='<?php if (in_array($serviceI->id,$filter_array_serv) ) echo "checked" ?> image_serv' src='<?php echo $img_url; ?>' width="50" /><br />
		</label>
		
			</td>
			<?php
		}
		 ?>
			</tr>
			
			<tr class="service_tr_input">
		<?php
		$filter_array_serv = $this->filter_array_serv;
		foreach ($this->servicesList as $serviceI)
		{
		
	
			?>
				<td align="center"><input id="service_item_<?php echo $serviceI->id; ?>" type='checkbox' name="checkboxsv[]" <?php if (in_array($serviceI->id,$filter_array_serv) ) echo 'checked="checked"' ?> onclick="document.form_filter_form.submit();" value="<?php echo $serviceI->id; ?>" /></td>
			<?php
		}
		 ?>
			</tr>
	<tr class="service_tr_name">
		<?php
		foreach ($this->servicesList as $serviceI)
		{
			?>
			<td align="center">
			<?php echo $serviceI->service; ?>
		
			</td>
			<?php
		}
		 ?>
			</tr>	
		<input  type="hidden" name="updatefilter" value="1" />
			</form>
		</table>
		<table class="locationItem" style="width:100%">
		<?php 
		foreach ($result as $itemL)
		{
			$latint 		= $geoData['geoplugin_latitude'];
			$longint 	= $geoData['geoplugin_longitude'];
			if (!empty($_GET['cur_lat_num']))
			{
			$latint = $_GET['cur_lat_num'];
			}	
			if (!empty($_GET['cur_long_num']))
			{
			$longint = $_GET['cur_long_num'];
			}
			$distance 	= LocatorHelperCls::distance($latint ,$longint, $itemL['loc_x'] , $itemL['loc_y']  );
			$distance 	= round($distance,2);
			?>
			
			<tr>
				<td width='30%'>
					<div class="location-info-block">
						<h3><?php echo $itemL['name']; ?></h3>
						<p><?php echo $itemL['address']; ?></p>
					
					</div>
				</td>
				<td width='50%'>					
				<div class="location-info-block"><b>Description:</b><br />
				<?php echo $itemL['description']; ?>
				</div>
				</td >
				<td width='20%' class="nobor">					
				<div class="location-info-block"><?php echo $distance; ?> km away<br /><input class='get_direct showdirect' type="button"  lat="<?php echo $itemL['loc_x'] ?>" long="<?php echo $itemL['loc_y'] ?>" value="Get direction" /></div>
				</td>
			</tr>
			<?php
		}
		?>
			
		</table>
	</div>
	
<br />
<br />
