<?php
$rows = $this->locationList;
$option = 'com_googlemaplocation';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
	<head>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style type="text/css">
			body {
				font-family: Helvetica, Arial, sans-serif;
				font-size:10px;
				margin:0;
			}

			#content {
			}
		</style>

		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript">
			function initialize() {
				var latlng = new google.maps.LatLng(<?php echo $this->setting->default_locx; ?>,<?php echo $this->setting->default_locy; ?>);
				var settings = {
					zoom: 11,
					center: latlng,
					mapTypeControl: true,
					mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
					navigationControl: true,
					navigationControlOptions: {style: google.maps.NavigationControlStyle.LARGE},
					mapTypeId: google.maps.MapTypeId.ROADMAP};
				var map = new google.maps.Map(document.getElementById("map_canvas"), settings);
				
                <?php
                    for ($i=0; $i < count( $rows ); $i++){
                        $row = &$rows[$i];
                ?>
                        var contentString<?php echo $row->id; ?> = '<div id="content">'+
        					'<div id="siteNotice">'+
        					'</div>'+
        					'<h1 id="firstHeading" class="firstHeading">'+ '<?php echo $row->name; ?>' +'</h1>'+
        					'<div id="bodyContent">'+
       					    '<p><?php echo $row->description; ?></p>'+
        					'</div>'+
        					'</div>';
        				
                        var infowindow<?php echo $row->id; ?> = new google.maps.InfoWindow({
                            content: contentString<?php echo $row->id; ?>,
                            maxWidth: 220
        				});
                        
                        var Image<?php echo $row->id; ?> = new google.maps.MarkerImage('components/com_googlemaplocation/uploads/<?php echo $row->typeImages->images; ?>',
        					new google.maps.Size(20,34),
        					new google.maps.Point(0,0),
        					new google.maps.Point(20,34)
        				);
                        
                        var Pos<?php echo $row->id; ?> = new google.maps.LatLng(<?php echo $row->loc_x; ?>,<?php echo $row->loc_y; ?>);
        				var Marker<?php echo $row->id; ?> = new google.maps.Marker({
        					position: Pos<?php echo $row->id; ?>,
        					map: map,
                            icon: Image<?php echo $row->id; ?>,
                            title:"<?php echo $row->name; ?>",
        					zIndex: 3});
                        
                        google.maps.event.addListener(Marker<?php echo $row->id; ?>, 'click', function() {
        					infowindow<?php echo $row->id; ?>.open(map,Marker<?php echo $row->id; ?>);
        				});
                <?php
                    }
                ?>
                
			}
		</script>
	</head>
	<body onload="initialize()">
		<div id="map_canvas" style="width:700px; height:400px"></div>
	</body>
</html>