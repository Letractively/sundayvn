<?php
/**
 * @copyright	Copyright (C) 2009-2012 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class UrlController extends JController{
	function __construct($config = array())
	{
		parent::__construct($config);
		JRequest::setVar('tmpl','component');
		$this->registerDefaultTask('click');
	}
	function click(){
		$urlid = JRequest::getInt('urlid');
		$mailid = JRequest::getInt('mailid');
		$subid = JRequest::getInt('subid');
		$urlClass = acymailing_get('class.url');
		$urlObject = $urlClass->get($urlid);
		if(empty($urlObject->urlid)){
			return JError::raiseError( 404, JText::_( 'Page not found'));
		}
		$urlClickClass = acymailing_get('class.urlclick');
		$urlClickClass->addClick($urlObject->urlid,$mailid,$subid);
		$this->setRedirect($urlObject->url);
	}
}