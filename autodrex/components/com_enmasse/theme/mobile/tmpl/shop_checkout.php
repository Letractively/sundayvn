<?php

require_once(JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."helpers". DS ."EnmasseHelper.class.php");

 	

$theme =  EnmasseHelper::getThemeFromSetting();//getThemeFromSetting();

JFactory::getDocument()->addScript("components/com_enmasse/theme/js/jquery/jquery-1.6.2.min.js");

JFactory::getDocument()->addScriptDeclaration('jQuery.noConflict()');

$juser = JFactory::getUser();

$oItem = array_pop($this->cart->getAll());//addnew

JHTML::_('behavior.formvalidation');

$buy4friend = JRequest::getVar('buy4friend',''); 

$buy4friend = $buy4friend?'<input type="hidden" name="buy4friend" value="1"/>':'';

?>



<div class="row row_list">

	<div class="row_space">

	<?php include "cart_manage.php";?>

	</div>

</div>



<div class="row row_list">

<form action='index.php' id="orderDetail" name="orderDetail"  class="form-validate" method="post" onSubmit="return myValidate(this);">



	<b><?php echo JText::_('SHOP_CARD_CHECK_OUT_MESSAGE_LINE1');?></b>

	<br />

	<i><?php echo JText::_('SHOP_CARD_CHECK_OUT_MESSAGE_LINE2');?></i> 

			<div class="infor_person_wrapper">

				<div class="infor_person_header">

					

				</div>

				<table class="infor_person">

					<tr>

						<td align="left"><?php echo JText::_('SHOP_CARD_CHECK_OUT_PERSON_NAME');?></td>

						<td><input type="text" name="name" id="name" value="<?php echo $this->arData['name']?>" class="required text" /></td>

					</tr>

					<tr>

						<td align="left"><?php echo JText::_('SHOP_CARD_CHECK_OUT_PERSON_EMAIL');?></td>

						<td>

							<input type="text" name="email" id="email" 

								value="<?php echo $this->arData['email']?>"

								class="required validate-email text" />

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

						<td align="left"><?php echo JText::_('SHOP_CARD_CHECK_OUT_RECEIVER_NAME');?></td>

						<td>

							<input type="text" name="receiver_name" id="receiver_name" value="<?php echo $this->arData['receiver_name']?>" class="required text" />

						</td>

					</tr>

					<tr>

						<td align="left"><?php echo JText::_('SHOP_CARD_CHECK_OUT_RECEIVER_EMAIL');?></td>

						<td>

							<input type="text" name="receiver_email" id="receiver_email" 

								value="<?php echo $this->arData['receiver_email']?>"

								class="required validate-email text" />

						</td>

					</tr>

					<tr>

						<td align="left"><?php echo JText::_('SHOP_CARD_CHECK_OUT_RECEIVER_MESSAGE');?></td>

						<td>

							<textarea  style="width:100%" name="receiver_msg" id="receiver_msg" ><?php echo $this->arData['receiver_msg']?></textarea>

						</td>

					</tr>

				</table>

				<input type="hidden" name="buy4friend" value="1"/>

			</div>

			<?php endif;?>

			

			

			

			<?php if($oItem->item->prepay_percent < 100)://addnew?>

			<div class="infor_person_wrapper">

				<div class="infor_person_header">

					<b><?php echo JText::_('SHOP_CARD_CHECK_OUT_DERECTLY_DELIVERY_MESSAGE_LINE1');?></b>

					<br />

					<i><?php echo JText::_('SHOP_CARD_CHECK_OUT_DERECTLY_DELIVERY_MESSAGE_LINE2');?></i>

				</div>

				<table class="infor_person">

					<tr>

						<td align="left"><?php echo JText::_('SHOP_CARD_CHECK_OUT_RECEIVER_ADDRESS');?></td>

						<td>

							<input type="text" name="receiver_address" id="receiver_address" value="<?php echo $this->arData['receiver_address']?>" class="required text" />

						</td>

					</tr>

					<tr>

						<td align="left"><?php echo JText::_('SHOP_CARD_CHECK_OUT_RECEIVER_PHONE');?></td>

						<td>

							<input type="text" name="receiver_phone" id="receiver_phone" 

								value="<?php echo $this->arData['receiver_phone']?>"

								class="required text" />

						</td>

					</tr>

					

				</table>

			</div>

			<?php endif;//-------------------------?>

			

			

			



		<?php if($item_price !=0) 

		{?>



		    	<div class="line"><span> <?php echo JText::_('SHOP_CARD_CHECK_OUT_CHOOSE_PAYMENT');?> </span></div>

		      

			        <select name="payGtyId" id="payGtyId" class="required">

					<?php  	if (!$juser->guest) {?>	<option value="99"><?php echo JText::_('Previously Saved Credit Card');?></option><?php } ?>

						<?php 

							$cart = $this->cart;

							$item_price = $cart->getTotalPrice();					

							if($item_price == $cart->getPoint())

							{

								foreach($this->payGtyList as $row):

									if($row->class_name == "point")

									{

										echo "<option value=\"".$row->id."\" SELECTED>".$row->name."</option>";

									}

								endforeach;

							}

							else

							{

								$numberOfPayment = count($this->payGtyList); 						

								foreach($this->payGtyList as $row):

									if($row->class_name != "point")

									{

										if($numberOfPayment==1)

										{

											echo "<option value=\"".$row->id."\" SELECTED>".$row->name."</option>";

										}

										else

										{

											echo "<option value=\"".$row->id."\">".$row->name."</option>";

										}

									}

								endforeach;

							}

							?>

					</select>

		    

		    <?php if (isset($this->termArticleId) && $this->termArticleId!=0):?>

		    			<br />

				        <input type="checkbox" name="agree" id="terms" class="required" <?php if(isset($this->arData['terms'])) echo "checked=\"checked\""?>>

				    	<?php echo JText::_('SHOP_CARD_CHECK_OUT_TERM_CONDITION');?>

				        <a style="float:none" href="<?php echo JRoute::_('index.php?option=com_content&view=article&id='.$this->termArticleId); ?>" target='_blank'>

				        	<?php echo JText::_('SHOP_CARD_CHECK_OUT_TERM_CONDITION_LINK');?>

				    	</a>

			        <?php else:?>

			        	<input type="hidden" name="terms" id="terms" class="required" value="checked">

			        <?php endif;?> 

		        	<input type="hidden" name="check" value="post" /> 

		        	<input type="hidden" name="option" value="com_enmasse" /> 

		        	<input type="hidden" name="controller" value="shopping" /> 

		        	<input type="hidden" name="task" value="submitCheckOut" />		

		<?php }

		 else

		 {

		?>

		   <input type="hidden" name="check" value="post" /> 

		   <input type="hidden" name="option" value="com_enmasse" /> 

		   <input type="hidden" name="controller" value="shopping" /> 

		   <input type="hidden" name="task" value="submitCheckOut" />

		<?php }?>

		

			

		<p align="right">

			<br />

			<input type="button" onclick='validateForm()' class="button_big" value="<?php echo JText::_('PROCESS_CHECK_OUT_BUTTON');?>" />

		</p>

		<div class="clear"></div>

	</form>

</div>


<script language="javascript" type="text/javascript">

	function validateEmail(email) 
{
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

	function validateForm()
	{
		var form = document.orderDetail;
	
		if (form.name.value == "")
		{
			alert("Please enter name!");
			return false;
		}
		
		if (validateEmail(form.email.value)==false)
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
function useprecard()
{
jQuery('#payGtyIdInpt').val('99');
document.orderDetail.submit();
}	
</script>