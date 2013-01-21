<?php
// No direct access
defined('_JEXEC') or die;

class translationJfkeywordFilter extends translationFilter
{
	public function __construct ($contentElement){
		$this->filterNullValue="";
		$this->filterType="jfkeyword";
		$params = $contentElement->getFilter("jfkeyword");		
		list($this->filterField,$this->label) = explode("|",$params);
		parent::__construct($contentElement);
	}


    public function createFilter(){
		if (!$this->filterField) return "";
		$filter="";
		if ($this->filter_value!=""){
			$db = JFactory::getDBO();
			$filter =  "LOWER(c.".$this->filterField." ) LIKE '%".$db->getEscaped( $this->filter_value, true )."%'";
		}
		return $filter;
	}

	/**
 * Creates Keyword filter
 *
 * @param unknown_type $filtertype
 * @param unknown_type $contentElement
 * @return unknown
 */
	public function createFilterHTML(){
		$db = JFactory::getDBO();

		if (!$this->filterField) return "";
		$Keywordlist=array();
		$Keywordlist["title"]= JText::_($this->label);
		$Keywordlist["html"] = 	'<input type="text" name="jfkeyword_filter_value" value="'.$this->filter_value.'" class="text_area" onChange="document.adminForm.submit();" />';

		return $Keywordlist;

	}
	

}
?>
