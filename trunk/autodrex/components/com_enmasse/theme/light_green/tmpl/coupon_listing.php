<?php


$invtyList = $this->invtyList;
$deal = $this->deal;
?>
<div class="deal">
	<div class="main_deal">
		<?php $count = 0;?>
		<h3><?php echo JText::_('COUPON_MESSAGE');?> "<?php echo $deal->name ?>":</h3>
		<table>
		<?php foreach ($invtyList as $invty):?>
			<?php $link = "index.php?option=com_enmasse&controller=coupon&task=generate&invtyName=".$invty->name
			          ."&token=".EnmasseHelper::generateCouponToken($invty->name);
			          ?>
			<tr>
				<td><?php echo JText::_('COUPON');?>: <?php echo $invty->name;?></td>
				<td>
					<a href="<?php echo JRoute::_($link) ?>" target="_blank"><?php echo JText::_('COUPON_PRINT_LINK');?></a>
				</td>
			</tr>	
		<?php endforeach;?>
		</table>
	</div>
	<div class="deal_bottom"></div>
</div>