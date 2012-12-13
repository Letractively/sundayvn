<?php
$rows = $this->locationList;
$option = 'com_googlemaplocation';

$filter_zone = JRequest::getVar("filter_zone");
$filter_type = JRequest::getVar("filter_type");
$filter_address = JRequest::getVar("filter_address");
$filter_service = JRequest::getVar("filter_service");

//if (empty($filter_type)) {
//    $filter_type = array();
//    foreach ($this->tList as $key => $list_type) {
//        $filter_type[$key] = $list_type->id;
//    }
//}

// Get value for display googlemap
//if ($filter_zone) {
//    $loc_x = $this->zone->loc_x;
//    $loc_y = $this->zone->loc_y;
//    $zoom_rate = $this->zone->zoom_rate;
//} else {
//    $loc_x = $this->setting->default_locx;
//    $loc_y = $this->setting->default_locy;
//    $zoom_rate = $this->setting->default_zoom;
//}
//
?>
<script src="components/com_googlemaplocation/helpers/jquery.min.js"></script>

<script>
    jQuery.noConflict();
    jQuery(document).ready(function($) {
        
        $("#nav ul li.item-468").addClass("current active");
        $("#nav ul li.item-435").removeClass("current active");
        $("#nav ul li.item-294").removeClass("current active");
        $("#nav ul li.item-238").removeClass("current active");
        
        $("#filter_zone").val(<?php echo $filter_zone; ?>);
        $("#filter_type").val(<?php echo $filter_type; ?>);
        $("#filter_address").val("<?php echo $filter_address; ?>");
        $("#filter_service").val(<?php echo $filter_service; ?>);
        
            var zone = $("#filter_zone").val();
            var type = $("#filter_type").val();
            var service = $("#filter_service").val();
            var address = $("#filter_address").val();
            
        $.post("index.php?option=com_googlemaplocation&controller=location&task=googlemap&tmpl=component", 
        { 
            filter_zone: zone,
            filter_type: type,
            filter_service: service,
            filter_address: address
        },
        function(data) {
            $( "#map_canvas" ).html( data );                  
        });

        $("#submit_value").click(function() {
            var zone = $("#filter_zone").val();
            var type = $("#filter_type").val();
            var service = $("#filter_service").val();
            var address = $("#filter_address").val();
            
           
            $.post("index.php?option=com_googlemaplocation&controller=location&task=googlemap&tmpl=component",
            {
                filter_zone: zone,
                filter_type: type,
                filter_service: service,
                filter_address: address
            },
            function(data) {
                $( "#map_canvas" ).html( data );            
            });
        });
        /**
         * For onchange zone and type
        $('#filter_zone').change(function() {
        var zone = $("#filter_zone").val();
        $.post("index.php?option=com_googlemaplocation&controller=location&task=googlemap&tmpl=component", 
            { 
                filter_zone: zone
            },
        function(data) {
            $( "#map_canvas" ).html( data );            
        });
    });
    $(':checkbox').click(function() {
        var type = [];
        $('#filter_type:checked').each(function() {
            type.push($(this).val());
        });
        var zone = $("#filter_zone").val();
        $.post("index.php?option=com_googlemaplocation&controller=location&task=googlemap&tmpl=component", 
            { 
                filter_zone: zone,
                filter_type: type
            },
        function(data) {
            $( "#map_canvas" ).html( data );            
        });
    });*/
    });
</script>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
    #content { 
        overflow: auto;
        overflow-x: hidden;
        -ms-overflow-x: hidden; /* For IE 8 */
        margin: 0;
        padding: 0;
    }
</style>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false"></script>
<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js"></script>
<br>
<div id="locator">
    <h3 style="margin-bottom: 0px;padding:0px 0px 5px 0px;">Locate Us</h3>
    <div id="search_result"></div>
    <div id="map_canvas" style="width:630px; height:390px"></div>

</div>