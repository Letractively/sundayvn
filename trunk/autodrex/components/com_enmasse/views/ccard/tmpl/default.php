<?php
JHtml::_('behavior.formvalidation');
$task = JRequest::getVar('task');
switch($task){
	case 'add':
		?>
			<h2>Add credit card</h2>
			<form method="POST" action="" class="form-validate" >
				<table>
					<tr>
					<td>Card number :</td>
					<td><input  type="text" name='cc_number' class="required" /></td>
					</tr>
					<tr>
					<td>Card expiration (MM/YYYY) :</td>
					<td><input  type="text" name='cc_expire' class="required"  /></td>
					</tr>	
					<tr>
					<td>Card CVV:</td>
					<td><input  type="text" name='cc_cvv' class="required"  /></td>
					</tr>		
					<tr>
					<td>&nbsp;</td>
					<td><input  type="submit" name='' /></td>
					</tr>
				</table>
			</form>
		<?php
		break;
	
	default:
			$db = JFactory::getDbo();
			$juser = JFactory::getUser();
			$time = time();
			$db->setQuery ("select * from #__cc_info where userid='{$juser->id}' ORDER BY id desc ");
			$ccard = $db->loadAssoc();
			?>
			<h2>Edit credit card</h2>
			<form method="POST" action="" class="form-validate" >
				<table>
					<tr>
					<td>Card number :</td>
					<td><input  type="text" name='cc_number' class="required"  value="<?=$ccard['cc_number']?>"/></td>
					</tr>
					<tr>
					<td>Card expiration (MM/YYYY) :</td>
					<td><input  type="text" name='cc_expire' class="required" value="<?=$ccard['cc_expire']?>" /></td>
					</tr>	
					<tr>
					<td>Card CVV:</td>
					<td><input  type="text" name='cc_cvv' class="required"  value="<?=$ccard['cc_cvv']?>" /></td>
					</tr>		
					<tr>
					<td>&nbsp;</td>
					<td><input  type="submit" name='' /></td>
					</tr>
				</table>
			</form>
		<?php
		break;
}