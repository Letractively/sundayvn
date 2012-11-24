<?php
/* ------------------------------------------------------------------------
  # En Masse - Social Buying Extension 2010
  # ------------------------------------------------------------------------
  # By Matamko.com
  # Copyright (C) 2010 Matamko.com. All Rights Reserved.
  # @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
  # Websites: http://www.matamko.com
  # Technical Support:  Visit our forum at www.matamko.com
  ------------------------------------------------------------------------- */

defined('_JEXEC') or die('Restricted access');
require_once(dirname(__FILE__) . DS . 'helper.php');
require_once(JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."helpers". DS ."EnmasseHelper.class.php");

$version = new JVersion;
$joomla = $version->getShortVersion();
if(substr($joomla,0,3) >= 1.6){
    $extension = 'com_enmasse16';   
}else{
	$extension = 'com_enmasse';  
}
//load language package
$language = JFactory::getLanguage();
$base_dir = JPATH_SITE.DS.'components'.DS.'com_enmasse';
if(!$language->load($extension, $base_dir, $language->getTag(), true))
{
	 $language->load($extension, $base_dir, 'en-GB', true);
}
$theme =  EnmasseHelper::getThemeFromSetting();

$locationList = ModEnmasseYourLocationHelper::getPublishedLocation();

$oDefault = new JObject();
$oDefault->name = JText::_('SUBSCR_CHOOSE_ONCE_LOCATION');
$oDefault->id   = '';

array_unshift($locationList, $oDefault);

$locationId = JRequest::getInt('CS_SESSION_LOCATIONID', null, 'COOKIE');
            
if (!$locationId) {
    $sLocName = JText::_("NO_LOCATION_CHOOSEN");
} else {
    $sLocName = ModEnmasseYourLocationHelper::getLocationName($locationId);
}
JFactory::getDocument()->addScript('components/com_enmasse/theme/js/jquery/jquery-1.6.2.min.js');
JFactory::getDocument()->addScript('components/com_enmasse/theme/js/jquery/ui/jquery.ui.core.js');
JFactory::getDocument()->addScript('components/com_enmasse/theme/js/jquery/ui/jquery.ui.widget.js');
JFactory::getDocument()->addScript('components/com_enmasse/theme/js/jquery/ui/jquery.ui.mouse.js');
JFactory::getDocument()->addScript('components/com_enmasse/theme/js/jquery/ui/jquery.ui.button.js');
JFactory::getDocument()->addScript('components/com_enmasse/theme/js/jquery/ui/jquery.ui.dialog.js');
JFactory::getDocument()->addScript('components/com_enmasse/theme/js/jquery/ui/jquery.ui.position.js');
JFactory::getDocument()->addScript('components/com_enmasse/theme/js/jquery/ui/jquery.ui.draggable.js');
JFactory::getDocument()->addScript('components/com_enmasse/theme/js/jquery/ui/jquery.ui.resizable.js');
JFactory::getDocument()->addScript('components/com_enmasse/theme/js/jquery/ui/jquery.effects.core.js');

JFactory::getDocument()->addStyleSheet("components/com_enmasse/theme/js/jquery/themes/$theme/jquery.ui.all.css")
?>

<link href="modules/mod_enmasse_your_location/css/style.css" rel="stylesheet" type="text/css" />

<div>
	<h3><?php echo JText::_("ENMASSE_YOUR_LOCATION_TITLE")?></h3>
	<div class="module_content">
	<h4><?php echo $sLocName;?></h4>
	<a href="#" onclick="return showPopup()"><input type="button" value="<?php echo JText::_('CHANGE_CITY')?>" class="button" title="<?php echo JText::_('TOOLTIP_CHANGE_LOCATION'); ?>"/></a>
	</div>
</div>
<div id="boxes">
    <div id="dialog<?php echo $module->id?>" style="display:none; " title="<?php echo JText::_("CHANGE_YOUR_LOCATION")?>">
    		<div id="dialog<?php echo $module->id?>_notice_area" class="enmasse_error" style="color:red;"></div>
    		<div style="height:20px"></div>
            <form action='index.php' name="frmSubmitLocation" id="frmSubmitLocation<?php echo $module->id?>">
                <input type="hidden" name="option" value="com_enmasse" />
                <input type="hidden" name='controller' value="deal" />
                <input type="hidden" name="task" value="dealSetLocationCookie" />
               	<?php echo JHTML::_('select.genericList', $locationList, 'locationId', null, 'id', 'name', '', 'locationId'.$module->id); ?>
            </form>
             
    </div>
    <div id="mask"></div>
</div>

<script type="text/javascript"> 

	function showPopup(){
		$("#dialog<?php echo $module->id?>").dialog({	modal: true,
								width: 350,
								buttons:{
									"<?php echo JText::_("SUBMIT_YOUR_LOCATION")?>": function (){
										var locationId = $("select#locationId<?php echo $module->id?>");
										
										if(locationId.val() == '')
										{
											$("#dialog<?php echo $module->id?>_notice_area").text("<?php echo JText::_('LOCATION_INVALID_MSG')?>");
											locationId.addClass( "ui-state-error" );
											return false;
										}
										
										$("#dialog<?php echo $module->id?>").dialog( "destroy" );
										$("#frmSubmitLocation<?php echo $module->id?>").submit();
										return false;										
									},
									"<?php echo JText::_("CANCEL")?>": function (){
										$('#notice_area').text('');
										$("#dialog<?php echo $module->id?>").dialog( "destroy" );
										return false;
									}
								},
								 close: function() {
									$("#dialog<?php echo $module->id?>_notice_area").text('');
						        }
		});
		
		return false;
	}
	
</script>