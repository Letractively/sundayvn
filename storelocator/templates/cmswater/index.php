<?php
/**
 * Author       Luis Posselt
 * Website      CMSTeachings.com
 * @license		GNU/GPL
**/
defined('_JEXEC') or die;
define( 'YOURBASEPATH', dirname(__FILE__) );
/* The following line gets the application object for things like displaying the site name */

$app                    = JFactory::getApplication();
$templateparams     	= $app->getTemplate(true)->params;
$generator              = $this->params->get('generator');
$mootools_core_enabled  = ($this->params->get("mootools_core_enabled", 1)  == 0)?"false":"true";
$mootools_more_enabled  = ($this->params->get("mootools_more_enabled", 1)  == 0)?"false":"true";
$caption_enabled        = ($this->params->get("caption_enabled", 1)  == 0)?"false":"true";
$cmstraining			= "http://cmsteachings.com/joomla-tutorials-beginners";
$cmsteachings			= "Joomla Tutorials for Beginners";
$cmsbeginners			= "Beginners";
$evengrid				= "4";
$oddgrid				= "2";
?>
<!DOCTYPE html>

<html lang="<?php echo $this->language; ?>">
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes" />
   <jdoc:include type="head" />
   <?php if ($generator): ?>
   <?php $this->setGenerator($templateparams->get('generator'));?>
   <?php endif;?>
   <?php
   require(YOURBASEPATH . DS . "optimizer.php");
   ?>
   <?php
   if ($this->countModules('left') == 0):?>
   <?php $evengrid		= "0";?>
   <?php endif; ?>
   <?php
   if ($this->countModules('right') == 0):?>
   <?php $oddgrid		= "0";?>
   <?php endif; ?>
   <link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/water.css" rel="stylesheet" type="text/css" />
   <!--[if lte IE 9]>
   <link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/water-ie9.css" rel="stylesheet" type="text/css" />
   <![endif]-->
   <!--[if lte IE 8]>
   <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
   <link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/water-ie8.css" rel="stylesheet" type="text/css" />
   <![endif]-->
   <!--[if lte IE 7]>
   <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
   <link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/water-ie7.css" rel="stylesheet" type="text/css" />
   <![endif]-->
   <!--[if lte IE 6]>
   <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/jquery-1.2.6.min.js"></script>
   <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/jquery.ie6blocker.js"></script>
   <![endif]-->
</head>

<body>
    <div id="mainWrapper">
        <div id="topBar">
            <div id="lefttopmenu">
                <jdoc:include type="modules" name="lefttopmenu" style="none" />
            </div>
            <div id="social">
                <jdoc:include type="modules" name="social" style="none" />
            </div>
        </div>
        <div id="header">
            <div id="logo">
                <jdoc:include type="modules" name="logo" style="none" />
            </div>
            <div id="banner">
                <jdoc:include type="modules" name="banner" style="none" />
            </div>
        </div>
        <?php if($this->countModules('search')) : ?>
            <div id="search">
                <jdoc:include type="modules" name="search" style="none" />
            </div>
        <?php endif; ?>
        <?php if($this->countModules('mainmenu')) : ?>
            <div id="menu-left-wing"></div>
            <div id="menu-right-wing"></div>
            <div id="mainMenu">
                <jdoc:include type="modules" name="mainmenu" style="none" />
            </div>
        <?php endif; ?>
        <?php if($this->countModules('showcase')) : ?>
            <div id="show-left-wing"></div>
            <div id="show-right-wing"></div>
            <div id="showcase">
                <jdoc:include type="modules" name="showcase" style="none" />
            </div>
        <?php endif; ?>
        <div id="colmask" class="grid_<?php echo (12-$evengrid-$oddgrid);?>">
            <div id="colmid" class="grid_<?php echo (12-$evengrid-$oddgrid);?>">
                <div id="colleft" class="grid_<?php echo (12-$evengrid-$oddgrid);?>">
                    <div id="centerColumn" class="grid_<?php echo (12-$evengrid-$oddgrid);?>">
                        <?php if($this->countModules('breadcrumb')) : ?>
                            <div id="breadcrumb">
                                <jdoc:include type="modules" name="breadcrumb" style="none" />
                            </div>
                        <?php endif; ?>
                        <div id="mainContent">
                        	<jdoc:include type="message" />
                            <jdoc:include type="component" />
                        </div>
                    </div>
                    <?php if($this->countModules('left')) : ?>
                        <div id="leftColumn" class="grid_<?php echo (12-$evengrid-$oddgrid);?>">
                            <jdoc:include type="modules" name="left" style="xhtml" />
                        </div>
                    <?php endif; ?>
                    <?php if($this->countModules('right')) : ?>
                        <div id="rightColumn" class="grid_<?php echo (12-$evengrid-$oddgrid);?>">
                            <jdoc:include type="modules" name="right" style="xhtml" />
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if($this->countModules('footer')) : ?>
            <div id="footer">
                <jdoc:include type="modules" name="footer" style="none" />
            </div>
        <?php endif; ?>
        <div id="<?php echo ($cmsbeginners);?>">
        <a href="<?php echo ($cmstraining);?>"><?php echo ($cmsteachings);?></a>
        </div>
        <jdoc:include type="modules" name="debug" style="none" />
    </div>
</body>
</html>