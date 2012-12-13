<?php
defined('_JEXEC') or die;

$filter_zone = JRequest::getInt("filter_zone");
$filter_type = JRequest::getInt("filter_type");
$filter_address = JRequest::getString("filter_address");
$filter_service = JRequest::getInt("filter_service");
?>

<script src="<?php echo JURI::root(); ?>components/com_googlemaplocator/helpers/jquery.min.js"></script>

<script>
    jQuery.noConflict();
    jQuery(document).ready(function($) {
        
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
</script>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=true"></script>
<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js"></script>

<div class="map" id="locator">
    <div id="map_canvas" style="width: 100%; height: 20em;"></div>
</div>