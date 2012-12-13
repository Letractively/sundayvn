<?php
$rows = $this->locationList;

// $temp = array();
// $temp[] = $rows[1];

// $rows = $temp;

$filter_zone = JRequest::getInt("filter_zone");
$filter_address = JRequest::getString("filter_address");

// Get value for display googlemap
if ($this->address) {
    $loc_x = $this->address->loc_x;
    $loc_y = $this->address->loc_y;
    $zoom_rate = 15;
} else {
    if ($filter_zone) {
        $loc_x = $this->zone->loc_x;
        $loc_y = $this->zone->loc_y;
        $zoom_rate = $this->zone->zoom_rate;
    } else {
        $loc_x = $this->setting->default_locx;
        $loc_y = $this->setting->default_locy;
        $zoom_rate = $this->setting->default_zoom;
    }
}
?>

<script type="text/javascript">
    
    function initMap(){

        var oPosition = new google.maps.LatLng(<?php echo floatval($loc_x); ?>, <?php echo floatval($loc_y); ?>);

        var settings = {
		
            zoom: <?php echo intval($zoom_rate); ?>,
			
            center: oPosition,
			
            mapTypeControl: true,
			
            navigationControl: true,
			
            navigationControlOptions: {
                style: google.maps.NavigationControlStyle.LARGE
            },
			
            mapTypeId: google.maps.MapTypeId.ROADMAP
			
        };

        // Create a map.
        var map = new google.maps.Map(document.getElementById("map_canvas"), settings);

        <?php foreach($rows as $index => $row) { ?>
            
            <?php
            $arr = explode("\n", $row->description);
            $newData = implode(' ', $arr);
            $arr1 = explode("\r", $newData);
            $description = implode(' ', $arr1);
            ?>
            
            var contentString<?php echo $row->id; ?> = '' + 
                '<table style="margin:15px 10px 10px 10px;">' + 
                    '<tr>' + 
                        '<td>' + 
                            '<div id="content" style="width:215px;height:135px;color:#1f8fcf";>' +
                                '<h4 id="firstHeading" class="firstHeading" style="font-size:16px;margin-bottom:10px;">' + 
                                    '<?php echo $row->lc_type . ' (' . $row->name . ')'; ?>' + 
                                '</h4>' +
                                '<div id="bodyContent">' +
                                    '<p style="margin-bottom:10px;">' + 
                                        '<b>Address</b>: ' + 
                                        '<?php echo $row->address . ' ' . $row->postal_code; ?>' + 
                                    '</p>' +
                                    '<p style="margin-bottom:10px;">' + 
                                        '<b>Service</b>: ' + 
                                        '<?php  foreach ($row->listService as $sv_i => $service)
                                            echo ($sv_i == 0) ? $service->service : ', ' . $service->service;
                                        ?>' + 
                                    '</p>' +
                                    '<?php echo $description; ?>' +
                                '</div>' +
                            '</div>' + 
                        '</td>' + 
                    '</tr>' + 
                '</table>';

            // Create Marker Image.
            var Image<?php echo $row->id; ?> = new google.maps.MarkerImage(
                '<?php echo JURI::root() . 'components/com_googlemaplocator/uploads/' . $row->typeImages->images; ?>',

                // This marker is 32 pixels wide by 32 pixels tall.
                new google.maps.Size(32,32),

                // The origin for this image is 0,0.
                new google.maps.Point(0,0),

                // The anchor for this image is the base of the flagpole at 32,32.
                new google.maps.Point(32,32)
				
            );

            // Create position in Google Map by latitude and longitude.
            var Pos<?php echo $row->id; ?> = new google.maps.LatLng(<?php echo floatval($row->loc_x); ?>, <?php echo floatval($row->loc_y); ?>);

            // Create Marker.
            var Marker<?php echo $row->id; ?> = new google.maps.Marker({
                // Set the position.
                position: Pos<?php echo $row->id; ?>,

                // Set the map.
                map: map,

                // Insert Image Icon.
                icon: Image<?php echo $row->id; ?>,

                // Set the title.
                title: "<?php echo $row->name; ?>",

                // Set zIndex.
                zIndex: <?php echo $row->id; ?>
				
            });

			
			
            // Set options for InfoBox.
            var myOptions<?php echo $row->id; ?> = {
			
                content: contentString<?php echo $row->id; ?>,
				
                disableAutoPan: false,
				
                maxWidth: 0,
				
                pixelOffset: new google.maps.Size(-140, -210),
				
                zIndex: null,
				
                boxStyle: {
                    background: "#FFF",
                    opacity: 1,
                    height: "185px",
                    width: "250px"
                },
				
                closeBoxMargin: "7px 7px 2px 2px",
				
                closeBoxURL: "http://www.google.com/intl/en_us/mapfiles/close.gif",
				
                infoBoxClearance: new google.maps.Size(1, 1),
				
                isHidden: false,
				
                pane: "floatPane",
				
                enableEventPropagation: false
				
            };

            var ib<?php echo $row->id; ?> = new InfoBox(myOptions<?php echo $row->id; ?>);
			
			// Create a new info window.
			// var oInfoWindow<?php echo $row->id; ?> = new google.maps.InfoWindow();
			
			
            google.maps.event.addListener(Marker<?php echo $row->id; ?>, "click", function(e) {
            
				// Set content to open info window.
				// oInfoWindow<?php echo $row->id; ?>.setContent(contentString<?php echo $row->id; ?>);
					
				// oInfoWindow<?php echo $row->id; ?>.open(Marker<?php echo $row->id; ?>, this);
			
				ib<?php echo $row->id; ?>.open(map, Marker<?php echo $row->id; ?>);
                
            });
			
        <?php } ?>
		
    }
	
	// Main function.
    // google.maps.event.addDomListener(window, 'load', initMap);
	
	// Warning Message.
    jQuery(document).ready(function($) {
		
		initMap();
		
		<?php if (!$this->address && $filter_address != "") { ?>
            $("#txtResult").html("Address not found!");
        <?php } else { ?>
            $("#txtResult").html("");
        <?php } ?>
		
    });
</script>