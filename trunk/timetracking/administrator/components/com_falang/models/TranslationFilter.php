<?php
/**
 * Joom!Fish - Multi Lingual extention and translation manager for Joomla!
 * Copyright (C) 2003 - 2011, Think Network GmbH, Munich
 *
 * All rights reserved.  The Joom!Fish project is a set of extentions for
 * the content management system Joomla!. It enables Joomla!
 * to manage multi lingual sites especially in all dynamic information
 * which are stored in the database.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307,USA.
 *
 * The "GNU General Public License" (GPL) is available at
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * -----------------------------------------------------------------------------
 * $Id: TranslationFilter.php 1551 2011-03-24 13:03:07Z akede $
 * @package joomfish
 * @subpackage Models
 *
*/
defined( '_JEXEC' ) or die( 'Restricted access' );

function getTranslationFilters($catid, $contentElement)
{
        if (!$contentElement) return array();
	$filterNames=$contentElement->getAllFilters();
	if (count($filterNames)>0) {
		$filterNames["reset"]="reset";
	}
	$filters=array();
	foreach ($filterNames as $key=>$value){
		$filterType = "translation".ucfirst(strtolower($key))."Filter" ;
		$classFile = JPATH_SITE."/administrator/components/com_falang/contentelements/$filterType.php" ;
		if (!class_exists($filterType)){
			if (file_exists($classFile )) include_once($classFile);
			if (!class_exists($filterType)) {
				continue;
			}
		}
		$filters[strtolower($key)] =  new $filterType($contentElement);
	}
	return $filters;
}


class translationFilter
{
	var $filterNullValue;
	var $filterType;
	var $filter_value;
	var $filterField = false;
	var $tableName = "";
	var $filterHTML="";

	// Should we use session data to remember previous selections?
	var $rememberValues = true;

	function translationFilter($contentElement=null){

		if (intval(JRequest::getVar('filter_reset',0))){
			$this->filter_value =  $this->filterNullValue;
		}
		else if ($this->rememberValues){
			// TODO consider making the filter variable name content type specific
            $app	= JFactory::getApplication();
			$this->filter_value = $app->getUserStateFromRequest($this->filterType.'_filter_value', $this->filterType.'_filter_value', $this->filterNullValue);
		}
		else {
			$this->filter_value =  JRequest::getVar( $this->filterType.'_filter_value', $this->filterNullValue );
		}
		//echo $this->filterType.'_filter_value = '.$this->filter_value."<br/>";
		$this->tableName = isset($contentElement)?$contentElement->getTableName():"";
	}

	function _createFilter(){
		if (!$this->filterField ) return "";
		$filter="";
		if ($this->filter_value!=$this->filterNullValue){
                       if (is_int($this->filter_value)) {
        			$filter = "c.".$this->filterField."=$this->filter_value";
                       } else {
        			$filter = "c.".$this->filterField."='".$this->filter_value."'";
                       }
                }
		return $filter;
	}

	function _createfilterHTML(){ return "";}
}

class translationResetFilter extends translationFilter
{
	function translationResetFilter ($contentElement){
		$this->filterNullValue=-1;
		$this->filterType="reset";
		$this->filterField = "";
		parent::translationFilter($contentElement);
	}

	function _createFilter(){
		return "";
	}

	
	/**
 * Creates javascript session memory reset action
 *
 */
	function _createfilterHTML(){
		$reset["title"]= JText::_('COM_FALANG_FILTER_RESET');
		$reset["html"] = "<input type='hidden' name='filter_reset' id='filter_reset' value='0' /><input type='button' value='".JText::_("COM_FALANG_FILTER_RESET")."' onclick='document.getElementById(\"filter_reset\").value=1;document.adminForm.submit()' />";
		return $reset;

	}

}

class translationFrontpageFilter extends translationFilter
{
	function translationFrontpageFilter ($contentElement){
		$this->filterNullValue=-1;
		$this->filterType="frontpage";
		$this->filterField = $contentElement->getFilter("frontpage");
		parent::translationFilter($contentElement);
	}

	function _createFilter(){
		if (!$this->filterField) return "";
		$filter="";
		if ($this->filter_value!=$this->filterNullValue){
			$db = JFactory::getDBO();
			$sql = "SELECT content_id FROM #__content_frontpage order by ordering";
			$db->setQuery($sql);
			$ids = $db->loadResultArray();
			if (is_null($ids)){
				$ids = array();
			}
			$ids[] = -1;
			$idstring = implode(",",$ids);
			$not = "";
			if ($this->filter_value==0){
				$not = " NOT ";
			}
			$filter =   " c.".$this->filterField.$not." IN (".$idstring.") ";
		}
		return $filter;
	}

	
	/**
 * Creates frontpage filter
 *
 * @param unknown_type $filtertype
 * @param unknown_type $contentElement
 * @return unknown
 */
	function _createfilterHTML(){
		$db = JFactory::getDBO();

		if (!$this->filterField) return "";

		$FrontpageOptions=array();
		$FrontpageOptions[] = JHTML::_('select.option', -1, JText::_('COM_FALANG_FILTER_ANY'));
		$FrontpageOptions[] = JHTML::_('select.option', 1, JText::_('JYES'));
		$FrontpageOptions[] = JHTML::_('select.option', 0, JText::_('JNO'));
		$frontpageList=array();
		$frontpageList["title"]= JText::_('COM_FALANG_FILTER_FRONTPAGE');
		$frontpageList["html"] = JHTML::_('select.genericlist', $FrontpageOptions, 'frontpage_filter_value', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $this->filter_value );

		return $frontpageList;

	}

}

class translationArchiveFilter extends translationFilter
{
	function translationArchiveFilter ($contentElement){
		$this->filterNullValue=-1;
		$this->filterType="archive";
		$this->filterField = $contentElement->getFilter("archive");
		parent::translationFilter($contentElement);
	}

	function _createFilter(){
		if (!$this->filterField) return "";
		$filter="";
		if ($this->filter_value!=$this->filterNullValue){
			if ($this->filter_value==0){
				$filter =   " c.".$this->filterField." >=0 ";
			}
			else {
				$filter =   " c.".$this->filterField." =-1 ";
			}
		}
		return $filter;
	}

	
	/**
 * Creates frontpage filter
 *
 * @param unknown_type $filtertype
 * @param unknown_type $contentElement
 * @return unknown
 */
	function _createfilterHTML(){
		$db = JFactory::getDBO();

		if (!$this->filterField) return "";

		$FrontpageOptions=array();
		$FrontpageOptions[] = JHTML::_('select.option', -1, JText::_('COM_FALANG_FILTER_ANY'));
		$FrontpageOptions[] = JHTML::_('select.option', 1, JText::_('JYES'));
		$FrontpageOptions[] = JHTML::_('select.option', 0, JText::_('JNO'));
		$frontpageList=array();
		$frontpageList["title"]= JText::_('COM_FALANG_FILTER_ARCHIVE');
		$frontpageList["html"] = JHTML::_('select.genericlist', $FrontpageOptions, 'archive_filter_value', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $this->filter_value );

		return $frontpageList;

	}

}

class translationCategoryFilter extends translationFilter
{
	var $section_filter_value;
	function translationCategoryFilter ($contentElement){
		$this->filterNullValue=-1;
		$this->filterType="category";
		$this->filterField = $contentElement->getFilter("category");
		parent::translationFilter($contentElement);
		
		// if currently selected category is not compatible with section then reset
		if (intval(JRequest::getVar('filter_reset',0))){
			$this->section_filter_value =  -1;
		}
		else if ($this->rememberValues){
            $app	= JFactory::getApplication();
			$this->section_filter_value = $app->getUserStateFromRequest('section_filter_value', 'section_filter_value', -1);
		}
		else {
			$this->section_filter_value =  JRequest::getVar( "section_filter_value", -1 );
		}

		if ($this->section_filter_value!=-1 and $this->filter_value>=0){
			$cat =  JTable::getInstance('category');
			$cat->load($this->filter_value);
			if ($cat->section != $this->section_filter_value) {
				$this->filter_value=-1;
			}
		}
		if ($this->section_filter_value==0){
			$this->filter_value=0;
		}
		
	}


	/**
 * Creates category filter
 *
 * @param unknown_type $filtertype
 * @param unknown_type $contentElement
 * @return unknown
 */
	function _createfilterHTML(){
		$db = JFactory::getDBO();

		if (!$this->filterField) return "";

        $allCategoryOptions = array();
        $extension = 'com_'.$this->tableName;
        $options = JHtml::_('category.options', $extension);
        $allCategoryOptions[-1] = JHTML::_('select.option', '-1',JText::_('COM_FALANG_ALL_CATEGORIES') );

        $options = array_merge($allCategoryOptions, $options);

        $categoryList=array();
        $categoryList["title"]= JText::_('COM_FALANG_CATEGORY_FILTER');
        $categoryList["html"] = JHTML::_('select.genericlist', $options, 'category_filter_value', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $this->filter_value );

        return $categoryList;

	}

}

class translationAuthorFilter extends translationFilter
{
	function translationAuthorFilter ($contentElement){
		$this->filterNullValue=-1;
		$this->filterType="author";
		$this->filterField = $contentElement->getFilter("author");
		parent::translationFilter($contentElement);
	}


	function _createfilterHTML(){
		$db = JFactory::getDBO();

		if (!$this->filterField) return "";
		$AuthorOptions=array();
		$AuthorOptions[] = JHTML::_('select.option', '-1',JText::_('COM_FALANG_ALL_AUTHORS') );

		//	$sql = "SELECT c.id, c.title FROM #__categories as c ORDER BY c.title";
		$sql = "SELECT DISTINCT auth.id, auth.username FROM #__users as auth, #__".$this->tableName." as c
			WHERE c.".$this->filterField."=auth.id ORDER BY auth.username";
		$db->setQuery($sql);
		$cats = $db->loadObjectList();
		$catcount=0;
		foreach($cats as $cat){
			$AuthorOptions[] = JHTML::_('select.option', $cat->id,$cat->username);
			$catcount++;
		}
		$Authorlist=array();
		$Authorlist["title"]=JText::_('COM_FALANG_AUTHOR_FILTER');
		$Authorlist["html"] = JHTML::_('select.genericlist', $AuthorOptions, 'author_filter_value', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $this->filter_value );

		return $Authorlist;

	}

}


class translationKeywordFilter extends translationFilter
{
	function translationKeywordFilter($contentElement){
		$this->filterNullValue="";
		$this->filterType="keyword";
		$this->filterField = $contentElement->getFilter("keyword");
		parent::translationFilter($contentElement);
	}


	function _createFilter(){
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
	function _createfilterHTML(){
		$db = JFactory::getDBO();

		if (!$this->filterField) return "";
		$Keywordlist=array();
		$Keywordlist["title"]= JText::_('COM_FALANG_KEYWORD_FILTER');
		$Keywordlist["html"] = 	'<input type="text" name="keyword_filter_value" value="'.$this->filter_value.'" class="text_area" onChange="document.adminForm.submit();" />';

		return $Keywordlist;

	}

}

class translationModuleFilter  extends translationFilter
{
	function translationModuleFilter ($contentElement){
		$this->filterNullValue=-1;
		$this->filterType="module";
		$this->filterField = $contentElement->getFilter("module");
		parent::translationFilter($contentElement);
	}

	function _createFilter(){
		$filter = "c.".$this->filterField."<99";
		return $filter;
	}

	function _createfilterHTML(){
		return "";
	}
}

class translationMenutypeFilter  extends translationFilter
{
	function translationMenutypeFilter ($contentElement){
		$this->filterNullValue="-+-+";
		$this->filterType="menutype";
		$this->filterField = $contentElement->getFilter("menutype");
		parent::translationFilter($contentElement);
	}

	function _createFilter(){
		if (!$this->filterField ) return "";
		$filter="";
		if ($this->filter_value!=$this->filterNullValue){
			$filter = "c.".$this->filterField."='".$this->filter_value."'";
		}
		return $filter;
	}

	function _createfilterHTML(){
		$db = JFactory::getDBO();

		if (!$this->filterField) return "";
		$MenutypeOptions=array();
		$MenutypeOptions[] = JHTML::_('select.option', $this->filterNullValue, JText::_('COM_FALANG_ALL_MENUS') );

        //dont't add root menu to the list != 1
		$sql = "SELECT DISTINCT mt.menutype FROM #__menu as mt WHERE id != 1 ORDER BY menutype ASC";
		$db->setQuery($sql);
		$cats = $db->loadObjectList();
		$catcount=0;
		foreach($cats as $cat){
			$MenutypeOptions[] = JHTML::_('select.option', $cat->menutype,$cat->menutype);
			$catcount++;
		}
		$Menutypelist=array();
		$Menutypelist["title"]= JText::_('COM_FALANG_MENU_FILTER');
		$Menutypelist["html"] = JHTML::_('select.genericlist', $MenutypeOptions, 'menutype_filter_value', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $this->filter_value );

		return $Menutypelist;

	}
}

/**
 * filters translations based on creation/modification date of original
 *
 */
class translationChangedFilter extends translationFilter
{
	function translationChangedFilter ($contentElement){
		$this->filterNullValue=-1;
		$this->filterType="lastchanged";
		$this->filterField = $contentElement->getFilter("changed");
		list($this->_createdField,$this->_modifiedField) = explode("|",$this->filterField);
		parent::translationFilter($contentElement);
	}

	function _createFilter(){
		if (!$this->filterField) return "";
		$filter="";
		if ($this->filter_value!=$this->filterNullValue && $this->filter_value==1){
			// translations must be created after creation date so no need to check this!
			$filter = "( c.$this->_modifiedField>0 AND jfc.modified < c.$this->_modifiedField)" ;
		}
		else if ($this->filter_value!=$this->filterNullValue){
			$filter = "( ";
			$filter .= "( c.$this->_modifiedField>0 AND jfc.modified >= c.$this->_modifiedField)" ;
			$filter .= " OR ( c.$this->_modifiedField=0 AND jfc.modified >= c.$this->_createdField)" ;
			$filter .= " )";
		}

		return $filter;
	}


	function _createfilterHTML(){
		$db = JFactory::getDBO();

		if (!$this->filterField) return "";
		$ChangedOptions=array();
		$ChangedOptions[] = JHTML::_('select.option', -1,JText::_('COM_FALANG_FILTER_BOTH'));
		$ChangedOptions[] = JHTML::_('select.option', 1, JText::_('COM_FALANG_FILTER_ORIGINAL_NEWER'));
		$ChangedOptions[] = JHTML::_('select.option', 0, JText::_('COM_FALANG_FILTER_TRANSLATION_NEWER'));

		$ChangedList=array();
		$ChangedList["title"]= JText::_('COM_FALANG_FILTER_TRANSLATION_AGE');
		$ChangedList["html"] = JHTML::_('select.genericlist', $ChangedOptions, $this->filterType.'_filter_value', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $this->filter_value );

		return $ChangedList;
	}
}

/**
 * Look for unpublished translations - i.e. no translation or translation is unpublished
 * Really only makes sense with a specific language selected
 *
 */

class translationTrashFilter extends translationFilter
{
	function translationTrashFilter ($contentElement){
		$this->filterNullValue=-1;
		$this->filterType="trash";
		$this->filterField = $contentElement->getFilter("trash");
		parent::translationFilter($contentElement);
	}

	function _createFilter(){
		// -1 = archive, -2 = trash
		$filter = "c.".$this->filterField.">=-1";
		return $filter;
	}

	function _createfilterHTML(){
		return "";
	}

}

/**
 * Look for unpublished translations - i.e. no translation or translation is unpublished
 * Really only makes sense with a specific language selected
 *
 */

class translationPublishedFilter extends translationFilter
{
	function translationPublishedFilter ($contentElement){
		$this->filterNullValue=-1;
		$this->filterType="published";
		$this->filterField = $contentElement->getFilter("published");
		parent::translationFilter($contentElement);
	}

	function _createFilter(){
		if (!$this->filterField) return "";
		$filter="";
		if ($this->filter_value!=$this->filterNullValue){
			if ($this->filter_value==1){
				$filter = "jfc.".$this->filterField."=$this->filter_value";
			}
			else if ($this->filter_value==0){
				$filter = " ( jfc.".$this->filterField."=$this->filter_value AND jfc.reference_field IS NOT NULL ) ";
			}
			else if ($this->filter_value==2){
				$filter = " jfc.reference_field IS NULL  ";
			}
			else if ($this->filter_value==3){
				$filter = " jfc.reference_field IS NOT NULL ";
			}
		}

		return $filter;
	}

	function _createfilterHTML(){
		$db = JFactory::getDBO();

		if (!$this->filterField) return "";

		$PublishedOptions=array();
		$PublishedOptions[] = JHTML::_('select.option', -1, JText::_('COM_FALANG_FILTER_ANY'));
		$PublishedOptions[] = JHTML::_('select.option', 3, JText::_('COM_FALANG_FILTER_AVAILABLE'));
		$PublishedOptions[] = JHTML::_('select.option', 1, JText::_('COM_FALANG_TITLE_PUBLISHED'));
		$PublishedOptions[] = JHTML::_('select.option', 0, JText::_('COM_FALANG_TITLE_UNPUBLISHED'));
		$PublishedOptions[] = JHTML::_('select.option', 2, JText::_('COM_FALANG_FILTER_MISSING'));

		$publishedList=array();
		$publishedList["title"]= JText::_('COM_FALANG_FILTER_TRANSLATION_AVAILABILITY');
		$publishedList["html"] = JHTML::_('select.genericlist', $PublishedOptions, 'published_filter_value', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $this->filter_value );

		return $publishedList;

	}

}

class TranslateParams
{
	var $origparams;
	var $defaultparams;
	var $transparams;
	var $fields;
	var $fieldname;

	function TranslateParams($original, $translation, $fieldname, $fields=null){

		$this->origparams =  $original;
		$this->transparams = $translation;
		$this->fieldname = $fieldname;
		$this->fields = $fields;
	}

	public function showOriginal()
	{
		echo $this->origparams;

	}

	public function showDefault()
	{
		echo "";

	}

	function editTranslation(){
		$returnval = array( "editor_".$this->fieldname, "refField_".$this->fieldname );
		// parameters : areaname, content, hidden field, width, height, rows, cols
		editorArea( "editor_".$this->fieldname,  $this->transparams, "refField_".$this->fieldname, '100%;', '300', '70', '15' ) ;
		echo $this->transparams;
		return $returnval;
	}
}

class TranslateParams_xml extends TranslateParams
{

	function showOriginal()
	{
		$output = "";
		$fieldname = 'orig_' . $this->fieldname;
		$output .= $this->origparams->render($fieldname);
		$output .= <<<SCRIPT
		<script language='javascript'>
		function copyParams(srctype, srcfield){
			var orig = document.getElementsByTagName('select');
			for (var i=0;i<orig.length;i++){
				if (orig[i].name.indexOf(srctype)>=0 && orig[i].name.indexOf("[")>=0){
					// TODO double check the str replacement only replaces one instance!!!
					targetName = orig[i].name.replace(srctype,"refField");
					target = document.getElementsByName(targetName);
					if (target.length!=1){
						alert(targetName+" problem "+target.length);
					}
					else {
						target[0].selectedIndex = orig[i].selectedIndex;
					}
				}
			}
			var orig = document.getElementsByTagName('input');
			for (var i=0;i<orig.length;i++){
				if (orig[i].name.indexOf(srctype)>=0 && orig[i].name.indexOf("[")>=0){
					// treat radio buttons differently
					if (orig[i].type.toLowerCase()=="radio"){
						//alert( orig[i].id+" "+orig[i].checked);
						targetId = orig[i].id;
						if (targetId){
							targetId = targetId.replace(srctype,"refField");
							target = document.getElementById(targetId);
							if (!target){
								alert("missing target for radio button "+orig[i].name);
							}
							else {
								target.checked = orig[i].checked;
							}
						}
						else {
							alert("missing id for radio button "+orig[i].name);
						}
					}
					else {
						// TODO double check the str replacement only replaces one instance!!!
						targetName = orig[i].name.replace(srctype,"refField");
						target = document.getElementsByName(targetName);
						if (target.length!=1){
							alert(targetName+" problem "+target.length);
						}
						else {
							target[0].value = orig[i].value;
						}
					}
				}
			}
			var orig = document.getElementsByTagName('textarea');
			for (var i=0;i<orig.length;i++){
				if (orig[i].name.indexOf(srctype)>=0 && orig[i].name.indexOf("[")>=0){
					// TODO double check the str replacement only replaces one instance!!!
					targetName = orig[i].name.replace(srctype,"refField");
					target = document.getElementsByName(targetName);
					if (target.length!=1){
						alert(targetName+" problem "+target.length);
					}
					else {
						target[0].value = orig[i].value;
					}
				}
			}
		}

		var orig = document.getElementsByTagName('select');
		for (var i=0;i<orig.length;i++){
			if (orig[i].name.indexOf("$fieldname")>=0){
				orig[i].disabled = true;
			}
		}
		var orig = document.getElementsByTagName('input');
		for (var i=0;i<orig.length;i++){
			if (orig[i].name.indexOf("$fieldname")>=0){
				orig[i].disabled = true;
			}
		}
		</script>
SCRIPT;
		echo $output;

	}

	function showDefault()
	{
		$output = "<span style='display:none'>";
		$output .= $this->defaultparams->render("defaultvalue_" . $this->fieldname);
		$output .= "</span>\n";
		echo $output;

	}
    function editTranslation(){
        echo $this->transparams->render("refField_".$this->fieldname);
        return false;
    }
}

class JFMenuParams extends JObject
{

	var $form = null;
	protected $_escape = 'htmlspecialchars';
	protected $_charset = 'UTF-8';
    
	function __construct($form=null, $item=null)
	{
		$this->form = $form;

	}

	function render($type)
	{
		$this->menuform = $this->form;
		$sliders = & JPane::getInstance('sliders');
		echo $sliders->startPane('params');

		$fieldSets = $this->form->getFieldsets('request');
		if ($fieldSets)
		{
			foreach ($fieldSets as $name => $fieldSet)
			{
				$hidden_fields = '';
				$label = !empty($fieldSet->label) ? $fieldSet->label : 'COM_MENUS_' . $name . '_FIELDSET_LABEL';
				echo $sliders->startPanel(JText::_($label), $name . '-options');

				if (isset($fieldSet->description) && trim($fieldSet->description)) :
					echo '<p class="tip">' . $this->escape(JText::_($fieldSet->description)) . '</p>';
				endif;
				?>
				<div class="clr"></div>
				<fieldset class="panelform">
					<ul class="adminformlist">
						<?php foreach ($this->form->getFieldset($name) as $field)
						{ ?>
							<?php if (!$field->hidden)
							{
								//echo $field->value;
								?>
								<li><?php echo $field->label; ?>
									<?php echo $field->input; ?></li>
								<?php
							}
							else
							{
								$hidden_fields.= $field->input;
								?>
							<?php } ?>

						<?php } ?>
					</ul>
					<?php echo $hidden_fields; ?>
				</fieldset>

				<?php
				echo $sliders->endPanel();
			}
		}

		$paramsfieldSets = $this->form->getFieldsets('params');
		if ($paramsfieldSets)
		{
			foreach ($paramsfieldSets as $name => $fieldSet)
			{
				$label = !empty($fieldSet->label) ? $fieldSet->label : 'COM_MENUS_' . $name . '_FIELDSET_LABEL';
				echo $sliders->startPanel(JText::_($label), $name . '-options');

				if (isset($fieldSet->description) && trim($fieldSet->description)) :
					echo '<p class="tip">' . $this->escape(JText::_($fieldSet->description)) . '</p>';
				endif;
				?>
				<div class="clr"></div>
				<fieldset class="panelform">
					<ul class="adminformlist">
						<?php foreach ($this->form->getFieldset($name) as $field) : ?>
							<li><?php echo $field->label; ?>
								<?php echo $field->input; ?></li>
						<?php endforeach; ?>
					</ul>
				</fieldset>

				<?php
				echo $sliders->endPanel();
			}
		}
		echo $sliders->endPane();
		return;

	}

    /*/libraries/joomla/application/component/view.php*/
    public function escape($var)
    {
        if (in_array($this->_escape, array('htmlspecialchars', 'htmlentities')))
        {
            return call_user_func($this->_escape, $var, ENT_COMPAT, $this->_charset);
        }

        return call_user_func($this->_escape, $var);
    }

}

class TranslateParams_menu extends TranslateParams_xml
{

	var $_menutype;
	var $_menuViewItem;
	var $orig_modelItem;
	var $trans_modelItem;

	function __construct($original, $translation, $fieldname, $fields=null)
	{
		parent::__construct($original, $translation, $fieldname, $fields);
		$lang = JFactory::getLanguage();
		$lang->load("com_menus", JPATH_ADMINISTRATOR);

		$cid = JRequest::getVar('cid', array(0));
		$oldcid = $cid;
		$translation_id = 0;
		if (strpos($cid[0], '|') !== false)
		{
			list($translation_id, $contentid, $language_id) = explode('|', $cid[0]);
		}

		JRequest::setVar("cid", array($contentid));
		JRequest::setVar("edit", true);

        JLoader::import('models.JFMenusModelItem', FALANG_ADMINPATH);
        $this->orig_modelItem = new JFMenusModelItem();


		// Get The Original State Data
		// model's populate state method assumes the id is in the request object!
		$oldid = JRequest::getInt("id", 0);
		JRequest::setVar("id", $contentid);

		// NOW GET THE TRANSLATION - IF AVAILABLE
		$this->trans_modelItem = new JFMenusModelItem();
		$this->trans_modelItem->setState('item.id', $contentid);
		if ($translation != "")
		{
			$translation = json_decode($translation);
		}

		$translationMenuModelForm = $this->trans_modelItem->getForm();

		if (isset($translation->jfrequest)){
			$translationMenuModelForm->bind(array("params" => $translation, "request" =>$translation->jfrequest));
		}
		else {
			$translationMenuModelForm->bind(array("params" => $translation));
		}
		$cid = $oldcid;
		JRequest::setVar('cid', $cid);
		JRequest::setVar("id", $oldid);

		$this->transparams = new JFMenuParams($translationMenuModelForm);

	}

	function editTranslation()
	{
		if ($this->_menutype == "wrapper")
		{
			?>
			<table width="100%" class="paramlist">
				<tr>
					<td width="40%" align="right" valign="top"><span class="editlinktip"><!-- Tooltip -->
							<span onmouseover="return overlib('Link for Wrapper', CAPTION, 'Wrapper Link', BELOW, RIGHT);" onmouseout="return nd();" >Wrapper Link</span></span></td>
					<td align="left" valign="top"><input type="text" name="refField_params[url]" value="<?php echo $this->transparams->get('url', '') ?>" class="text_area" size="30" /></td>
				</tr>
			</table>
			<?php
		}
		parent::editTranslation();

	}

}

class JFModuleParams extends JObject
{

	protected $form = null;
	protected $item = null;

	function __construct($form=null, $item=null)
	{
		$this->form = $form;
		$this->item = $item;

	}

	function render($type)
	{
        echo JHtml::_('sliders.start', 'module-sliders');

        $paramsfieldSets = $this->form->getFieldsets('params');
		if ($paramsfieldSets)
		{
			foreach ($paramsfieldSets as $name => $fieldSet)
			{
				$label = !empty($fieldSet->label) ? $fieldSet->label : 'COM_MODULES_' . $name . '_FIELDSET_LABEL';
                echo JHtml::_('sliders.panel', JText::_($label), $name.'-options');

				if (isset($fieldSet->description) && trim($fieldSet->description)) :
					echo '<p class="tip">' . $this->escape(JText::_($fieldSet->description)) . '</p>';
				endif;
				?>
				<div class="clr"></div>
				<fieldset class="panelform">
					<ul class="adminformlist">
						<?php foreach ($this->form->getFieldset($name) as $field) : ?>
							<li><?php echo $field->label; ?>
								<?php echo $field->input; ?></li>
						<?php endforeach; ?>
					</ul>
				</fieldset>

				<?php
			}
		}
        echo JHtml::_('sliders.end');

        //not render assignment menu
        //depends on the original menu

		return;

	}

}


class TranslateParams_modules extends TranslateParams_xml
{

	function __construct($original, $translation, $fieldname, $fields=null)
	{

		parent::__construct($original, $translation, $fieldname, $fields);
		$lang = JFactory::getLanguage();
		$lang->load("com_modules", JPATH_ADMINISTRATOR);

		$cid = JRequest::getVar('cid', array(0));
		$oldcid = $cid;
		$translation_id = 0;
		if (strpos($cid[0], '|') !== false)
		{
			list($translation_id, $contentid, $language_id) = explode('|', $cid[0]);
		}

		// if we have an existing translation then load this directly!
		// This is important for modules to populate the assignement fields

		//$contentid = $translation_id?$translation_id : $contentid;

		//TODO sbou check this
        JRequest::setVar("cid", array($contentid));
		JRequest::setVar("edit", true);

		JLoader::import('models.JFModuleModelItem', FALANG_ADMINPATH);

		// Get The Original State Data
		// model's populate state method assumes the id is in the request object!
		$oldid = JRequest::getInt("id", 0);
		JRequest::setVar("id", $contentid);

		// NOW GET THE TRANSLATION - IF AVAILABLE
		$this->trans_modelItem = new JFModuleModelItem();
		$this->trans_modelItem->setState('module.id', $contentid);
		if ($translation != "")
		{
			$translation = json_decode($translation);
		}
		$translationModuleModelForm = $this->trans_modelItem->getForm();
		if (isset($translation->jfrequest)){
			$translationModuleModelForm->bind(array("params" => $translation, "request" =>$translation->jfrequest));
		}
		else {
			$translationModuleModelForm->bind(array("params" => $translation));
		}

		$cid = $oldcid;
		JRequest::setVar('cid', $cid);
		JRequest::setVar("id", $oldid);

		$this->transparams = new JFModuleParams($translationModuleModelForm, $this->trans_modelItem->getItem());

	}

	function showOriginal()
	{
		parent::showOriginal();

		$output = "";
		if ($this->origparams->getNumParams('advanced'))
		{
			$fieldname = 'orig_' . $this->fieldname;
			$output .= $this->origparams->render($fieldname, 'advanced');
		}
		if ($this->origparams->getNumParams('other'))
		{
			$fieldname = 'orig_' . $this->fieldname;
			$output .= $this->origparams->render($fieldname, 'other');
		}
		if ($this->origparams->getNumParams('legacy'))
		{
			$fieldname = 'orig_' . $this->fieldname;
			$output .= $this->origparams->render($fieldname, 'legacy');
		}
		echo $output;

	}


	function editTranslation()
	{
		parent::editTranslation();

	}

}

class TranslateParams_content extends TranslateParams_xml
{
	function TranslateParams_content($original, $translation, $fieldname, $fields=null){

		$this->fieldname = $fieldname;
		global $mainframe;
		$content = null;
		foreach ($fields as $field) {
			if ($field->Type=="params"){
				$content = $field->originalValue;
				break;
			}
		}
		if (is_null($content)){
			echo JText::_("COM_FALANG_TRANSLATE_PARAMS_PROBLEM");
			exit();
		}
		$lang = JFactory::getLanguage();
		$lang->load("com_content", JPATH_SITE);

		$this->origparams = new  JParameter( $original, JPATH_ADMINISTRATOR.DS.'components'.DS.'com_content'.DS.'models'.DS.'article.xml');
		$this->transparams = new  JParameter( $translation, JPATH_ADMINISTRATOR.DS.'components'.DS.'com_content'.DS.'models'.DS.'article.xml');
		$this->defaultparams = new  JParameter( "", JPATH_ADMINISTRATOR.DS.'components'.DS.'com_content'.DS.'models'.DS.'article.xml');
		$this->fields = $fields;
	}

	function showOriginal(){
		parent::showOriginal();

		$output = "";
		if ($this->origparams->getNumParams('advanced')) {
			$fieldname='orig_'.$this->fieldname;
			$output .= $this->origparams->render($fieldname, 'advanced');
		}
		if ($this->origparams->getNumParams('legacy')) {
			$fieldname='orig_'.$this->fieldname;
			$output .= $this->origparams->render($fieldname, 'legacy');
		}
		echo $output;
	}

	function showDefault(){
		parent::showDefault();

		$output = "<span style='display:none'>";
		if ($this->origparams->getNumParams('advanced')) {
			$fieldname='defaultvalue_'.$this->fieldname;
			$output .= $this->defaultparams->render($fieldname, 'advanced');
		}
		if ($this->origparams->getNumParams('legacy')) {
			$fieldname='defaultvalue_'.$this->fieldname;
			$output .= $this->defaultparams->render($fieldname, 'legacy');
		}
		$output .= "</span>\n";
		echo $output;
	}

	function editTranslation(){
		parent::editTranslation();

		$output = "";
		if ($this->origparams->getNumParams('advanced')) {
			$fieldname='refField_'.$this->fieldname;
			$output .= $this->transparams->render($fieldname, 'advanced');
		}
		if ($this->origparams->getNumParams('legacy')) {
			$fieldname='refField_'.$this->fieldname;
			$output .= $this->transparams->render($fieldname, 'legacy');
		}
		echo $output;
	}

}

class TranslateParams_components extends TranslateParams_xml
{
	var $_menutype;
	var $_menuViewItem;
	var $orig_menuModelItem;
	var $trans_menuModelItem;

	function TranslateParams_components($original, $translation, $fieldname, $fields=null){
		$lang = JFactory::getLanguage();
		$lang->load("com_config", JPATH_ADMINISTRATOR);

		$this->fieldname = $fieldname;
		global $mainframe;
		$content = null;
		foreach ($fields as $field) {
			if ($field->Name=="option"){
				$comp = $field->originalValue;
				break;
			}
		}
		$lang->load($comp, JPATH_ADMINISTRATOR);
		
		$path = DS."components".DS.$comp.DS."config.xml";
        //sbou
        $xmlfile = $path;
		//$xmlfile = JApplicationHelper::_checkPath($path);
        //fin sbou
		
		$this->origparams = new JParameter($original, $xmlfile,"component");
		$this->transparams = new JParameter($translation, $xmlfile,"component");
		$this->defaultparams = new JParameter("", $xmlfile,"component");
		$this->fields = $fields;

	}

	function showOriginal(){
		if ($this->_menutype=="wrapper"){
			?>
			<table width="100%" class="paramlist">
			<tr>
			<td width="40%" align="right" valign="top"><span class="editlinktip"><!-- Tooltip -->
			<span onmouseover="return overlib('Link for Wrapper', CAPTION, 'Wrapper Link', BELOW, RIGHT);" onmouseout="return nd();" >Wrapper Link</span></span></td>

			<td align="left" valign="top"><input type="text" name="orig_params[url]" value="<?php echo $this->origparams->get('url','')?>" class="text_area" size="30" /></td>
			</tr>
			</table>
			<?php
		}
		parent::showOriginal();
	}

	function editTranslation(){
		if ($this->_menutype=="wrapper"){
			?>
			<table width="100%" class="paramlist">
			<tr>
			<td width="40%" align="right" valign="top"><span class="editlinktip"><!-- Tooltip -->
			<span onmouseover="return overlib('Link for Wrapper', CAPTION, 'Wrapper Link', BELOW, RIGHT);" onmouseout="return nd();" >Wrapper Link</span></span></td>
			<td align="left" valign="top"><input type="text" name="refField_params[url]" value="<?php echo $this->transparams->get('url','')?>" class="text_area" size="30" /></td>
			</tr>
			</table>
			<?php
		}
		parent::editTranslation();
	}



}



?>
