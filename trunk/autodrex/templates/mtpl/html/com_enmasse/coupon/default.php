<?php
/*------------------------------------------------------------------------
# En Masse - Social Buying Extension 2010
# ------------------------------------------------------------------------
# By Matamko.com
# Copyright (C) 2010 Matamko.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.matamko.com
# Technical Support:  Visit our forum at www.matamko.com
-------------------------------------------------------------------------*/
$varList 		= $this->varList;
$elementList 	= $this->elementList;
if(!EnmasseHelper::is_urlEncoded($this->bgImageUrl))
 {
 	$bgImageUrl = $this->bgImageUrl;
 }
 else
 {
	$imageUrlArr= unserialize(urldecode($this->bgImageUrl));
	$bgImageUrl = str_replace("\\","/",$imageUrlArr[0]);
 }
 
?>
<?php
	$mystyle = ''; $m_style = '';
	for($i=0 ; $i < count($elementList); $i++){
		$mystyle .= '#couponImage .'.$elementList[$i]->name.' {';
		$mystyle .= 'overflow: hidden; position: absolute;';
		$mystyle .= 'left:'.$elementList[$i]->x.';';
		$mystyle .= 'top:'.$elementList[$i]->y.';';
		$mystyle .= 'width:'.$elementList[$i]->width.';';
		$mystyle .= 'height:'.$elementList[$i]->height.';';
		$mystyle .= 'font-size:'.$elementList[$i]->font_size.';';
		$mystyle .= '} ';
		
		$m_style .= '#couponImage .'.$elementList[$i]->name.' {';
		$m_style .= 'overflow: hidden; position: absolute;';
		$m_style .= 'left:'.(int)(((int)$elementList[$i]->x)/2.3).';';
		$m_style .= 'top:'.(int)(((int)$elementList[$i]->y)/2.3).';';
		$m_style .= 'width:'.(int)(((int)$elementList[$i]->width)/2.3).';';
		$m_style .= 'height:'.(int)(((int)$elementList[$i]->height)/2.3).';';
		$m_style .= 'font-size:'.(int)(((int)$elementList[$i]->font_size)/2).'px;';
		$m_style .= '} ';
	}
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 

<style type="text/css">
	div#couponImage 
	{
		z-index:-100px;
		width: 100%;
		height: 429px;   
	    position: relative;
	    overflow: hidden;
	}
	
	div#couponImage div#couponInfo {
		position:absolute;
		left:0px;
		top:0px;
		width: 100%;
		height: 100%;
		z-index:100px;
	}

</style>

<style type="text/css"  media="print">
	<?php echo $mystyle;?>
	div#couponImage 
	{
	    <?php if($bgImageUrl!= "") echo 'background: url('.JURI::base().$bgImageUrl.') no-repeat left top';?>
	}
	#button{
		display:none;
	}
</style>
<style type="text/css"  media="screen">
	<?php echo $mystyle;?>
	div#couponImage 
	{
	    <?php if($bgImageUrl!= "") echo 'background: url('.JURI::base().$bgImageUrl.') no-repeat left top';?>
	}
	#button{
		display:block;
	}
</style>
<script type="text/javascript" src="<?php echo JURI::base();?>/media/system/js/mootools-core.js"></script>
<script type="text/javascript" src="<?php echo JURI::base();?>/media/system/js/mootools-more.js"></script>
<div id="couponImage"">
	<div id="couponInfo">
<?php
$body = "";
for($i=0 ; $i < count($elementList); $i++)
{
	if(!isset($varList[$elementList[$i]->name]))
	{
		if($elementList[$i]->name== 'serial')
		{
			if($varList[$elementList[$i]->name] == '' || $varList[$elementList[$i]->name] == null)
			{
				$num = 'SERIAL';
			}
			else
			{
				$num = 	$varList[$elementList[$i]->name];
			}
			$body.='<div class="'.$elementList[$i]->name.'" id="'.$elementList[$i]->id.'" name="'.$elementList[$i]->name.'">';
				$body .= '<img class="img_code" src="'.JURI::base() .'index.php?option=com_enmasse&controller=barcode&task=generateBarcode&num='.$num.'" />';
			$body.='</div>';	
		}
		else{
		
		$body.='<div  class="'.$elementList[$i]->name.'"  id="'.$elementList[$i]->id.'" name="'.$elementList[$i]->name.'">';
			$body .= "[".strtoupper($elementList[$i]->name)."]";
		$body.='</div>';
		}
	}
	elseif($elementList[$i]->name== 'serial')
	{
		if($varList[$elementList[$i]->name] == '' || $varList[$elementList[$i]->name] == null)
		{
			$num = 'SERIAL';
		}
		else
		{
		$num = 	$varList[$elementList[$i]->name];
		}
		$body.='<div  class="'.$elementList[$i]->name.'"  id="'.$elementList[$i]->id.'" name="'.$elementList[$i]->name.'">';
			$body .= '<img class="img_code"  src="'.JURI::base() .'index.php?option=com_enmasse&controller=barcode&task=generateBarcode&num='.$num.'"/>';
		$body.='</div>';	
	}
	else
	{
	$body.='<div  class="'.$elementList[$i]->name.'"  id="'.$elementList[$i]->id.'" name="'.$elementList[$i]->name.'">';
		$body .= $varList[$elementList[$i]->name];
	$body.='</div>';
	}
}
echo $body;
?>
</div>
</div>

<?php if(JRequest::getVar('editor')==true): ?>
<script type="text/javascript">
	function initCouponEditor(){
		var cont = $('couponInfo');
		if(!cont) return;
		
		//initialize
		var mdTop = 0;
		var mdLeft = 0;
		var mdWidth = 0;
		var mdHeight = 0;
		var curEl = null;
		//create resize icon
		var divResize = new Element('div', {
			'class': 'divResize',
			'styles': {
				'position': 'absolute',
				'bottom': 0,
				'right': 0,
				'width': 10,
				'height': 10,
				'cursor': 'se-resize'
			}
		});
		//inject resize icon
		var els = cont.getChildren();		
		els.each(function(el, index){
			var clone = divResize.clone();
			clone.inject(el);
			clone.addEvents({
				'mouseenter': function(){
				},
				'mouseleave': function(){
				},
				'mousedown': function(e){
					mdTop = e.client.y;
					mdLeft = e.client.x;
					mdWidth = this.getParent().getSize().x;
					mdHeight = this.getParent().getSize().y;
					this.getParent().resizing = true;
					curEl = this.getParent();
					curEl.setStyle('z-index', 1000);
					curEl.removeEvents();
				}				
			});
			el.setStyles({
				'cursor': 'move',
				'z-index': 999
			});
			el.makeDraggable();
		});
		cont.addEvents({
			'mousemove': function(e){
				if(curEl && curEl.resizing){
					var size = curEl.getSize();
					curEl.setStyles({
						'width': mdWidth + e.client.x - mdLeft,
						'height': mdHeight + e.client.y - mdTop
					});
				}
			},
			'mouseup': function(e){
				if(curEl){
					var size = curEl.getSize();
					curEl.setStyles({
						'width': mdWidth + e.client.x - mdLeft,
						'height': mdHeight + e.client.y - mdTop
					});
					curEl.resizing = false;
					curEl.removeEvents();
					curEl.makeDraggable();
					curEl.setStyle('z-index', 999);
					curEl = null;
				}
			}
		});
	}
	window.addEvent('domready', function(e){
		initCouponEditor();
	});
</script>
<?php endif; ?>
	<div id="button">
	<form>
		<input type="button" value="<?php echo JText::_('COUPON_PRINT_BUTTON');?>" onClick="window.print();">
	</form>
	</div>