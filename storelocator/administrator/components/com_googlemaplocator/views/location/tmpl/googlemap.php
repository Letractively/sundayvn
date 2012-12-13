<?php
$rows = $this->locationList;

$filter_zone = JRequest::getVar("filter_zone");
$filter_type = JRequest::getVar("filter_type");

// Get value for display googlemap
if($filter_zone){
    $loc_x = $this->zone->loc_x;
    $loc_y = $this->zone->loc_y;
    $zoom_rate = $this->zone->zoom_rate;
}else{
    $loc_x = $this->setting->default_locx;
    $loc_y = $this->setting->default_locy;
    $zoom_rate = '11';
}
?>

<script type="text/javascript">
    var latlng = new google.maps.LatLng(<?php echo $loc_x; ?>,<?php echo $loc_y; ?>);
	var settings = {
		zoom: <?php echo $zoom_rate; ?>,
		center: latlng,
		mapTypeControl: true,
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
                content: contentString<?php echo $row->id; ?>
			});
            
            var Image<?php echo $row->id; ?> = new google.maps.MarkerImage('components/com_googlemaplocator/uploads/<?php echo $row->typeImages->images; ?>',
				new google.maps.Size(20,34),
				new google.maps.Point(0,0),
				new google.maps.Point(20,34)
			);
            
            var Pos<?php echo $row->id; ?> = new google.maps.LatLng(<?php echo $row->loc_x; ?>,<?php echo $row->loc_y; ?>);
			var Marker<?php echo $row->id; ?> = new google.maps.Marker({
					position: Pos<?php echo $row->id; ?>,
					map: map,
                    icon: Image<?php echo $row->id; ?>,
                    title: "<?php echo $row->name; ?>",
					zIndex: <?php echo $row->id; ?>
                });
            
            google.maps.event.addListener(Marker<?php echo $row->id; ?>, 'click', function() {
				infowindow<?php echo $row->id; ?>.open(map,Marker<?php echo $row->id; ?>);
			});
    <?php
        }
    ?>
</script>