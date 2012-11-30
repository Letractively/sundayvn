<?php
defined('_JEXEC') or die;
JHTML::_('behavior.framework', false);
$app = JFactory::getApplication();
require_once(JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."helpers". DS ."EnmasseHelper.class.php");
$theme =  EnmasseHelper::getThemeFromSetting();

$c = JRequest::getVar('controller','');
$t = JRequest::getVar('task','');
$v = JRequest::getVar('view','');

if( $c == 'pagement' && $t == 'gateway' || $v == 'paygty' ){
	JFactory::getDocument()->addScript("components/com_enmasse/theme/js/jquery/jquery-1.6.2.min.js");
	JFactory::getDocument()->addScriptDeclaration('jQuery.noConflict()');
}


$page_header = $app->getUserState('staticTitle')?$app->getUserState('staticTitle'):'';
$app->setUserState('staticTitle','');

$menu = & JSite::getMenu();
$view = JRequest::getVar('view');
//$home = ($menu->getActive() == $menu->getDefault() && $view == 'dealtoday')?'home_':'';
$home = ($view == 'dealtoday')?'home_':'';
?>
<html>
<head>
	<jdoc:include type="head" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
	<link type="text/css" rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/screen.css">
	<link type="text/css" rel="stylesheet" href="components/com_enmasse/theme/<?php echo $theme; ?>/css/screen.css" />
</head>

<body class="body">
	<?php include 'header.php';?>
	<div class="row error">
	<jdoc:include type="message" />
	</div>
	<jdoc:include type="component" />
	<div id="footer">
		<?php include 'footer.php';?>
	</div>
	<p><a href='<?=JRoute::_('index.php?option=com_enmasse&controller=deal&task=fullsite');?>'>Go to fullsite</a></p>
	<script type='text/javascript'>
		jQuery(document).ready(function(){
			jQuery('.selectcate').click(function(){
				jQuery('#listCate').toggle();
			});
		});
	</script>
	</body>
</html>