<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted index access' );

if(is_dir (JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."helpers"))
{
	require_once(JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."helpers". DS ."EnmasseHelper.class.php");
 	$theme =  EnmasseHelper::getThemeFromSetting();
 	if($theme == 'apollo_black') {$img = 'apollo_black.jpg';$color='#000000';}
 	else if($theme == 'apollo_red') {$img = 'apollo_red.jpg'; $color='#d34b63';}
	else if($theme == 'apollo_green') {$img = 'apollo_green.jpg'; $color='#8acfa3';}
	else $img = null;
 }
 
 //load jQuery library
 JFactory::getDocument()->addScript('components/com_enmasse/theme/js/jquery/jquery-1.6.2.min.js');
 JFactory::getDocument()->addStyleSheet('components/com_enmasse/theme/' . $theme . '/css/screen.css');
 JHtml::_('behavior.framework');
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
	<link rel="shortcut icon" href="images/favicon.ico" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
	<jdoc:include type="head" />
	<!--[if IE]>
	<![endif]-->
</head>
<body class="page_bg" >

<div id="wrapper1">

	<div class="page">
		<div class="header">
			 <div class="top">
			 	
			 	<div class="top_menu">
			 		<jdoc:include type="modules" name="position-main-menu" />
			 	</div>
			 	<div class="sign_in">
			 		<?php if(JFactory::getUser()->get('guest')):?>
			 			<jdoc:include type="modules" name="position-login-menu" />
			 		<?php else :?>
			 			<jdoc:include type="modules" name="position-logout-menu" />
			 		<?php endif?>
			 	</div>
			 	
			 </div>
 		</div>
		<div class="wrapper">
			<div class="main">
				<?php $sStyle = ($this->countModules('right'))? 'maincol_right' : 'maincol_full'?>
				<div class="<?php echo $sStyle?>">
					<jdoc:include type="message" />
					<jdoc:include type="component" />
				</div>
			</div>
			<?php if ($this->countModules('right')):?>
				<div class="rightcol">
					<jdoc:include type="modules" name="right" style="rounded" />
				</div>
			<?php endif;?>
			<div class="clr"></div>
		</div>
	</div>
    
</div>	
</body>
</html>