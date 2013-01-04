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

jimport('joomla.application.component.controller');

class EnmasseControllerOrderconf extends JController
{
  function __construct()
  {
    parent::__construct();
  }
  
  function display() 
  {
 JHtml::_('behavior.framework');
 $config =& JFactory::getConfig();
$sitename = $config->getValue( 'config.sitename' );
$oid = JRequest::getVar('oid');
$orderdetails = JModel::getInstance('Order','EnmasseModel')->getById($oid);
$orderitemdetails = JModel::getInstance('Orderitem','EnmasseModel')->getById($oid);

$buyerDetails = json_decode( $orderdetails->buyer_detail );
$deliverDetails = json_decode( $orderdetails->delivery_detail );
$deal = JModel::getInstance('deal','EnmasseModel')->viewDeal($orderitemdetails->pdt_id);
$url =JURI::root();
?>
<div id='section_to_print'>
<p  style='text-align:center'><img style='max-width:100%' src='<?php echo $url ?>logo.png'  /><p>
 <h1  style='text-align:center'>Order Confirmation</h1>
 
 <h2>Dear <?php echo $buyerDetails->name; ?></h2>

    <p>Thank you for choosing <?php echo $sitename; ?>. We greatly appreciate your business.<p>

    <p>Sincerely<br />
 	 <?php echo $sitename; ?>
 </p>


<table border="0">
<tbody>
<tr>
<td><strong>Order:</strong></td>
<td> </td>
<td><?php echo $oid; ?></td>
</tr>
<tr>
<td><strong>Deal:</strong></td>
<td> </td>
<td><?php echo $deal->name; ?></td>
</tr>
<tr>
<td><strong>Total Qty:</strong></td>
<td> </td>
<td><?php echo $orderitemdetails->qty; ?></td>
</tr>
<tr>
<td><strong>Total Price:</strong></td>
<td> </td>
<td><?php echo $orderdetails->total_buyer_paid; ?></td>
</tr>
<tr>
<td><strong>Purchase Date:</strong></td>
<td> </td>
<td><?php echo $orderdetails->updated_at; ?></td>
</tr>
<tr>
<td><strong>Delivery:</strong></td>
<td> </td>
<td><?php echo $deliverDetails->name ?> (<?php echo $deliverDetails->email ?>)</td>
</tr>
</tbody>
</table>

</div>
<form method="POST" action="" >
<input  type="hidden" name="option" value="com_enmasse" />
<input  type="hidden" name="ext" value="print" />
<input  type="hidden" name="controller" value="orderconf" />
<p style="text-align:right"><input type='submit' classt='button' value="Print"  /></p>
</form>
 <?php
$ext = JRequest::getVar('ext');
if($ext=='print')
{
	
	echo '<style>
		@media print {
  body * {
    visibility:hidden;
  }
  #section_to_print, #section_to_print * {
    visibility:visible;
  }
  #section_to_print {
    position:absolute;
    left:0;
    top:0;
  }
}
  @media screen {
  #section_to_print, #section_to_print * {

  }
  }
		</style>';
		echo '<script>window.print();</script>';
}
  }

}
?>