<?php
// No direct access
defined('_JEXEC') or die;

class translationContact_details_categoryFilter extends translationFilter
{
	public function __construct ($contentElement){
		$this->filterNullValue="1";
		$this->filterType="contact_details_category";
		$params = $contentElement->getFilter("contact_details_category");
		list($this->filterField,$this->label) = explode("|",$params);
		parent::__construct($contentElement);
	}

	public function _createFilter(){
		if (!$this->filterField) return "";
		$filter="";
		if ($this->filter_value!=""){
			$db = JFactory::getDBO();
			$filter =  "LOWER(c.".$this->filterField." ) LIKE '%".$db->getEscaped( $this->filter_value, true )."%'";
		}
		return $filter;
	}

    function _createfilterHTML(){
        if (!$this->filterField) return "";

        $allCategoryOptions = array();
        $extension = 'com_contact';
        $options = JHtml::_('category.options', $extension);
        $allCategoryOptions[-1] = JHTML::_('select.option', '-1',JText::_('COM_FALANG_ALL_CATEGORIES') );

        $options = array_merge($allCategoryOptions, $options);

        $categoryList=array();
        $categoryList["title"]= JText::_('COM_FALANG_CATEGORY_FILTER');
        $categoryList["html"] = JHTML::_('select.genericlist', $options, 'category_filter_value', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $this->filter_value );

        return $categoryList;

    }


}
?>
