<?php

$point = $this->cart->getPoint();
$cartItem = array_pop($this->cart->getAll());
$price = number_format($cartItem->item->price * $cartItem->item->prepay_percent / 100, 2);
?>
<div style="margin-top:0px"><?php $is_mobile = JRequest::getVar('is_mobile');if (!empty($is_mobile)){	$hosts = 'https://mobile.paypal.com/cgi-bin/webscr';}else{	$hosts = 'https://www.sandbox.paypal.com/cgi-bin/webscr';} ?>
<form action="<?=$hosts?>" method="post" name="_xclick">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<?php echo $this->attributeConfig->merchant_email; ?>">
<input type="hidden" name="lc" value="<?php echo $this->attributeConfig->country_code; ?>">

<input type="hidden" name="no_note" value="1">
<input type="hidden" name="no_shipping" value="1">

<INPUT TYPE="hidden" NAME="amount" value="<?php echo $price; ?>">
<INPUT TYPE="hidden" NAME="quantity" value="<?php echo $this->cart->getTotalItem();?>">
<INPUT TYPE="hidden" NAME="currency_code" value="<?php echo $this->attributeConfig->currency_code; ?>">

<INPUT TYPE="hidden" NAME="cbt" value="Return back to <?php echo $this->systemName ;?>">
<input type="hidden" name="item_name" value="Make Purchase from <?php echo $this->systemName ;?>">
<input type="hidden" name="item_number" value="<?php echo $this->orderDisplayId; ?>">
<INPUT TYPE="hidden" NAME="return" value="<?php echo $this->returnUrl;?>">
<INPUT TYPE="hidden" NAME="cancel_return" value="<?php echo $this->cancelUrl; ?>">
<INPUT TYPE="hidden" NAME="notify_url" value="<?php echo $this->notifyUrl; ?>">

</form>
<?php echo JText::_('PAYPAL_REDIRECT'); ?>
</div>
<script>
    setTimeout(function(){document._xclick.submit()}, 3000);    
</script>
<?php 
	$this->cart->deleteAll();
	JFactory::getSession()->set('cart', null);
?>