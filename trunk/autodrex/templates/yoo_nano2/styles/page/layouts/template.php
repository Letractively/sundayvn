<?php

// get template configuration
include($this['path']->path('layouts:template.config.php'));
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr" >


<head>
<?php echo $this['template']->render('head'); ?>
</head>

<body id="page" class="page <?php echo $this['config']->get('body_classes'); ?>" data-config='<?php echo $this['config']->get('body_config','{}'); ?>'>

	<?php if ($this['modules']->count('absolute')) : ?>
	<div id="absolute">
		<?php echo $this['modules']->render('absolute'); ?>
	</div>
	<?php endif; ?>
	
	<div class="wrapper clearfix"><div>

		<header id="header">

			<?php if ($this['modules']->count('toolbar-l + toolbar-r') || $this['config']->get('date')) : ?>
			<div id="toolbar" class="clearfix">

		
				<div class="float-left">
				
				
				<?php
$db = JFactory::getDbo();
$db->setQuery("SELECT id,name FROM #__enmasse_location WHERE published = 1");
$locations = $db->loadAssocList();


$db->setQuery("SELECT id,name FROM #__enmasse_category WHERE published = 1");

$categories =$db->loadAssocList();




?>
<style>
 .search-deal div{float:left; margin-right:10px;padding-bottom:0px;}
.search-deal{ margin:0px;}

</style>
<div class="search-deal">
		
			<form action="./" method="get">
				<input type="hidden" name="option" id="option" value="com_enmasse"/>
				<input type="hidden" name="controller" id="controller" value="deal"/>
				<input type="hidden" name="task" id="task" value="display"/>
				
						
						<div style="margin-left:20px;"><input type="text" name="keyword" size="20" value="Search Deals..."></div>
						<div><select id="locationId" name="locationId">
                        		<option value="" selected="selected">Select Location</option>
                                <?php foreach(  $locations as $location){?>
                                <option value="<?php echo $location['id']; ?>"><?php echo $location['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div><select id="categoryId" name="categoryId">
                                <option value="">Select Category</option>
                                <?php foreach( $categories as $category){?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                <?php } ?>
                        	</select>
                        </div>
						<div>
							<select name="sortBy">
							<option value="">(Sort By)</option>
							<option value="name">Deal Name</option>
							<option value="end_at">End date</option>
							<option value="price">Price</option>
							</select>
						</div>
						<div><input type="submit" class="button" value="Search"></div>
					
			</form>
		
	</div>
					<?php // echo $this['modules']->render('toolbar-l'); ?>
					
				</div>
			
					
				<?php if ($this['modules']->count('toolbar-r')) : ?>
				<div class="float-right">
                	<div class="greeting_msg"><?php  if(JFactory::getUser()->get('guest')){ ?>	<?php  ?> <?php echo $this['modules']->render('logintop'); ?><?php } else { ?> 
			
			<a style="font-weight:bold; color:white; text-decoration:none" href="<?php echo JRoute::_('index.php?option=com_users&view=profile'); ?>">
							<span style="color:##BEBEBE">Welcome</span> <?php echo JFactory::getUser()->name; ?> &nbsp;
						</a>
						<a style="color:#1EC2E2" href="<?php echo JRoute::_('index.php?option=com_enmasse&view=partner'); ?>">
							<?php echo JText::_("Partner section")?>
						</a>	
						<a style="color:#1EC2E2" href="<?php echo JRoute::_('index.php?option=com_enmasse&controller=salesPerson&task=logout'); ?>">
							<?php echo JText::_("Sign out")?>
						</a>
			<?php } ?></div>
                </div>
				<?php endif; ?>
				
			</div>
			<?php endif; ?>

			<?php if ($this['modules']->count('logo + headerbar')) : ?>	
			<div id="headerbar" class="clearfix">
			
				<?php if ($this['modules']->count('logo')) : ?>	
				<a id="logo" href="<?php echo $this['config']->get('site_url'); ?>/index.php/home"><?php echo $this['modules']->render('logo'); ?></a>
				<?php endif; ?>
				
				<?php if($this['modules']->count('headerbar')) : ?>
				<?php echo $this['modules']->render('headerbar'); ?>
				<?php endif; ?>
				
			</div>
			<?php endif; ?>

			<?php if ($this['modules']->count('menu + search')) : ?>
			<div id="menubar" class="clearfix">
				
				<?php if ($this['modules']->count('menu')) : ?>
				<nav id="menu"><?php echo $this['modules']->render('menu'); ?></nav>
				<?php endif; ?>

				<?php if ($this['modules']->count('search')) : ?>
				<div id="search"><?php echo $this['modules']->render('search'); ?></div>
				<?php endif; ?>
				
			</div>
			<?php endif; ?>
		
			<?php if ($this['modules']->count('banner')) : ?>
			<div id="banner"><?php echo $this['modules']->render('banner'); ?></div>
			<?php endif; ?>
		
		</header>

		<?php if ($this['modules']->count('top-a')) : ?>
		<section id="top-a" class="grid-block"><?php echo $this['modules']->render('top-a', array('layout'=>$this['config']->get('top-a'))); ?></section>
		<?php endif; ?>
		
		<?php if ($this['modules']->count('top-b')) : ?>
		<section id="top-b" class="grid-block"><?php echo $this['modules']->render('top-b', array('layout'=>$this['config']->get('top-b'))); ?></section>
		<?php endif; ?>
		
		<?php if ($this['modules']->count('innertop + innerbottom + sidebar-a + sidebar-b') || $this['config']->get('system_output')) : ?>
		<div id="main" class="grid-block">

			<div id="maininner" class="grid-box">

				<?php if ($this['modules']->count('innertop')) : ?>
				<section id="innertop" class="grid-block"><?php echo $this['modules']->render('innertop', array('layout'=>$this['config']->get('innertop'))); ?></section>
				<?php endif; ?>

				<?php if ($this['modules']->count('breadcrumbs')) : ?>
				<section id="breadcrumbs"><?php echo $this['modules']->render('breadcrumbs'); ?></section>
				<?php endif; ?>

				<?php if ($this['config']->get('system_output')) : ?>
				<section id="content" class="grid-block"><?php echo $this['template']->render('content'); ?></section>
				<?php endif; ?>

				<?php if ($this['modules']->count('innerbottom')) : ?>
				<section id="innerbottom" class="grid-block"><?php echo $this['modules']->render('innerbottom', array('layout'=>$this['config']->get('innerbottom'))); ?></section>
				<?php endif; ?>

			</div>
			<!-- maininner end -->
			
			<?php if ($this['modules']->count('sidebar-a')) : ?>
			<aside id="sidebar-a" class="grid-box"><?php echo $this['modules']->render('sidebar-a', array('layout'=>'stack')); ?></aside>
			<?php endif; ?>
			
			<?php if ($this['modules']->count('sidebar-b')) : ?>
			<aside id="sidebar-b" class="grid-box"><?php echo $this['modules']->render('sidebar-b', array('layout'=>'stack')); ?></aside>
			<?php endif; ?>

		</div>
		<?php endif; ?>
		<!-- main end -->

		<?php if ($this['modules']->count('bottom-a')) : ?>
		<section id="bottom-a" class="grid-block"><?php echo $this['modules']->render('bottom-a', array('layout'=>$this['config']->get('bottom-a'))); ?></section>
		<?php endif; ?>
		
		<?php if ($this['modules']->count('bottom-b')) : ?>
		<section id="bottom-b" class="grid-block"><?php echo $this['modules']->render('bottom-b', array('layout'=>$this['config']->get('bottom-b'))); ?></section>
		<?php endif; ?>
		
		<?php if ($this['modules']->count('footer + debug') || $this['config']->get('warp_branding') || $this['config']->get('totop_scroller')) : ?>
		<footer id="footer">

			<?php if ($this['config']->get('totop_scroller')) : ?>
			<a id="totop-scroller" href="#page"></a>
			<?php endif; ?>

			<?php
				echo $this['modules']->render('footer');
				$this->output('warp_branding');
				echo $this['modules']->render('debug');
			?>

		</footer>
		<?php endif; ?>

	</div></div>
	
	<?php echo $this->render('footer'); ?>
	
</body>
</html>