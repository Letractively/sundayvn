<?php

require_once(JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."helpers". DS ."EnmasseHelper.class.php");
 	
$theme =  EnmasseHelper::getThemeFromSetting();


JFactory::getDocument()->addStyleSheet('components/com_enmasse/theme/' . $theme . '/css/screen.css');
$oItem = array_pop($this->cart->getAll());
JHTML::_('behavior.modal') ;
JHTML::_('behavior.formvalidation');
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="deal">
	<div class="main_deal">
		<?php include "cart_manage.php";?>
		<div class="h13"></div>
		<form action='index.php' id="orderDetail" name="orderDetail"  class="" method="post" onSubmit="return myValidate(this);">
			<div class="infor_person_wrapper">
				<div class="infor_person_header">
					<b><?php echo JText::_('SHOP_CARD_CHECK_OUT_MESSAGE_LINE1');?></b>
					<br />
					<i>
						<?php echo JText::_('SHOP_CARD_CHECK_OUT_MESSAGE_LINE2');?>
					</i> 
				</div>
				<table class="infor_person">
					<tr>
						<th align="left"><?php echo JText::_('SHOP_CARD_CHECK_OUT_PERSON_NAME');?></th>
						<td><input type="text" name="name" id="name" value="<?php echo $this->arData['name']?>" class="required" /></td>
					</tr>
					<tr>
						<th align="left"><?php echo JText::_('SHOP_CARD_CHECK_OUT_PERSON_EMAIL');?></th>
						<td>
							<input type="text" name="email" id="email" 
								value="<?php echo $this->arData['email']?>"
								class="required validate-email" />
						</td>
					</tr>
				</table>
			</div>
			<?php if(JRequest::getVar('buy4friend')):?>
			<div class="infor_person_wrapper">
				<div class="infor_person_header">
					<b><?php echo JText::_('SHOP_CARD_CHECK_OUT_FOR_FRIEND_MESSAGE_LINE1');?></b>
					<br />
					<i><?php echo JText::_('SHOP_CARD_CHECK_OUT_FOR_FRIEND_MESSAGE_LINE2');?></i>
				</div>
				<table class="infor_person">
					<tr>
						<th align="left"><?php echo JText::_('SHOP_CARD_CHECK_OUT_RECEIVER_NAME');?></th>
						<td>
							<input type="text" name="receiver_name" id="receiver_name" value="<?php echo $this->arData['receiver_name']?>" class="required" />
						</td>
					</tr>
					<tr>
						<th align="left"><?php echo JText::_('SHOP_CARD_CHECK_OUT_RECEIVER_EMAIL');?></th>
						<td>
							<input type="text" name="receiver_email" id="receiver_email" 
								value="<?php echo $this->arData['receiver_email']?>"
								class="required validate-email" />
						</td>
					</tr>
					<tr>
						<th align="left"><?php echo JText::_('SHOP_CARD_CHECK_OUT_RECEIVER_MESSAGE');?></th>
						<td>
							<textarea name="receiver_msg" id="receiver_msg" ><?php echo $this->arData['receiver_msg']?></textarea>
						</td>
					</tr>
				</table>
				<input type="hidden" name="buy4friend" value="1"/>
			</div>
			<?php endif;?>
			<?php if($oItem->item->prepay_percent < 100):?>
			<div class="infor_person_wrapper">
				<div class="infor_person_header">
					<b><?php echo JText::_('SHOP_CARD_CHECK_OUT_DERECTLY_DELIVERY_MESSAGE_LINE1');?></b>
					<br />
					<i><?php echo JText::_('SHOP_CARD_CHECK_OUT_DERECTLY_DELIVERY_MESSAGE_LINE2');?></i>
				</div>
				<table class="infor_person">
					<tr>
						<th align="left"><?php echo JText::_('SHOP_CARD_CHECK_OUT_RECEIVER_ADDRESS');?></th>
						<td>
							<input type="text" name="receiver_address" id="receiver_address" value="<?php echo $this->arData['receiver_address']?>" class="required" />
						</td>
					</tr>
					<tr>
						<th align="left"><?php echo JText::_('SHOP_CARD_CHECK_OUT_RECEIVER_PHONE');?></th>
						<td>
							<input type="text" name="receiver_phone" id="receiver_phone" 
								value="<?php echo $this->arData['receiver_phone']?>"
								class="required validate-numeric" />
						</td>
					</tr>
					
				</table>
			</div>
			<?php endif;?>
		<br/><br/>
		<?php if($item_price !=0) 
		{?>
		
		<div id="Order_Information">
			<div class="top">
		    	<div class="line"><span>Please enter your information:</span></div>
		        <div class="line">
					
					<table class="infor_person">
					<tr><td align="left">Credit Card Number (without spaces): </td><td><input type="text" size="30" maxlength="25" name="x_card_num" value="" /></td></tr>
					<tr><td align="left">Expired Date (MM/YY): </td><td>
						<select name="x_exp_month">
							<option value="01">01</option>
							<option value="02">02</option>
							<option value="03">03</option>
							<option value="04">04</option>
							<option value="05">05</option>
							<option value="06">06</option>
							<option value="07">07</option>
							<option value="08">08</option>
							<option value="09">09</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							</select> / 
						<select name="x_exp_year">
						<?php
							$current_year = date("Y");
							for ($i=$current_year; $i<=($current_year+20); $i++)
							{
								echo "<option value=\"$i\">$i</option>";
							}
						?>
						</select>
						</td>
					</tr>
					<tr><td align="left">CCV: </td><td><input type="text" size="30" maxlength="4" name="x_card_code" class="required validate-numeric" value=""></input></td></tr>
					<tr><td align="left">First Name: </td><td><input type="text" size="30" name="x_first_name" class="required" value=""></input></td></tr>
					<tr><td align="left">Last Name: </td><td><input type="text" size="30" name="x_last_name" class="required" value=""></input></td></tr>
					<tr><td align="left">Email: </td><td><input type="text" size="30" name="x_email" class="required validate-email" value="<?php echo $this->arData['email']?>"></input></td></tr>
					
					</table>
					<button onclick="paypaldo();" style="border: none;background: none;"><img src="/autodrex/components/com_enmasse/theme/dark_blue/images/pay-using-paypal.png" style="border: none;margin-top: 30px;"></button>
                <p style="clear: left;text-align: left;float: left;margin-left: 279px;"><input style="margin-top:0px;" type="checkbox" name="agree" id="agree"  />I agree to all the <a class='modal' href="<?=JRoute::_('index.php?option=com_enmasse&view=term');?>">terms and conditions.</a>
		<br />
			<input type="checkbox" name="save_cc" value='1' />Save credit card for future orders:
		</p>
					<img src="components/com_enmasse/theme/<?php echo $theme?>/images/credit.png" width="350" height="45" />
					<input type="hidden" name="payGtyId" value="4" id="payGtyIdInpt" />
		        	<input type="hidden" name="check" value="post" /> 
		        	<input type="hidden" name="option" value="com_enmasse" /> 
		        	<input type="hidden" name="controller" value="shopping" /> 
		        	<input type="hidden" name="task" value="submitCheckOut" />
		        </div>
		    </div>
           
		    <div class="bottom">
				<input type="button" class="button" value="<?php echo JText::_('PROCESS_CHECK_OUT_BUTTON');?>" onclick="validateForm()"></input>
		    </div>
		</div>
		
		
		<?php }
		 else
		 {
		?>
		   <input type="hidden" name="check" value="post" /> 
		   <input type="hidden" name="option" value="com_enmasse" /> 
		   <input type="hidden" name="controller" value="shopping" /> 
		   <input type="hidden" name="task" value="submitCheckOut" />
		   <div class="bottom">
				<input type="button" class="button" value="<?php echo JText::_('PROCESS_CHECK_OUT_BUTTON');?>" onclick="document.orderDetail.submit();"></input>
		    </div>
		<?php }?>
		</form>
	</div>
	<div class="deal_bottom"></div>
</div>

<script language="javascript" type="text/javascript">
	function validateEmail($email)
	{
	    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	    if( !emailReg.test( $email ) )
	    {
	    	return false;
	    }
	    else
		{
	    	return true;
	    }
	}

	function validateForm()
	{
		var form = document.orderDetail;
		if (form.x_card_num.value == "" || isNaN(form.x_card_num.value))
		{
			alert("Please enter card number!");
			return false;
		}
		if (form.x_card_code.value == "" || isNaN(form.x_card_code.value))
		{
			alert("Please enter card code!");
			return false;
		}
		if (form.x_first_name.value == "")
		{
			alert("Please enter first name!");
			return false;
		}
		if (form.x_last_name.value == "")
		{
			alert("Please enter last name!");
			return false;
		}
		if (validateEmail(form.x_email.value)==false)
		{
			alert("Please enter a valid email!");
			return false;
		}			
		
		if ( form.agree.checked == false ) { alert ( "Please check the Terms & Conditions box." ); return false; }
		
		form.submit();
	}
function paypaldo()
{
jQuery('#payGtyIdInpt').val('2');
document.orderDetail.submit();
}	
</script>

<style>#top-a{display:none;}</style>
