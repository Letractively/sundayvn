<?php
/**
 * @copyright	Copyright (C) 2009-2012 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class plgAcymailingTagmodule extends JPlugin
{
	function plgAcymailingTagmodule(&$subject, $config){
		parent::__construct($subject, $config);
		if(!isset($this->params)){
			$db = JFactory::getDBO();
			$db->setQuery("SELECT `params` FROM `#__plugins` WHERE `element` = 'tagmodule' AND `folder`= 'acymailing' LIMIT 1");
			$params = $db->loadResult();
			$this->params = new JParameter( $params );
			}
		}
	 function acymailing_getPluginType() {
	 	$onePlugin = new stdClass();
	 	$onePlugin->name = JText::_('TAG_MODULES');
	 	$onePlugin->function = 'acymailingtagmodule_show';
	 	$onePlugin->help = 'plugin-tagmodule';
	 	return $onePlugin;
	 }
	 function acymailingtagmodule_show(){
	?>
<script language="javascript" type="text/javascript">
		<!--
			function insertModule(id){
				tagString = '{module:'+id;
				if(window.document.getElementById('jflang')  && window.document.getElementById('jflang').value != ''){
					tagString += '|lang:';
					tagString += window.document.getElementById('jflang').value;
				}
				tagString += '}';
				setTag(tagString);
				insertTag();
			}
		//-->
</script>
	<?php
		$jflanguages = acymailing_get('type.jflanguages');
		echo $jflanguages->display('lang');
		$excludedModules = array('mod_poll','mod_login','mod_breadcrumbs','mod_acymailing','mod_wrapper');
		$text = '<table class="adminlist" cellpadding="1" width="100%">';
		$db = JFactory::getDBO();
		$db->setQuery('SELECT id, title, position, module FROM #__modules WHERE `module` NOT IN (\''.implode('\',\'',$excludedModules).'\') ORDER BY `position`,`ordering`');
		$modules =$db->loadObjectList();
		$k = 0;
		foreach($modules as $oneModule){
			$text .= '<tr style="cursor:pointer" class="row'.$k.'" onclick="insertModule(\''.$oneModule->id.'\');" ><td class="acytdcheckbox"></td><td>'.$oneModule->title.'</td><td nowrap="nowrap" width="60px">'.$oneModule->module.'</td><td nowrap="nowrap" width="40px">'.$oneModule->position.'</td></tr>';
			$k = 1-$k;
		}
		$text .= '</table>';
		echo $text;
	 }
	 function acymailing_replacetags(&$email,$send = true){
		$match = '#{module:([0-9]*)(\|lang:(.*))?}#Ui';
		$variables = array('body','altbody','subject');
		$found = false;
		foreach($variables as $var){
			if(empty($email->$var)) continue;
			$found = preg_match_all($match,$email->$var,$results[$var]) || $found;
			if(empty($results[$var][0])) unset($results[$var]);
		}
		if(!$found) return;
		$values = null;
		$tags = array();
		$textVersion = array();
		$subjectVersion = array();
		$config =& acymailing_config();
		$mailHelper = acymailing_get('helper.mailer');
		$itemid = $config->get('itemid');
		$item = empty($itemid) ? '' : '&Itemid='.$itemid;
		@ini_set('default_socket_timeout',10);
		@ini_set('user_agent', 'My-Application/2.5');
		@ini_set('allow_url_fopen', '1');
		foreach($results as $var => $allresults){
			foreach($allresults[0] as $i => $oneTag){
				$lang = empty($allresults[3][$i]) ? '' : '&lang='.substr($allresults[3][$i],0,strpos($allresults[3][$i],','));
				if(isset($tags[$oneTag])) continue;
				$mailid = (!empty($email->mailid)) ? '&mailid='.$email->mailid : '';
				$loc = ACYMAILING_LIVE.'index.php?option=com_acymailing&tmpl=component'.$mailid.'&ctrl=moduleloader&id='.$allresults[1][$i].'&time='.time().$lang.$item;
				if(function_exists('curl_init') AND ($this->params->get('getmethod') =='curl' OR !ini_get('allow_url_fopen'))){
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL,$loc);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
					curl_setopt($ch, CURLOPT_TIMEOUT, 10);
					@curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true);
					curl_setopt($ch, CURLOPT_AUTOREFERER,true);
					curl_setopt($ch, CURLOPT_REFERER,ACYMAILING_LIVE);
					$tags[$oneTag] = curl_exec($ch);
					curl_close($ch);
				}else{
					$tags[$oneTag] = file_get_contents($loc);
				}
				$localone = str_replace(ACYMAILING_LIVE,'',$loc);
				$tags[$oneTag] = str_replace(array($localone,str_replace('&','&amp;',$localone)),'index.php',$tags[$oneTag]);
				$tags[$oneTag] = preg_replace("#(onclick|onfocus|onload|onblur) *= *\"(?:(?!\").)*\"#iU",'',$tags[$oneTag]);
				$tags[$oneTag] =  preg_replace("#< *script(?:(?!< */ *script *>).)*< */ *script *>#isU",'',$tags[$oneTag]);
				$textVersion[$oneTag] = $mailHelper->textVersion($tags[$oneTag]);
				$subjectVersion[$oneTag] = trim(strip_tags($textVersion[$oneTag]));
			}
		}
		if(!empty($email->body)) $email->body = str_replace(array_keys($tags),$tags,$email->body);
		if(!empty($email->altbody)) $email->altbody = str_replace(array_keys($textVersion),$textVersion,$email->altbody);
		if(!empty($email->subject)) $email->subject = str_replace(array_keys($subjectVersion),$subjectVersion,$email->subject);
	 }//endfct
	 function onTestPlugin(){
	 	$config =& acymailing_config();
		$itemid = $config->get('itemid');
		$item = empty($itemid) ? '' : '&Itemid='.$itemid;
	 	@ini_set('default_socket_timeout',10);
		@ini_set('user_agent', 'My-Application/2.5');
		@ini_set('allow_url_fopen', '1');
		acymailing_displayErrors();
		$loc = ACYMAILING_LIVE.'index.php?option=com_acymailing&tmpl=component&ctrl=moduleloader&time='.time().$item;
		if($this->params->get('getmethod') =='curl'){
			acymailing_display('Using CURL method : '.$loc,'info');
			if(!ini_get('allow_url_fopen')){
				acymailing_display('PHP Setting allow_url_fopen not enabled','error');
				return;
			}
			if(!function_exists('curl_init')){
				acymailing_display('CURL methods not found, please enable the CURL PHP Extensions on your server','error');
				return;
			}
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$loc);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true);
			curl_setopt($ch, CURLOPT_AUTOREFERER,true);
			curl_setopt($ch, CURLOPT_REFERER,ACYMAILING_LIVE);
			$result = curl_exec($ch);
			if($result === false){
				acymailing_display('Error number '.curl_errno($ch).' : '.curl_error($ch),'error');
			}else{
				acymailing_display($result,'info');
			}
			curl_close($ch);
		}else{
			acymailing_display('Using File_get_contents function : '.$loc,'info');
			$result = file_get_contents($loc);
			if($result){
				acymailing_display($result,'success');
			}else{
				acymailing_display('Error. Please make sure the function file_get_contents is enabled on your website','error');
				if(function_exists('curl_init')){
					acymailing_display('The cURL function is apparently enabled on your server so you should select the cURL option','info');
				}
			}
		}
	 }
}//endclass