<?php
/**
 * @version		Starter Template 1.0
 * @copyright	Copyright (C) 2011 Virtuosi Media.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
?>
<?php echo '<?'; ?>xml version="1.0" encoding="<?php echo $this->_charset ?>"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
    <head>
        <jdoc:include type="head" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/screen.css" type="text/css" />
    </head>
    <body>
        <div id="container">
            <div id="header">
                <h1>
                    <a href="#" title="Store Locator">
                        <img alt="Store Locator" src="<?php echo JURI::root(); ?>images/logo.png" width="78" height="79" />
                    </a>
                    <span class="txtLogo">
                        <img alt="" src="<?php echo JURI::root(); ?>images/text_logo.png" width="374" height="37" />
                    </span>
                    <span class="txtDecrTit">Demo Site</span>
                </h1>
            </div><!--header-->
            <div id="main">
                <div id="context">
                    <jdoc:include type="modules" name="left-menu" />
                </div><!--context-->
                <div id="content" class="searchPage">
              
                    <p class="txtResult" id="txtResult"></p>
                    <jdoc:include type="message" />
                    <div class="blockContent">
                        <div class="innerBlockCont">
                            
                            <jdoc:include type="component" />
                            
                            <jdoc:include type="modules" name="under-component" />
                            
                        </div><!--innerBlockCont-->
                    </div><!--blockContent-->

                </div><!--content-->
            </div><!--main-->
        </div><!--container-->	

        <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery-1.6.2.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery-ui-1.8.14.custom.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/functions.js"></script>
        <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/start.js"></script>
    </body>
</html>