<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted index access' );

//Social Login
require_once( JPATH_SITE . DS ."components". DS ."com_enmasse". DS ."helpers". DS . "sociallogin" . DS . "config" . DS . "fbconfig.php");

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
JFactory::getDocument()->addScript('components/com_enmasse/theme/js/jquery/jquery-1.7.2.min.js');
JFactory::getDocument()->addScript('components/com_enmasse/theme/js/jquery/jquery.validate.min.js');
JFactory::getDocument()->addScript('components/com_enmasse/theme/js/jquery/jquery.noconflict.js');
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
	<!-- Facebook API -->
	<div id="fb-root"></div>
	<script>
	window.fbAsyncInit = function() {
		FB.init({
			appId      : '<?php echo FB_APP_ID; ?>', // App ID
			channelUrl : '', // Channel File
			status     : true, // check login status
			cookie     : true, // enable cookies to allow the server to access the session
			xfbml      : true  // parse XFBML
		});
	};
	function fb_login(){
		FB.login(function(response) {
			if (response.authResponse) {
				console.log('Welcome!  Fetching your information.... ');
				//console.log(response); // dump complete info
				access_token = response.authResponse.accessToken; //get access token
				user_id = response.authResponse.userID; //get FB UID

				FB.api('/me', function(response) {
					user_email = response.email; //get user email
					// you can store this data into your database
					document.forms["socialLogin"].elements["isLoginWithFacebook"].value = 1;
					document.forms["socialLogin"].submit()
				});

			} else {
				//user hit cancel button
				console.log('User cancelled login or did not fully authorize.');

			}
		}, {
			scope: 'email'
		});
	}
	// Load the SDK Asynchronously
	(function(d){
		var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement('script'); js.id = id; js.async = true;
		js.src = "//connect.facebook.net/en_US/all.js";
		ref.parentNode.insertBefore(js, ref);
	}(document));
	</script>
	<!-- End - Facebook API -->
	<!-- Begin - Social Login Form -->
	<form name='socialLogin' method='post' action="<?php echo JRoute::_('index.php?option=com_enmasse&controller=authentication&task=login'); ?>">
		<input type='hidden' name='isLoginWithFacebook' value='0'>
		<input type='hidden' name='isLoginWithTwitter' value='0'>
		<input type='hidden' name='isLoginWithGoogle' value='0'>
		<input type="hidden" name="return" value="<?php echo isset($_GET['return']) ? $_GET['return'] : 'Lw' ?>" />
		<input type="hidden" name="option" value="com_enmasse" />
		<input type="hidden" name="controller" value="authentication" />
		<input type="hidden" name="task" value="login" />
		<?php echo JHtml::_('form.token');?>
	</form>
	<!-- End -  Social Login Form -->
	
	<div class="page">
		<div class="header">
			 <div class="top">
			 	<div class="logo">
			 		<a href="<?php echo $this->baseurl ;?>"><img src="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/images/logo.png"></img></a>
			 	</div>
			 	<div class="top_menu">
			 		<jdoc:include type="modules" name="position-main-menu" />
			 	</div>

			 	<?php if(JFactory::getUser()->get('guest')):?>
					<div class="sign_in" style="display:block; margin:0;">
						<div style="padding: 5px 0 0px 0;">
							<div style="display:inline-block; vertical-align: middle;">
								<a href="javascript:void(0)" onclick="fb_login();">
									<img width="20" height="20" src="<?php echo JURI::base() ?>components/com_enmasse/helpers/sociallogin/images/fb_login.png" />
								</a>
								<a href="javascript:void(0)" onclick='document.forms["socialLogin"].elements["isLoginWithGoogle"].value = 1; document.forms["socialLogin"].submit()'>
									<img width="20" height="20" src="<?php echo JURI::base() ?>components/com_enmasse/helpers/sociallogin/images/google_login.png" />
								</a>
								<a href="javascript:void(0)" onclick='document.forms["socialLogin"].elements["isLoginWithTwitter"].value = 1; document.forms["socialLogin"].submit()'>
									<img width="20" height="20" src="<?php echo JURI::base() ?>components/com_enmasse/helpers/sociallogin/images/tw_login.png" />
								</a>
							</div>
						</div>
						<div style="height:40%; padding-top:5px">
							<jdoc:include type="modules" name="position-login-menu" />
						</div>
					</div>
			 	<?php else :?>
					<div class="sign_in">
						<a style="font-weight:bold; color:white; text-decoration:none" href="<?php echo JRoute::_('index.php?option=com_users&view=profile'); ?>">
							<?php echo JFactory::getUser()->name; ?> &nbsp;
						</a>
						<a style="color:#1EC2E2" href="<?php echo JRoute::_('index.php?option=com_enmasse&controller=authentication&task=logout'); ?>">
							<?php echo JText::_("SIGN_OUT")?>
						</a>
						<jdoc:include type="modules" name="position-logout-menu" />
					</div>
			 	<?php endif?>
			 	
			 	
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
	<div class="footer_full">
		<div class="footer">
			<ul>
				<li>
					<h4>User Guides</h4>
					<jdoc:include type="modules" name="footer-columns-1" />
				</li>
				<li>
					<h4>Follow Us</h4>
					<jdoc:include type="modules" name="footer-columns-2" />
				</li>
				<li>
					<h4>Working With Us</h4>
					<jdoc:include type="modules" name="footer-columns-3" />
				</li>
			
				<li>
					<h4>Company</h4>
					<jdoc:include type="modules" name="footer-columns-4" />
				</li>
				<li class="footer_img">
					<a href="/"><img src="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/images/logo.png" /></a>
				</li>
			</ul>
			<div id="footer_bottom">&copy; 2011 <a href="<?php echo $this->baseurl ;?>">En Masse</a>, Inc. All Rights Reserved.</div>
		</div>
	</div>
	
</body>
</html>