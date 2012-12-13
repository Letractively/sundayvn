<?php
$rows = $this->locationList;


$filter_zone = JRequest::getVar("filter_zone");
$filter_address = JRequest::getVar("filter_address");
//$filter_type = JRequest::getVar("filter_type");

// Get value for display googlemap
if($this->address)
{
        $loc_x = $this->address->loc_x;
        $loc_y = $this->address->loc_y;
        $zoom_rate = '16';
}
else {
    if($filter_zone){
        $loc_x = $this->zone->loc_x;
        $loc_y = $this->zone->loc_y;
        $zoom_rate = $this->zone->zoom_rate;
    }else{
        $loc_x = $this->setting->default_locx;
        $loc_y = $this->setting->default_locy;
        $zoom_rate = $this->setting->default_zoom;
    }
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
            
            $arr = explode( "\n", $row->description );
            $newData = implode(' ',$arr);

            $arr1 = explode( "\r", $newData );
            $description = implode(' ',$arr1);
    ?>
            var contentString<?php echo $row->id; ?> = '<table style="margin:15px 10px 10px 10px;"><tr><td><div id="content" style="width:215px;height:135px;color:#1f8fcf";>'+
				'<h4 id="firstHeading" class="firstHeading" style="font-size:16px;margin-bottom:10px;">'+ '<?php echo $row->lc_type.' ('.$row->name.')'; ?>' +'</h4>'+
				'<div id="bodyContent">'+
                                '<p style="margin-bottom:10px;"><?php echo '<b>Address</b>: '.$row->address.' '.$row->postal_code; ?></p>'+
                                '<p style="margin-bottom:10px;"><?php echo '<b>Service</b>: '; 
                                        foreach($row->listService as $sv_i => $service)
                                        {
                                            if($sv_i == 0)
                                                echo $service->service;
                                            else
                                                echo ', '.$service->service;
                                        }
                                    ?></p>'+
                                '<p><?php echo $description; ?></p>'+
				'</div>'+
				'</div></td></tr></table>';
		
                
            
            
    var Image<?php echo $row->id; ?> = new google.maps.MarkerImage('<?php echo JURI::root(); ?>components/com_googlemaplocation/uploads/<?php echo $row->typeImages->images; ?>',
				new google.maps.Size(32,32),
				new google.maps.Point(0,0),
				new google.maps.Point(32,32)
			);
            
            var Pos<?php echo $row->id; ?> = new google.maps.LatLng(<?php echo $row->loc_x; ?>,<?php echo $row->loc_y; ?>);
            
            var Marker<?php echo $row->id; ?> = new google.maps.Marker({
                            position: Pos<?php echo $row->id; ?>,
                            map: map,
                            icon: Image<?php echo $row->id; ?>,
                            title: "<?php echo $row->name; ?>",
                            zIndex: <?php echo $row->id; ?>
                });
            
            
                        
                        var myOptions<?php echo $row->id; ?> = {
			 content: contentString<?php echo $row->id; ?>
			,disableAutoPan: false
			,maxWidth: 0
			,pixelOffset: new google.maps.Size(-140, -210)
			,zIndex: null
			,boxStyle: {
                            background: "url('<?php echo JURI::root(); ?>/images/bgd_popup_map.png') no-repeat"
			  ,opacity: 1
                          ,height: "185px"
                          ,width: "250px"
			 }
			,closeBoxMargin: "7px 7px 2px 2px"
			,closeBoxURL: "http://www.google.com/intl/en_us/mapfiles/close.gif"
			,infoBoxClearance: new google.maps.Size(1, 1)
			,isHidden: false
			,pane: "floatPane"
			,enableEventPropagation: false
		};

		var ib<?php echo $row->id; ?> = new InfoBox(myOptions<?php echo $row->id; ?>);
                
		google.maps.event.addListener(Marker<?php echo $row->id; ?>, "click", function (e) {
			ib<?php echo $row->id; ?>.open(map, Marker<?php echo $row->id; ?>);
		});

		
                
    <?php
        }
    ?>
        
        jQuery(document).ready(function($) {
            <?php if(!$this->address && $filter_address != ""){ ?>
                    $("#search_result").html("Address not found<hr />");
            <?php } else { ?>
                $("#search_result").html("");
            <?php } ?>
        });
</script>