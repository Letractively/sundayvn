<?php
/* ------------------------------------------------------------------------
  # En Masse - Social Buying Extension 2010
  # ------------------------------------------------------------------------
  # By Matamko.com
  # Copyright (C) 2010 Matamko.com. All Rights Reserved.
  # @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
  # Websites: http://www.matamko.com
  # Technical Support:  Visit our forum at www.matamko.com
  ------------------------------------------------------------------------- */
// No direct access 
defined( '_JEXEC' ) or die( 'Restricted access' ); 

define("AUTHORIZENET_API_LOGIN_ID", $this->attributeConfig->api_login_id);
define("AUTHORIZENET_TRANSACTION_KEY", $this->attributeConfig->transaction_key);
define("AUTHORIZENET_SANDBOX", $this->attributeConfig->sandbox);
define("TEST_REQUEST", $this->attributeConfig->test_request);
	
require_once 'sdk/AuthorizeNet.php';
$pageURL = 'http';
if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";
if ($_SERVER["SERVER_PORT"] != "80")
{
	$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
}
else
{
	$pageURL .= $_SERVER["SERVER_NAME"];
}

$user  =& JFactory::getUser();
$site =& JFactory::getDocument();
$site->setTitle(JText::_('CHECK_OUT_BUTTON')); 
$cart = $this->cart;
foreach($cart->getAll() as $cartItem) {
	$item = $cartItem; 
}

if(isset($_POST['x_process']))
{
	$transaction = new AuthorizeNetAIM;
    $transaction->setSandbox(AUTHORIZENET_SANDBOX);
    $transaction->setFields(
        array(
        'amount' => $_POST['x_amount'], 
        'card_num' => $_POST['x_card_num'], 
        'exp_date' => $_POST['x_exp_month'] . "/" . $_POST['x_exp_year'],
        'first_name' => $_POST['x_first_name'],
        'last_name' => $_POST['x_last_name'],
        'email' => $_POST['x_email'],
        'card_code' => $_POST['x_card_code'],
        'invoice_num' => $_POST['x_invoice_num'],
        'description' => $_POST['x_description'],
		'type' => $_POST['x_type'],
        )
    );
	if($_POST['x_type'] == "AUTH_ONLY")
	{
		$response = $transaction->authorizeOnly();
	}
	elseif($_POST['x_type'] == "AUTH_CAPTURE")
	{
    	$response = $transaction->authorizeAndCapture();	
	}
	else
	{
		echo "<span style=\"color: red;\">There is an error when making the transaction, please contact Administrator!</span><br/>";
	}
var_dump($response->approved);
    if ($response->approved)
    {
		JFactory::getSession()->set('cart', null);
?>	
		<form name="paymentForm" method="post" action="<?php echo JURI::base() . "index.php?option=com_enmasse&controller=payment&task=notifyUrl&payClass=authorizenet"; ?>" id="checkout_form">
		<input type="hidden" type="text" name="approved" value="true"/>
		<input type="hidden" type="text" name="authorization_code" value="<?php echo $response->authorization_code; ?>"/>
		<input type="hidden" type="text" name="transaction_id" value="<?php echo $response->transaction_id; ?>">
		<input type="hidden" type="text" name="invoice_number" value="<?php echo $response->invoice_number;; ?>">
		<input type="hidden" type="text" name="amount" value="<?php echo $response->amount; ?>">
		<input type="hidden" type="text" name="account_number" value="<?php echo $response->account_number; ?>">
		</form>	
	<script>
		document.paymentForm.submit();

	</script>	
<?php 
exit;
?>	
<?php
    }
    else
    {
    	echo "<span style=\"color: red;\">".$response->response_reason_text."</span><br/>";
    }
}
?>


<?php
$arrPost = JFactory::getApplication()->getUserState("com_enmasse.checkout.dataautho");
$_POST = $arrPost;
$cartItem = array_pop($this->cart->getAll());
$price = number_format($cartItem->item->price * $cartItem->item->prepay_percent / 100, 2);
?>
<h1>Please enter your information:</h1>
<form method="post" name="checkoutForm" action="<?php echo $pageURL . $_SERVER["REQUEST_URI"]; ?>">
<table>
<tr><td>Credit Card Number (without spaces): </td><td><input type="text" size="25" name="x_card_num" value="<?php echo $_POST['x_card_num']; ?>"></input></td></tr>
<tr><td>Expired Date (MM/YY): </td><td><select name="x_exp_month">
			<option value="01"<?php echo $_POST['x_exp_month'] == '01' ? 'selected' : '';?>>01</option>
			<option value="02"<?php echo $_POST['x_exp_month'] == '02' ? 'selected' : '';?>>02</option>
			<option value="03"<?php echo $_POST['x_exp_month'] == '03' ? 'selected' : '';?>>03</option>
			<option value="04"<?php echo $_POST['x_exp_month'] == '04' ? 'selected' : '';?>>04</option>
			<option value="05"<?php echo $_POST['x_exp_month'] == '05' ? 'selected' : '';?>>05</option>
			<option value="06"<?php echo $_POST['x_exp_month'] == '06' ? 'selected' : '';?>>06</option>
			<option value="07"<?php echo $_POST['x_exp_month'] == '07' ? 'selected' : '';?>>07</option>
			<option value="08"<?php echo $_POST['x_exp_month'] == '08' ? 'selected' : '';?>>08</option>
			<option value="09"<?php echo $_POST['x_exp_month'] == '09' ? 'selected' : '';?>>09</option>
			<option value="10"<?php echo $_POST['x_exp_month'] == '10' ? 'selected' : '';?>>10</option>
			<option value="11"<?php echo $_POST['x_exp_month'] == '11' ? 'selected' : '';?>>11</option>
			<option value="12"<?php echo $_POST['x_exp_month'] == '12' ? 'selected' : '';?>>12</option>
		</select> / 
	<select name="x_exp_year">
	<?php
		$current_year = date("Y");
		for ($i = $current_year; $i<=($current_year+20); $i++)
		{
			if($i == $_POST['x_exp_year'])
				echo "<option value='" . $i . "' selected>$i</option>";
			else 
				echo "<option value='" . $i . "'>$i</option>";
		}
	?>
</select></td></tr>
<tr><td>CCV: </td><td><input type="text" size="4" name="x_card_code" value="<?php echo $_POST['x_card_code']; ?>"></input></td></tr>
<tr><td>First Name: </td><td><input type="text" size="25" name="x_first_name" value="<?php echo $_POST['x_first_name']; ?>"></input></td></tr>
<tr><td>Last Name: </td><td><input type="text" size="25" name="x_last_name" value="<?php echo $_POST['x_last_name']; ?>"></input></td></tr>
<tr><td>Email: </td><td><input type="text" size="25" name="x_email" value="<?php echo $_POST['x_email']; ?>"></input></td></tr>
<tr><td><input name="x_process" type="hidden" value="Process" ></td><td>
<input type="hidden" type="text" name="x_invoice_num" value="<?php echo $this->orderId; ?>"/>
<input type="hidden" type="text" name="x_description" value="<?php echo $item->item->short_desc; ?>"/>
<input type="hidden" type="text" name="x_amount" value="<?php echo ($price * $cartItem->getCount()); ?>">
<input type="hidden" type="text" name="x_type" value="<?php echo $this->attributeConfig->type; ?>">
</td></tr>
</table>
</form>


<script type='text/javascript'>
document.checkoutForm.submit();
   // setTimeout(document.checkoutForm.submit(), 3000);    

</script>
<?php 

	//$this->cart->deleteAll();
JFactory::getApplication()->setUserState("com_enmasse.checkout.dataautho", NULL);

	//JFactory::getSession()->set('cart', null);

?>