<?php
$rows = $this->locationList;
$option = 'com_googlemaplocation';
$filter_zone = JRequest::getVar("filter_zone");
$filter_type = JRequest::getVar("filter_type");
if(empty($filter_type)){
    $filter_type = array();
    foreach($this->tList as $key=>$list_type){
        $filter_type[$key] = $list_type->id;
    }
}
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
			    overflow: auto;
                overflow-x: hidden;
                -ms-overflow-x: hidden; /* For IE 8 */
                margin: 0;
                padding: 0;
			}
		</style>
        
        <script src="components/com_googlemaplocation/helpers/jquery.min.js"></script>
        <script>
        $.noConflict();
        jQuery(document).ready(function($) {
            $("#filter_zone").val(<?php echo $filter_zone; ?>);
            
            /*$('#filter_zone').change(function() {
                var zone = $("#filter_zone").val();
                $.post("index.php?option=com_googlemaplocation&view=location&layout=googlemap", { filter_zone: zone },
                function(data) {
                    $( "#map_canvas" ).html( data );                  
                });
            });*/
        });
        </script>

		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript">
			function initialize() {
                <?php
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
             
				var latlng = new google.maps.LatLng(<?php echo $loc_x; ?>,<?php echo $loc_y; ?>);
				var settings = {
					zoom: <?php echo $zoom_rate; ?>,
					center: latlng,
					mapTypeControl: true,
					//mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
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
                                title: "<?php echo $row->name; ?>",
            					zIndex: <?php echo $row->id; ?>
                            });
                        
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
        <form name="filter" action="#" method="post">
            <!-- onchange="this.form.submit()" -->
            <select name="filter_zone" id="filter_zone" class="inputbox" onchange="this.form.submit()">
    			<option value=""><?php echo JText::_('JOPTION_SELECT_ZONE');?></option>
    			<?php echo JHtml::_('select.options', $this->filter_zone); ?>
    		</select>
            <?php    
                foreach($this->tList as $tList){
                    if($filter_type){
                        if(in_array($tList->id, $filter_type)){
                            $checked = 'checked';
                        }else{
                            $checked = '';
                        }
                    }                   
            ?>
                <input type="checkbox" name="filter_type[]" id="filter_type" value="<?php echo $tList->id; ?>" onchange="this.form.submit()" <?php echo $checked; ?> /> <?php echo $tList->type; ?>
            <?php } ?>
        </form>
        <div id="map_canvas" style="width:700px; height:400px"></div>
	</body>
</html>